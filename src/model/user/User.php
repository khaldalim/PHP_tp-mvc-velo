<?php


namespace App\model\user;


class User
{
    private $id;
    private $CreatedAt;
    private $username;
    private $password;

    /**
     * User constructor.
     * @param $id
     * @param $CreatedAt
     * @param $username
     * @param $password
     */
    public function __construct( $username, $password)
    {
        $this->id = null;
        $this->CreatedAt = null;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return mixed|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed|null $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed|null
     */
    public function getCreatedAt()
    {
        return $this->CreatedAt;
    }

    /**
     * @param mixed|null $CreatedAt
     */
    public function setCreatedAt($CreatedAt): void
    {
        $this->CreatedAt = $CreatedAt;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
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
    public function setPassword($password): void
    {
        $this->password = $password;
    }




}
