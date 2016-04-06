<?php

namespace AppBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;

use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslatable;

/**
 * TranslatableEntity
 */
class TranslatableEntity extends AbstractPersonalTranslatable implements TranslatableInterface
{
    
    /**
     * @Gedmo\Locale
     * Used locale to override Translation listener`s locale
     * this is not a mapped field of entity metadata, just a simple property
     * and it is not necessary because globally locale can be set in listener
     */
    protected $locale;
    
    public function setLocale($locale)
    {
        $this->setTranslatableLocale($locale);
    }
    
    public function getLocale()
    {
        return $this->locale;
    }

    public function setTranslatableLocale($locale)
    {
        $this->locale = $locale;
    }
    
}