<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use JMS\Serializer\Annotation\Groups;

use Gedmo\Mapping\Annotation as Gedmo;

use AppBundle\Entity\TranslatableEntity;

/**
 * ProjectType
 *
 * @ORM\Table(name="project_type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProjectTypeRepository")
 */
class ProjectType extends TranslatableEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * 
     * @Groups({"leadweb", "projecttype", "projecttypes", "project", "projects"})
     */
    private $id;

    /**
     * @var int
     *
     * @Gedmo\SortablePosition
     * @ORM\Column(name="position", type="integer")
     * 
     * @Groups({"leadweb", "projecttype", "projecttypes", "project", "projects"})
     */
    private $position;

    /**
     * @var string
     *
     * @Gedmo\Translatable
     * @ORM\Column(name="title", type="string", length=255)
     * 
     * @Groups({"leadweb", "projecttype", "projecttypes", "project", "projects"})
     */
    private $title;

    /**
     * @Gedmo\Slug(fields={"title"}, updatable=false)
     * @Gedmo\Translatable
     * @ORM\Column(name="slug", length=128, unique=true)
     * 
     * @Groups({"leadweb", "projecttype", "projecttypes", "project", "projects"})
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity="Project", mappedBy="type")
     * 
     * @Groups({"leadweb", "projecttype", "projecttypes", "project", "projects"})
     */
    private $projects;


    /**
     * ProjectType class constructor
     */
    public function __construct()
    {
        $this->projects = new ArrayCollection();
    }
    
    public function __toString() {
        return $this->title;
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
     * @return ProjectType
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
     * Set slug
     *
     * @param string $slug
     *
     * @return Client
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
}

