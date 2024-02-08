#!/usr/bin/env php
<?php

declare(strict_types=1);

namespace Sunaoka\AddressData\Builder;

use Sunaoka\AddressData\Builder\Tasks\Make;

$root = dirname(__DIR__);

require "{$root}/vendor/autoload.php";

$countries = Make::getCountries();
Make::serialize("{$root}/resources/__.php", $countries);

foreach ($countries as $country) {
    echo "Fetching {$country}...\n";

    $data = Make::getAddress($country);

    Make::serialize("{$root}/resources/{$country}.php", $data);
}
