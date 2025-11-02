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
     * @param array<int|string,Stylesheet|InlineStylesheet> $stylesheets
     */
    private function __construct(
        private array $stylesheets
    ) {
    }

    public static function list(Stylesheet|InlineStylesheet ...$stylesheets)
    {
        return new self($stylesheets);
    }

    public function union(self $other): self
    {
        return new self(array_merge($this->stylesheets, $other->stylesheets));
    }

    public function render(): string
    {
        return implode(
            '',
            array_map(
                fn (Stylesheet|InlineStylesheet $stylesheet): string => $stylesheet->render(),
                $this->stylesheets
            )
        );
    }
}
