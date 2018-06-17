<?php

use Phalcon\Mvc\Model\Resultset\Simple;

/**
 * @RoutePrefix("/index")
 */
class IndexController extends ControllerBase
{
    /**
     * @Route("/index", methods={"GET", "POST"}, name="index")
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
     * @Route("/execute", methods={"POST"}, name="execute")
     */
    public function executeAction()
    {
        if ($this->request->isAjax()) {
            $queryString = $this->request->getPost('queryString');

            $queryResult = (new BookRepository())->executeQuery($queryString);

            if ($queryResult instanceof Simple) {
                $queryResult = $queryResult->toArray();
            }

            return json_encode([
                'status' => 'success',
                'message' => 'Execution completed!',
                'queryResult' => $queryResult
            ]);
        }
    }

}

