<?php

namespace FDevs\TeamBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    private $users = [
        ['username' => 'andrey'],
        ['username' => 'admin']
    ];
    private $domain = 'company-site.local';

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $domain = $this->container->getParameter('domain') ?: $this->domain;
        $pass = $this->container->getParameter('secret');
        $um = $this->container->get('fos_user.user_manager');
        foreach ($this->users as $user) {
            $userModel = $um->createUser();
            $userModel->setUsername($user['username']);
            $userModel->setEmail($user['username'] . '@' . $domain);
            $userModel->setRoles(['ROLE_ADMIN']);
            $userModel->setEnabled(true);
            $userModel->setPlainPassword($pass);
            $userModel->setSuperAdmin(true);
            $userModel->setGroups([$this->getReference('group-team')]);
            $um->updateUser($userModel, true);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

}
