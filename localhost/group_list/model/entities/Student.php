<?php

namespace Model;

class Student
{
    const MALE = 0;
    const FEMALE = 1;

    private $id;
    private $name;
    private $dob;
    private $gender;
    private $privilege;
    private $groupId;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getDob()
    {
        return $this->dob;
    }

    public function setDob($dob)
    {
        $this->dob = $dob;
        return $this;
    }

    public function isGenderMale()
    {
        return ($this->gender == self::MALE);
    }

    public function isGenderFemale()
    {
        return ($this->gender == self::FEMALE);
    }

    public function setMaleGender()
    {
        $this->gender = self::MALE;
        return $this;
    }

    public function setFemaleGender()
    {
        $this->gender = self::FEMALE;
        return $this;
    }

    public function isPrivilege()
    {
        return $this->privilege;
    }

    public function setPrivilege($privilege)
    {
        $this->privilege = $privilege;
        return $this;
    }

    public function getGroupId()
    {
        return $this->groupId;
    }

    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;
        return $this;
    }
}