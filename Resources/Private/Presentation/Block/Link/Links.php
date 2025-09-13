<?php

declare(strict_types=1);

namespace Nezaniel\ComponentView\BaseComponents\Presentation\Block\Link;

use Neos\Flow\Annotations as Flow;
use PackageFactory\PHPComponentEngine\ComponentInterface;

/** @deprecated use ComponentCollection<Link> instead */
#[Flow\Proxy(false)]
final readonly class Links implements ComponentInterface
{
    /**
     * @var array<int|string,Link>
     */
    private array $links;

    public function __construct(Link ...$links)
    {
        $this->links = $links;
    }

    public function render(): string
    {
        return implode('', $this->links);
    }
}
