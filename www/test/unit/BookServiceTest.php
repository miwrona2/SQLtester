<?php

use PHPUnit\Framework\TestCase;

class BookServiceTest extends TestCase
{

    public function testColumnNamesReturnArray()
    {
        $mainRepository = new MainRepository();
        $bookService = new BookService($mainRepository);
        $sampleArray = [
            [
                'column1' => ['data', 'from', 'first', 'column']
            ]
        ];
        $columnNames = $bookService->getColumnNames($sampleArray);
        $this->assertIsArray($columnNames);
    }
}
