<?php

declare(strict_types=1);

namespace Sunaoka\AddressData\Builder\Tasks;

use Closure;

class Cache
{
    private static function dir(): string
    {
        return dirname(__DIR__, 2) . '/caches';
    }

    public static function has(string $key): bool
    {
        clearstatcache();
        return file_exists(self::dir() . '/' . md5($key));
    }

    public static function get(string $key, string $default = null): ?string
    {
        if (static::has($key)) {
            return (string)file_get_contents(self::dir() . '/' . md5($key));
        }

        return $default;
    }

    public static function store(string $key, string $value): bool
    {
        return file_put_contents(self::dir() . '/' . md5($key), $value) !== false;
    }

    /**
     * @param Closure(): string $callback
     */
    public static function remember(string $key, Closure $callback): string
    {
        $value = static::get($key);
        if ($value !== null) {
            return $value;
        }

        $value = $callback();

        static::store($key, $value);

        return $value;
    }
}
