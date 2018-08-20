<?php

namespace AppBundle\Entity\League;

use AppBundle\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * AppBundle\Entity\League
 *
 * @ORM\Table(name="cp_league")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LeagueRepository")
 *
 * @Serializer\ExclusionPolicy("all")
 */
class League extends AbstractEntity
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     *
     * @Serializer\SerializedName("name")
     * @Serializer\Type("string")
     * @Serializer\Expose
     */
    protected $name;

    /**
     * @var ArrayCollection<\AppBundle\Entity\League\Team>
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\League\Team", mappedBy="league", fetch="EXTRA_LAZY")
     *
     * @Serializer\SerializedName("teams")
     * @Serializer\Type("ArrayCollection<AppBundle\Entity\League\Team>")
     * @Serializer\Expose
     */
    protected $teams;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return ArrayCollection
     */
    public function getTeams()
    {
        return $this->teams;
    }

    /**
     * @param ArrayCollection $teams
     */
    public function setTeams($teams)
    {
        $this->teams = $teams;
    }
}
