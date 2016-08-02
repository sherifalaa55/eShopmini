<?php
namespace core;
/**
* 
*/
abstract class Model
{
	protected $table;
	protected $fields = [];

	public function insert(array $input){
		$query = "INSERT INTO {$this->table}(";
		$string = ") VALUES(";
		foreach($this->fields as $key => $field){
			$query .= $field;
			$query .= (isset($this->fields[$key+1]))?",":"";
			$string .= "?";
			$string .= (isset($this->fields[$key+1]))?",":"";
		}
		$query = $query . $string.")";
		$stm = $this->dbo->prepare($query);
		foreach ($this->fields as $key => $value) {
			$stm->bindParam($key + 1 , $input[$value]);
		}
		$stm->execute();
		return $this->dbo->lastInsertId();
	}

	public function findById($id){
		$query = "SELECT * FROM {$this->table} WHERE id=?";
		$stm = $this->dbo->prepare($query);
		$stm->bindParam(1 , $id);
		$stm->execute();
		return $stm->fetch();
	}

	public function all(){
		$query = 'SELECT * FROM '. $this->table;
		$stm = $this->dbo->prepare($query);
		$stm->execute();
		return $stm->fetchAll();
	}

	public function destroy($id){
		$query = "DELETE FROM {$this->table} WHERE id = ?";
		$stm = $this->dbo->prepare($query);
		$stm->bindParam(1 , $id);
		return $stm->execute();
	}

	public function update($id ,array $input){
		$query = "UPDATE {$this->table} SET ";
		
		foreach($this->fields as $key => $field){
			$query .= $field . "= ?";
			$query .= (isset($this->fields[$key+1]))?",":"";
		}
		$query = $query . " WHERE id = ?";
		$stm = $this->dbo->prepare($query);
		foreach ($this->fields as $key => $value) {
			$stm->bindParam($key + 1 , $input[$value]);
		}
		$stm->bindParam(count($this->fields) +1 ,$id);
		return $stm->execute();
	}
}