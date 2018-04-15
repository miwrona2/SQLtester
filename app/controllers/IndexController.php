<?php


class IndexController extends ControllerBase
{

    public function indexAction()
    {
		$this->view->title = "SQL Tester";
		$this->view->heading = "Welcome in SQL TESTER!";

        $books = (new BookRepository())->getAll();
		$this->view->books = $books;

		$data = [
		    'post' => $_POST,
            'get' => $_GET
        ];
		$this->view->data = $data;
    }

}

