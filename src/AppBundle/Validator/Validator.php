<?php

namespace AppBundle\Validator;

class Validator
{
    public function teamIsValid($data)
    {
        if (is_object($data) && isset($data->name) && isset($data->strip)) {
            return true;
        }
        return false;
    }
}




