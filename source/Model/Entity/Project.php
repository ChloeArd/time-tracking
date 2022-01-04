<?php

namespace Chloe\Timetracking\Model\Entity;

class Project {

    private ?int $id;
    private ?string $name;
    private ?string $time;
    private ?string $date;
    private ?User $user_fk;

    /**
     * @param int|null $id
     * @param string|null $name
     * @param string|null $time
     * @param string|null $date
     * @param User|null $user_fk
     */
    public function __construct(?int $id, ?string $name, ?string $time, ?string $date, ?User $user_fk) {
        $this->id = $id;
        $this->name = $name;
        $this->time = $time;
        $this->date = $date;
        $this->user_fk = $user_fk;
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
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): ?string {
        $this->name = $name;
        return $name;
    }

    /**
     * @return string|null
     */
    public function getTime(): ?string {
        return $this->time;
    }

    /**
     * @param string|null $time
     */
    public function setTime(?string $time): ?string {
        $this->time = $time;
        return $time;
    }

    /**
     * @return string|null
     */
    public function getDate(): ?string {
        return $this->date;
    }

    /**
     * @param string|null $date
     */
    public function setDate(?string $date): ?string {
        $this->date = $date;
        return $date;
    }

    /**
     * @return User|null
     */
    public function getUserFk(): ?User {
        return $this->user_fk;
    }

    /**
     * @param User|null $user_fk
     */
    public function setUserFk(?User $user_fk): ?User {
        $this->user_fk = $user_fk;
        return $user_fk;
    }
}