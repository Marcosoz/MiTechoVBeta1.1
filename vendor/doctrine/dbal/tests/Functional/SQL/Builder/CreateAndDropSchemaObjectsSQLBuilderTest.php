<?php

declare(strict_types=1);

namespace Doctrine\DBAL\Tests\Functional\SQL\Builder;

use Doctrine\DBAL\Schema\AbstractSchemaManager;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Schema\PrimaryKeyConstraint;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Schema\Table;
use Doctrine\DBAL\Tests\FunctionalTestCase;
use Doctrine\DBAL\Types\Types;

use function strtolower;

class CreateAndDropSchemaObjectsSQLBuilderTest extends FunctionalTestCase
{
    public function testCreateAndDropTablesWithCircularForeignKeys(): void
    {
        $table1 = $this->createTable('t1', 't2');
        $table2 = $this->createTable('t2', 't1');

        $schema = new Schema([$table1, $table2]);

        $schemaManager = $this->connection->createSchemaManager();
        $schemaManager->createSchemaObjects($schema);

        $this->introspectForeignKey($schemaManager, 't1', 't2');
        $this->introspectForeignKey($schemaManager, 't2', 't1');

        $schemaManager->dropSchemaObjects($schema);

        self::assertFalse($schemaManager->tablesExist(['t1']));
        self::assertFalse($schemaManager->tablesExist(['t2']));
    }

    /**
     * @param non-empty-string $name
     * @param non-empty-string $otherName
     */
    private function createTable(string $name, string $otherName): Table
    {
        $table = Table::editor()
            ->setUnquotedName($name)
            ->setColumns(
                Column::editor()
                    ->setUnquotedName('id')
                    ->setTypeName(Types::INTEGER)
                    ->create(),
                Column::editor()
                    ->setUnquotedName('other_id')
                    ->setTypeName(Types::INTEGER)
                    ->create(),
            )
            ->setPrimaryKeyConstraint(
                PrimaryKeyConstraint::editor()
                    ->setUnquotedColumnNames('id')
                    ->create(),
            )
            ->create();

        $table->addForeignKeyConstraint($otherName, ['other_id'], ['id']);

        return $table;
    }

    private function introspectForeignKey(
        AbstractSchemaManager $schemaManager,
        string $tableName,
        string $expectedForeignTableName,
    ): void {
        $foreignKeys = $schemaManager->listTableForeignKeys($tableName);
        self::assertCount(1, $foreignKeys);
        self::assertSame($expectedForeignTableName, strtolower($foreignKeys[0]->getForeignTableName()));
    }
}
