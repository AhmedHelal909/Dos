<?php

namespace App\Enum;

class ImageEnum
{

    public const LOGO_AR            = 1;
    public const LOGO_EN            = 2;

    public const HOW_IT_WORKS_FIRST_AR            = 3;
    public const HOW_IT_WORKS_FIRST_EN            = 4;

    public const HOW_IT_WORKS_SECOND_AR            = 5;
    public const HOW_IT_WORKS_SECOND_EN            = 6;

    public const HOW_IT_WORKS_THIRD_AR            = 7;
    public const HOW_IT_WORKS_THIRD_EN            = 8;

    public const HOW_IT_WORKS_FOURTH_AR            = 9;
    public const HOW_IT_WORKS_FOURTH_EN            = 10;

    public const ABOUT_US_FIRST_AR            = 11;
    public const ABOUT_US_FIRST_EN            = 12;

    public const ABOUT_US_SECOND_AR            = 13;
    public const ABOUT_US_SECOND_EN            = 14;

    public const WHY_CHOOSE_US_AR            = 15;
    public const WHY_CHOOSE_US_EN            = 16;


    /**
     * @param string $value
     * @return array
     */
    public static function getList(string $value = ''): array
    {
        $enumerationTranslation = 'site.images_.';
        return [
            self::LOGO_AR         => 'logo-black.png',
            self::LOGO_EN         => 'logo-black.png',
            self::HOW_IT_WORKS_FIRST_AR         => '01.jpg',
            self::HOW_IT_WORKS_FIRST_EN         => '01.jpg',
            self::HOW_IT_WORKS_SECOND_AR         => '02.jpg',
            self::HOW_IT_WORKS_SECOND_EN         => '02.jpg',
            self::HOW_IT_WORKS_THIRD_AR         => '03.jpg',
            self::HOW_IT_WORKS_THIRD_EN         => '03.jpg',
            self::HOW_IT_WORKS_FOURTH_AR         => '04.jpg',
            self::HOW_IT_WORKS_FOURTH_EN         => '04.jpg',
            self::ABOUT_US_FIRST_AR         => 'about-us-1.jpg',
            self::ABOUT_US_FIRST_EN         => 'about-us-1.jpg',
            self::ABOUT_US_SECOND_AR         => 'about-us-1.jpg',
            self::ABOUT_US_SECOND_EN         => 'about-us-1.jpg',
            self::WHY_CHOOSE_US_AR         => 'why-choose-us.jpg',
            self::WHY_CHOOSE_US_EN         => 'why-choose-us.jpg',
        ];
    }


    public static function getKeyList(): array
    {
        return array_keys(self::getList());
    }

    public static function getLogoAr(): string
    {
        return self::LOGO_AR;
    }

    public static function getLogoEn(): string
    {
        return self::LOGO_EN;
    }

    public static function getHowItWorksFirstAr(): string
    {
        return self::HOW_IT_WORKS_FIRST_AR;
    }

    public static function getHowItWorksFirstEn(): string
    {
        return self::HOW_IT_WORKS_FIRST_EN;
    }

    public static function getHowItWorksSecondAr(): string
    {
        return self::HOW_IT_WORKS_SECOND_AR;
    }

    public static function getHowItWorksSecondEn(): string
    {
        return self::HOW_IT_WORKS_SECOND_EN;
    }

    public static function getHowItWorksThirdAr(): string
    {
        return self::HOW_IT_WORKS_THIRD_AR;
    }

    public static function getHowItWorksThirdEn(): string
    {
        return self::HOW_IT_WORKS_THIRD_EN;
    }

    public static function getHowItWorksFourthAr(): string
    {
        return self::HOW_IT_WORKS_FOURTH_AR;
    }

    public static function getHowItWorksFourthEn(): string
    {
        return self::HOW_IT_WORKS_FOURTH_EN;
    }

    public static function getAboutUsFirstAr(): string
    {
        return self::ABOUT_US_FIRST_AR;
    }



    public static function getAboutUsFirstEn(): string
    {
        return self::ABOUT_US_FIRST_EN;
    }

    public static function getAboutUsSecondAr(): string
    {
        return self::ABOUT_US_SECOND_AR;
    }

    public static function getAboutUsSecondEn(): string
    {
        return self::ABOUT_US_SECOND_EN;
    }

    public static function getWhyChooseUsAr(): string
    {
        return self::WHY_CHOOSE_US_AR;
    }

    public static function getWhyChooseUsEn(): string
    {
        return self::WHY_CHOOSE_US_EN;
    }


}
