<?php

namespace AppBundle\Service;

use AppBundle\Service\ServiceInterface;

interface LeagueServiceInterface extends ServiceInterface
{

    /**
     * Get Teams with Leauge
     * @param $leagueId
     */
    public function getLeagueTeams($leagueId);

    /**
     * Delete league
     * @param $leagueId
     */
    public function deleteLeague($leagueId);

}