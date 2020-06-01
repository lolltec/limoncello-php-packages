<?php declare(strict_types=1);

namespace Lolltec\Limoncello\Templates\Commands;

use Limoncello\Contracts\Commands\CommandInterface;
use Limoncello\Contracts\Commands\IoInterface;
use Limoncello\Contracts\FileSystem\FileSystemInterface;
use Limoncello\Contracts\Settings\SettingsProviderInterface;
use Lolltec\Limoncello\Templates\Contracts\JsFrameworkTemplatesCacheInterface;
use Lolltec\Limoncello\Templates\Package\JsFrameworkTemplatesSettings;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

/**
 * @package Lolltec\Limoncello\Templates
 */
class JsFrameworkTemplatesCommand implements CommandInterface
{
    /**
     * Command name.
     */
    const NAME = 'l:js-framework-templates';

    /** Argument name */
    const ARG_ACTION = 'action';

    /** Command action */
    const ACTION_CLEAR_CACHE = 'clear-cache';

    /** Command action */
    const ACTION_CREATE_CACHE = 'cache';

    /**
     * @inheritDoc
     */
    public static function getName(): string
    {
        return static::NAME;
    }

    /**
     * @inheritDoc
     */
    public static function getDescription(): string
    {
        return 'Creates and cleans JS framework templates cache.';
    }

    /**
     * @inheritDoc
     */
    public static function getHelp(): string
    {
        return 'This command creates and cleans cache for JS framework HTML templates.';
    }

    /**
     * @inheritDoc
     */
    public static function getArguments(): array
    {
        $cache = static::ACTION_CREATE_CACHE;
        $clear = static::ACTION_CLEAR_CACHE;

        return [
            [
                static::ARGUMENT_NAME        => static::ARG_ACTION,
                static::ARGUMENT_DESCRIPTION => "Action such as `$cache` or `$clear`.",
                static::ARGUMENT_MODE        => static::ARGUMENT_MODE__REQUIRED,
            ],
        ];
    }

    /**
     * @inheritDoc
     */
    public static function getOptions(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public static function execute(ContainerInterface $container, IoInterface $inOut): void
    {
        $action = $inOut->getArgument(static::ARG_ACTION);
        switch ($action) {
            case static::ACTION_CREATE_CACHE:
                (new self())->executeCache($inOut, $container);
                break;
            case static::ACTION_CLEAR_CACHE:
                (new self())->executeClear($inOut, $container);
                break;
            default:
                $inOut->writeError("Unsupported action `$action`." . PHP_EOL);
                break;
        }
    }

    /**
     * @param IoInterface        $inOut
     * @param ContainerInterface $container
     *
     * @return void
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    protected function executeClear(IoInterface $inOut, ContainerInterface $container): void
    {
        $settings    = $this->getTemplatesSettings($container);
        $cacheFolder = $settings[JsFrameworkTemplatesSettings::KEY_CACHE_FOLDER];

        /** @var FileSystemInterface $fileSystem */
        $fileSystem = $container->get(FileSystemInterface::class);
        foreach ($fileSystem->scanFolder($cacheFolder) as $fileOrFolder) {
            $fileSystem->isFolder($fileOrFolder) === false ?: $fileSystem->deleteFolderRecursive($fileOrFolder);
        }

        $inOut->writeInfo('Cache has been cleared.' . PHP_EOL);
    }

    /**
     * @param IoInterface        $inOut
     * @param ContainerInterface $container
     *
     * @return void
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     *
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    protected function executeCache(IoInterface $inOut, ContainerInterface $container): void
    {
        /** @var JsFrameworkTemplatesCacheInterface $cache */
        $cache = $container->get(JsFrameworkTemplatesCacheInterface::class);

        $settings  = $this->getTemplatesSettings($container);
        $templates = $settings[JsFrameworkTemplatesSettings::KEY_TEMPLATES_LIST];

        foreach ($templates as $templateName) {
            // it will write template to cache
            $inOut->writeInfo(
                "Starting template caching for `$templateName`..." . PHP_EOL,
                IoInterface::VERBOSITY_VERBOSE
            );

            $cache->cache($templateName);

            $inOut->writeInfo(
                "Template caching finished for `$templateName`." . PHP_EOL,
                IoInterface::VERBOSITY_NORMAL
            );
        }
    }

    /**
     * @param ContainerInterface $container
     *
     * @return array
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    protected function getTemplatesSettings(ContainerInterface $container): array
    {
        $tplConfig = $container->get(SettingsProviderInterface::class)->get(JsFrameworkTemplatesSettings::class);

        return $tplConfig;
    }
}
