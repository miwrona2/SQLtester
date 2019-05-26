<?php

use Phalcon\MVC\Model;

class Book extends Model
{
    const TABLE = 'book';

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $author;


    public function getId(): ?int
    {
        return (int)$this->id ?: null;
    }

    public function setId(int $id): Book
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Book
    {
        $this->title = $title;
        return $this;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): Book
    {
        $this->author = $author;
        return $this;
    }


}