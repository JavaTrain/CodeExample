<?php

namespace Test\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Test\UserBundle\Entity\Group
 *
 * @ORM\Table(name="`group`")
 * @ORM\Entity
 */
class Group
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
    protected $room;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="groups")
     **/
    protected $users;

    /**
     * @ORM\ManyToOne(targetEntity="Course", inversedBy="groups")
     * @ORM\JoinColumn(name="course_id", referencedColumnName="id")
     */
    protected $course;

    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
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
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @param mixed $room
     */
    public function setRoom($room)
    {
        $this->room = $room;
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
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * @param mixed $courses
     */
    public function setCourse($course)
    {
        $this->course = $course;
    }

    function __toString()
    {
        return $this->getRoom();
    }




}
