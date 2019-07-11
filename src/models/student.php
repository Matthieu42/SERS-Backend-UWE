<?php 

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
$container[UserRepository::class] = function ($container) {
    return new UserRepository($container[EntityManager::class]);
};

// src/UserRepository.php

/**
 * @Entity @Table(name="Student")
 **/
class Student
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;
    /** @Column(type="string") **/
    protected $name;
    /** @Column(type="string") **/
    protected $email;
    /** @Column(type="string") **/
    protected $adress;
    /** @Column(type="string") **/
    protected $saltKey;
    /** @Column(type="string") **/
    protected $password;

    
}