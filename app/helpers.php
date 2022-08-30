<?php
/**
 * Convert Persian/Arabic numbers to English numbers
 * @link https://stackoverflow.com/a/22252878/3578287
 *
 * @param String $string
 * @return String
 */
function to_english_numbers(String $string): String {
    $persinaDigits1 = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $persinaDigits2 = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠'];
    $allPersianDigits = array_merge($persinaDigits1, $persinaDigits2);
    $replaces = [...range(0, 9), ...range(0, 9)];

    return str_replace($allPersianDigits, $replaces , $string);
}
function to_persian_numbers(String $string): String {
    $persinaDigits1 = [...range(0, 9), ...range(0, 9)];
    $persinaDigits2 = [...range(0, 9), ...range(0, 9)];
    $allPersianDigits = array_merge($persinaDigits1, $persinaDigits2);
    $replaces = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];

    return str_replace($allPersianDigits, $replaces , $string);
}