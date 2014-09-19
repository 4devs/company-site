<?php
namespace FDevs\TeamBundle\Model;

use FDevs\PageBundle\Model\LocaleText;
use FOS\UserBundle\Model\User as BaseUser;
use FDevs\TagBundle\Model\Tag;
use Doctrine\Common\Collections\ArrayCollection;

class User extends BaseUser
{
    /** @var \MongoId */
    protected $id;
    /** @var \Doctrine\Common\Collections\Collection */
    protected $groups;
    /** @var  \DateTime */
    protected $createdAt;
    /** @var LocaleText[] */
    protected $position;
    /** @var LocaleText[] */
    protected $about;
    /** @var LocaleText[] */
    protected $firstName;
    /** @var LocaleText[] */
    protected $lastName;
    /** @var int */
    protected $displayName;
    /** @var \Doctrine\Common\Collections\Collection */
    protected $skills;
    /** @var string */
    protected $image;
    /** @var string */
    protected $originalImage;
    /** @var ArrayCollection */
    protected $connectList;

    public function __construct()
    {
        parent::__construct();
        $this->createdAt = new \DateTime();
        $this->skills = new ArrayCollection();
        $this->connectList = new ArrayCollection();
        $this->groups = new ArrayCollection();
        $this->position = new ArrayCollection();
        $this->about = new ArrayCollection();
        $this->firstName = new ArrayCollection();
        $this->lastName = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getAbout()
    {
        return $this->about;
    }

    /**
     * @param string $about
     */
    public function setAbout($about)
    {
        $this->about = $about;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return int
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @param int $displayName
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return Group[]
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param Group[] $groups
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;
    }

    /**
     * @return \MongoId
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param \MongoId $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param string $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return \FDevs\TagBundle\Model\Tag[]
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * add Skill
     *
     * @param Tag $tag
     *
     * @return $this
     */
    public function addSkill(Tag $tag)
    {
        $this->skills[] = $tag;

        return $this;
    }

    /**
     * remove Skill
     *
     * @param Tag $tag
     *
     * @return $this
     */
    public function removeSkill(Tag $tag)
    {
        $this->skills->removeElement($tag);

        return $this;
    }

    /**
     * @param \FDevs\TagBundle\Model\Tag[] $skills
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;
    }

    /**
     * @return string
     */
    public function getOriginalImage()
    {
        return $this->originalImage;
    }

    /**
     * @param string $originalImage
     *
     * @return $this
     */
    public function setOriginalImage($originalImage)
    {
        $this->originalImage = $originalImage;

        return $this;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     *
     * @return self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Add lastName
     *
     * @param \FDevs\PageBundle\Model\LocaleText $lastName
     */
    public function addLastName(\FDevs\PageBundle\Model\LocaleText $lastName)
    {
        $this->lastName[] = $lastName;
    }

    /**
     * Remove lastName
     *
     * @param \FDevs\PageBundle\Model\LocaleText $lastName
     */
    public function removeLastName(\FDevs\PageBundle\Model\LocaleText $lastName)
    {
        $this->lastName->removeElement($lastName);
    }

    /**
     * Add firstName
     *
     * @param \FDevs\PageBundle\Model\LocaleText $firstName
     */
    public function addFirstName(\FDevs\PageBundle\Model\LocaleText $firstName)
    {
        $this->firstName[] = $firstName;
    }

    /**
     * Remove firstName
     *
     * @param \FDevs\PageBundle\Model\LocaleText $firstName
     */
    public function removeFirstName(\FDevs\PageBundle\Model\LocaleText $firstName)
    {
        $this->firstName->removeElement($firstName);
    }

    /**
     * Add about
     *
     * @param \FDevs\PageBundle\Model\LocaleText $about
     */
    public function addAbout(\FDevs\PageBundle\Model\LocaleText $about)
    {
        $this->about[] = $about;
    }

    /**
     * Remove about
     *
     * @param \FDevs\PageBundle\Model\LocaleText $about
     */
    public function removeAbout(\FDevs\PageBundle\Model\LocaleText $about)
    {
        $this->about->removeElement($about);
    }

    /**
     * Add position
     *
     * @param \FDevs\PageBundle\Model\LocaleText $position
     */
    public function addPosition(\FDevs\PageBundle\Model\LocaleText $position)
    {
        $this->position[] = $position;
    }

    /**
     * Remove position
     *
     * @param \FDevs\PageBundle\Model\LocaleText $position
     */
    public function removePosition(\FDevs\PageBundle\Model\LocaleText $position)
    {
        $this->position->removeElement($position);
    }

    /**
     * @return ArrayCollection
     */
    public function getConnectList()
    {
        return $this->connectList;
    }

    /**
     * @param ArrayCollection $connectList
     */
    public function setConnectList($connectList)
    {
        $this->connectList = $connectList;
    }

    public function addConnectList(Connect $connect)
    {
        $this->connectList = $connect;

        return $this;
    }

    public function removeConnectList(Connect $connect)
    {
        $this->connectList->removeElement($connect);

        return $this;
    }

}
