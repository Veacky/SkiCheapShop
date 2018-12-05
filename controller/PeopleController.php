<?php

class PeopleController extends Controller {


	public function index() {
		/// Function going on when Index view is displayed
		/// Displaying all users
		$this->render("index", People::findAll());
	}

	public function view() {
		/// Function going on when View view is displayed
		/// Displaying every items selling by this user (getting the id)
			$list = People::findItems($_GET["id"]);
			if(!empty($list)){
				$list["title"] = "Items selling by ".$list[0]->seller->name;
				(new ItemController())->render("index", $list);
			}
			else {
				$_POST["error"] = "Unknow seller";
				(new SiteController())->render("index", $_POST);
			}
	}

	public function login(){
		/// Function called when the login view is wanted
		/// Send the user to this view
		$this->render("login");
	}

	public function logout(){
		/// Function called when the user clicks on "logout"
		/// Disconnet the connected user
		unset($_SESSION["user"]);
		(new SiteController())->render("index");
	}

	public function signup(){
		/// Function called when the Register view is wanted
		/// Send the user to this view
		$this->render("signup");
	}

	public function editing(){
		/// Function called when the Editing view is wanted
		/// Send the user to this view
		$this->render("editing");
	}

	public function confirm(){
		/// Function called when any form concerned People is submited
		/// Takes care of checking the form values, managing objects and sending information to the DB
		if($_POST["action"]=="Register"){ //When a Register form is submited
			if($_POST["email1"] == $_POST["email2"] && $_POST["password1"] == $_POST["password2"] && strlen($_POST["password1"]) < 50){
				$userTest = People::findByEmail(trim(strtolower($_POST["email1"])));
				if($userTest == "no result"){
					$people = new People();
					$people->__set("name", $_POST["name"]);
					$people->__set("email", trim(strtolower($_POST["email1"])));
					$people->__set("pass", $_POST["password1"]);
					$query = "insert into people (name, email, pass) values('".$_POST["name"]."','"
																																  	.trim(strtolower($_POST["email1"]))."','"
																																  	.$_POST["password1"]."')";
				  db()->exec($query);
					$_POST["info"] = "Account created with success !";
					$_SESSION["user"] = People::findByEmail(trim(strtolower($_POST["email1"])));
					(new SiteController())->render("index");
				}
				else{
					$_POST["error"] = "This email address is not available, try again.";
					$this->render("signup");
				}
			}
			else{
				$_POST["error"] = "Email addresses or passwords are not identic, try again. (Maybe your password is too long.)";
				$this->render("signup");
			}
		}
		else if($_POST["action"]=="Login"){ //When a Login form is submited
			$user = People::findByEmail(trim($_POST["email"]));
			if($user != "no result"){
				if($user->pass == $_POST["password"]){
					$_SESSION["user"] = $user;
					$_POST["info"]="Welcome ".$user->name." !";
					(new SiteController())->render("index");
				}
				else{
					$_POST["error"]="Wrong password, try again.";
					$this->render("login");
				}
			} else{
				$_POST["error"]="This account does not exist, try again.";
				$this->render("login");
			}
		}
		else if($_POST["action"]=="change"){ //When a Editing form is submited
			if ($_POST["password_1"] == $_POST["password_2"] && strlen($_POST["password_1"]) < 50) {

				$user = People::findByEmail(trim($_SESSION["user"]->email));
				$user->__set("pass", $_POST["password_1"]);

				$query = "update people set pass = '".$_POST["password_1"]."' where idpeople=".$_SESSION["user"]->idpeople.";";
				db()->exec($query);

				$_POST["info"] = "Information changed with succes !";
				(new PeopleController())->render("editing");
			}
		}
		else{
			$_POST["error"]="Something wrong happened, try again.";
			(new SiteController())->render("index");
		}
	}
}
