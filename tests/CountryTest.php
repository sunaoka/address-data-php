<?php

declare(strict_types=1);

namespace Sunaoka\AddressData\Tests;

use Sunaoka\AddressData\Country;

class CountryTest extends TestCase
{
    public function test(): void
    {
        $actual = Country::list();

        $this->assertIsArray($actual);
        $this->assertNotEmpty($actual);
    }
}
