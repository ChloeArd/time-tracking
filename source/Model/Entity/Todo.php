<?php

namespace Chloe\Timetracking\Model\Entity;

class Todo {

    private ?int $id;
    private ?string $name;
    private ?string $time;
    private ?string $date;
    private ?Project $project_fk;

    /**
     * @param int|null $id
     * @param string|null $name
     * @param string|null $time
     * @param string|null $date
     * @param Project|null $project_fk
     */
    public function __construct(?int $id, ?string $name, ?string $time, ?string $date, ?Project $project_fk) {
        $this->id = $id;
        $this->name = $name;
        $this->time = $time;
        $this->date = $date;
        $this->project_fk = $project_fk;
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
     * @return Project|null
     */
    public function getProjectFk(): ?Project {
        return $this->project_fk;
    }

    /**
     * @param Project|null $project_fk
     */
    public function setProjectFk(?Project $project_fk): ?Project {
        $this->project_fk = $project_fk;
        return $project_fk;
    }
}