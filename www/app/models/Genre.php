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
    private $fullname;


    public function getId(): ?int
    {
        return (int)$this->id ?: null;
    }

    public function setId(int $id): Book
    {
        $this->id = $id;
        return $this;
    }

    public function getFullname(): string
    {
        return $this->fullname;
    }

    public function setFullname(string $fullname): Genre
    {
        $this->fullname = $fullname;
    }
}