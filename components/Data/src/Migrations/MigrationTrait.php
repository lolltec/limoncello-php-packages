<?php declare (strict_types=1);

namespace NiftyCorner\Limoncello\Data\Migrations;

use Closure;
use Doctrine\DBAL\Schema\Table;
use Doctrine\DBAL\Types\Type;
use Limoncello\Data\Contracts\MigrationContextInterface;
use NiftyCorner\Limoncello\Flute\Types\GeometryCollectionType;
use NiftyCorner\Limoncello\Flute\Types\LineStringType;
use NiftyCorner\Limoncello\Flute\Types\MultiLineStringType;
use NiftyCorner\Limoncello\Flute\Types\MultiPointType;
use NiftyCorner\Limoncello\Flute\Types\MultiPolygonType;
use NiftyCorner\Limoncello\Flute\Types\PointType;
use NiftyCorner\Limoncello\Flute\Types\PolygonType;
use NiftyCorner\Limoncello\Flute\Types\UuidType;

/**
 * @package NiftyCorner\Limoncello\Data
 */
trait MigrationTrait
{
    use \Limoncello\Data\Migrations\MigrationTrait {
        string as protected defaultString;
    }

    /**
     * @param string   $name
     * @param int|null $default
     *
     * @return Closure
     */
    protected function nullableFloat(string $name, int $default = null): Closure
    {
        return function (Table $table) use ($name, $default) {
            $table->addColumn($name, Type::FLOAT)->setUnsigned(false)->setNotnull(false)->setDefault($default);
        };
    }

    /**
     * @param string $name
     * @param bool   $notNullable
     * @param null   $default
     *
     * @return Closure
     */
    private function unsignedFloatImpl(string $name, bool $notNullable, $default = null): Closure
    {
        return function (Table $table) use ($name, $notNullable, $default) {
            $column = $table->addColumn($name, Type::FLOAT)->setUnsigned(true)->setNotnull($notNullable);
            $default === null ?: $column->setDefault($default);
        };
    }

    /**
     * @param string   $name
     * @param int|null $default
     *
     * @return Closure
     */
    protected function unsignedFloat(string $name, int $default = null): Closure
    {
        return $this->unsignedFloatImpl($name, true, $default);
    }

    /**
     * @param string   $name
     * @param int|null $default
     *
     * @return Closure
     */
    protected function nullableUnsignedFloat(string $name, int $default = null): Closure
    {
        return $this->unsignedFloatImpl($name, false, $default);
    }

    /**
     * @param string      $name
     * @param string|null $default
     *
     * @return Closure
     */
    protected function string(string $name, string $default = null): Closure
    {
        return function (Table $table, MigrationContextInterface $context) use ($name, $default) {
            $length = $context->getModelSchemas()->getAttributeLength($context->getModelClass(), $name);
            $column = $table->addColumn($name, Type::STRING)->setLength($length)->setNotnull(true);
            $default === null ?: $column->setDefault($default);
        };
    }

    /**
     * @param string $name
     *
     * @return Closure
     */
    protected function json(string $name): Closure
    {
        return function (Table $table) use ($name) {
            $table->addColumn($name, Type::JSON)->setNotnull(true);
        };
    }

    /**
     * @param string $name
     *
     * @return Closure
     */
    protected function nullableJson(string $name): Closure
    {
        return function (Table $table) use ($name) {
            $table->addColumn($name, Type::JSON)->setNotnull(false);
        };
    }

    /**
     * @param string $name
     *
     * @return Closure
     */
    protected function primaryUuid(string $name): Closure
    {
        return function (Table $table) use ($name) {
            $table->addColumn($name, UuidType::NAME)->setNotnull(true);
            $table->setPrimaryKey([$name]);
        };
    }

    /**
     * @param string $name
     *
     * @return Closure
     */
    protected function uuid(string $name): Closure
    {
        return function (Table $table) use ($name) {
            $table->addColumn($name, UuidType::NAME)->setNotnull(true);
        };
    }

    /**
     * @param string $name
     *
     * @return Closure
     */
    protected function nullableUuid(string $name): Closure
    {
        return function (Table $table) use ($name) {
            $table->addColumn($name, UuidType::NAME)->setNotnull(false);
        };
    }

    /**
     * @param string $name
     *
     * @return Closure
     */
    protected function time(string $name): Closure
    {
        return function (Table $table) use ($name) {
            $table->addColumn($name, Type::TIME)->setNotnull(true);
        };
    }

    /**
     * @param string $name
     *
     * @return Closure
     */
    protected function nullableTime(string $name): Closure
    {
        return function (Table $table) use ($name) {
            $table->addColumn($name, Type::TIME)->setNotnull(false);
        };
    }

    /**
     * @param string $name
     *
     * @return Closure
     */
    protected function point(string $name): Closure
    {
        return function (Table $table) use ($name) {
            $table->addColumn($name, PointType::NAME)->setNotnull(true);
        };
    }

    /**
     * @param string $name
     *
     * @return Closure
     */
    protected function nullablePoint(string $name): Closure
    {
        return function (Table $table) use ($name) {
            $table->addColumn($name, PointType::NAME)->setNotnull(false);
        };
    }

    /**
     * @param string $name
     *
     * @return Closure
     */
    protected function multiPoint(string $name): Closure
    {
        return function (Table $table) use ($name) {
            $table->addColumn($name, MultiPointType::NAME)->setNotnull(true);
        };
    }

    /**
     * @param string $name
     *
     * @return Closure
     */
    protected function nullableMultiPoint(string $name): Closure
    {
        return function (Table $table) use ($name) {
            $table->addColumn($name, MultiPointType::NAME)->setNotnull(false);
        };
    }

    /**
     * @param string $name
     *
     * @return Closure
     */
    protected function lineString(string $name): Closure
    {
        return function (Table $table) use ($name) {
            $table->addColumn($name, LineStringType::NAME)->setNotnull(true);
        };
    }

    /**
     * @param string $name
     *
     * @return Closure
     */
    protected function nullableLineString(string $name): Closure
    {
        return function (Table $table) use ($name) {
            $table->addColumn($name, LineStringType::NAME)->setNotnull(true);
        };
    }

    /**
     * @param string $name
     *
     * @return Closure
     */
    protected function multiLineString(string $name): Closure
    {
        return function (Table $table) use ($name) {
            $table->addColumn($name, MultiLineStringType::NAME)->setNotnull(true);
        };
    }

    /**
     * @param string $name
     *
     * @return Closure
     */
    protected function nullableMultiLineString(string $name): Closure
    {
        return function (Table $table) use ($name) {
            $table->addColumn($name, MultiLineStringType::NAME)->setNotnull(false);
        };
    }

    /**
     * @param string $name
     *
     * @return Closure
     */
    protected function polygon(string $name): Closure
    {
        return function (Table $table) use ($name) {
            $table->addColumn($name, PolygonType::NAME)->setNotnull(true);
        };
    }

    /**
     * @param string $name
     *
     * @return Closure
     */
    protected function nullablePolygon(string $name): Closure
    {
        return function (Table $table) use ($name) {
            $table->addColumn($name, PolygonType::NAME)->setNotnull(false);
        };
    }

    /**
     * @param string $name
     *
     * @return Closure
     */
    protected function multiPolygon(string $name): Closure
    {
        return function (Table $table) use ($name) {
            $table->addColumn($name, MultiPolygonType::NAME)->setNotnull(true);
        };
    }

    /**
     * @param string $name
     *
     * @return Closure
     */
    protected function nullableMultiPolygon(string $name): Closure
    {
        return function (Table $table) use ($name) {
            $table->addColumn($name, MultiPolygonType::NAME)->setNotnull(false);
        };
    }

    /**
     * @param string $name
     *
     * @return Closure
     */
    protected function geometryCollection(string $name): Closure
    {
        return function (Table $table) use ($name) {
            $table->addColumn($name, GeometryCollectionType::NAME)->setNotnull(true);
        };
    }

    /**
     * @param string $name
     *
     * @return Closure
     */
    protected function nullableGeometryCollection(string $name): Closure
    {
        return function (Table $table) use ($name) {
            $table->addColumn($name, GeometryCollectionType::NAME)->setNotnull(false);
        };
    }
}
