<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * AppBundle\Entity\AbstractEntity
 *
 * @ORM\MappedSuperclass
 *
 * @Serializer\ExclusionPolicy("all")
 */
abstract class AbstractEntity
{

    /**
     * @var int $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @Assert\NotNull()
     * @Assert\NotBlank()
     *
     * @Serializer\SerializedName("id")
     * @Serializer\Type("integer")
     * @Serializer\Expose
     */
    protected $id;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     *
     * @Serializer\SerializedName("createdAt")
     * @Serializer\Type("DateTime<'Y-m-d H:i:s'>")
     * @Serializer\Expose
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     *
     * @Serializer\SerializedName("updatedAt")
     * @Serializer\Type("DateTime<'Y-m-d H:i:s'>")
     * @Serializer\Expose
     */
    protected $updatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     *
     * @Serializer\SerializedName("deletedAt")
     * @Serializer\Type("DateTime<'Y-m-d H:i:s'>")
     * @Serializer\Expose
     */
    protected $deletedAt;

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

}
