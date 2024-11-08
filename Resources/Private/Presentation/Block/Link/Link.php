<?php

declare(strict_types=1);

namespace Nezaniel\ComponentView\BaseComponents\Presentation\Block\Link;

use Neos\Flow\Annotations as Flow;
use Nezaniel\ComponentView\Domain\AbstractComponent;
use Nezaniel\ComponentView\Domain\ComponentInterface;
use Psr\Http\Message\UriInterface;

#[Flow\Proxy(false)]
final readonly class Link extends AbstractComponent
{
    public function __construct(
        private UriInterface $uri,
        private LinkTarget $linkTarget,
        private string|ComponentInterface $content,
        private bool $download = false,
    ) {
    }

    public function render(): string
    {
        return '
            <a href="' . $this->uri . '" target="' . $this->linkTarget->value . '"' . $this->linkTarget->getRel()
            . ($this->download ? ' download' : '')
            . '">'
                . $this->content
            . '</a>';
    }
}
