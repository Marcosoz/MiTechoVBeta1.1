<?php

declare(strict_types=1);

namespace Doctrine\DBAL\Tests\Schema;

use Doctrine\DBAL\Schema\Exception\InvalidState;
use Doctrine\DBAL\Schema\Index;
use Doctrine\DBAL\Schema\Index\IndexedColumn;
use Doctrine\DBAL\Schema\Index\IndexType;
use Doctrine\DBAL\Schema\Name\Identifier;
use Doctrine\DBAL\Schema\Name\UnqualifiedName;
use Doctrine\Deprecations\PHPUnit\VerifyDeprecations;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\TestWith;
use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase
{
    use VerifyDeprecations;

    /** @param mixed[] $options */
    private function createIndex(bool $unique = false, bool $primary = false, array $options = []): Index
    {
        return new Index('foo', ['bar', 'baz'], $unique, $primary, [], $options);
    }

    public function testCreateIndex(): void
    {
        $idx = $this->createIndex();
        self::assertEquals('foo', $idx->getName());
        $columns = $idx->getColumns();
        self::assertCount(2, $columns);
        self::assertEquals(['bar', 'baz'], $columns);
        self::assertFalse($idx->isUnique());
        self::assertFalse($idx->isPrimary());
    }

    public function testCreatePrimary(): void
    {
        $idx = $this->createIndex(false, true);
        self::assertTrue($idx->isUnique());
        self::assertTrue($idx->isPrimary());
    }

    public function testCreateUnique(): void
    {
        $idx = $this->createIndex(true, false);
        self::assertTrue($idx->isUnique());
        self::assertFalse($idx->isPrimary());
    }

    public function testFulfilledByUnique(): void
    {
        $idx1 = $this->createIndex(true, false);
        $idx2 = $this->createIndex(true, false);
        $idx3 = $this->createIndex();

        self::assertTrue($idx1->isFulfilledBy($idx2));
        self::assertFalse($idx1->isFulfilledBy($idx3));
    }

    public function testFulfilledByPrimary(): void
    {
        $idx1 = $this->createIndex(true, true);
        $idx2 = $this->createIndex(true, true);
        $idx3 = $this->createIndex(true, false);

        self::assertTrue($idx1->isFulfilledBy($idx2));
        self::assertFalse($idx1->isFulfilledBy($idx3));
    }

    public function testFulfilledByIndex(): void
    {
        $idx1 = $this->createIndex();
        $idx2 = $this->createIndex();
        $pri  = $this->createIndex(true, true);
        $uniq = $this->createIndex(true);

        self::assertTrue($idx1->isFulfilledBy($idx2));
        self::assertTrue($idx1->isFulfilledBy($pri));
        self::assertTrue($idx1->isFulfilledBy($uniq));
    }

    public function testFulfilledWithPartial(): void
    {
        $without = new Index('without', ['col1', 'col2'], true, false, [], []);
        $partial = new Index('partial', ['col1', 'col2'], true, false, [], ['where' => 'col1 IS NULL']);
        $another = new Index('another', ['col1', 'col2'], true, false, [], ['where' => 'col1 IS NULL']);

        self::assertFalse($partial->isFulfilledBy($without));
        self::assertFalse($without->isFulfilledBy($partial));

        self::assertTrue($partial->isFulfilledBy($partial));

        self::assertTrue($partial->isFulfilledBy($another));
        self::assertTrue($another->isFulfilledBy($partial));
    }

    public function testOverrulesWithPartial(): void
    {
        $without = new Index('without', ['col1', 'col2'], true, false, [], []);
        $partial = new Index('partial', ['col1', 'col2'], true, false, [], ['where' => 'col1 IS NULL']);
        $another = new Index('another', ['col1', 'col2'], true, false, [], ['where' => 'col1 IS NULL']);

        self::assertFalse($partial->overrules($without));
        self::assertFalse($without->overrules($partial));

        self::assertTrue($partial->overrules($partial));

        self::assertTrue($partial->overrules($another));
        self::assertTrue($another->overrules($partial));
    }

    /**
     * @param non-empty-list<string> $columns
     * @param list<?int>             $lengths1
     * @param list<?int>             $lengths2
     */
    #[DataProvider('indexLengthProvider')]
    public function testFulfilledWithLength(array $columns, array $lengths1, array $lengths2, bool $expected): void
    {
        $index1 = new Index('index1', $columns, false, false, [], ['lengths' => $lengths1]);
        $index2 = new Index('index2', $columns, false, false, [], ['lengths' => $lengths2]);

        self::assertSame($expected, $index1->isFulfilledBy($index2));
        self::assertSame($expected, $index2->isFulfilledBy($index1));
    }

    /** @return mixed[][] */
    public static function indexLengthProvider(): iterable
    {
        return [
            'empty' => [['column'], [], [], true],
            'same' => [['column'], [64], [64], true],
            'different' => [['column'], [32], [64], false],
            'sparse-different-positions' => [['column1', 'column2'], [0 => 32], [1 => 32], false],
            'sparse-same-positions' => [['column1', 'column2'], [null, 32], [1 => 32], true],
        ];
    }

    public function testFlags(): void
    {
        $idx1 = $this->createIndex();
        self::assertFalse($idx1->hasFlag('clustered'));
        self::assertEmpty($idx1->getFlags());

        $idx1->addFlag('clustered');
        self::assertTrue($idx1->hasFlag('clustered'));
        self::assertTrue($idx1->hasFlag('CLUSTERED'));
        self::assertSame(['clustered'], $idx1->getFlags());
        self::assertTrue($idx1->isClustered());

        $idx1->removeFlag('clustered');
        self::assertFalse($idx1->hasFlag('clustered'));
        self::assertEmpty($idx1->getFlags());
        self::assertFalse($idx1->isClustered());
    }

    public function testIndexQuotes(): void
    {
        $index = new Index('foo', ['`bar`', '`baz`']);

        self::assertTrue($index->spansColumns(['bar', 'baz']));
        self::assertTrue($index->hasColumnAtPosition('bar', 0));
        self::assertTrue($index->hasColumnAtPosition('baz', 1));

        self::assertFalse($index->hasColumnAtPosition('bar', 1));
        self::assertFalse($index->hasColumnAtPosition('baz', 0));
    }

    public function testOptions(): void
    {
        $idx1 = $this->createIndex();
        self::assertFalse($idx1->hasOption('where'));
        self::assertEmpty($idx1->getOptions());

        $idx2 = $this->createIndex(false, false, ['where' => 'name IS NULL']);
        self::assertTrue($idx2->hasOption('where'));
        self::assertTrue($idx2->hasOption('WHERE'));
        self::assertSame('name IS NULL', $idx2->getOption('where'));
        self::assertSame('name IS NULL', $idx2->getOption('WHERE'));
        self::assertSame(['where' => 'name IS NULL'], $idx2->getOptions());
    }

    public function testEmptyName(): void
    {
        $this->expectDeprecationWithIdentifier('https://github.com/doctrine/dbal/pull/6646');

        new Index(null, ['user_id']);
    }

    public function testQualifiedName(): void
    {
        $this->expectDeprecationWithIdentifier('https://github.com/doctrine/dbal/pull/6592');

        new Index('auth.idx_user_id', ['user_id']);
    }

    public function testGetObjectName(): void
    {
        $index = new Index('idx_user_id', ['user_id']);

        self::assertEquals(Identifier::unquoted('idx_user_id'), $index->getObjectName()->getIdentifier());
    }

    public function testEmptyColumns(): void
    {
        $this->expectDeprecationWithIdentifier('https://github.com/doctrine/dbal/pull/6787');

        /** @phpstan-ignore argument.type */
        $index = new Index('idx_user_name', []);

        $this->expectException(InvalidState::class);

        $index->getIndexedColumns();
    }

    public function testInvalidColumnName(): void
    {
        $this->expectDeprecationWithIdentifier('https://github.com/doctrine/dbal/pull/6787');

        $index = new Index('idx_user_name', ['user.name']);

        $this->expectException(InvalidState::class);

        $index->getIndexedColumns();
    }

    public function testPrimaryKeyWithColumnLength(): void
    {
        $this->expectDeprecationWithIdentifier('https://github.com/doctrine/dbal/pull/6787');

        $index = new Index('primary', ['id'], false, true, [], ['lengths' => [32]]);

        $this->expectException(InvalidState::class);

        $index->getIndexedColumns();
    }

    public function testPrimaryKeyWithNullColumnLength(): void
    {
        $this->expectNoDeprecationWithIdentifier('https://github.com/doctrine/dbal/pull/6787');

        new Index('primary', ['id'], false, true, [], ['lengths' => [null]]);
    }

    public function testNonIntegerColumnLength(): void
    {
        $this->expectDeprecationWithIdentifier('https://github.com/doctrine/dbal/pull/6787');

        $index = new Index('idx_user_name', ['name'], false, false, [], ['lengths' => ['8']]);

        self::assertEquals([
            new IndexedColumn(UnqualifiedName::unquoted('name'), 8),
        ], $index->getIndexedColumns());
    }

    public function testNonPositiveColumnLength(): void
    {
        $this->expectDeprecationWithIdentifier('https://github.com/doctrine/dbal/pull/6787');

        $index = new Index('idx_user_name', ['name'], false, false, [], ['lengths' => [-1]]);

        $this->expectException(InvalidState::class);

        $index->getIndexedColumns();
    }

    public function testGetIndexedColumns(): void
    {
        $index = new Index('idx_user_name', ['first_name', 'last_name'], false, false, [], ['lengths' => [16]]);

        $indexedColumns = $index->getIndexedColumns();

        self::assertCount(2, $indexedColumns);

        self::assertEquals(UnqualifiedName::unquoted('first_name'), $indexedColumns[0]->getColumnName());
        self::assertEquals(16, $indexedColumns[0]->getLength());

        self::assertEquals(UnqualifiedName::unquoted('last_name'), $indexedColumns[1]->getColumnName());
        self::assertNull($indexedColumns[1]->getLength());
    }

    public function testUnsupportedFlag(): void
    {
        $this->expectDeprecationWithIdentifier('https://github.com/doctrine/dbal/pull/6886');
        new Index('idx_user_name', ['name'], false, false, ['banana']);
    }

    /** @param list<string> $flags */
    #[TestWith([true, ['fulltext']])]
    #[TestWith([true, ['spatial']])]
    #[TestWith([false, ['fulltext', 'spatial']])]
    public function testConflictInFlagsSignificantForTypeInference(bool $isUnique, array $flags): void
    {
        $this->expectDeprecationWithIdentifier('https://github.com/doctrine/dbal/pull/6886');
        $index = new Index('idx_user_name', ['name'], $isUnique, false, $flags);

        $this->expectException(InvalidState::class);
        $index->getType();
    }

    /** @param list<string> $flags */
    #[TestWith([['fulltext', 'clustered'], IndexType::FULLTEXT])]
    #[TestWith([['spatial', 'clustered'], IndexType::SPATIAL])]
    #[TestWith([['nonclustered', 'clustered'], IndexType::REGULAR])]
    public function testConflictInFlagsInsignificantForTypeInference(array $flags, IndexType $expectedType): void
    {
        $this->expectDeprecationWithIdentifier('https://github.com/doctrine/dbal/pull/6886');
        $index = new Index('idx_user_name', ['name'], false, false, $flags);

        self::assertEquals($expectedType, $index->getType());
    }

    /** @param list<string> $flags */
    #[TestWith([false, [], IndexType::REGULAR])]
    #[TestWith([false, ['fulltext'], IndexType::FULLTEXT])]
    #[TestWith([false, ['spatial'], IndexType::SPATIAL])]
    #[TestWith([true, [], IndexType::UNIQUE])]
    public function testParseType(bool $isUnique, array $flags, IndexType $expectedType): void
    {
        $this->expectNoDeprecationWithIdentifier('https://github.com/doctrine/dbal/pull/6886');
        $index = new Index('idx_user_name', ['user_id'], $isUnique, false, $flags);

        self::assertEquals($expectedType, $index->getType());
    }

    #[TestWith([null])]
    #[TestWith(['is_active = 1'])]
    public function testGetPredicate(?string $predicate): void
    {
        $this->expectNoDeprecationWithIdentifier('https://github.com/doctrine/dbal/pull/6886');
        $index = new Index('idx_user_name', ['user_id'], false, false, [], ['where' => $predicate]);

        self::assertEquals($predicate, $index->getPredicate());
    }

    public function testEmptyPredicate(): void
    {
        $this->expectDeprecationWithIdentifier('https://github.com/doctrine/dbal/pull/6886');
        $index = new Index('idx_user_name', ['user_id'], false, false, [], ['where' => '']);

        $this->expectException(InvalidState::class);
        $index->getPredicate();
    }

    #[TestWith(['fulltext'])]
    #[TestWith(['spatial'])]
    #[TestWith(['clustered'])]
    public function testPartialIndexWithConflictingFlags(string $flag): void
    {
        $this->expectDeprecationWithIdentifier('https://github.com/doctrine/dbal/pull/6886');
        new Index('idx_user_name', ['user_id'], false, false, [$flag], ['where' => 'is_active = 1']);
    }
}
