<?php

declare(strict_types=1);

namespace Sunaoka\AddressData\Tests;

use Sunaoka\AddressData\AddressData;

class ResourcesTest extends TestCase
{
    public function test(): void
    {
        $countries = include dirname(__DIR__) . '/resources/__.php';
        foreach ($countries as $country) {
            $address = new AddressData($country);
            if ($address->getAddress()->zipex !== []) {
                foreach ($address->getAddress()->zipex as $zip) {
                    self::assertTrue($address->validateZip($zip), "{$country}: {$zip}");
                }
            }
        }
    }
}
