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
     * @var ArrayCollection<\AppBundle\Entity\Team\Team>
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Team\Team", mappedBy="league", fetch="EXTRA_LAZY")
     *
     * @Serializer\SerializedName("teams")
     * @Serializer\Type("ArrayCollection<AppBundle\Entity\Team\Team>")
     * @Serializer\Expose
     */
    protected $teams;
}
