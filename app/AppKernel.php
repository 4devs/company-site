<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

            new Doctrine\Bundle\MongoDBBundle\DoctrineMongoDBBundle(),

            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new FDevs\PageBundle\FDevsPageBundle(),
            new Ivory\CKEditorBundle\IvoryCKEditorBundle(),

            new Knp\Bundle\GaufretteBundle\KnpGaufretteBundle(),

            new Sonata\CoreBundle\SonataCoreBundle(),
            new Sonata\AdminBundle\SonataAdminBundle(),
            new Sonata\BlockBundle\SonataBlockBundle(),
            new Sonata\DoctrineMongoDBAdminBundle\SonataDoctrineMongoDBAdminBundle(),
            new Misd\PhoneNumberBundle\MisdPhoneNumberBundle(),
            new Twitter\BootstrapBundle\TwitterBootstrapBundle(),
            new Lunetics\LocaleBundle\LuneticsLocaleBundle(),

            new FDevs\TeamBundle\FDevsTeamBundle(),
            new FDevs\TagBundle\FDevsTagBundle(),
            new FDevs\CoreBundle\FDevsCoreBundle(),
            new FDevs\FileBundle\FDevsFileBundle(),
            new FDevs\BlockBundle\FDevsBlockBundle(),
            new FDevs\ContactUsBundle\FDevsContactUsBundle(),
            new FDevs\GeoBundle\FDevsGeoBundle(),
            new FDevs\CatalogBundle\FDevsCatalogBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
