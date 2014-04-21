<?php

class DefaultController extends AdminController
{
	public function actionIndex()
	{
        $this->layout='/layouts/default_main';
		$this->render('index');
	}

    public function actionInfo(){
        $this->render('info');
    }
}