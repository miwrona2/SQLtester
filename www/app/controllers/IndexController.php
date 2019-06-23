<?php

use Phalcon\Http\Response;
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
     * @Route("/get-books", methods={"GET"}, name="getbooks")
     */
    public function getBooksAction()
    {
        /** @var ModelRepository $modelRepository */
        $modelRepository = $this->getDI()->get('ModelRepository');
        $books = $modelRepository->getBooks();
        $this->view->books = $books;
        return json_encode([
            'status' => 'success',
            'message' => 'Database result successful',
            'books' => $books
        ]);
    }

    /**
     * @Route("/get-genres", methods={"GET"}, name="getgenres")
     */
    public function getGenresAction()
    {
        /** @var ModelRepository $modelRepository */
        $modelRepository = $this->getDI()->get('ModelRepository');
        $genres = $modelRepository->getGenres();
        return json_encode([
            'status' => 'success',
            'message' => 'Database result successful',
            'genres' => $genres,
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
                    $queryResult = $bookService->getQueryResult($queryString)->toArray();
                    $message = 'Execution completed!';
                } catch (Exception $e){
                    return json_encode([
                        'status' => 'error',
                        'message' => $e->getMessage(),
                    ]);
                }
                $columnNames = $bookService->getColumnNames($queryResult);
            } else {
                $queryResult = [];
                $columnNames = [];
                $message = 'Enter a database query or use buttons';
            }

            return json_encode([
                'status' => 'success',
                'message' => $message,
                'queryResult' => $queryResult,
                'columns' => $columnNames
            ]);

        }
    }

}

