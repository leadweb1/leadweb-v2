<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use JMS\Serializer\Annotation\Groups;

use Gedmo\Mapping\Annotation as Gedmo;

use AppBundle\Entity\TranslatableEntity;

/**
 * Metadata
 *
 * @ORM\Table(name="metadata")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MetadataRepository")
 */
class Metadata extends TranslatableEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * 
     * @Groups({"leadweb"})
     */
    private $id;

    /**
     * @var string
     *
     * @Gedmo\Translatable
     * @ORM\Column(name="title", type="string", length=255)
     * 
     * @Groups({"leadweb"})
     */
    private $title;

    /**
     * @var string
     *
     * @Gedmo\Translatable
     * @ORM\Column(name="description", type="text")
     * 
     * @Groups({"leadweb"})
     */
    private $description;

    /**
     * @var Application\Sonata\MediaBundle\Entity\Media
     * 
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"all"})
     * 
     * @Groups({"leadweb"})
     */
    private $image;

    /**
     * @var string
     *
     * @Gedmo\Translatable
     * @ORM\Column(name="siteName", type="string", length=255)
     * 
     * @Groups({"leadweb"})
     */
    private $siteName;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     * 
     * @Groups({"leadweb"})
     */
    private $type;


    public function __toString() {
        return $this->title;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Metadata
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Metadata
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Metadata
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set siteName
     *
     * @param string $siteName
     *
     * @return Metadata
     */
    public function setSiteName($siteName)
    {
        $this->siteName = $siteName;

        return $this;
    }

    /**
     * Get siteName
     *
     * @return string
     */
    public function getSiteName()
    {
        return $this->siteName;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Metadata
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
