<?php

declare(strict_types=1);

namespace Nezaniel\ComponentView\BaseComponents\Presentation\Block\Stylesheet;

use Neos\Flow\Annotations as Flow;
use PackageFactory\PHPComponentEngine\ComponentInterface;
use Psr\Http\Message\UriInterface;

#[Flow\Proxy(false)]
final readonly class Stylesheet implements ComponentInterface
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
