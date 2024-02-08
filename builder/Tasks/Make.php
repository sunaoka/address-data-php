<?php

declare(strict_types=1);

namespace Sunaoka\AddressData\Builder\Tasks;

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

    public static function getAddress(string $country): Address
    {
        $string = AddressDataClient::json($country);

        return Address::fromJson($string);
    }

    /**
     * @param mixed $data
     *
     * @return int|false
     */
    public static function serialize(string $filename, $data)
    {
        return file_put_contents($filename, sprintf('<?php return %s;', var_export($data, true)));
    }
}
