<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/share")
 */
class ShareController extends Controller {

    /**
     * @Route("/project/{project}", name="share_project")
     * @ParamConverter(
     *     "project",
     *     class = "AppBundle:Project",
     *     options = {
     *         "repository_method" = "findBySlug"
     *     }
     *  )
     * @Template("AppBundle:Project:share.html.twig")
     */
    public function projectAction(Request $request, \AppBundle\Entity\Project $project) {
        return [
            'facebookAppId' => $this->getParameter('facebookAppId'),
            'shareProjectUrl' => $this->generateUrl('share_project', ['project' => $project->getSlug()]),
            'redirectUrl' => $this->getParameter('shareProjectBaseUrl').'project/'.$project->getSlug(),
            'project' => $project,
        ];
    }

}
