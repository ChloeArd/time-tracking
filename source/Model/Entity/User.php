<?php

namespace Chloe\Timetracking\Model\Entity;

class User {

    private ?int $id;
    private ?string $firstname;
    private ?string $email;
    private ?string $password;

    /**
     * @param int|null $id
     * @param string|null $firstname
     * @param string|null $email
     * @param string|null $password
     */
    public function __construct(?int $id = null, ?string $firstname = null, ?string $email = null, ?string $password = null) {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): ?int {
        $this->id = $id;
        return $id;
    }

    /**
     * @return string|null
     */
    public function getFirstname(): ?string {
        return $this->firstname;
    }

    /**
     * @param string|null $firstname
     */
    public function setFirstname(?string $firstname): ?string {
        $this->firstname = $firstname;
        return $firstname;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): ?string {
        $this->email = $email;
        return $email;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string {
        return $this->password;
    }

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): ?string {
        $this->password = $password;
        return $password;
    }
}