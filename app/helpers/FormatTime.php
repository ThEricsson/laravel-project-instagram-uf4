<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class FormatTime {

    public static function LongTimeFilter($date){
        $sortida = "";
        if ($date->diffInDays() < 1){
            if ($date->diffInHours() < 1){
                if ($date->diffInMinutes() < 1){
                    $sortida = $date->diffInSeconds()." segons";
                } else {
                    $sortida = $date->diffInMinutes()." minuts";
                }
            } else {
                $sortida = $date->diffInHours()." hores";
            }
        } else {
            $sortida = $date->diffInDays()." dies";
        }

        return $sortida;
    }
}