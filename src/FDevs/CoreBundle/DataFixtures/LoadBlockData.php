<?php

namespace FDevs\CoreBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FDevs\BlockBundle\Model\Block;
use FDevs\PageBundle\Model\LocaleText;

class LoadBlockData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    private $blocks = [
        'about_left' => [
            'title' => 'About',
            'text' => '<p><h3>Symfony Framework</h3>The leading PHP framework to create websites and web applications. Built on top of the Symfony Components.<h3>Symfony Components</h3>A set of decoupled and reusable components on which the best PHP applications are built on, such as Drupal, phpBB and eZ Publish.'
        ],
        'about_right' => [
            'title' => 'About',
            'text' => '<p><h3>Symfony Community</h3>A huge community of Symfony fans committed to take PHP to the next level.<h3>Symfony Philosophy</h3>Embracing and promoting professionalism, best practices, standardization and interoperability of applications.</p>'
        ],
        'about_freelancer' => [
            'title' => 'About Freelancer',
            'text' => 'True to the Symfony philosophy, this chapter begins by explaining the fundamental concept common to web development: HTTP. Regardless of your background or preferred programming language, this chapter is a must-read for everyone.'
        ],
        'location' => [
            'title' => 'Location',
            'text' => '3481 Melrose Place<br>Beverly Hills, CA 90210'
        ],
    ];

    /**
     * {@inheritDoc}
     */
    function load(ObjectManager $manager)
    {
        foreach ($this->blocks as $name => $block) {
            $blockModel = new Block();
            $blockModel->setTitle([new LocaleText(['locale' => 'en', 'text' => $block['title']])]);
            $blockModel->setContent([new LocaleText(['locale' => 'en', 'text' => $block['text']])]);
            $blockModel->setId($name);
            $manager->persist($blockModel);
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