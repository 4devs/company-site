<?php

namespace FDevs\CoreBundle\DataFixtures;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FDevs\CatalogBundle\Model\Item;
use FDevs\PageBundle\Model\LocaleText;

class LoadPortfolioData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    private $portfolio = [
        [
            'image' => '/bundles/fdevscore/img/portfolio/submarine.png',
            'title' => 'The Console Component',
            'description' => 'The Console component allows you to create command-line commands. Your console commands can be used for any recurring task, such as cronjobs, imports, or other batch jobs.'
        ],
        [
            'image' => '/bundles/fdevscore/img/portfolio/safe.png',
            'title' => 'The DependencyInjection Component',
            'description' => 'he DependencyInjection component allows you to standardize and centralize the way objects are constructed in your application. For an introduction to Dependency Injection and service containers see Service Container.'
        ],
        [
            'image' => '/bundles/fdevscore/img/portfolio/game.png',
            'title' => 'The ClassLoader Component',
            'description' => 'The ClassLoader component provides tools to autoload your classes and cache their locations for performance.'
        ],
        [
            'image' => '/bundles/fdevscore/img/portfolio/circus.png',
            'title' => 'The Config Component',
            'description' => 'The Config component provides several classes to help you find, load, combine, autofill and validate configuration values of any kind, whatever their source may be (YAML, XML, INI files, or for instance a database).'
        ],
        [
            'image' => '/bundles/fdevscore/img/portfolio/cake.png',
            'title' => 'The HttpFoundation Component',
            'description' => 'The HttpFoundation component defines an object-oriented layer for the HTTP specification. In PHP, the request is represented by some global variables ($_GET, $_POST, $_FILES, $_COOKIE, $_SESSION, ...) and the response is generated by some functions (echo, header, setcookie, ...). The Symfony HttpFoundation component replaces these default PHP global variables and functions by an object-oriented layer.'
        ],
        [
            'image' => '/bundles/fdevscore/img/portfolio/cabin.png',
            'title' => 'Project Title',
            'description' => 'Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!'
        ],
    ];

    /**
     * {@inheritDoc}
     */
    function load(ObjectManager $manager)
    {
        foreach ($this->portfolio as $portfolio) {
            $item = new Item();
            $item->setImage($portfolio['image']);
            $item->setDescription([new LocaleText(['locale' => 'en', 'text' => $portfolio['description']])]);
            $item->setTitle([new LocaleText(['locale' => 'en', 'text' => $portfolio['title']])]);
            $item->setType('portfolio');
            $manager->persist($item);
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