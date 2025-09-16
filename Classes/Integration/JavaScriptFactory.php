<?php

declare(strict_types=1);

namespace Nezaniel\ComponentView\BaseComponents\Integration;

use Nezaniel\ComponentView\BaseComponents\Presentation\Block\JavaScript\RemoteJavaScript;
use Nezaniel\ComponentView\BaseComponents\Presentation\CacheBusterKey;
use PackageFactory\Neos\ComponentEngine\NeosAccessInterface;

final class JavaScriptFactory
{
    public function forResource(string $packageKey, string $resourceName, NeosAccessInterface $neos): RemoteJavaScript
    {
        return new RemoteJavaScript(
            $neos->getStaticResourceUri(
                $packageKey,
                'JavaScript/' . $resourceName . '.js?cb=' . CacheBusterKey::get()
            )
        );
    }
}
