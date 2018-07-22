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

		$this->view->executeForm = new ExecuteForm();
    }

    /**
     * @Route("/get-books", methods={"POST"}, name="getbooks")
     */
    public function getBooksAction()
    {
        $books = (new BookRepository())->getAll();
        $this->view->books = $books;
        return json_encode([
            'status' => 'success',
            'message' => 'Database result successful',
            'books' => $books
        ]);
    }

    /**
     * @Route("/execute", methods={"POST"}, name="execute")
     */
    public function executeAction()
    {
        if ($this->request->isAjax()) {
            $queryString = $this->request->getPost('queryString');

            /** @var BookService $bookService */
            $bookService = $this->getDI()->get('BookService');
            $queryResult = $bookService->getQueryResult($queryString);

            $columns = [];
            foreach($queryResult[0]->toArray() as $k => $v) {
                $columns[] = $k;
            }

            if ($queryResult instanceof Simple) {
                $queryResult = $queryResult->toArray();
            } else {
                $queryResult = [];
            }

            return json_encode([
                'status' => 'success',
                'message' => 'Execution completed!',
                'queryResult' => $queryResult,
                'columns' => $columns
            ]);
        }
    }

}

