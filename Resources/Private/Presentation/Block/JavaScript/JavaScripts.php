<?php

declare(strict_types=1);

namespace Nezaniel\ComponentView\BaseComponents\Presentation\Block\JavaScript;

use Neos\Flow\Annotations as Flow;
use Nezaniel\ComponentView\Domain\AbstractComponent;

#[Flow\Proxy(false)]
final readonly class JavaScripts extends AbstractComponent
{
    /**
     * @var array<int|string,AbstractJavaScript|string>
     */
    private array $javaScripts;

    public function __construct(AbstractJavaScript|string ...$javaScripts)
    {
        $this->javaScripts = $javaScripts;
    }

    public function union(self $other): self
    {
        return new self(...array_merge($this->javaScripts, $other->javaScripts));
    }

    public function render(): string
    {
        return implode('', $this->javaScripts);
    }
}
