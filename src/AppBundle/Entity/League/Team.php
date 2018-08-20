<?php

namespace AppBundle\Entity\League;

use AppBundle\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * AppBundle\Entity\League
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
     * @ORM\JoinColumn(name="league", referencedColumnName="id")
     *
     * @Serializer\SerializedName("league")
     * @Serializer\Type("AppBundle\Entity\League\League")
     * @Serializer\Expose
     */
    protected $league;

    /**
     * @var string
     *
     * @ORM\Column(name="strip", type="string", length=255, nullable=true)
     *
     * @Serializer\SerializedName("strip")
     * @Serializer\Type("string")
     * @Serializer\Expose
     */
    protected $strip;

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
     * @return League
     */
    public function getLeague()
    {
        return $this->league;
    }

    /**
     * @param League $league
     */
    public function setLeague($league)
    {
        $this->league = $league;
    }

    /**
     * @return string
     */
    public function getStrip()
    {
        return $this->strip;
    }

    /**
     * @param string $strip
     */
    public function setStrip($strip)
    {
        $this->strip = $strip;
    }


}
