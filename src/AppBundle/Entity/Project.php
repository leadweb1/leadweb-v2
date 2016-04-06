<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use JMS\Serializer\Annotation\Groups;

use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProjectRepository")
 */
class Project
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * 
     * @Groups({"project", "projects"})
     */
    private $id;

    /**
     * @var int
     *
     * @Gedmo\SortablePosition
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     * 
     * @Groups({"project", "projects"})
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     * 
     * @Groups({"project", "projects"})
     */
    private $description;

    /**
      * @var ProjectImage
      *
      * @ORM\OneToMany(targetEntity="ProjectImage", mappedBy="project", cascade={"all"})
     * 
     * @Groups({"project", "projects"})
      */
    private $images;
    
    /**
     * @var ProductType
     * 
     * @ORM\ManyToOne(targetEntity="ProjectType", inversedBy="projects")
     * 
     * @Groups({"project", "projects"})
     */
    private $type;
    
    /**
     * @var Client
     * 
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="projects")
     * 
     * @Groups({"project", "projects"})
     */
    private $client;
    

    /**
     * Project class constructor
     */
    public function __construct()
    {
        $this->images = new ArrayCollection();
    }
    
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
     * Set position
     *
     * @param integer $position
     *
     * @return ProjectImage
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Project
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
     * @return Project
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
     * Set type
     *
     * @param string $type
     *
     * @return Project
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return ProjectType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set client
     *
     * @param string $client
     *
     * @return Project
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return string
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Get images
     *
     * @return ArrayCollection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set images
     *
     * @param ArrayCollection $images
     *
     * @return Project
     */
    public function setImages($images)
    {
        $this->images = $images;

        return $this;
    }

    public function addImage(ProjectImage $image)
    {
        $image->setProject($this);
        $this->images[] = $image;

        return $this;
    }

    public function removeImage(ProjectImage $image)
    {
        $this->images->remove($image);

        return $this;
    }
}

