<?php

namespace AppBundle\Service;

use AppBundle\Entity\League\League;
use AppBundle\Entity\League\Team;
use AppBundle\Validator\Validator;

class TeamService extends AbstractService implements TeamServiceInterface
{
    public function modifyTeam($data, $teamId)
    {
        /** @var $teamEntity \AppBundle\Entity\League\Team */
        $teamEntity = $this->getEntityManager()->getRepository('AppBundle\Entity\League\Team')->find($teamId);
        if ($teamEntity instanceof Team) {
            $dataObj    = json_decode($data);
            if ((new Validator())->teamIsValid($dataObj) === true) {
                $teamEntity->setName($dataObj->name);
                $teamEntity->setStrip($dataObj->strip);
                $dateTime = new \DateTime();
                $teamEntity->setUpdatedAt($dateTime);
                if (isset($dataObj->league)) {
                    /** @var $leagueEntity \AppBundle\Entity\League\League */
                    $leagueEntity = $this->getEntityManager()->getRepository('AppBundle\Entity\League\League')->find($dataObj->league);
                    if (!($leagueEntity instanceof League)) {
                        return $this->serviceResponse('League not found!', 404);
                    }
                    $teamEntity->setLeague($leagueEntity);
                }
                try {
                    $this->getEntityManager()->flush();
                } catch (\Exception $e) {
                    return $this->serviceResponse($e->getMessage(), 409);
                }

                return $this->serviceResponse('teamEntity updated', 200);
            }

            return $this->serviceResponse('Validation error!', 409);
        }

        return $this->serviceResponse('Team not found!', 404);
    }

    public function createTeam($data)
    {
            $dataObj    = json_decode($data);
            if ((new Validator())->teamIsValid($dataObj) === true && $dataObj->league>0) {
                $teamEntity = new Team();
                $teamEntity->setName($dataObj->name);
                $teamEntity->setStrip($dataObj->strip);
                $dateTime = new \DateTime();
                $teamEntity->setCreatedAt($dateTime);
                $teamEntity->setUpdatedAt($dateTime);

                /** @var $leagueEntity \AppBundle\Entity\League\League */
                $leagueEntity = $this->getEntityManager()->getRepository('AppBundle\Entity\League\League')->find($dataObj->league);
                if (!($leagueEntity instanceof League)) {
                    return $this->serviceResponse('League not found!', 404);
                }
                $teamEntity->setLeague($leagueEntity);

                try {
                    $this->getEntityManager()->persist($teamEntity);
                    $this->getEntityManager()->flush();
                } catch (\Exception $e) {
                    return $this->serviceResponse($e->getMessage(), 409);
                }

                return $this->serviceResponse('teamEntity inserted', 201);
            }

            return $this->serviceResponse('Validation error!', 409);
    }
}
