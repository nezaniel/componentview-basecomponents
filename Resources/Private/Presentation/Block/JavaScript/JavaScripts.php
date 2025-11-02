<?php

declare(strict_types=1);

namespace Nezaniel\ComponentView\BaseComponents\Presentation\Block\JavaScript;

use Neos\Flow\Annotations as Flow;
use PackageFactory\PHPComponentEngine\ComponentInterface;

/** @deprecated use ComponentCollection<AbstractJavaScript> instead */
#[Flow\Proxy(false)]
final readonly class JavaScripts implements ComponentInterface
{
    /**
     * @param array<int|string,AbstractJavaScript|string> $javaScripts
     */
    private function __construct(
        private array $javaScripts
    ) {
    }

    public static function list(AbstractJavaScript|string ...$javaScripts)
    {
        return new self($javaScripts);
    }

    public function union(self $other): self
    {
        return new self(array_merge($this->javaScripts, $other->javaScripts));
    }

    public function render(): string
    {
        return implode(
            '',
            array_map(
                fn (AbstractJavaScript|string $item): string => is_string($item) ? $item : $item->render(),
                $this->javaScripts
            )
        );
    }
}
