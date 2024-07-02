<?php

class Home extends Controller {

	public function index() {
		return $this->view('home/index');
	}

}