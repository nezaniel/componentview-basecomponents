<?php

declare(strict_types=1);

namespace Nezaniel\ComponentView\BaseComponents\Presentation\Block\Stylesheet;

use Neos\Flow\Annotations as Flow;
use PackageFactory\PHPComponentEngine\ComponentInterface;

/** @deprecated use ComponentCollection<Stylesheet> instead */
#[Flow\Proxy(false)]
final readonly class Stylesheets implements ComponentInterface
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
