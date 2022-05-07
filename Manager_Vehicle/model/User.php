<?php

class User
{
   private $id;
   private $numberphone;
   private $password;
   private $role;

    /**
     * @param $id
     * @param $password
     * @param $numberphone
     * @param $role
     */
    public function __construct($id, $password, $numberphone, $role)
    {
        $this->id = $id;
        $this->password = $password;
        $this->numberphone = $numberphone;
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNumberphone()
    {
        return $this->numberphone;
    }

    /**
     * @param mixed $numberphone
     */
    public function setNumberphone($numberphone)
    {
        $this->numberphone = $numberphone;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }


}