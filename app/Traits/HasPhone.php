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
        $phone = str_replace('+7', '7', $phone);

        return $phone;
    }
}
