<?php

namespace AppBundle\Entity\Team;

use AppBundle\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * AppBundle\Entity\Team
 *
 * @ORM\Table(name="cp_team")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TeamRepository")
 *
 * @Serializer\ExclusionPolicy("all")
 */
class Team extends AbstractEntity
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
     * @var \AppBundle\Entity\League\League
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\League\League", inversedBy="teams", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="leaque", referencedColumnName="id")
     *
     * @Serializer\SerializedName("league")
     * @Serializer\Type("AppBundle\Entity\League\League")
     * @Serializer\Expose
     */
    protected $leaque;
}
