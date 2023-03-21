<?php

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Support\Str;

function dateformat($dateTime, string $format = 'd/m/Y')
{
    return date($format, strtotime($dateTime));
}

function statusFormat(bool $status) :string
{
    return $status ? 'Enable' : 'Disabled';
}

function getCurrencyFormat(int $amount = 0, string $symbol = '$') :string
{
    return $symbol .number_format($amount, 0);
}

function formatAge($age = 0) :string
{
    return "$age yrs.";
}

function formatWeight($weight = 0) :string
{
    return "$weight kg.";
}

function str_limit(string $text, int $limit, string $end = '...') :string
{
    return Str::limit($text, $limit, $end);
}

function getNameAvatar($text) :string
{

    $textArray = explode(' ', $text);

    $first = substr($textArray[0], 0, 1);

    if (count($textArray) <= 1) {
        return ucwords($first);
    }

    $second = substr($textArray[1], 0, 1);
    return ucwords($first.$second);

}

function dateTimeFormatHuman($dateTime) :string
{
    $dt = Carbon::parse($dateTime);
    return $dt->diffForHumans();
}

function getCoupons():\Illuminate\Database\Eloquent\Collection
{
    return Coupon::whereStatus(true)->with('shop')->get();
}
