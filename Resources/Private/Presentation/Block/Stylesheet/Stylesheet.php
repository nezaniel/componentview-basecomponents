<?php

declare(strict_types=1);

namespace Nezaniel\ComponentView\BaseComponents\Presentation\Block\Stylesheet;

use Neos\Flow\Annotations as Flow;
use Nezaniel\ComponentView\Domain\AbstractComponent;
use Psr\Http\Message\UriInterface;

#[Flow\Proxy(false)]
final readonly class Stylesheet extends AbstractComponent
{
    public function __construct(
        private UriInterface $href
    ) {
    }

    public function render(): string
    {
        return '<link rel="stylesheet" href="' . urldecode((string)$this->href) . '"/>';
    }
}
