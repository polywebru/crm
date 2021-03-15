<?php

namespace App\Traits;

trait HasPhone
{
    public function preparePhone($phone)
    {
        $phone = str_replace(' ', '', $phone);
        $phone = str_replace('.', '', $phone);
        $phone = str_replace('(', '', $phone);
        $phone = str_replace(')', '', $phone);
        $phone = str_replace('-', '', $phone);
        $phone = str_replace('+7', '8', $phone);

        return $phone;
    }
}
