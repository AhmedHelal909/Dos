<?php

namespace App\Enum;

class SettingEnum
{

    public const EMAIL_URL            = 1;
    public const FACEBOOK_URL         = 2;
    public const TWITTER_URL          = 3;
    public const ABOUT_US             = 4;
    public const ABOUT_US_AR          = 5;

    // our mission
    public const OUR_MISSION          = 6;
    public const OUR_MISSION_AR       = 7;

    // our vision
    public const OUR_VISION           = 8;
    public const OUR_VISION_AR        = 9;

    // our goals
    public const OUR_GOALS            = 10;
    public const OUR_GOALS_AR         = 11;

    // telephone
    public const TELEPHONE            = 12;

    // address
    public const ADDRESS              = 13;

    public const ADDRESS_AR              = 14;

    // google map
    public const GOOGLE              = 15;
    public const WEBSITE              = 16;

    public const PLAY_STORE              = 17;
    public const APP_STORE              = 18;

    public const STORES              = 19;

    public const MEMBER_ONLINE              = 20;

    public const ACTIVE_GROUP              = 21;

    public const NEW_EVENT              = 22;

    public const YOUTUBE_LINK              = 23;

    public const SLIDER_TIME              = 15;



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
            self::ABOUT_US             => 'lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum eius, nesciunt animi qui quaerat aliquam corrupti beatae Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum eius, nesciunt animi qui quaerat aliquam corrupti beatae, veniam excepturi maxime quas rerum asperiores dolore aliquid atque? Aperiam neque ex fugiat?',
            self::ABOUT_US_AR          => 'لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ..',
            self::OUR_MISSION          => 'lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum eius, nesciunt animi qui quaerat aliquam corrupti beatae Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum eius, nesciunt animi qui quaerat aliquam corrupti beatae, veniam excepturi maxime quas rerum asperiores dolore aliquid atque? Aperiam neque ex fugiat?',
            self::OUR_MISSION_AR       => 'لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ..',
            self::OUR_VISION           => 'lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum eius, nesciunt animi qui quaerat aliquam corrupti beatae Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum eius, nesciunt animi qui quaerat aliquam corrupti beatae, veniam excepturi maxime quas rerum asperiores dolore aliquid atque? Aperiam neque ex fugiat?',
            self::OUR_VISION_AR        => 'لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ..',
            self::OUR_GOALS            => 'lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum eius, nesciunt animi qui quaerat aliquam corrupti beatae Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum eius, nesciunt animi qui quaerat aliquam corrupti beatae, veniam excepturi maxime quas rerum asperiores dolore aliquid atque? Aperiam neque ex fugiat?',
            self::OUR_GOALS_AR         => 'لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ..',
            self::TELEPHONE            => '01000000000',
            self::ADDRESS              => 'cairo, egypt',
            self::ADDRESS_AR           => 'القاهرة, مصر',
            self::GOOGLE               => 'google link',
            self::WEBSITE              => 'website link',
            self::PLAY_STORE           => 'playstore link',
            self::APP_STORE            => 'appstore link',
            self::STORES               => '5552',
            self::MEMBER_ONLINE         => '122',
            self::ACTIVE_GROUP          => '12',
            self::NEW_EVENT             => '87',
            self::YOUTUBE_LINK          => 'youtube video link',
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
    public static function getOurMission(): string
    {
        return self::OUR_MISSION;
    }

    public static function getOurMissionAr(): string
    {
        return self::OUR_MISSION_AR;
    }

    public static function getOurVision(): string
    {
        return self::OUR_VISION;
    }

    public static function getOurVisionAr(): string
    {
        return self::OUR_VISION_AR;
    }

    public static function getOurGoals(): string
    {
        return self::OUR_GOALS;
    }

    public static function getOurGoalsAr(): string
    {
        return self::OUR_GOALS_AR;
    }

    public static function getTelephone(): string
    {
        return self::TELEPHONE;
    }

    public static function getAddress(): string
    {
        return self::ADDRESS;
    }

    public static function getAddressAr(): string
    {
        return self::ADDRESS_AR;
    }

    public static function getGoogle(): string
    {
        return self::GOOGLE;
    }

    public static function getWebsite(): string
    {
        return self::WEBSITE;
    }

    public static function getPlayStore(): string
    {
        return self::PLAY_STORE;
    }

    public static function getAppStore(): string
    {
        return self::APP_STORE;
    }

    public static function getStores(): string
    {
        return self::STORES;
    }

    public static function getMemberOnline(): string
    {
        return self::MEMBER_ONLINE;
    }

    public static function getActiveGroup(): string
    {
        return self::ACTIVE_GROUP;
    }

    public static function getNewEvent(): string
    {
        return self::NEW_EVENT;
    }

    public static function getYoutubeLink(): string
    {
        return self::YOUTUBE_LINK;
    }

    public static function getAboutUs(): string
    {
        return self::ABOUT_US;
    }

    public static function getAboutUsAr(): string
    {
        return self::ABOUT_US_AR;
    }



}
