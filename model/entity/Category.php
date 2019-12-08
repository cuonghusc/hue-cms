<?php
    class Category{
        var $id;
        var $name;
        var $slug;
        function __construct($id,$name,$slug){
            $this->id = $id;
            $this->name = $name;
            $this->slug = $slug;
        }
        static function getCategory(){
            $connect = new mysqli("localhost","root","","hue-cms");
            $connect->set_charset("utf8");
            if ($connect->connect_error) {
                die("Failed !".$connect->connect_error);                
            }else{
                $query = "SELECT *  FROM category";
                $result = $connect->query($query);
                $rs = array();
                if ($result) {
                    while ($rows = $result->fetch_assoc()) {
                        array_push($rs,new Category(
                            $rows["id"],
                            $rows["name"],
                            $rows["slug"]
                        ));
                    }
                }
                $connect->close();
                return $rs;	
            }            	
        }
    }

?>