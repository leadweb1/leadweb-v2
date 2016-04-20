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
        
        $repo = $em->getRepository('AppBundle:Client');
        $results = $repo->findAll();
        $clients = [];
        $clients_by_slug = [];
        foreach($results as $client) {
            $clients[$client->getId()] = $client;
            $clients_by_slug[$client->getSlug()] = $client->getId();
            $client_slugs_by_id = array_flip($clients_by_slug);
        }
        
        $repo = $em->getRepository('AppBundle:ProjectType');
        $results = $repo->findAll();
        $projecttypes = [];
        $projecttypes_by_slug = [];
        foreach($results as $projecttype) {
            $projecttypes[$projecttype->getId()] = $projecttype;
            $projecttypes_by_slug[$projecttype->getSlug()] = $projecttype->getId();
            $projecttype_slugs_by_id = array_flip($projecttypes_by_slug);
        }
        
        $repo = $em->getRepository('AppBundle:Project');
        $results = $repo->findAll();
        $projects = [];
        $projects_by_slug = [];
        foreach($results as $project) {
            $projects[$project->getId()] = $project;
            $projects_by_slug[$project->getSlug()] = $project->getId();
            $project_slugs_by_id = array_flip($projects_by_slug);
        }
        
        $repo = $em->getRepository('AppBundle:Tag');
        $results = $repo->findAll();
        $tags = [];
        $tags_by_type = [];
        foreach($results as $tag) {
            $tags[$tag->getId()] = $tag;
            if(!isset($tags_by_type[$tag->getType()])) {
                $tags_by_type[$tag->getType()] = [];
            }
            $tags_by_type[$tag->getType()][] = $tag->getId();
        }

        $data = [
            'lang' => explode('_', $this->get('request')->getLocale())[0],

            'tags' => $tags,
            'tags_by_type' => $tags_by_type,

            'clients' => $clients,
            'clients_by_slug' => $clients_by_slug,

            'projecttypes' => $projecttypes,
            'projecttypes_by_slug' => $projecttypes_by_slug,

            'projects' => $projects,
            'projects_by_slug' => $projects_by_slug,
        ];
        
        return $this->createView($data, 'leadweb');
    }
    
}
