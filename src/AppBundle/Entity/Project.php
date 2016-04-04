<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

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
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
      * @var Media
      *
      * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media")
      * @ORM\JoinColumns({
      *     @ORM\JoinColumn(name="defaultImage", referencedColumnName="id")
      * })
      */
    private $defaultImage;

    
    /**
      * @var Media
      *
      * @ORM\OneToMany(targetEntity="Application\Sonata\MediaBundle\Entity\Media", mappedBy="user")
      * @ORM\JoinColumns({
      *   @ORM\JoinColumn(name="images", referencedColumnName="id")
      * })
      */
    private $images;
    
    /**
     * @var ProductType
     * 
     * @ORM\ManyToOne(targetEntity="ProjectType", inversedBy="projects")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     */
    private $type;
    
    /**
     * @var Client
     * 
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="projects")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $client;
    

    /**
     * User class constructor
     */
    public function __construct()
    {
        $this->images = new ArrayCollection();
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
}

