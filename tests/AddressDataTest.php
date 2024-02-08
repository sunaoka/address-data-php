<?php

declare(strict_types=1);

namespace Sunaoka\AddressData\Tests;

use Sunaoka\AddressData\AddressData;

class AddressDataTest extends TestCase
{
    public function test(): void
    {
        $address = new AddressData('JP');

        self::assertSame('JP', $address->getCountry());

        self::assertSame('JAPAN', $address->getAddress()->name);

        self::assertTrue($address->validateZip('1000001'));

        $address = new AddressData('HK');

        self::assertSame('HK', $address->getCountry());

        self::assertSame('HONG KONG', $address->getAddress()->name);

        self::assertTrue($address->validateZip(''));
    }
}
