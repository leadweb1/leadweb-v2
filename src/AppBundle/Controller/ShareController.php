<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Page;
use AppBundle\Entity\Project;

/**
 * @Route("/{lang}")
 */
class ShareController extends Controller {

    /**
     * @Route("/page/{page}", name="share_page")
     * @ParamConverter(
     *     "page",
     *     class = "AppBundle:Page",
     *     options = {
     *         "repository_method" = "findByModule"
     *     }
     *  )
     * @Template("AppBundle:Page:share.html.twig")
     */
    public function pageAction(Request $request, Page $page) {
        return [
            'facebookAppId' => $this->getParameter('facebookAppId'),
            'sharePageUrl' => $this->generateUrl('share_page', [
                'lang' => $request->get('lang'),
                'page' => $page->getModule(),
            ]),
            'redirectUrl' => $this->getParameter('shareBaseUrl').'/'.$request->get('lang').'/'.  preg_replace('/root./', '', $page->getModule()),
            'page' => $page,
        ];
    }

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
    public function projectAction(Request $request, Project $project) {
        return [
            'facebookAppId' => $this->getParameter('facebookAppId'),
            'shareProjectUrl' => $this->generateUrl('share_project', [
                'lang' => $request->get('lang'),
                'project' => $project->getSlug(),
            ]),
            'redirectUrl' => $this->getParameter('shareBaseUrl').'project/'.$project->getSlug(),
            'project' => $project,
        ];
    }

}
