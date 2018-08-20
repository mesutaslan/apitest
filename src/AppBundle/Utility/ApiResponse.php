<?php

namespace AppBundle\Utility;

use AppBundle\Utility\Dummy;
use AppBundle\Utility\Error;

class ApiResponse
{

    /**
     * @var bool
     */
    public $success;
    /**
     * @var mixed
     */
    public $data;
    /**
     * @var mixed
     */
    public $error;

    /**
     * @param mixed $_data
     * @param mixed $_error
     */
    function __construct($_data = null, $_error = null)
    {
        $this->success = is_null($_error) ? true : false;

        $this->data = new Dummy();
        if (is_array($_data)) {
            $this->data = $_data;
        } else if (is_object($_data)) {
            $this->data = $_data;
        } else if (is_bool($_data)) {
            $this->data = array('result' => $_data);
        } else if (strlen($_data) > 0) {
            $this->data = array('result' => $_data);
        } else if (is_null($_data)) {
            $this->data = new Dummy();
        }

        $this->error = new Dummy();
        if (!is_null($_error) && $_error instanceof Error) {
            $this->error = $_error;
            $this->data = new Dummy();
        }
    }

}


