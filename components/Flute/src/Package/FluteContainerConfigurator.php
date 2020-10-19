<?php declare(strict_types=1);

namespace Lolltec\Limoncello\Flute\Package;

use Doctrine\DBAL\Types\Type;
use Limoncello\Contracts\Container\ContainerInterface as LimoncelloContainerInterface;
use Lolltec\Limoncello\Flute\Contracts\Http\Route\KeyIndexInterface;
use Lolltec\Limoncello\Flute\Http\Route\KeyIndex;
use Lolltec\Limoncello\Flute\Types\GeometryCollectionType;
use Lolltec\Limoncello\Flute\Types\LineStringType;
use Lolltec\Limoncello\Flute\Types\MultiPointType;
use Lolltec\Limoncello\Flute\Types\MultiPolygonType;
use Lolltec\Limoncello\Flute\Types\PointType;
use Lolltec\Limoncello\Flute\Types\PolygonType;
use Lolltec\Limoncello\Flute\Types\UuidType;
use Lolltec\Limoncello\Flute\Types\MultiLineStringType;
use Psr\Container\ContainerInterface as PsrContainerInterface;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidFactoryInterface;
use Ramsey\Uuid\Validator\GenericValidator as UuidValidator;
use Ramsey\Uuid\Validator\ValidatorInterface as UuidValidatorInterface;

/**
 * @package Lolltec\Limoncello\Flute
 */
class FluteContainerConfigurator extends \Limoncello\Flute\Package\FluteContainerConfigurator
{
    /**
     * @inheritDoc
     */
    public static function configureContainer(LimoncelloContainerInterface $container): void
    {
        parent::configureContainer($container);

        $container[UuidFactoryInterface::class] = function (): UuidFactoryInterface {
            return Uuid::getFactory();
        };

        $container[UuidValidatorInterface::class] = function (): UuidValidatorInterface {
            return new UuidValidator();
        };

        $container[KeyIndexInterface::class] = function(PsrContainerInterface $container): KeyIndexInterface {
            return new KeyIndex($container);
        };

        // register spatial types
        Type::hasType(PointType::NAME) === true ?: Type::addType(PointType::NAME, PointType::class);
        Type::hasType(MultiPointType::NAME) === true ?: Type::addType(MultiPointType::NAME, MultiPointType::class);
        Type::hasType(LineStringType::NAME) === true ?: Type::addType(LineStringType::NAME, LineStringType::class);
        Type::hasType(MultiLineStringType::NAME) === true ?: Type::addType(MultiLineStringType::NAME, MultiLineStringType::class);
        Type::hasType(PolygonType::NAME) === true ?: Type::addType(PolygonType::NAME, PolygonType::class);
        Type::hasType(MultiPolygonType::NAME) === true ?: Type::addType(MultiPolygonType::NAME, MultiPolygonType::class);
        Type::hasType(GeometryCollectionType::NAME) === true ?: Type::addType(GeometryCollectionType::NAME, GeometryCollectionType::class);

        // register UUID types
        Type::hasType(UuidType::NAME) === true ?: Type::addType(UuidType::NAME, UuidType::class);
    }
}
