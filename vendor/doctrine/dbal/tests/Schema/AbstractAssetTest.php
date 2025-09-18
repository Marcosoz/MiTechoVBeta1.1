<?php

declare(strict_types=1);

namespace Doctrine\DBAL\Tests\Schema;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Platforms\MySQLPlatform;
use Doctrine\DBAL\Platforms\OraclePlatform;
use Doctrine\DBAL\Platforms\PostgreSQLPlatform;
use Doctrine\DBAL\Schema\AbstractAsset;
use Doctrine\DBAL\Schema\Identifier;
use Doctrine\DBAL\Schema\Name\GenericName;
use Doctrine\Deprecations\PHPUnit\VerifyDeprecations;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class AbstractAssetTest extends TestCase
{
    use VerifyDeprecations;

    #[DataProvider('nameParsingDeprecationProvider')]
    public function testNameParsingDeprecation(string $name, AbstractPlatform $platform): void
    {
        $this->expectDeprecationWithIdentifier('https://github.com/doctrine/dbal/pull/6592');

        $identifier = new Identifier($name);
        $identifier->getQuotedName($platform);
    }

    /** @return iterable<array{string, AbstractPlatform}> */
    public static function nameParsingDeprecationProvider(): iterable
    {
        return [
            // unquoted keywords not in normal case
            ['select', new OraclePlatform()],
            ['SELECT', new PostgreSQLPlatform()],

            // unquoted name not in normal case qualified by quoted name
            ['"_".id', new OraclePlatform()],
            ['"_".ID', new PostgreSQLPlatform()],

            // parse error
            ['table.', new MySQLPlatform()],
            ['"table', new MySQLPlatform()],
            ['table"', new MySQLPlatform()],
            [' ', new MySQLPlatform()],

            // incompatible parser behavior
            ['"example.com"', new MySQLPlatform()],
        ];
    }

    #[DataProvider('noNameParsingDeprecationProvider')]
    public function testNoNameParsingDeprecation(string $name, AbstractPlatform $platform): void
    {
        $identifier = new Identifier($name);

        $this->expectNoDeprecationWithIdentifier('https://github.com/doctrine/dbal/pull/6592');
        $identifier->getQuotedName($platform);
    }

    /** @return iterable<array{string, AbstractPlatform}> */
    public static function noNameParsingDeprecationProvider(): iterable
    {
        return [
            // empty name
            ['', new MySQLPlatform()],

            // name with one qualifier
            ['schema.table', new MySQLPlatform()],

            // quoted keywords
            ['"select"', new OraclePlatform()],
            ['"SELECT"', new PostgreSQLPlatform()],

            // unquoted keywords in normal case
            ['SELECT', new OraclePlatform()],
            ['select', new PostgreSQLPlatform()],

            // unquoted keywords in any case on a platform that does not force a case
            ['SELECT', new MySQLPlatform()],
            ['select', new MySQLPlatform()],

            // non-keywords in any case
            ['id', new OraclePlatform()],
            ['ID', new OraclePlatform()],
            ['id', new PostgreSQLPlatform()],
            ['ID', new PostgreSQLPlatform()],
        ];
    }

    public function testConstructWithoutArguments(): void
    {
        $this->expectDeprecationWithIdentifier('https://github.com/doctrine/dbal/pull/6610');

        // @phpstan-ignore expr.resultUnused
        new /** @extends AbstractAsset<GenericName> */
        class extends AbstractAsset {
        };
    }

    public function testCreateParserNotImplemented(): void
    {
        $this->expectDeprecationWithIdentifier('https://github.com/doctrine/dbal/pull/6592');

        // @phpstan-ignore expr.resultUnused
        new /** @extends AbstractAsset<GenericName> */
        class ('foo') extends AbstractAsset {
        };
    }
}
