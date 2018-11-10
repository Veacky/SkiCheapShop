<?php

class ItemController extends Controller {


	public function index() {
		$list = Item::findAll();
		$list["title"] = "All items";
		$this->render("index", $list);
	}

	public function view() {
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
			$item->__set("seller", $_SESSION["user"]->idpeople);
			$query = "insert into item (brand, model, category, state, description, price, seller) values('".$_POST["brand"]."',
																																														'".$_POST["model"]."',
																																														".$_POST["category"].",
																																														'".$_POST["state"]."',
																																														'".$_POST["description"]."',
																																														".$_POST["price"].",
																																														".$_SESSION["user"]->idpeople."
																																														)";
			db()->exec($query);
			$_POST["info"] = "Item added with succes !";
			$this->render("index", Item::findAll());
		}
		else if($_POST["action"]=="Modify"){
			$item = new Item(); //Doit changer et récupérer l'ID
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
		$i = new Item(parameters()["id"]);
		$i->deleteWithID();
		$_POST["info"] = "Item deleted with succes !";
		$this->render("index", Item::findAll());
	}


public function upload_p(){
if ($_POST["action"]=="Add") {
	$image = $_FILES['image']['name'];
	$target = "images/".basename($image);
	$sql = "INSERT INTO item (image) VALUES ('$image')";
	mysqli_query($db, $sql);

	if (move_uploaded_file($_FILES['image'], $target)) {
		$msg = "Image uploaded successfully";
	}else{
		$msg = "Failed to upload image";
	}
}
}
}
