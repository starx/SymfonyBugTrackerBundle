<?php

namespace Starx\SymfonyBugTrackerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('StarxSymfonyBugTrackerBundle:Default:index.html.twig');
    }
}
