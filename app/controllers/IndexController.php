<?php

/**
 * @RoutePrefix("/index")
 */
class IndexController extends ControllerBase
{
    /**
     * @Route("/index", methods={"GET"}, name="index")
     */
    public function indexAction()
    {
		$this->view->title = "SQL Tester";
		$this->view->heading = "Welcome in SQL TESTER!";

        $books = (new BookRepository())->getAll();
		$this->view->books = $books;

		$this->view->executeForm = new ExecuteForm();
    }

    /**
     * @Route("/execute", methods={"GET"}, name="execute")
     */
    public function executeAction()
    {
        $result =  (new BookRepository())->executeQuery(' SELECT * FROM Book');
        return $result;
    }

}

