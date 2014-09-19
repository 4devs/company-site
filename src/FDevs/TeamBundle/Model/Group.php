<?php

namespace FDevs\TeamBundle\Model;

use FOS\UserBundle\Model\Group as BaseGroup;
use FDevs\PageBundle\Model\PageInterface;

class Group extends BaseGroup implements PageInterface
{
    use \FDevs\PageBundle\Model\PageTrait;

    /** @var  \MongoId */
    protected $id;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name ?: 'new';
    }
}
