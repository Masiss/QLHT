<?php

namespace App\Enum;

enum WeekDayEnum: int
{
    case Mon = 0;
    case Tue = 1;
    case Wed = 2;
    case Thu = 3;
    case Fri = 4;
    case Sat = 5;

    public function toVNese()
    {
        switch ($this->value) {
            case(0):
                return "Thứ 2";
            case(1):
                return "Thứ 3";
            case(2):
                return "Thứ 4";
            case(3):
                return "Thứ 5";
            case(4):
                return "Thứ 6";
            case(5):
                return "Thứ 7";
        }
        return "";
    }
}
