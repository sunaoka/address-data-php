<?php

namespace Sunaoka\AddressData;

class Country
{
    /**
     * @return string[]
     */
    public static function list(): array
    {
        return require sprintf('%s/resources/__.php', dirname(__DIR__));
    }
}
