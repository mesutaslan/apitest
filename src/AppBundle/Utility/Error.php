<?php

namespace AppBundle\Utility;

class Error
{

    /**
     * @var int $code
     */
    public $code;

    /**
     * @var string $group
     */
    public $group;

    /**
     * @var string $message
     */
    public $message;

    function __construct($_code = Constants::EXCEPTION_CODE_APPLICATION_INTERNAL, $_message = null)
    {
        if (!isset(Constants::$apiErrors[$_code])) {
            $_code = Constants::EXCEPTION_CODE_APPLICATION_INTERNAL;
        }
        $this->code = Constants::$apiErrors[$_code]['code'];
        $this->group = Constants::$apiErrors[$_code]['group'];
        $this->message = is_null($_message) ? Constants::$apiErrors[$_code]['message'] : $_message;
    }

}

