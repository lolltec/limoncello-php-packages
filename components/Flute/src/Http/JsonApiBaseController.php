<?php declare(strict_types=1);

namespace Lolltec\Limoncello\Flute\Http;

use Limoncello\Contracts\Session\SessionInterface;
use Lolltec\Limoncello\Flute\Contracts\Http\Route\KeyIndexInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * @package Lolltec\Limoncello\Flute
 */
abstract class JsonApiBaseController extends \Limoncello\Flute\Http\JsonApiBaseController
{
    /**
     * @inheritDoc
     */
    public static function update(
        array $routeParams,
        ContainerInterface $container,
        ServerRequestInterface $request
    ): ResponseInterface
    {
//        /** @var KeyIndexInterface $routeKeyIndex */
//        $routeKeyIndex = $container->get(KeyIndexInterface::class);
//        $routeKeyIndex->setValue($routeParams[static::ROUTE_KEY_INDEX]);

        $session = $container->get(SessionInterface::class);
        $session['route_key_index'] = $routeParams[static::ROUTE_KEY_INDEX];

        return parent::update($routeParams, $container, $request);
    }
}
