<?php

class Item extends Model {

	protected $_iditem;
	protected $_brand;
	protected $_model;
	protected $_category;
	protected $_state;
	protected $_description;
	protected $_price;
	protected $_avaibility;
	protected $_seller;
	protected $_buyer;
	protected $_imagepath;
	protected $_image;

	public static function findAll() {
		$class = get_called_class();
		$table = strtolower($class);
		$st = db()->prepare("select id$table from $table");
		$st->execute();
		$list = array();
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$list[] = new $class($row["id".$table]);
		}
		foreach ($list as $i => $details) {
			$valueCategory = Category::findByID($list[$i]->category);
			$list[$i]->category = $valueCategory;
			$valuePeople = People::findByID($list[$i]->seller);
			$list[$i]->seller = $valuePeople;
		}
		return $list;
	}

	public static function findByID($id) {
		$class = get_called_class();
		$table = strtolower($class);
		$st = db()->prepare("select iditem from item where iditem = '$id'");
		$st->execute();
		$term = "no result";
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$term = new $class($row["id".$table]);
			$valueCategory = Category::findByID($term->category);
			$term->category = $valueCategory;
			$valueSeller = People::findByID($term->seller);
			$term->seller = $valueSeller;
		}
		return $term;
	}

}
