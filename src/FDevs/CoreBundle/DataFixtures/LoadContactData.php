<?php

namespace FDevs\CoreBundle\DataFixtures;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FDevs\ContactUsBundle\Model\Connect;
use FDevs\ContactUsBundle\Model\Contact;

class LoadContactData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    private $contact = [
        'social'=>[
            'connect' => [
                ['type' => 'home', 'href' => 'http://4devs.io/', 'text' => '4devs - blog от разработчиков разработчикам.'],
                ['type' => 'github', 'href' => 'https://github.com/4devs', 'text' => 'FDevs Team'],
                ['type' => 'youtube', 'href' => 'https://www.youtube.com/user/4devs', 'text' => '4devs - YouTube'],
                ['type' => 'linkedin', 'href' => 'https://www.linkedin.com/company/4devs---team-of-great-developers', 'text' => '4devs - Team of developers'],
                ['type' => 'twitter', 'href' => 'https://twitter.com/4devsteam', 'text' => 'Twitter - 4devs Team'],
            ]
        ],
    ];
    /**
     * {@inheritDoc}
     */
    function load(ObjectManager $manager)
    {
        foreach ($this->contact as $name => $contact) {
            $cModel = new Contact();
            $cModel->setContactName($name);
            foreach ($contact['connect'] as $oneConnect) {
                $connect = new Connect();
                $connect->setType($oneConnect['type']);
                $connect->setHref($oneConnect['href']);
                $connect->setText($oneConnect['text']);
                $cModel->addConnectList($connect);

            }
            $manager->persist($cModel);
        }
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    function getOrder()
    {
        return 1;
    }

} 