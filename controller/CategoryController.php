<?php

class CategoryController extends Controller {


	public function index() {
		/// Function going on when Index view is displayed
		/// Displaying every categories
		$this->render("index", Category::findAll());
	}

	public function view() {
		/// Function going on when View view is displayed
		/// Displaying every Item from the selected category
			$list = Category::findItems($_GET["id"]);
			if(!empty($list)){
				$list["title"] = "Items for ".$list[0]->category->name." category";
				(new ItemController())->render("index", $list);
			}
			else {
				$_POST["error"] = "Unknow or empty category";
				$this->render("index", Category::findAll());
			}
	}
}
