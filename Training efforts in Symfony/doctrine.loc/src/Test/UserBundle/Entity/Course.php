<?php

namespace Test\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Test\UserBundle\Entity\Course
 *
 * @ORM\Table(name="course")
 * @ORM\Entity
 */
class Course
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;

    /**
     * @ORM\Column(type="text", length=65535)
     */
    protected $description;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="courses")
     **/
    protected $users;

    /**
     * @ORM\OneToMany(targetEntity="Group", mappedBy="course")
     */
    protected $groups;

    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param mixed $users
     */
    public function setUsers(User $users)
    {
        $this->users = $users;
    }

    /**
     * @return mixed
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param mixed $groups
     */
    public function setGroups(Group $groups)
    {
        $this->groups = $groups;
    }

    function __toString()
    {
        return $this->getName();
    }






}
