<?php

declare(strict_types=1);

namespace Nezaniel\ComponentView\BaseComponents\Integration;

use Nezaniel\ComponentView\Application\AbstractComponentFactory;
use Nezaniel\ComponentView\BaseComponents\Presentation\Block\JavaScript\RemoteJavaScript;
use Nezaniel\ComponentView\BaseComponents\Presentation\CacheBusterKey;

final class JavaScriptFactory extends AbstractComponentFactory
{
    public function forResource(string $packageKey, string $resourceName): RemoteJavaScript
    {
        return new RemoteJavaScript(
            $this->uriService->getResourceUri(
                $packageKey,
                'JavaScript/' . $resourceName . '.js?cb=' . CacheBusterKey::get()
            )
        );
    }
}
