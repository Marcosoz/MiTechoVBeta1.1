<?php

declare(strict_types=1);

namespace Doctrine\DBAL\Tests\Schema;

use Doctrine\DBAL\Exception;
use Doctrine\DBAL\Schema\Exception\InvalidState;
use Doctrine\DBAL\Schema\ForeignKeyConstraint;
use Doctrine\DBAL\Schema\ForeignKeyConstraint\Deferrability;
use Doctrine\DBAL\Schema\ForeignKeyConstraint\MatchType;
use Doctrine\DBAL\Schema\ForeignKeyConstraint\ReferentialAction;
use Doctrine\DBAL\Schema\Index;
use Doctrine\DBAL\Schema\Name\Identifier;
use Doctrine\DBAL\Schema\Name\OptionallyQualifiedName;
use Doctrine\DBAL\Schema\Name\UnqualifiedName;
use Doctrine\Deprecations\PHPUnit\VerifyDeprecations;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ForeignKeyConstraintTest extends TestCase
{
    use VerifyDeprecations;

    /** @param non-empty-list<string> $indexColumns */
    #[DataProvider('getIntersectsIndexColumnsData')]
    public function testIntersectsIndexColumns(array $indexColumns, bool $expectedResult): void
    {
        $foreignKey = new ForeignKeyConstraint(['foo', 'bar'], 'foreign_table', ['fk_foo', 'fk_bar']);

        $index = new Index('foo', $indexColumns);

        self::assertSame($expectedResult, $foreignKey->intersectsIndexColumns($index));
    }

    /** @return mixed[][] */
    public static function getIntersectsIndexColumnsData(): iterable
    {
        return [
            [['baz'], false],
            [['baz', 'bloo'], false],

            [['foo'], true],
            [['bar'], true],

            [['foo', 'bar'], true],
            [['bar', 'foo'], true],

            [['foo', 'baz'], true],
            [['baz', 'foo'], true],

            [['bar', 'baz'], true],
            [['baz', 'bar'], true],

            [['foo', 'bloo', 'baz'], true],
            [['bloo', 'foo', 'baz'], true],
            [['bloo', 'baz', 'foo'], true],

            [['FOO'], true],
        ];
    }

    #[DataProvider('getUnqualifiedForeignTableNameData')]
    public function testGetUnqualifiedForeignTableName(
        string $foreignTableName,
        string $expectedUnqualifiedTableName,
    ): void {
        $foreignKey = new ForeignKeyConstraint(['foo', 'bar'], $foreignTableName, ['fk_foo', 'fk_bar']);

        self::assertSame($expectedUnqualifiedTableName, $foreignKey->getUnqualifiedForeignTableName());
    }

    /** @return mixed[][] */
    public static function getUnqualifiedForeignTableNameData(): iterable
    {
        return [
            ['schema.foreign_table', 'foreign_table'],
            ['schema."foreign_table"', 'foreign_table'],
            ['"schema"."foreign_table"', 'foreign_table'],
            ['foreign_table', 'foreign_table'],
        ];
    }

    public function testCompareRestrictAndNoActionAreTheSame(): void
    {
        $fk1 = new ForeignKeyConstraint(['foo'], 'bar', ['baz'], 'fk1', ['onDelete' => 'NO ACTION']);
        $fk2 = new ForeignKeyConstraint(['foo'], 'bar', ['baz'], 'fk1', ['onDelete' => 'RESTRICT']);

        self::assertSame($fk1->onDelete(), $fk2->onDelete());
    }

    public function testQualifiedName(): void
    {
        $this->expectDeprecationWithIdentifier('https://github.com/doctrine/dbal/pull/6592');

        new ForeignKeyConstraint(['user_id'], 'users', ['id'], 'auth.fk_user_id');
    }

    /** @throws Exception */
    public function testGetNonNullObjectName(): void
    {
        $foreignKey = new ForeignKeyConstraint(['user_id'], 'users', ['id'], 'fk_user_id');
        $name       = $foreignKey->getObjectName();

        self::assertNotNull($name);
        self::assertEquals(Identifier::unquoted('fk_user_id'), $name->getIdentifier());
    }

    /** @throws Exception */
    public function testGetNullObjectName(): void
    {
        $foreignKey = new ForeignKeyConstraint(['user_id'], 'users', ['id']);

        self::assertNull($foreignKey->getObjectName());
    }

    /** @throws Exception */
    public function testEmptyReferencingColumnNames(): void
    {
        /** @phpstan-ignore argument.type */
        $foreignKey = new ForeignKeyConstraint([], 'users', ['id']);

        $this->expectException(InvalidState::class);
        $foreignKey->getReferencingColumnNames();
    }

    /** @throws Exception */
    public function testInvalidReferencingColumnNames(): void
    {
        $this->expectDeprecationWithIdentifier('https://github.com/doctrine/dbal/pull/6728');
        $foreignKey = new ForeignKeyConstraint([''], 'users', ['id']);

        $this->expectException(InvalidState::class);
        $foreignKey->getReferencingColumnNames();
    }

    /** @throws Exception */
    public function testInvalidReferencedTableName(): void
    {
        $this->expectDeprecationWithIdentifier('https://github.com/doctrine/dbal/pull/6728');
        $foreignKey = new ForeignKeyConstraint(['user_id'], '', ['id']);

        $this->expectException(InvalidState::class);
        $foreignKey->getReferencedTableName();
    }

    /** @throws Exception */
    public function testEmptyReferencedColumnNames(): void
    {
        /** @phpstan-ignore argument.type */
        $foreignKey = new ForeignKeyConstraint(['user_id'], 'users', []);

        $this->expectException(InvalidState::class);
        $foreignKey->getReferencedColumnNames();
    }

    /** @throws Exception */
    public function testInvalidReferencedColumnNames(): void
    {
        $this->expectDeprecationWithIdentifier('https://github.com/doctrine/dbal/pull/6728');
        $foreignKey = new ForeignKeyConstraint(['user_id'], 'users', ['']);

        $this->expectException(InvalidState::class);
        $foreignKey->getReferencedColumnNames();
    }

    /** @throws Exception */
    public function testInvalidMatchType(): void
    {
        $this->expectDeprecationWithIdentifier('https://github.com/doctrine/dbal/pull/6728');
        $foreignKey = new ForeignKeyConstraint(['user_id'], 'users', ['id'], '', ['match' => 'MAYBE']);

        $this->expectException(InvalidState::class);
        $foreignKey->getMatchType();
    }

    /** @throws Exception */
    public function testInvalidOnUpdateAction(): void
    {
        $this->expectDeprecationWithIdentifier('https://github.com/doctrine/dbal/pull/6728');
        $foreignKey = new ForeignKeyConstraint(['user_id'], 'users', ['id'], '', ['onUpdate' => 'DROP']);

        $this->expectException(InvalidState::class);
        $foreignKey->getOnUpdateAction();
    }

    /** @throws Exception */
    public function testInvalidOnDeleteAction(): void
    {
        $this->expectDeprecationWithIdentifier('https://github.com/doctrine/dbal/pull/6728');
        $foreignKey = new ForeignKeyConstraint(['user_id'], 'users', ['id'], '', ['onDelete' => 'DROP']);

        $this->expectException(InvalidState::class);
        $foreignKey->getOnDeleteAction();
    }

    public function testInvalidDeferrability(): void
    {
        $this->expectDeprecationWithIdentifier('https://github.com/doctrine/dbal/pull/6728');
        $foreignKey = new ForeignKeyConstraint(['user_id'], 'users', ['id'], '', [
            'deferrable' => false,
            'deferred' => true,
        ]);

        $this->expectException(InvalidState::class);
        $foreignKey->getDeferrability();
    }

    /** @param array<string,bool> $options */
    #[DataProvider('deferrabilityProvider')]
    public function testParseDeferrability(array $options, Deferrability $expected): void
    {
        $this->expectNoDeprecationWithIdentifier('https://github.com/doctrine/dbal/pull/6728');
        $foreignKey = new ForeignKeyConstraint(['user_id'], 'users', ['id'], '', $options);

        self::assertEquals($expected, $foreignKey->getDeferrability());
    }

    /**
     * The expected behavior here should be consistent with
     * {@see \Doctrine\DBAL\Tests\Functional\Schema\ForeignKeyConstraintTest::deferrabilityOptionsProvider()}
     *
     * @return iterable<array{array<string,bool>,Deferrability}>
     */
    public static function deferrabilityProvider(): iterable
    {
        $notDeferrable = Deferrability::NOT_DEFERRABLE;
        $deferrable    = Deferrability::DEFERRABLE;
        $deferred      = Deferrability::DEFERRED;

        yield 'unspecified' => [[], $notDeferrable];

        // INITIALLY IMMEDIATE implies NOT DEFERRABLE
        yield 'INITIALLY IMMEDIATE' => [['deferred' => false], $notDeferrable];

        // INITIALLY IMMEDIATE implies DEFERRABLE
        yield 'INITIALLY DEFERRED' => [['deferred' => true], $deferred];

        // NOT DEFERRABLE implies INITIALLY IMMEDIATE
        yield 'NOT DEFERRABLE' => [['deferrable' => false], $notDeferrable];

        yield 'NOT DEFERRABLE INITIALLY IMMEDIATE' => [
            [
                'deferrable' => false,
                'deferred' => false,
            ], $notDeferrable,
        ];

        // DEFERRABLE implies INITIALLY IMMEDIATE
        yield 'DEFERRABLE' => [
            ['deferrable' => true], $deferrable,
        ];

        yield 'DEFERRABLE INITIALLY IMMEDIATE' => [
            [
                'deferrable' => true,
                'deferred' => false,
            ], $deferrable,
        ];

        yield 'DEFERRABLE INITIALLY DEFERRED' => [
            [
                'deferrable' => true,
                'deferred' => true,
            ],
            $deferred,
        ];
    }

    public function testAllValidProperties(): void
    {
        $this->expectNoDeprecationWithIdentifier('https://github.com/doctrine/dbal/pull/6728');
        $foreignKey = new ForeignKeyConstraint(['user_id'], 'users', ['id'], 'fk_user_id');

        self::assertEquals([UnqualifiedName::unquoted('user_id')], $foreignKey->getReferencingColumnNames());
        self::assertEquals(OptionallyQualifiedName::unquoted('users'), $foreignKey->getReferencedTableName());
        self::assertEquals([UnqualifiedName::unquoted('id')], $foreignKey->getReferencedColumnNames());
        self::assertEquals(MatchType::SIMPLE, $foreignKey->getMatchType());
        self::assertEquals(ReferentialAction::NO_ACTION, $foreignKey->getOnUpdateAction());
        self::assertEquals(ReferentialAction::NO_ACTION, $foreignKey->getOnDeleteAction());
        self::assertEquals(Deferrability::NOT_DEFERRABLE, $foreignKey->getDeferrability());
    }
}
