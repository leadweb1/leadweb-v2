<?php

namespace AppBundle\Controller\Api;

use AppBundle\Entity\Project;

class ProjectController extends ApiCrudController
{
    public function __construct() {
        $this->class = 'Project';
        $this->name = 'project';
        $this->plural = 'projects';
        $this->parentField = null;
        
        parent::__construct();
    }
    
    /**
     * Get action
     * @var integer $id Id of the entity
     * @return array
     */
    public function cgetAction()
    {
        $entities = $this->getEntities();
        
        return $this->createView($entities, array($this->plural));
    }
    
}
