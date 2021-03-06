<?php

$data = NULL;

class Controller {

	public function __construct() {

	}

	public function render($view, $d=null) {
		/// Sending the user to the View file called in parameter
		global $data;
		include_once "view/header.php";

		$controller = get_class($this);
		$model = substr($controller, 0, strpos($controller, "Controller"));
		$data = $d;
		include_once "view/".strtolower($model)."/".$view.".php";

		include_once "view/footer.php";
	}

}
