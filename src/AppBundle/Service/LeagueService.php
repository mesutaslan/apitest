<?php

namespace AppBundle\Service;

use AppBundle\Entity\League\League;
use AppBundle\Service\AbstractService;

class LeagueService extends AbstractService implements LeagueServiceInterface
{

    /**
     * @param $leagueId
     * @return mixed
     */
    public function getLeagueTeams($leagueId)
    {
        /** @var $leagueEntity \AppBundle\Entity\League\League */
        $leagueEntity = $this->getEntityManager()->getRepository('AppBundle\Entity\League\League')->find($leagueId);

        if ($leagueEntity instanceof League) {
            return $this->serviceResponse($this->serialize($leagueEntity), 200);
        }
        return $this->serviceResponse('League not found!', 404);
    }


    /**
     * @param $leagueId
     * @return \Exception|string
     */
    public function deleteLeague($leagueId)
    {
        /** @var $leagueEntity \AppBundle\Entity\League\League */
        $leagueEntity = $this->getEntityManager()->getRepository('AppBundle\Entity\League\League')->find($leagueId);

        if ($leagueEntity instanceof League) {

            if ($this->serialize($leagueEntity->getTeams()) == '[]') {
                try {
                    $this->getEntityManager()->remove($leagueEntity);
                    $this->getEntityManager()->flush();
                } catch (\Exception $e) {
                    return $this->serviceResponse($e->getMessage(), 409);
                }
                return $this->serviceResponse($leagueEntity->getName().' is deleted', 201);
            } else {
                return $this->serviceResponse($leagueEntity->getName().' have related teams', 409);
            }
        }
        return $this->serviceResponse('League not found!', 404);
    }
}
