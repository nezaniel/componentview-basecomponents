<?php

declare(strict_types=1);

namespace Nezaniel\ComponentView\BaseComponents\Integration;

use Nezaniel\ComponentView\Application\AbstractComponentFactory;
use Nezaniel\ComponentView\BaseComponents\Presentation\Block\Stylesheet\InlineStylesheet;
use Nezaniel\ComponentView\BaseComponents\Presentation\Block\Stylesheet\Stylesheet;
use Nezaniel\ComponentView\BaseComponents\Presentation\CacheBusterKey;

final class StylesheetFactory extends AbstractComponentFactory
{
    public function create(string $packageKey, string $fileName): Stylesheet
    {
        return new Stylesheet(
            $this->uriService->getResourceUri(
                $packageKey,
                'Styles/' . $fileName . '.css?cb=' . CacheBusterKey::get()
            )
        );
    }

    public static function createShortcutStylesheet(): InlineStylesheet
    {
        return new InlineStylesheet(
            '#neos-shortcut {position: fixed; top: 0; left: 0; width: 100%; height: 100%; '
            . 'background-color: #323232;z-index: 9999;font-family: "Noto Sans", sans-serif;'
            . '-webkit-font-smoothing: antialiased;}#neos-shortcut p {position: relative;margin: 0 auto;'
            . 'width: 500px;height: 60px;top: 50%;margin-top: -30px;color: #fff;font-size: 22px;'
            . 'line-height: 1.4;text-align: center;}#neos-shortcut p a {color: #00b5ff;text-decoration: none;}'
            . '#neos-shortcut p a:hover {color: #39c6ff;}'
        );
    }
}
