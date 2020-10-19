<?php declare (strict_types=1);

namespace Lolltec\Limoncello\Flute\Http\Route;

use Limoncello\Container\Traits\HasContainerTrait;
use Lolltec\Limoncello\Flute\Contracts\Http\Route\KeyIndexInterface;
use Psr\Container\ContainerInterface as PsrContainerInterface;

/**
 * @package Lolltec\Limoncello\Flute
 */
class KeyIndex implements KeyIndexInterface
{
    use HasContainerTrait;

    /**
     * @inheritDoc
     */
    public function __construct(PsrContainerInterface $container)
    {
        $this->setContainer($container);
    }

    /**
     * @var
     */
    private $value;

    /**
     * @inheritDoc
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @inheritDoc
     */
    public function setValue(string $value): void
    {
        $this->setValue($value);
    }
}
