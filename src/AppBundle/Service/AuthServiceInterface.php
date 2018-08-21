<?php

namespace AppBundle\Service;

use AppBundle\Service\ServiceInterface;

interface AuthServiceInterface extends ServiceInterface
{

    /**
     * Register service
     * @param $params
     * @param $encoder
     */
    public function register($params, $encoder);

    /**
     * Create token service
     * @param $params
     * @param $tokenManager
     */
    public function createToken($params, $tokenManager);
}