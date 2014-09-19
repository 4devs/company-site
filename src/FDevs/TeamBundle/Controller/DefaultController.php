<?php

namespace FDevs\TeamBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function listGroupAction($group)
    {

        $group = $this->container->get('fos_user.group_manager')->findGroupBy(['name' => $group]);
        $users = $this->container
            ->get('doctrine_mongodb')
            ->getRepository('FDevs\TeamBundle\Model\User')
            ->findBy(['groups' => $group->getId()]);

        return $this->render('FDevsTeamBundle:Default:list.html.twig', ['users' => $users]);
    }
}
