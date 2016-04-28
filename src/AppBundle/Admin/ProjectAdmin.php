<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use AppBundle\Admin\SortableAdmin;

class ProjectAdmin extends SortableAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('slug')
            ->add('description')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        parent::configureListFields($listMapper);
        
        $listMapper
            ->add('title')
            ->add('slug')
            ->add('description')
            ->add('type')
            ->add('client')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                    'move' => array(
                        'template' => 'PixSortableBehaviorBundle:Default:_sort.html.twig'
                    ),
                ),
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title')
            ->add('slug')
            ->add('description')
            ->add('type', 'sonata_type_model', array(
                'class' => 'AppBundle\Entity\ProjectType',
                'empty_value' => 'Select a project type...',
                'btn_add' => false,
            ))
            ->add('client', 'sonata_type_model', array(
                'class' => 'AppBundle\Entity\Client',
                'empty_value' => 'Select a client...',
                'btn_add' => false,
            ))
            ->add('images', 'sonata_type_collection', array(
                'required' => false
            ), array(
                'edit' => 'inline',
                'inline' => 'table',
                'sortable' => 'position',
                'link_parameters' => array(
                    'context' => 'default',
                    'provider' => 'sonata.media.provider.image'
                ),
            ))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('title')
            ->add('slug')
            ->add('description')
        ;
    }

    public function prePersist($object)
    {
        foreach ($object->getImages() as $image) {
            $image->setProject($object);
        }
    }

    public function preUpdate($object)
    {
        foreach ($object->getImages() as $image) {
            $image->setProject($object);
        }
    }
}
