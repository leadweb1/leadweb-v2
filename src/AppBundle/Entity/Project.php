<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var int
     *
     * @ORM\Column(name="client_id", type="integer")
     */
    private $clientId;

    /**
     * @var int
     *
     * @ORM\Column(name="category_id", type="integer")
     */
    private $categoryId;

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
     * @ORM\ManyToOne(targetEntity="Project", inversedBy="projects")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    private $type;
    
    /**
     * @var Client
     * 
     * @ORM\ManyToOne(targetEntity="Project", inversedBy="projects")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    private $client;
    

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
     * Set clientId
     *
     * @param integer $clientId
     *
     * @return Project
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Get clientId
     *
     * @return int
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Set categoryId
     *
     * @param integer $categoryId
     *
     * @return Project
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * Get categoryId
     *
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
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

