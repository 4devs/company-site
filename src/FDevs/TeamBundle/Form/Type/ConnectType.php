<?php
namespace FDevs\TeamBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConnectType extends AbstractType
{
    /** @var array */
    private $types = [
        'linkedin' => 'LinkedIn',
        'envelope-o' => 'Envelope',
        'github' => 'Github',
        'skype' => 'Skype',
        'vk' => 'vk',
        'facebook' => 'facebook',
        'twitter' => 'twitter',
        'youtube' => 'youtube',
        'dropbox' => 'dropbox',
        'instagram' => 'instagram',
        'flickr' => 'flickr',
        'bitbucket' => 'bitbucket',
        'foursquare' => 'foursquare',
        'trello' => 'trello',
        'wordpress' => 'wordpress',
        'database' => 'database',
        'vimeo' => 'vimeo',
        'openid' => 'openid',
        'yahoo' => 'yahoo',
        'google' => 'google',
        'digg' => 'digg',
        'fax' => 'fax',
        'home' => 'home',
        'git' => 'git',
        'wechat' => 'wechat',
        'link' => 'link',
        'certificate' => 'certificate',
        'rss' => 'rss',
        'phone' => 'phone',
    ];

    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', 'choice', ['choices' => $options['types']])
            ->add('text', 'text')
            ->add('href', 'text');
    }

    /**
     * set Types
     *
     * @param array $types
     *
     * @return $this
     */
    public function setTypes(array $types = [])
    {
        $this->types = $types;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver
            ->setOptional(['types'])
            ->setDefaults(
                [
                    'types' => $this->types,
                    'data_class' => 'FDevs\TeamBundle\Model\Connect'
                ]
            )
            ->addAllowedTypes(['types' => 'array']);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'fdevs_user_connect';
    }

}
