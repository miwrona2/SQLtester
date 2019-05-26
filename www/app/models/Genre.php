<?php

use Phalcon\MVC\Model;

class Genre extends Model
{
    const GENRE = 'genre';

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;


    public function getId(): ?int
    {
        return (int)$this->id ?: null;
    }

    public function setId(int $id): Book
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Genre
    {
        $this->name = $name;
    }
}