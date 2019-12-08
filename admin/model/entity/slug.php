<?php
    class Slug{
        public static function checkSlug($slug)
        {
            $connect = new mysqli("localhost","root","","cms");
			$connect->set_charset("utf8");
			if ($connect->connect_error) {
				die("Failed !".$connect->connect_error);
			}
			$query = "SELECT * FROM post WHERE slug = '{$slug}'";
			$result = $connect->query($query);
			if ($result->num_rows == 1) {
                return false;             
			}else {
                return true;
            }        	
        }
    }
?>