<?php

declare(strict_types=1);

namespace Nezaniel\ComponentView\BaseComponents\Presentation\Block\Stylesheet;

use Neos\Flow\Annotations as Flow;
use Nezaniel\ComponentView\Domain\AbstractComponent;

#[Flow\Proxy(false)]
final readonly class InlineStylesheet extends AbstractComponent
{
    public function __construct(
        private string $content
    ) {
    }

    public function render(): string
    {
        return '<style>' . $this->content . '</style>';
    }
}
