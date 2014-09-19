<?php

namespace FDevs\TeamBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadGroupData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    private $groups = [
        ['name' => 'team', 'roles' => ['ROLE_COMPANY']]
    ];

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $gm = $this->container->get('fos_user.group_manager');
        foreach ($this->groups as $group) {
            $groupModel = $gm->createGroup($group['name']);
            foreach ($group['roles'] as $role) {
                $groupModel->addRole($role);
            }
            $gm->updateGroup($groupModel, true);
            $this->addReference('group-' . $group['name'], $groupModel);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

}
