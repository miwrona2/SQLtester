<?php

use Phalcon\Mvc\Model\Resultset\Simple;
use Phalcon\Http\Response;

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
            if (mb_strlen($queryString) > 0) {
                try {
                    $queryResult = $bookService->getQueryResult($queryString);
                    $message = 'Execution completed!';
                } catch (Exception $e){
                    return json_encode([
                        'status' => 'error',
                        'message' => $e->getMessage(),
                    ]);
                }
                $columns = [];
                foreach($queryResult[0]->toArray() as $k => $v) {
                    $columns[] = $k;
                }
                $queryResult = $queryResult->toArray();
            } else {
                $queryResult = [];
                $columns = [];
                $message = 'Enter a database query or use buttons';
            }

            return json_encode([
                'status' => 'success',
                'message' => $message,
                'queryResult' => $queryResult,
                'columns' => $columns
            ]);

        }
    }

}

