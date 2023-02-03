<?php

namespace App\Enum;

class StatusEnum
{

    public const STATUS_PENDING   = 1;
    public const STATUS_APPROVED  = 2;
    public const STATUS_CANCELED  = 3;
    public const STATUS_BLOCKED   = 4;

    /**
     * @param string $value
     * @return array
     */
    public static function getList(string $value = ''): array
    {
        $enumerationTranslation = 'site.status_setting_.';
        return [
            self::STATUS_APPROVED => __($enumerationTranslation . self::STATUS_APPROVED),
            self::STATUS_PENDING  => __($enumerationTranslation . self::STATUS_PENDING),
            self::STATUS_CANCELED => __($enumerationTranslation . self::STATUS_CANCELED),
            self::STATUS_BLOCKED  => __($enumerationTranslation . self::STATUS_BLOCKED),
        ];
    }

    public static function getKeyList(): array
    {
        return array_keys(self::getList());
    }
    public static function getValue($key): string
    {
        return self::getList()[$key];
    
    }

    /**
     * @return string
     */
    public static function getAppoved(): string
    {
        return self::STATUS_APPROVED;
    }

    /**
     * @return string
     */
    public static function getPending(): string
    {
        return self::STATUS_PENDING;
    }

    /**
     * @return string
     */
    public static function getCanceled(): string
    {
        return self::STATUS_CANCELED;
    }

    /**
     * @return string
     */
    public static function getBlocked(): string
    {
        return self::STATUS_BLOCKED;
    }
}
