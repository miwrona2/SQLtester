<?php

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
            return json_encode( [
                'status' => 'success',
                'message' => 'fuckin message'
            ]);
        }
    }

}

