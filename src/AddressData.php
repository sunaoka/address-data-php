<?php

declare(strict_types=1);

namespace Sunaoka\AddressData;

class AddressData
{
    /**
     * @var string
     */
    private $country;

    /**
     * @var Address
     */
    private $address;

    public function __construct(string $country)
    {
        $this->country = $country;

        $this->address = require sprintf('%s/resources/%s.php', dirname(__DIR__), $country);
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function validateZip(string $zip): bool
    {
        $re = $this->address->zip;
        if ($re === null) {
            return true;
        }

        if (in_array('Z', $this->address->upper, true)) {
            $zip = strtoupper($zip);
        }

        return preg_match("/\A{$re}\z/", $zip) === 1;
    }
}
