<?php
class Post
{
    private $postId;
    private $publishedDate;
    private $userId;
    private $postExt;
    private $postDesc;
    private $sharingLev;

    function __construct($postId, $userId, $postDesc, $sharingLev, $postExt)
    {
        $this->postId = $postId;
        $this->publishedDate = time();
        $this->userId = $userId;
        $this->postDesc = $postDesc;
        $this->sharingLev = $sharingLev;
        $this->postExt = $postExt;
    }

    function setPublishedDate($publishedDate)
    {
        $this->publishedDate = $publishedDate;
    }

    function setUserId($userId)
    {
        $this->userId = $userId;
    }

    function setPostDesc($postDesc)
    {
        $this->postDesc = $postDesc;
    }

    function setSharingLev($sharingLev)
    {
        $this->sharingLev = $sharingLev;
    }

    function getPostPublishedDate()
    {
        return $this->publishedDate;
    }

    function getPostId()
    {
        return $this->postId;
    }

    function getPostExt()
    {
        return $this->postExt;
    }

    function getUserId()
    {
        return $this->userId;
    }

    function getPostDesc()
    {
        return $this->postDesc;
    }

    function getSharingLev()
    {
        return $this->sharingLev;
    }

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);
        return $vars;
    }
}
