<?php

declare(strict_types=1);

namespace Sunaoka\AddressData\Builder\Tasks;

use RuntimeException;

class AddressDataClient
{
    private const PUBLIC_ADDRESS_SERVER = 'https://chromium-i18n.appspot.com/ssl-address/data';

    /**
     * @return string[]
     */
    public static function array(string $path = ''): array
    {
        /** @var string[] */
        return json_decode(self::json($path), true);
    }

    public static function json(string $path = ''): string
    {
        $url = self::PUBLIC_ADDRESS_SERVER . ($path !== '' ? "/{$path}" : '');

        return Cache::remember($url, static function () use ($url) {
            return self::get($url);
        });
    }

    private static function get(string $url): string
    {
        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_CUSTOMREQUEST  => 'GET',
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 10,
            CURLOPT_FOLLOWLOCATION => true,
        ]);

        try {
            /** @var string|false $data */
            $data = curl_exec($ch);
            if ($data === false) {
                throw new RuntimeException(curl_error($ch));
            }

            $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($statusCode !== 200) {
                throw new RuntimeException("HTTP status code: {$statusCode}");
            }

            return $data;

        } finally {
            curl_close($ch);
        }
    }
}
