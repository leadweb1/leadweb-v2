<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ProjectAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('description')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('title')
            ->add('description')
            ->add('type')
            ->add('client')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
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
            ->add('description')
            ->add('type', 'sonata_type_model', array(
                'class' => 'AppBundle\Entity\ProjectType',
                'empty_value' => 'Select a projecty type...',
                'btn_add' => false,
            ))
            ->add('client', 'sonata_type_model', array(
                'class' => 'AppBundle\Entity\Client',
                'empty_value' => 'Select a client...',
                'btn_add' => false,
            ))
            ->add('images', 'sonata_type_collection', array(
                'type_options' => array(
                    // Prevents the "Delete" option from being displayed
                    'delete' => false,
                    'delete_options' => array(
                        // You may otherwise choose to put the field but hide it
                        'type'         => 'hidden',
                        // In that case, you need to fill in the options as well
                        'type_options' => array(
                            'mapped'   => false,
                            'required' => false,
                        )
                    )
                )
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
