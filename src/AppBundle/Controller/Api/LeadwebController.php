<?php

namespace AppBundle\Controller\Api;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;

use JMS\Serializer\SerializationContext;


class LeadwebController extends FOSRestController implements ClassResourceInterface
{
    protected function createView($data, $serializerGroups = null)
    {
        $view = \FOS\RestBundle\View\View::create()
            ->setStatusCode(200)
            ->setData($data);
        
        if($serializerGroups) {
            $view->setSerializationContext(SerializationContext::create()->setGroups($serializerGroups));
        }
        
        return $view;
    }
    
    /**
     * Get action
     * @var integer $id Id of the entity
     * @return array
     */
    public function getAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $clientsRepoRepository = $em->getRepository('AppBundle:Client');
        $clients = $clientsRepoRepository->findAll();
        
        $projecttypesRepoRepository = $em->getRepository('AppBundle:ProjectType');
        $projecttypes = $projecttypesRepoRepository->findAll();
        
        $projectsRepoRepository = $em->getRepository('AppBundle:Project');
        $projects = $projectsRepoRepository->findAll();
        
        $data = [
            'clients' => $clients,
            'projecttypes' => $projecttypes,
            'projects' => $projects,
        ];
        
        return $this->createView($data, 'leadweb');
    }
    
}
