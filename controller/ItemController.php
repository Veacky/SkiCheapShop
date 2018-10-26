<?php

class ItemController extends Controller {


	public function index() {
		$this->render("index", Item::findAll());
	}

	public function view() {
		try {
			$i = new Item(parameters()["id"]);
			$this->render("view", $i);
		} catch (Exception $e) {
			(new SiteController())->render("index");
			// $this->render("error");
		}
	}

	public function modify() {
		try {
			$i = new Item(parameters()["id"]);
			$this->render("modifyitem", $i);
		} catch (Exception $e) {
			(new SiteController())->render("index");
			// $this->render("error");
		}
	}

	public function addItem(){
		$this->render("addItem");
	}

	public function modifyItem(){
		$this->render("modifyItem");
	}

	public function confirm(){
		if($_POST["action"]=="Add"){
			$item = new Item();
			$item->__set("category", new Category($_POST["category"]));
			$item->__set("brand", $_POST["brand"]);
			$item->__set("model", $_POST["model"]);
			$item->__set("state", $_POST["state"]);
			$item->__set("description", $_POST["description"]);
			$item->__set("price", $_POST["price"]);
			$this->render("index", Item::findAll());
			$query = "insert into item (brand, model, category, state, description, price) values('".$_POST["brand"]."',
																																														'".$_POST["model"]."',
																																														".$_POST["category"].",
																																														'".$_POST["state"]."',
																																														'".$_POST["description"]."',
																																														".$_POST["price"]."
																																														)";
			db()->exec($query);
			$this->render("index", Item::findAll());
		}
		if($_POST["action"]=="Modify"){
			$item = new Item();
			$item->__set("category", new Category($_POST["category"]));
			$item->__set("brand", $_POST["brand"]);
			$item->__set("model", $_POST["model"]);
			$item->__set("state", $_POST["state"]);
			$item->__set("description", $_POST["description"]);
			$item->__set("price", $_POST["price"]);
			$this->render("index", Item::findAll());
			$query = "update item set brand = '".$_POST["brand"]."',
																model = '".$_POST["model"]."',
																category = '".$_POST["category"]."',
																state = '".$_POST["state"]."',
																description = '".$_POST["description"]."',
																price = '".$_POST["price"]."'
								where iditem = ".$_GET["id"].")";
			var_dump($query);
			db()->exec($query);
			$this->render("index", Item::findAll());
		}
		else $this->render("index", Item::finAll());
	}

	public function delete(){
		$query = "delete from item where iditem=".$_GET["id"];
		db()->exec($query);
		$this->render("index", Item::findAll());
	}

}