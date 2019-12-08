<?php 
	class User
	{
		var $id;
		var $username;
		var $email;
		var $pw;
		var $fullname;
		var $fb;
		var $role;
		function __construct($id,$username,$email,$pw,$fullname,$fb,$role)
		{
			$this->id = $id;
			$this->username = $username;
			$this->email = $email;
			$this->pw = $pw;
			$this->fullname = $fullname;
			$this->fb=$fb;
			$this->role = $role;
		}
		static function Authentication($ue,$pw){
			$connect = new mysqli("localhost","root","","hue-cms");
			$connect->set_charset("utf8");
			if ($connect->connect_error) {
				die("Failed !".$connect->connect_error);
			}
			$pword = md5($pw);
			$query = "SELECT * FROM user WHERE (username = '{$ue}' OR email ='{$ue}') AND pw = '{$pword}'";
			$result = $connect->query($query);
			$rs = array();
			if ($result->num_rows > 0) {
				while ($rows = $result->fetch_assoc()) {
					array_push($rs,new User(
	                    $rows["id"],
						$rows["username"],
						$rows["email"],
	                    $rows["pw"],
	                    $rows["fullname"],
						$rows["fb"],
						$rows["role"],
	                ));
				}
	        }	
			$connect->close();
			return $rs;
		}	
		static function getAllUser(){
			$connect = new mysqli("localhost","root","","hue-cms");
			$connect->set_charset("utf8");
			if ($connect->connect_error) {
				die("Failed !".$connect->connect_error);
			}
			$query = "SELECT * FROM user";
			$result = $connect->query($query);
			$rs = array();
			$i = 0;
			if ($result->num_rows > 0) {
				while ($rows = $result->fetch_assoc()) {
					$i++;
				}
	        }	
			$connect->close();
			return $i;
		}
	}
?>