<?php

namespace App\Helpers;

class PersianHelper
{
    public static function convertToPersianDigits($number): array|string
    {
        // First, convert the number to a string and remove any digits after the decimal point
        $number = strval($number);
        $parts = explode('.', $number);
        $number = $parts[0];  // Keep only the part before the decimal point

        $persian_digits = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $english_digits = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        return str_replace($english_digits, $persian_digits, $number);
    }

    public static function addCommaToPrice($price): string
    {
        $price = floatval($price);
        return number_format($price, 0, '', ',');
    }

    public static function formatPersianPrice($price): string
    {
        $formattedPrice = self::addCommaToPrice($price);
        return self::convertToPersianDigits($formattedPrice);
    }
}
