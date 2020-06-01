<?php declare(strict_types=1);

namespace Lolltec\Limoncello\Templates\Commands;

use Limoncello\Contracts\Commands\IoInterface;
use Limoncello\Contracts\FileSystem\FileSystemInterface;
use Limoncello\Contracts\Settings\SettingsProviderInterface;
use Limoncello\Templates\Commands\TemplatesCommand;
use Lolltec\Limoncello\Templates\Contracts\JsFrameworkTemplatesCacheInterface;
use Lolltec\Limoncello\Templates\Package\JsFrameworkTemplatesSettings;
use Psr\Container\ContainerInterface;

/**
 * @package Lolltec\Limoncello\Templates
 */
class JsFrameworkTemplatesCommand extends TemplatesCommand
{
    /**
     * Command name.
     */
    const NAME = 'l:js-framework-templates';

    /**
     * @inheritDoc
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
     * @inheritDoc
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
     * @inheritDoc
     */
    protected function getTemplatesSettings(ContainerInterface $container): array
    {
        $tplConfig = $container->get(SettingsProviderInterface::class)->get(JsFrameworkTemplatesSettings::class);

        return $tplConfig;
    }
}
