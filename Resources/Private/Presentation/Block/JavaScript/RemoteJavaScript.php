<?php

declare(strict_types=1);

namespace Nezaniel\ComponentView\BaseComponents\Presentation\Block\JavaScript;

use Neos\Flow\Annotations as Flow;
use Psr\Http\Message\UriInterface;

#[Flow\Proxy(false)]
final readonly class RemoteJavaScript extends AbstractJavaScript
{
    public function __construct(
        private UriInterface $src
    ) {
    }

    public function render(): string
    {
        return '<script type="application/javascript" src="' . urldecode((string)$this->src) . '"></script>';
    }
}
