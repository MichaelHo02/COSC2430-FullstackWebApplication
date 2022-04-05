<?php
    include "./photo.php";

    class User {
        private $id;
        public $name;
        private $email;
        private $username;
        private $password;
        private $registeredTime;
        private $photoIdList;

        function __construct($name, $email, $username, $password, $registeredTime) {
            $this->id = "user_" . uniqid();
            $this->name = $name;
            $this->email = $email;
            $this->username = $username;
            $this->password = $password;
            $this->registeredTime = $registeredTime;
            $this->photoIdList = array();
        } 



        function setName($name) {
            $this->name = $name;
        }

        function setEmail($email) {
            $this->email = $email;
        }

        function setPassword($password) {
            $this->password = $password;
        }

        function setRegistrationTime($registeredTime) {
            $this->registeredTime = $registeredTime;
        }

        function addPhoto($photo) {
            $photoId = $photo->getPhotoId();
            array_push($this->photoIdList, $photoId);
        }

        function getId() {
            return $this->id;
        }
        function getName() {
            return $this->name;
        }

        function getEmail() {
            return $this->email;
        }

        function getUsername() {
            return $this->username;
        }

        function getPassword() {
            return $this->password;
        }

        function getRegistrationTime() {
            return $this->registeredTime;
        }

        public function jsonSerialize() {
            $vars = get_object_vars($this);
            return $vars;
        }        
    }
?>