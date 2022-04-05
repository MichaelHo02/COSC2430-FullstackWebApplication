<?php
    class Photo {
        private $photoId;
        private $publishedDate;
        private $userId;
        private $photoDesc;
        private $sharingLev;

        function __construct($userId, $photoDesc, $sharingLev) {
            $this->photoId = "img_" . uniqid();
            $this->publishedDate = time();
            $this->userId = $userId;
            $this->desc = $photoDesc;
            $this->sharingLev = $sharingLev;
        }

        function setPublishedDate($publishedDate) {
            $this->publishedDate = $publishedDate;
        }

        function setUserId($userId) {
            $this->userId = $userId;
        }

        function setPhotoDesc($photoDesc) {
            $this->photoDesc = $photoDesc;
        }

        function setSharingLev($sharingLev) {
            $this->sharingLev = $sharingLev;
        }

        function getPhotoPublishedDate() {
            return $this->publishedDate;
        }

        function getPhotoId() {
            return $this->photoId;
        }

        function getUserId() {
            return $this->userId;
        }

        function getPhotoDesc() {
            return $this->photoDesc;
        }

        function getSharingLev() {
            return $this->sharingLev;
        }

        public function jsonSerialize() {
            $vars = get_object_vars($this);
            return $vars;
        }
    }

?>