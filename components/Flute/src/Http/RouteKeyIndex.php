<?php declare (strict_types=1);

namespace Lolltec\Limoncello\Flute\Http\Route;

use Lolltec\Limoncello\Flute\Contracts\Http\Route\RouteKeyIndexInterface;

/**
 * @package Lolltec\Limoncello\Flute
 */
class RouteKeyIndex implements RouteKeyIndexInterface
{
    /**
     * @var string
     */
    private $value;

    /**
     * @inheritDoc
     */
    public function getValue(): ?string
    {
        return $this->getValue();
    }

    /**
     * @inheritDoc
     */
    public function setValue(string $value = null): void
    {
        $this->value = $value;
    }
}
