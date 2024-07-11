<?php

declare(strict_types=1);

namespace Sunaoka\AddressData;

/**
 * @phpstan-type TAddress array{
 *     id: string,
 *     key: string,
 *     name: string,
 *     lang: ?string,
 *     languages: string[],
 *     fmt: ?string,
 *     lfmt: ?string,
 *     require: string[],
 *     upper: string[],
 *     zip: ?string,
 *     zipex: string[],
 *     posturl: ?string,
 *     postprefix: ?string,
 *     zip_name_type: ?string,
 *     state_name_type: ?string,
 *     locality_name_type: ?string,
 *     sublocality_name_type: ?string,
 *     sub_keys: string[],
 *     sub_names: string[],
 *     sub_lnames: string[],
 *     sub_zips: string[],
 *     sub_zipexs: string[],
 *     sub_isoids: string[],
 *     sub_mores: string[],
 *     sub_xzips: string[],
 *     sub_xrequires: string[]
 * }
 */
class Address
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $key;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string|null
     */
    public $lang;

    /**
     * @var string[]
     */
    public $languages = [];

    /**
     * @var string|null
     */
    public $fmt;

    /**
     * @var string|null
     */
    public $lfmt;

    /**
     * @var string[]
     */
    public $require = [];

    /**
     * @var string[]
     */
    public $upper = [];

    /**
     * The zip field indicates a Java compatible regular expression corresponding to all postal codes in the country.
     *
     * @var string|null
     */
    public $zip;

    /**
     * @var string[]
     */
    public $zipex = [];

    /**
     * @var string|null
     */
    public $posturl;

    /**
     * @var string|null
     */
    public $postprefix;

    /**
     * @var string|null
     */
    public $zip_name_type;

    /**
     * @var string|null
     */
    public $state_name_type;

    /**
     * @var string|null
     */
    public $locality_name_type;

    /**
     * @var string|null
     */
    public $sublocality_name_type;

    /**
     * A list of sub-region keys that can be appended to the key to obtain the sub-region data.
     *
     * @var string[]
     */
    public $sub_keys = [];

    /**
     * @var string[]
     */
    public $sub_names = [];

    /**
     * @var string[]
     */
    public $sub_lnames = [];

    /**
     * @var string[]
     */
    public $sub_zips = [];

    /**
     * @var string[]
     */
    public $sub_zipexs = [];

    /**
     * @var string[]
     */
    public $sub_isoids = [];

    /**
     * @var string[]
     */
    public $sub_mores = [];

    /**
     * @var string[]
     */
    public $sub_xzips = [];

    /**
     * @var string[]
     */
    public $sub_xrequires = [];

    /**
     * @var string[]
     */
    private static $tilde = [
        'languages',
        'sub_keys',
        'sub_names',
        'sub_lnames',
        'sub_zips',
        'sub_zipexs',
        'sub_isoids',
        'sub_mores',
        'sub_xzips',
        'sub_xrequires',
    ];

    /**
     * @var string[]
     */
    private static $comma = [
        'zipex',
    ];

    /**
     * @var string[]
     */
    private static $string = [
        'require',
        'upper',
    ];

    /**
     * @param TAddress $attributes
     */
    public function __construct(array $attributes)
    {
        foreach ($attributes as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    public static function fromJson(string $string, string $default): self
    {
        /** @var string $string */
        $string = json_encode(
            array_merge(
                array_filter((array)json_decode($default, true)),
                array_filter((array)json_decode($string, true))
            )
        );

        /** @var array<string, ?string> $attributes */
        $attributes = json_decode($string, true);

        foreach ($attributes as $key => $value) {
            if (in_array($key, self::$tilde, true)) {
                $attributes[$key] = explode('~', (string)$value);
            } elseif (in_array($key, self::$comma, true)) {
                $attributes[$key] = explode(',', (string)$value);
            } elseif (in_array($key, self::$string, true)) {
                $attributes[$key] = str_split((string)$value);
            }
        }

        /** @var TAddress $attributes */
        return new self($attributes);
    }

    /**
     * @param TAddress $attributes
     *
     * @return Address
     */
    public static function __set_state(array $attributes)
    {
        return new self($attributes);
    }
}
