<?php 
	class Category{
		var $id;
		var $slug;
		var $name;
		function __construct($id, $slug,$name)
		{
			$this->id = $id;
			$this->slug = $slug;
			$this->name = $name;
		}
		static function getAllCategory(){
			$connect = new mysqli("localhost","root","","hue-cms");
			$connect->set_charset("utf8");
			if ($connect->connect_error) {
				die("Failed !".$connect->connect_error);
			}
			$query = "SELECT * FROM category";
			$result = $connect->query($query);
			$rs = array();
			if ($result) {
				while ($rows = $result->fetch_assoc()) {
					array_push($rs,new Category(
						$rows["id"],
						$rows["slug"],
	                    $rows["name"]
	                ));
				}
			}
			$connect->close();
        	return $rs;
		}
		static function getNameCateBySlug($slug){
			$connect = new mysqli("localhost","root","","hue-cms");
			$connect->set_charset("utf8");
			if ($connect->connect_error) {
				die("Failed !".$connect->connect_error);
			}
			$query = "SELECT * FROM category WHERE slug = '{$slug}'";
			$result = $connect->query($query);
			$rs = array();
			if ($result) {
				while ($rows = $result->fetch_assoc()) {
					array_push($rs,new Category(
						$rows["id"],
						$rows["slug"],
	                    $rows["name"]
	                ));
				}
				
			}
			$connect->close();
        	return $rs;
		}
		static function countPostInCate($slug_cate){
			$connect = new mysqli("localhost","root","","hue-cms");
			$connect->set_charset("utf8");
			if ($connect->connect_error) {
				die("Failed !".$connect->connect_error);
			}
			$query = "SELECT * FROM post WHERE category = '{$slug_cate}'";
			$result = $connect->query($query);
			$rs = array();
			$i = 0;
			if ($result) {
				while ($rows = $result->fetch_assoc()) {
					$i++;
				}
			}
			$connect->close();
        	return $i;
		}
	}
?>