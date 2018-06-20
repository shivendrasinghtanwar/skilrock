<?php

class Post {
	private $conn;
	private $table = "users";

	public $ID;
	public $name;
	public $email;
	public $mobile_no;
	public $username;
	public $password;
	public $image;

	public function __construct($db){
		$this->conn = $db;
	}

	public function read()
	{
		$query = 'Select * from '.$this->table.' ';

		//Prepare Statement
		$stmt = $this->conn->prepare($query);

		$stmt->execute();

		return $stmt;
	}

	public function read_single()
	{
		$query = 'Select * from '.$this->table.' 
		WHERE 
			ID = ? ';

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(1, $this->ID);

		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->name = $row['name'];
		$this->email = $row['email'];
		$this->mobile_no = $row['mobile_no'];

	}

	public function read_single_user_pass()
	{
		$query = 'Select * from '.$this->table.' 
		WHERE 
			username = :username AND password = :password ';

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':username', $this->username);
		$stmt->bindParam(':password', $this->password);

		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->ID = $row['ID'];
		$this->name = $row['name'];
		$this->email = $row['email'];
		$this->mobile_no = $row['mobile_no'];
		$this->image = $row['image'];

	}

	public function create(){
		$query = 'Insert into '.$this->table.' 
		SET
		 name = :name,
		 email = :email,
		 mobile_no = :mobile_no,
		 username = :username,
		 password = :password';

		$stmt = $this->conn->prepare($query);

		$this->name = htmlspecialchars(strip_tags($this->name));
		$this->email = htmlspecialchars(strip_tags($this->email));
		$this->mobile_no = htmlspecialchars(strip_tags($this->mobile_no));
		$this->username = htmlspecialchars(strip_tags($this->username));
		$this->password = htmlspecialchars(strip_tags($this->password));

		$stmt->bindParam(':name',$this->name);
		$stmt->bindParam(':email',$this->email);
		$stmt->bindParam(':mobile_no',$this->mobile_no);
		$stmt->bindParam(':username',$this->username);
		$stmt->bindParam(':password',$this->password);
		
		if($stmt->execute()){
			return true;
		}
		else
		{
			printf("ERROR : %s .\n",$stmt->error);
			return false;
		}
	}

	public function update_details(){
		$query = 'UPDATE '.$this->table.' 
		SET
		 name = :name,
		 email = :email,
		 mobile_no = :mobile_no
		WHERE
		 ID = :ID';

		$stmt = $this->conn->prepare($query);

		$this->name = htmlspecialchars(strip_tags($this->name));
		$this->email = htmlspecialchars(strip_tags($this->email));
		$this->mobile_no = htmlspecialchars(strip_tags($this->mobile_no));
		$this->ID = htmlspecialchars(strip_tags($this->ID));

		$stmt->bindParam(':name',$this->name);
		$stmt->bindParam(':email',$this->email);
		$stmt->bindParam(':mobile_no',$this->mobile_no);
		$stmt->bindParam(':ID',$this->ID);

		if($stmt->execute()){
			return true;
		}
		else
		{
			printf("ERROR : %s .\n",$stmt->error);
			return false;
		}
	}
}
?>