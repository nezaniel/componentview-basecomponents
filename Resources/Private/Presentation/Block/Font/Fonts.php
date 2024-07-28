<?php

declare(strict_types=1);

namespace Nezaniel\ComponentView\BaseComponents\Presentation\Block\Font;

use Neos\Flow\Annotations as Flow;
use Nezaniel\ComponentView\Domain\AbstractComponent;

#[Flow\Proxy(false)]
final readonly class Fonts extends AbstractComponent
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
        return implode('', $this->fonts);
    }
}
