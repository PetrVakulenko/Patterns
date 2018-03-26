<?php
/**
 * Created by PhpStorm.
 * User: petrvakulenko
 * Date: 26.03.18
 * Time: 13:32
 */

namespace DesignPatterns\Facade;

/**
 * Class User
 * @package DesignPatterns\Facade
 */
class User
{
    /**
     * @var string
     */
    private $username;
    /**
     * @var bool|string
     */
    private $password;
    /**
     * @var string
     */
    private $hash = "String for hash";

    /**
     * User constructor.
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = base64_decode($password . $this->hash);
    }

    /**
     * @return array
     */
    public function getPreferences() : array
    {
        //getting preferences
        return [
            "user" => true,
            "learning" => true,
            "adminpreferences" => false,
        ];
    }

    /**
     * @return array
     */
    public function getLearning() : array
    {
        //getting learning
        return ['courses' => [1,2,3] ];
    }

    /**
     * @return string
     */
    public function getUser() : string
    {
        return $this->username;
    }
}

/**
 * Class Auth
 * @package DesignPatterns\Facade
 */
class Auth
{
    /**
     * @var User
     */
    private $user;

    /**
     * Auth constructor.
     * @param User $user
     */
    public function __construct(User $user) {
        $this->user = $user;
    }

    /**
     * @return bool
     */
    public function authCheck() : bool
    {
        //checking auth for current user;
        return !empty($this->user) ? true : false;
    }
}

/**
 * Class Learning
 * @package DesignPatterns\Facade
 */
class Learning
{
    /**
     * @var User
     */
    private $user;
    /**
     * @var array
     */
    private $learning = [];

    /**
     * Learning constructor.
     * @param User $user
     */
    public function __construct(User $user) {
        $this->user = $user;
    }

    /**
     *
     */
    public function learningAssignment(){
        //Assignment learning;
        $this->learning = $this->user->getLearning();
    }

    /**
     * @return array
     */
    public function getLearning() : array
    {
        return $this->learning;
    }
}

/**
 * Class Preferences
 * @package DesignPatterns\Facade
 */
class Preferences
{
    /**
     * @var array
     */
    private $preferences = [];
    /**
     * @var User
     */
    private $user;

    /**
     * Preferences constructor.
     * @param User $user
     */
    public function __construct(User $user) {
        $this->user = $user;
    }

    /**
     *
     */
    public function setPreferences(){
        $this->preferences = $this->user->getPreferences();
    }

    /**
     * @return array
     */
    public function getPreferences() : array
    {
        return $this->preferences;
    }
}

/**
 * Class FacadeSession
 * @package DesignPatterns\Facade
 */
class FacadeSession
{
    /**
     * @var Auth|null
     */
    private $auth = null;
    /**
     * @var User|null
     */
    private $user = null;
    /**
     * @var Learning|null
     */
    private $learning = null;
    /**
     * @var Preferences|null
     */
    private $preferences = null;

    /**
     * FacadeSession constructor.
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username, string $password)
    {
        $this->user = new User($username, $password);
        $this->auth = new Auth($this->user);
        if ($this->auth->authCheck()) {
            $this->learning = new Learning($this->user);
            $this->learning->learningAssignment();
            $this->preferences = new Preferences($this->user);
            $this->preferences->setPreferences();
        }
    }

    /**
     * @return array
     */
    private function getPreferences() : array
    {
        return $this->preferences->getPreferences();
    }

    /**
     * @return array
     */
    private function getLearning() : array
    {
        return $this->learning->getLearning();
    }

    /**
     * @return string
     */
    private function getUser() : string
    {
        return $this->user->getUser();
    }

    /**
     * @return array
     */
    public function getUserData() : array
    {
        return [
            "username" => $this->getUser(),
            "learning" => $this->getLearning(),
            "preferences" => $this->getPreferences(),
        ];
    }
}