<?php

declare(strict_types=1);

namespace Nezaniel\ComponentView\BaseComponents\Presentation\Block\JavaScript;

use Neos\Flow\Annotations as Flow;

#[Flow\Proxy(false)]
final readonly class InlineJavaScript extends AbstractJavaScript
{
    public function __construct(
        private string $content
    ) {
    }

    public function render(): string
    {
        return '<script type="application/javascript">' . $this->content . '</script>';
    }
}
