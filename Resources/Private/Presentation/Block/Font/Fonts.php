<?php

declare(strict_types=1);

namespace Nezaniel\ComponentView\BaseComponents\Presentation\Block\Font;

use Neos\Flow\Annotations as Flow;
use PackageFactory\PHPComponentEngine\ComponentInterface;

#[Flow\Proxy(false)]
final readonly class Fonts implements ComponentInterface
{
    /**
     * @var array<int|string,Font>
     */
    private array $fonts;

    public function __construct(Font ...$fonts)
    {
        $this->fonts = $fonts;
    }

    public function render(): string
    {
        return implode('', array_map(
            fn (Font $font): string => $font->render(),
            $this->fonts
        ));
    }
}
