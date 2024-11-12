<?php

namespace App;

class TermConstants
{
    const YEAR = 1;
    const MONTH = 2;
    const WEEK = 3;
    const DAY = 4;
    const HOUR = 5;

    static function getConstants()
    {
        return [
            ['id' => Self::YEAR, 'name' => 'سنة'],
            ['id' => Self::MONTH, 'name' => 'شهر'],
            ['id' => Self::WEEK, 'name' => 'اسبوع'],
            ['id' => Self::DAY, 'name' => 'يوم'],
            ['id' => Self::HOUR, 'name' => 'ساعة'],
        ];
    }
}
