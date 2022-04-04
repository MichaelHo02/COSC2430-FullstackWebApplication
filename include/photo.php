<?php
    class Photo {
        private $photoId;
        private $photoUrl;
        private $publishedDate;

        function __construct($photoUrl, $publishedDate) {
            $this->photoUrl = $photoUrl;
            $this->photoId = "img_" . uniqid();
            $this->publishedDate = $publishedDate;
        }

        function setPhotoUrl($photoUrl) {
            $this->photoUrl = $photoUrl;
        }

        function setPublishedDate($publishedDate) {
            $this->publishedDate = $publishedDate;
        }

        function getPhotoUrl() {
            return $this->photoUrl;
        }

        function getPhotoPublishedDate() {
            return $this->publishedDate;
        }

        function getPhotoId() {
            return $this->photoId;
        }
    }

?>