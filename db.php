<?php

	class DBConnection {
	private $conn;

	private function getConnInstance(){
		if (!$this->conn) {
			$this->conn = new PDO('mysql:host=localhost;dbname=apiDatabase;charset=utf8mb4','root','root');
		}
		return $this->conn;
	}

	

	public function getAllItemsReturnArrById($id){
		$stmt=$this->getConnInstance()->prepare('SELECT * FROM product WHERE p_id=:id');
		$stmt->execute(array(':id'=>$id));
		$result=$stmt->fetch();
		$json=array(
			'id'=>$result['p_id'],
				'name'=>$result['p_name'],
				'description'=>$result['p_description'],
				'quantity'=>$result['p_quantity']
		);
		return $json;
	}

	public function addItem($name,$quantity){
		$stmt=$this->getConnInstance()->prepare('INSERT INTO product(p_name,p_quantity) VALUES(:name,:quantity)');
		$result=$stmt->execute(array(
			':name'=>$name,
			':quantity'=>$quantity
		));
		return $result;
	}

	public function updateItem ($id,$quantity){
		$stmt=$this->getConnInstance()->prepare('UPDATE product SET p_quantity=:quantity WHERE p_id=:id');
		$result=$stmt->execute(array(
			':id'=>$id,
			':quantity'=>$quantity
		));
		return $result;
	}

	public function deleteItem ($id){
		$stmt=$this->getConnInstance()->prepare('DELETE FROM product WHERE p_id=:id');
		// $stmt->bindValue(':id',$id, PDO::PARAM_STR);
		// $stmt->execute();
		$result=$stmt->execute(bindValue(
			':id',$id, PDO::PARAM_STR
		));
		return $result;
	}

}







?>