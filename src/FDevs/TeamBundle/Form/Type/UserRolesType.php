<?php

namespace FDevs\TeamBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;

class UserRolesType extends AbstractType
{
    /**
     * @var array
     */
    private $roles;

    /**
     * @var SecurityContextInterface
     */
    private $securityContext;

    /**
     * @var bool
     */
    private $checkRole;
    /**
     * init
     *
     * @param SecurityContextInterface $securityContext
     * @param array                    $rolesHierarchy
     * @param bool                     $checkRole
     */
    public function __construct(
        SecurityContextInterface $securityContext,
        array $rolesHierarchy = [],
        $checkRole = true
    ) {
        $this->securityContext = $securityContext;
        $this->roles = $rolesHierarchy;
        $this->checkRole = $checkRole;
    }

    /**
     * {@inheritDoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $choices = [];
        foreach ($this->roles as $name => $role) {
            if (!$this->checkRole || $this->securityContext->isGranted($name)) {
                $choices = array_merge($choices, $role, [$name]);
            }
        }

        $resolver->setDefaults(['choices' => array_combine($choices, $choices)]);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'fdevs_user_roles';
    }

    /**
     * {@inheritDoc}
     */
    public function getParent()
    {
        return 'choice';
    }
}
