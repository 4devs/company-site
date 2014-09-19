<?php

namespace FDevs\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FDevsCoreBundle:Default:index.html.twig');
    }
}
