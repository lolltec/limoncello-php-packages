<?php declare(strict_types=1);

namespace Lolltec\Limoncello\Tests\Flute\Types;

use Doctrine\DBAL\Types\Type;
use Lolltec\Limoncello\Flute\Types\UuidType;
use Lolltec\Limoncello\Tests\Flute\TestCase;
use Ramsey\Uuid\Uuid;

/**
 * @package App
 */
class UuidTypesTest extends TestCase
{
    /**
     * @inheritDoc
     * @throws \Doctrine\DBAL\DBALException
     */
    protected function setUp()
    {
        parent::setUp();

        if (Type::hasType(UuidType::NAME) === false)
            Type::addType(UuidType::NAME, UuidType::class);
    }

    /**
     * @throws \Doctrine\DBAL\DBALException
     */
    public function testUuidTypeConversions(): void
    {
        $type = Type::getType(UuidType::NAME);

        $platform = $this->createConnection()->getDatabasePlatform();

        $uuid = Uuid::getFactory()->uuid4()->toString();

        /** @var Uuid $phpValue */
        $phpValue = $type->convertToPHPValue($uuid, $platform);

        $this->assertEquals($uuid, $phpValue);
        $this->assertEquals($uuid, $phpValue->jsonSerialize());
    }

    /**
     * @throws \Doctrine\DBAL\DBALException
     */
    public function testUuidTypeToDatabaseConversions(): void
    {
        $type = Type::getType(UuidType::NAME);

        $platform = $this->createConnection()->getDatabasePlatform();

        $uuid = Uuid::getFactory()->uuid4()->toString();

        /** @var string $databaseValue */
        $databaseValue = $type->convertToDatabaseValue($uuid, $platform);
        $this->assertEquals($uuid, $databaseValue);
    }
}
