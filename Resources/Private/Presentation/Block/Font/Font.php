<?php

declare(strict_types=1);

namespace Nezaniel\ComponentView\BaseComponents\Presentation\Block\Font;

use Neos\Flow\Annotations as Flow;
use PackageFactory\PHPComponentEngine\ComponentInterface;
use Psr\Http\Message\UriInterface;

#[Flow\Proxy(false)]
final readonly class Font implements ComponentInterface
{
    public function __construct(
        private UriInterface $baseUri,
        private string $family
    ) {
    }

    public function render(): string
    {
        return '<style type="text/css">
            @font-face {
                font-family: "' . $this->family .  '";
                src: url("' . $this->baseUri . '.svg");
                src: url("' . $this->baseUri . '.eot%3F%23iefix") format("embedded-opentype"),
                    url("' . $this->baseUri . '.woff2") format("woff2"),
                    url("' . $this->baseUri . '.woff") format("woff"),
                    url("' . $this->baseUri . '.ttf") format("truetype"),
                    url("' . $this->baseUri . '.svg") format("svg");
                font-weight: normal;
                font-style: normal;
            }
        </style>';
    }
}
