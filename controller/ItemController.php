<?php

class ItemController extends Controller {


	public function index() {
		/// Function called when the Index view is wanted
		/// Displaying all items from the database
		$list = Item::findAll();
		$list["title"] = "All items";
		$this->render("index", $list);
	}

	public function view() {
		/// Function called when the View view is wanted
		/// Displaying all information about a selected item
			$item = Item::findByID($_GET["id"]);
			if(is_object($item)){
				$this->render("view", $item);
			}
			else {
				$_POST["error"] = "Unknow item";
				$this->render("view");
			}
	}

	public function modify() {
			// $i = new Item(parameters()["id"]);
			// $this->render("modifyitem", $i);
			$item = Item::findByID($_GET["id"]);
			if(is_object($item)){
				$this->render("modifyItem", $item);
			}
			else {
				$_POST["error"] = "Unknow item";
				$this->render("modifyItem");
			}
	}

	public function addItem(){
		/// Function called when the addItem view is wanted
		/// Send the user to this view
		$this->render("addItem");
	}

	public function modifyItem(){
		/// Function called when the modifyItem view is wanted
		/// Send the user to this view
		$this->render("modifyItem");
	}

	public function confirm(){
		/// Function called when any form concerned Item is submited
		/// Takes care of checking the form values, managing objects and sending information to the DB
		if($_POST["action"]=="Add"){ // When an adding form is submited
			if(strlen($_POST["description"]) < 2000 && isset($_POST["state"]) && isset($_POST["description"]) && isset($_POST["price"]) && isset($_POST["model"]) && isset($_POST["brand"]) && isset($_POST["category"])){
var_dump($_POST);
				$item = new Item();
				$item->__set("category", new Category($_POST["category"]));
				$item->__set("brand", $_POST["brand"]);
				$item->__set("model", $_POST["model"]);
				$item->__set("state", $_POST["state"]);
				$item->__set("description", $_POST["description"]);
				$item->__set("price", $_POST["price"]);
				//$item->__set("price", $_POST["imagepath"]);
				//$item->__set("price", $_POST["image"]);
				$item->__set("seller", $_SESSION["user"]->idpeople);
				$query = "insert into item (brand, model, category, state, description, price, seller, image, imagepath) values('".$_POST["brand"]."','".$_POST["model"]."',".$_POST["category"].",'".$_POST["state"]."','".$_POST["description"]."',".$_POST["price"].",".$_SESSION["user"]->idpeople.",'TempImage', 'TempPath')";
				db()->exec($query);
				$_POST["info"] = "Item added with succes !";
				$this->render("index", Item::findAll());
			}
			else{
				$_POST["error"] = "Please fill up all the fields.(Maybe the description is too long).";
				$this->render("addItem");
			}
		}
		else if($_POST["action"]=="Modify"){ //When a modify form is submited
			$item = new Item();
			$item->__set("category", new Category($_POST["category"]));
			$item->__set("brand", $_POST["brand"]);
			$item->__set("model", $_POST["model"]);
			$item->__set("state", $_POST["state"]);
			$item->__set("description", $_POST["description"]);
			$item->__set("price", $_POST["price"]);
			$query = "update item set brand = '".$_POST["brand"]."',
																model = '".$_POST["model"]."',
																category = '".$_POST["category"]."',
																state = '".$_POST["state"]."',
																description = '".$_POST["description"]."',
																price = ".$_POST["price"]."
								where iditem = ".$_GET["id"];
			db()->exec($query);
			$_POST["info"] = "Item modified with succes !";
			$this->view();
		}
		else (new SiteController())->render("index");
	}

	public function delete(){
		/// Functin called when a user is deleting an item
		/// Called the functon Delete in the Model to the specified id
		$i = new Item(parameters()["id"]);
		$i->deleteWithID();
		$_POST["info"] = "Item deleted with succes !";
		$this->render("index", Item::findAll());
	}

}
