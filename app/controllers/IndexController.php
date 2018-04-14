<?php

use Phalcon\Mvc\Model\Query;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
		$this->view->title = "SQL Tester";
		$this->view->heading = "Welcome in SQL TESTER!";

        $query = new Query(
            'SELECT * FROM Book',
            $this->getDI()
        );
        $books = $query->execute();
		$this->view->books = $books;
    }

}

