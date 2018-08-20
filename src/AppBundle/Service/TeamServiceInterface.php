<?php

namespace AppBundle\Service;

use AppBundle\Service\ServiceInterface;

interface TeamServiceInterface extends ServiceInterface
{

    /**
     * Modify Teams
     * @param $data
     * @param $teamId
     */
    public function modifyTeam($data, $teamId);

    /**
     * Create Team
     * @param $data
     */
    public function createTeam($data);

}