Company Site
============

Welcome to the "Company Site" based on Symfony2
application that you can use as the skeleton for your new company site.

1) Installing Use Composer
--------------------------

As Company Site uses [Composer][2] to manage its dependencies, the recommended way
to create a new site is to use it.

If you don't have Composer yet, download it following the instructions on
http://getcomposer.org/ or just run the following command:

    curl -s http://getcomposer.org/installer | php

Then, use the `create-project` command to generate a new Symfony application:

    php composer.phar create-project fdevs/company-site path/to/install

Composer will install Company Site and all its dependencies under the
`path/to/install` directory.

2) Browsing the Demo data
-------------------------

Load Fixtures Data

    bin/console doctrine:mongodb:fixtures:load

add cron task for send emails


3) Getting started with Symfony
-------------------------------

Once you're feeling good, you can move onto reading the official [Symfony2 book][5].

A default bundle, `FdevsCoreBundle`, shows yours homepage. After
playing with it, you can remove it by following these steps:

  * modify design in the `src/FDevs/CoreBundle/Resources/views/Default/index.html.twig` file;

What's inside?
---------------

The Symfony Standard Edition is configured with the following defaults:

  * Twig is the only configured template engine;

  * Doctrine MongoDB is configured;

  * Swiftmailer is configured;

  * Annotations for everything are enabled.

It comes pre-configured with the following bundles:

  * **FrameworkBundle** - The core Symfony framework bundle

  * [**SensioFrameworkExtraBundle**][6] - Adds several enhancements, including
    template and routing annotation capability

  * [**DoctrineBundle**][7] - Adds support for the Doctrine MongoDB

  * [**TwigBundle**][8] - Adds support for the Twig templating engine

  * [**SecurityBundle**][9] - Adds security by integrating Symfony's security
    component

  * [**SwiftmailerBundle**][10] - Adds support for Swiftmailer, a library for
    sending emails

  * [**MonologBundle**][11] - Adds support for Monolog, a logging library

  * [**AsseticBundle**][12] - Adds support for Assetic, an asset processing
    library

  * **WebProfilerBundle** (in dev/test env) - Adds profiling functionality and
    the web debug toolbar

  * **SensioDistributionBundle** (in dev/test env) - Adds functionality for
    configuring and working with Symfony distributions

  * [**SensioGeneratorBundle**][13] (in dev/test env) - Adds code generation
    capabilities

  * **FDevsCoreBundle**  - A demo bundle with some example code/template

  * **FDevsTeamBundle**  - A user bundle with some example code/template

  * [**FDevsBlockBundle**][14]  - A block bundle to edit static blocks

  * [**FDevsCatalogBundle**][15]  - A catalog bundle to display profile

  * [**FDevsContactUsBundle**][16]  - A Contact Us bundle to feedback form and send email

  * [**FDevsFileBundle**][17]  - Add functionality for uploads file

  * [**FDevsPageBundle**][18]  - Add functionality localizate page

  * [**FDevsTagBundle**][19]  - Add functionality tags information

All libraries and bundles included in the "Company Site" are released under the MIT or BSD license.

Enjoy!

[1]:  http://symfony.com/doc/2.4/book/installation.html
[2]:  http://getcomposer.org/
[3]:  http://symfony.com/download
[4]:  http://symfony.com/doc/2.4/quick_tour/the_big_picture.html
[5]:  http://symfony.com/doc/2.4/index.html
[6]:  http://symfony.com/doc/2.4/bundles/SensioFrameworkExtraBundle/index.html
[7]:  http://symfony.com/doc/2.4/book/doctrine.html
[8]:  http://symfony.com/doc/2.4/book/templating.html
[9]:  http://symfony.com/doc/2.4/book/security.html
[10]: http://symfony.com/doc/2.4/cookbook/email.html
[11]: http://symfony.com/doc/2.4/cookbook/logging/monolog.html
[12]: http://symfony.com/doc/2.4/cookbook/assetic/asset_management.html
[13]: http://symfony.com/doc/2.4/bundles/SensioGeneratorBundle/index.html
[14]: https://github.com/4devs/FDevsBlockBundle
[15]: https://github.com/4devs/FDevsCatalogBundle
[16]: https://github.com/4devs/FDevsContactUsBundle
[17]: https://github.com/4devs/FDevsFileBundle
[18]: https://github.com/4devs/FDevsPageBundle
[19]: https://github.com/4devs/FDevsTagBundle
