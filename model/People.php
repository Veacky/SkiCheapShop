<?php

class People extends Model {

	protected $_idpeople;
	protected $_name;
	protected $_email;
	protected $_pass;

	public static function findByEmail($email) {
		/// This function is giving all information of a user knowing his email address
		$class = get_called_class();
		$table = strtolower($class);
		$st = db()->prepare("select * from $table where email = '$email'");
		$st->execute();
		$term = "no result";
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$term = new $class($row["id".$table]);
		}
		return $term;
	}

	public static function findByID($id) {
		/// This function is giving all information of a user knowing his ID
		$class = get_called_class();
		$table = strtolower($class);
		$st = db()->prepare("select * from $table where id$table = '$id'");
		$st->execute();
		$term = "no result";
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$term = new $class($row["id".$table]);
		}
		return $term;
	}

	public static function findItems($id) {
		/// This function is giving all items selling by a given user (with his id)
		$class = get_called_class();
		$table = strtolower($class);
		$st = db()->prepare("select iditem from item join people on item.seller = people.idpeople where item.seller = '$id'");
		$st->execute();
		$list = array();
		$isEmpty = true;
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$list[] = Item::findByID($row["iditem"]);
			$isEmpty = false;
		}
		return $list;
	}

}
