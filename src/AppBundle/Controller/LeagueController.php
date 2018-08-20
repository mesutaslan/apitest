<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Service\LeagueServiceInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/**
* @Route("/api")
*/
class LeagueController extends Controller
{
     /**
      * Get a list of football teams in a single league
      * @Route("/leagues/{id}/teams", methods={"GET"})
      * @param $id
      */
    public function listTeamsAction($id)
    {
        /** @var $leagueService \AppBundle\Service\LeagueServiceInterface */
        $leagueService = $this->get('AppBundle\Service\LeagueService');

        $result = $leagueService->getLeagueTeams($id);
        return new Response($result[0], $result[1]);
    }

    /**
     * Delete a football league
     * @Route("/leagues/{id}", methods={"DELETE"})
     * @param $id
     */
    public function deleteLeagueAction($id)
    {
        /** @var $leagueService \AppBundle\Service\LeagueServiceInterface */
        $leagueService = $this->get('AppBundle\Service\LeagueService');

        $result = $leagueService->deleteLeague($id);
        return new Response($result[0], $result[1]);
    }
}