<?php

declare(strict_types=1);

namespace Sunaoka\AddressData\Builder\Tasks;

use Brick\VarExporter\VarExporter;
use Sunaoka\AddressData\Address;

class Make
{
    /**
     * @return string[]
     */
    public static function getCountries(): array
    {
        /** @var array{id: 'data', countries: ?string} $json */
        $json = AddressDataClient::array();

        return explode('~', $json['countries'] ?? '');
    }

    public static function getJson(string $country): string
    {
        return AddressDataClient::json($country);
    }

    public static function getAddress(string $country, string $default): Address
    {
        $string = self::getJson($country);

        return Address::fromJson($string, $default);
    }

    /**
     * @param mixed $data
     *
     * @return int|false
     */
    public static function serialize(string $filename, $data)
    {
        return file_put_contents($filename, sprintf('<?php %s', VarExporter::export($data, VarExporter::INLINE_SCALAR_LIST | VarExporter::ADD_RETURN)));
    }
}
