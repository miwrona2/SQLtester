<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
		$this->view->title = "SQL Tester";
		$this->view->heading = "Welcome in SQL TESTER!";
    }

}

