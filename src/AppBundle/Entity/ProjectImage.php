<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use JMS\Serializer\Annotation\Groups;

/**
 * ProjectImage
 *
 * @ORM\Table(name="project_image")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProjectImageRepository")
 */
class ProjectImage
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
     * @ORM\Column(name="position", type="integer")
     * 
     * @Groups({"project", "projects"})
     */
    private $position;

    /**
     * @var Project
     * 
     * @ORM\ManyToOne(targetEntity="Project", inversedBy="images")
     * @ORM\OrderBy({"position" = "ASC"})
     */
    private $project;
    
    /**
     * @var Application\Sonata\MediaBundle\Entity\Media
     * 
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"all"})
     * 
     * @Groups({"project", "projects"})
     */
    private $image;
    
    /**
     * @var string
     * 
     * @Groups({"project", "projects"})
     */
    private $url;


    /**
     * ProjectImage class constructor
     */
    public function __construct()
    {
        var_dump($this->getId());
        if($this->getId()) {
            $this->setUrl();
        }
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
     * Set project
     *
     * @param Project $project
     *
     * @return ProjectImage
     */
    public function setProject($project)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set image
     *
     * @param Application\Sonata\MediaBundle\Entity\Media $image
     *
     * @return ProjectImage
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return Application\Sonata\MediaBundle\Entity\Media
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set url
     *
     * @return ProjectImage
     */
    public function setUrl()
    {
        $media = $this->image;
        $provider = $this->get($media->getProviderName());
        $url = $provider->generatePublicUrl($media, 'default');;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        $this->setUrl();
        
        return $this->url;
    }

}

