<?php
include "./photo.php";

class User
{
    private $id;
    public $name;
    private $email;
    private $username;
    private $password;
    private $registeredTime;
    private $firstName;
    private $lastName;
    private $avatar;

    function __construct($email, $password, $firstName, $lastName, $avatar)
    {
        $this->id = "user_" . uniqid();
        $this->email = $email;
        $this->password = $password;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->avatar = $avatar;
        $this->username = trim($this->firstName) . trim($this->lastName);
        $this->registeredTime = date('Y/m/d');
    }



    function setName($name)
    {
        $this->name = $name;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    function setPassword($password)
    {
        $this->password = $password;
    }

    function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    function setRegistrationTime($registeredTime)
    {
        $this->registeredTime = $registeredTime;
    }

    function getId()
    {
        return $this->id;
    }
    function getName()
    {
        return $this->name;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getFirstName()
    {
        return $this->firstName;
    }

    function getLastName()
    {
        return $this->lastName;
    }

    function getUsername()
    {
        return $this->username;
    }

    function getPassword()
    {
        return $this->password;
    }

    function getRegistrationTime()
    {
        return $this->registeredTime;
    }

    function getAvatar()
    {
        return $this->avatar;
    }

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);
        return $vars;
    }
}
