<?php
/**
 * Created by PhpStorm.
 * User: petrvakulenko
 * Date: 26.03.18
 * Time: 11:12
 */

namespace DesignPatterns\Strategy;

/**
 * Class StrategyContext
 * @package DesignPatterns\Strategy
 */
class StrategyContext {
    /**
     * @var StrategyAdministrator|null
     */
    private $strategy = null;
    /**
     * @var AdministratorUser|AuthorizedUser|NullUser|User|null
     */
    private $user = null;

    /**
     * StrategyContext constructor.
     * @param User $user
     */
    public function __construct(User $user) {
        switch (true) {
            case $user instanceof AuthorizedUser:
                $this->strategy = new StrategyAuthUser();
                break;
            case $user instanceof NullUser:
                $this->strategy = new StrategyUnauthUser();
                break;
            case $user instanceof AdministratorUser:
                $this->strategy = new StrategyAdministrator();
                break;
        }
        if (!empty($this->strategy)){
            $this->user = $user;
        }
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function userInfo() : string
    {
        if (empty($this->user)){
            throw new \Exception("Undefined user") ;
        }
        if (empty($this->strategy)){
            throw new \Exception("Undefined strategy");
        }

        return $this->strategy->showInfo($this->user);
    }
}

/**
 * Interface StrategyInterface
 * @package DesignPatterns\Strategy
 */
interface StrategyInterface {
    /**
     * @param User $user
     * @return string
     */
    public function showInfo(User $user) : string;
}

/**
 * Class StrategyAdministrator
 * @package DesignPatterns\Strategy
 */
class StrategyAdministrator implements StrategyInterface {
    /**
     * @param User $user
     * @return string
     */
    public function showInfo(User $user) : string
    {
        return "Good afternoon administrator. Name: " . $user->getName() . ". Age: " . $user->getAge() . "!";
    }
}

/**
 * Class StrategyUnauthUser
 * @package DesignPatterns\Strategy
 */
class StrategyUnauthUser implements StrategyInterface {
    /**
     * @param User $user
     * @return string
     */
    public function showInfo(User $user) : string
    {
        return "Good afternoon guest.";
    }
}

/**
 * Class StrategyAuthUser
 * @package DesignPatterns\Strategy
 */
class StrategyAuthUser implements StrategyInterface {
    /**
     * @param User $user
     * @return string
     */
    public function showInfo(User $user) : string
    {
        return "Good afternoon. Name: " . $user->getName() . ". Age: " . $user->getAge() . "!";
    }
}

/**
 * Interface User
 * @package DesignPatterns\Strategy
 */
interface User{
    /**
     * @return string
     */
    public function getName() : string;

    /**
     * @return string
     */
    public function getAge() : string;

    /**
     * @return string
     */
    public function getRole() : string;
}

/**
 * Class AbstractUser
 * @package DesignPatterns\Strategy
 */
abstract class AbstractUser implements User{
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $age;
    /**
     * @var
     */
    private $role;

    /**
     * AbstractUser constructor.
     * @param string $name_in
     * @param int $age_in
     */
    public function __construct(string $name_in = '', int $age_in = 0)
    {
        $this->name = $name_in;
        $this->age = $age_in;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getAge() : string
    {
        return $this->age;
    }

    /**
     * @return string
     */
    public function getRole() : string
    {
        return $this->role;
    }
}

/**
 * Class AuthorizedUser
 * @package DesignPatterns\Strategy
 */
class AuthorizedUser extends AbstractUser{
    /**
     * @var string
     */
    private $role = "User";
}

/**
 * Class AdministratorUser
 * @package DesignPatterns\Strategy
 */
class AdministratorUser extends AbstractUser {
    /**
     * @var string
     */
    private $role = "Administrator";
}

/**
 * Class NullUser
 * @package DesignPatterns\Strategy
 */
class NullUser extends AbstractUser {
    /**
     * @var string
     */
    private $role = "Guest";
}