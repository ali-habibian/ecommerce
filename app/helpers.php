<?php

if (!function_exists('to_persian_digits')) {
    function to_persian_digits($number): array|string
    {
        return App\Helpers\PersianHelper::convertToPersianDigits($number);
    }
}

if (!function_exists('add_comma_to_price')) {
    function add_comma_to_price($price): string
    {
        return App\Helpers\PersianHelper::addCommaToPrice($price);
    }
}

if (!function_exists('format_persian_price')) {
    function format_persian_price($price): string
    {
        return App\Helpers\PersianHelper::formatPersianPrice($price);
    }
}
