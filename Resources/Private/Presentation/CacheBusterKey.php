<?php

declare(strict_types=1);

namespace Nezaniel\ComponentView\BaseComponents\Presentation;

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Utility\Algorithms;

#[Flow\Proxy(false)]
final class CacheBusterKey
{
    /** @phpstan-ignore-next-line */
    public const PATH = FLOW_PATH_DATA . 'Temporary/CacheBusterKey.txt';

    private static ?string $value = null;

    public static function get(): string
    {
        if (!self::$value) {
            self::$value = file_get_contents(self::PATH) ?: '';
        }

        return self::$value;
    }

    public static function refresh(): void
    {
        $value = Algorithms::generateRandomString(16);
        file_put_contents(self::PATH, $value);
        self::$value = $value;
    }
}
