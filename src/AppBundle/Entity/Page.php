<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use JMS\Serializer\Annotation\Groups;

use Gedmo\Mapping\Annotation as Gedmo;

use AppBundle\Entity\TranslatableEntity;

/**
 * Page
 *
 * @ORM\Table(name="page")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PageRepository")
 */
class Page extends TranslatableEntity
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
     * @ORM\Column(name="name", type="string", length=255)
     * 
     * @Groups({"leadweb"})
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="module", type="string", length=255)
     * 
     * @Groups({"leadweb"})
     */
    private $module;

    /**
     * @var Metadata
     *
     * @ORM\OneToOne(targetEntity="Metadata")
     * @ORM\JoinColumn(name="metadata_id", referencedColumnName="id")
     * 
     * @Groups({"leadweb"})
     */
    private $metadata;

    /**
     * @var string
     *
     * @Gedmo\Translatable
     * @ORM\Column(name="content1", type="text", nullable=true)
     * 
     * @Groups({"leadweb"})
     */
    private $content1;

    /**
     * @var string
     *
     * @Gedmo\Translatable
     * @ORM\Column(name="content2", type="text", nullable=true)
     * 
     * @Groups({"leadweb"})
     */
    private $content2;

    /**
     * @var string
     *
     * @Gedmo\Translatable
     * @ORM\Column(name="content3", type="text", nullable=true)
     * 
     * @Groups({"leadweb"})
     */
    private $content3;


    public function __toString() {
        return $this->name;
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
     * Set name
     *
     * @param string $name
     *
     * @return Page
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set module
     *
     * @param string $module
     *
     * @return Page
     */
    public function setModule($module)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * Get module
     *
     * @return string
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * Set metadata
     *
     * @param string $metadata
     *
     * @return Page
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * Get metadata
     *
     * @return string
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * Set content1
     *
     * @param string $content1
     *
     * @return Page
     */
    public function setContent1($content1)
    {
        $this->content1 = $content1;

        return $this;
    }

    /**
     * Get content1
     *
     * @return string
     */
    public function getContent1()
    {
        return $this->content1;
    }

    /**
     * Set content2
     *
     * @param string $content2
     *
     * @return Page
     */
    public function setContent2($content2)
    {
        $this->content2 = $content2;

        return $this;
    }

    /**
     * Get content2
     *
     * @return string
     */
    public function getContent2()
    {
        return $this->content2;
    }

    /**
     * Set content3
     *
     * @param string $content3
     *
     * @return Page
     */
    public function setContent3($content3)
    {
        $this->content3 = $content3;

        return $this;
    }

    /**
     * Get content3
     *
     * @return string
     */
    public function getContent3()
    {
        return $this->content3;
    }
}
