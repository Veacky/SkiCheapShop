<?php

class SiteController extends Controller {

	public function __construct()  {

	}



	public function index() {
		/// Function called when Index view is displayed, for any Object
		$this->render("index");
	}




}
