<?php

declare(strict_types=1);

namespace Nezaniel\ComponentView\BaseComponents\Command;

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Cli\CommandController;
use Nezaniel\ComponentView\BaseComponents\Presentation\CacheBusterKey;

#[Flow\Scope('singleton')]
final class CacheBusterKeyCommandController extends CommandController
{
    public function refreshCommand(): void
    {
        CacheBusterKey::refresh();
    }
}
