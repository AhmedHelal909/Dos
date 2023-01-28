<?php

namespace App\Enum;

class GuardEnum
{

    public const WEB        = 'web';
    public const VENDOR     = 'vendor';
    public const DELIVERY   = 'delivery';

    /**
     * @param string $value
     * @return array
     */
    public static function getList(string $value = ''): array
    {
        return [
            self::VENDOR    => 'vendor',
            self::WEB       => 'web',
            self::DELIVERY  => 'delivery',
        ];
    }


    public static function getKeyList(): array
    {
        return array_keys(self::getList());
    }
    public static function getValueList(): array
    {
        return array_values(self::getList());
    }

    /**
     * @return string
     */
    public static function getWeb(): string
    {
        return self::WEB;
    }

    /**
     * @return string
     */
    public static function getVendor(): string
    {
        return self::VENDOR;
    }
    public static function getDelivery(): string
    {
        return self::DELIVERY;
    }
}
