<?php

declare(strict_types=1);

namespace Nezaniel\ComponentView\BaseComponents\Presentation\Block\Stylesheet;

use Neos\Flow\Annotations as Flow;
use Nezaniel\ComponentView\Domain\AbstractComponent;

#[Flow\Proxy(false)]
final readonly class Stylesheets extends AbstractComponent
{
    /**
     * @var array<int|string,Stylesheet|InlineStylesheet>
     */
    private array $stylesheets;

    public function __construct(Stylesheet|InlineStylesheet ...$stylesheets)
    {
        $this->stylesheets = $stylesheets;
    }

    public function union(self $other): self
    {
        return new self(...array_merge($this->stylesheets, $other->stylesheets));
    }

    public function render(): string
    {
        return implode('', $this->stylesheets);
    }
}
