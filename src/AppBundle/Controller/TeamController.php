<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/api")
 */
class TeamController extends Controller
{
    /**
     * Modify all attributes of a football team
     * @Route("/team/{id}", methods={"PUT"})
     * @param Request
     * @param $id
     */
    public function ModifyTeamAction(Request $request, $id)
    {
        /** @var $teamService \AppBundle\Service\TeamServiceInterface */
        $teamService = $this->get('AppBundle\Service\TeamService');

        $result = $teamService->modifyTeam($request->getContent(), $id);
        return new Response($result[0], $result[1]);
    }

    /**
     * Create a football team
     * @Route("/team", methods={"POST"})
     */
    public function createTeamAction(Request $request)
    {
        /** @var $teamService \AppBundle\Service\TeamServiceInterface */
        $teamService = $this->get('AppBundle\Service\TeamService');

        $result = $teamService->createTeam($request->getContent());

        return new Response($result[0], $result[1]);
    }
}
