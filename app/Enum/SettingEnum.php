<?php

namespace App\Enum;

class SettingEnum
{

    public const EMAIL_URL            = 1;
    public const FACEBOOK_URL         = 2;
    public const TWITTER_URL          = 3;
    public const SLIDER_TIME          = 4;
    public const TRANSDATE            = 5;

    /**
     * @param string $value
     * @return array
     */
    public static function getList(string $value = ''): array
    {
        $enumerationTranslation = 'site.setting_.';
        return [
            self::EMAIL_URL            => 'email@gmail.com',
            self::FACEBOOK_URL         => 'facebook.com',
            self::TWITTER_URL          => 'twitter.com',
            self::SLIDER_TIME          => 15,
            self::TRANSDATE            => 15,

        ];
    }


    public static function getKeyList(): array
    {
        return array_keys(self::getList());
    }

    /**
     * @return string
     */
    public static function getEmail(): string
    {
        return self::EMAIL_URL;
    }


    /**
     * @return string
     */
    public static function getFacebook(): string
    {
        return self::FACEBOOK_URL;
    }
    public static function getTwitter(): string
    {
        return self::TWITTER_URL;
    }
    public static function getSliderTime(): string
    {
        return self::SLIDER_TIME;
    }
    public static function getTransDate(): string
    {
        return self::TRANSDATE;
    }
}
