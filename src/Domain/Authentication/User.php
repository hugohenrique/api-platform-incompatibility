<?php

namespace Domain\Authentication;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class User
{
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $salt;

    public function __construct(
        string $firstName,
        string $lastName = null,
        string $email
    ) {
        $this->id        = Uuid::uuid4();
        $this->firstName = $firstName;
        $this->lastName  = $lastName;
        $this->salt      = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
    }

    public function getId() : UuidInterface
    {
        return $this->id;
    }

    public function getFirstName() : string
    {
        return $this->firstName;
    }

    public function getLastName() : string
    {
        return $this->lastName;
    }
}
