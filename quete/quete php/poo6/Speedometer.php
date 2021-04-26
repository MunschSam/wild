<?php

class Speedometer
{
    public const KM_CONVERSION = 1.6;
    public const MILES_CONVERSION = 0.6;


    public static function converterKm($n)
    {
        return $n * self::KM_CONVERSION;
    }

    public static function converterMiles($n)
    {
        return $n * self::MILES_CONVERSION;
    }

}

?>