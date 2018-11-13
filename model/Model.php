<?php
class Model {
	public function __construct($id=null) {
		$class = get_class($this);
		$table = strtolower($class);
		if ($id == null) {
			$st = db()->prepare("insert into public.$table default values returning id$table");
			$st->execute();
			$row = $st->fetch();
			$field = "id".$table;
			$this->$field = $row[$field];
		} else {
			$st = db()->prepare("select * from $table where id$table=:id");
			$st->bindValue(":id", $id);
			$st->execute();
			if ($st->rowCount() != 1) {
				throw new Exception("Not in table: ".$table." id: ".$id );
			} else {
				$row = $st->fetch(PDO::FETCH_ASSOC);
				foreach($row as $field=>$value) {
					if (substr($field, 0,2) == "id") {
						$linkedField = substr($field, 2);
						$linkedClass = ucfirst($linkedField);
						if ($linkedClass != get_class($this))
							$this->$linkedField = new $linkedClass($value);
						else
							$this->$field = $value;
					} else
						$this->$field = $value;
				}
			}
		}
	}

	public static function findAll() {
		/// This function find all objets of a given class
		$class = get_called_class();
		$table = strtolower($class);
		$st = db()->prepare("select id$table from $table");
		$st->execute();
		$list = array();
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$list[] = new $class($row["id".$table]);
		}
		return $list;
	}

	public static function findByID($id) {
		/// This function gives all information about a given object (with his ID)
		$class = get_called_class();
		$table = strtolower($class);
		$st = db()->prepare("select id$table from $table where id$table = '$id'");
		$st->execute();
		$term = "no result";
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$term = new $class($row["id".$table]);
		}
		return $term;
	}

	public function __get($fieldName) {
		/// Get an object attribute
		$varName = "_".$fieldName;
		if (property_exists(get_class($this), $varName))
			return $this->$varName;
		else
			throw new Exception("Unknown variable: ".$fieldName);
	}

	public function __set($fieldName, $value) {
		/// Set an object attribute
		$varName = "_".$fieldName;
		if ($value != null) {
			if (property_exists(get_class($this), $varName)) {
				$this->$varName = $value;
				$class = get_class($this);
				$table = strtolower($class);
				$id = "_id".$fieldName;
				if (isset($value->$id)) {
					$st = db()->prepare("update public.$table set id$fieldName=:val where id$table=:id");
					$id = substr($id, 1);
					$st->bindValue(":val", $value->$id);
				} else {
					$st = db()->prepare("update public.$table set $fieldName=:val where id$table=:id");
					$st->bindValue(":val", $value);
				}
				$id = "id".$table;
				$st->bindValue(":id", $this->$id);
				$st->execute();
			} else
				throw new Exception("Unknown variable: ".$fieldName);
		}
	}

	public function deleteWithID() {
		/// Delete a given object (with his id) from the DB
		$class = get_class($this);
		$table = strtolower($class);
		$idTemp = "id".$table;
		$id = $this->$idTemp;
		$query = "delete from $table where id$table=".$id;
		db()->exec($query);
	}
	
}
