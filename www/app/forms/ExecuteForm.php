<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Submit;

class ExecuteForm extends Form
{
    public function initialize()
    {
        $textarea = new TextArea('textarea');
        $this->add($textarea);

        $submit = new Submit('submit');
        $submit->setDefault('Wykonaj');
        $this->add($submit);
    }
}