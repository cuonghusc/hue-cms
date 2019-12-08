<?php 
	class Comment
	{
		var $id;
		var $name;
		var $email;
		var $noidung;
		var $timecomment;
		var $slug;
        var $isHide;
        var $author;
        var $title;
		function __construct($id,$name,$email,$noidung,$timecomment,$slug,$isHide,$author,$title)
		{
			$this->id = $id;
			$this->name = $name;
			$this->email = $email;
			$this->noidung = $noidung;
			$this->timecomment = $timecomment;
			$this->slug=$slug;
            $this->isHide = $isHide;
            $this->author = $author;
            $this->title = $title;
		}			
		static function getAllComment($author){
			$connect = new mysqli("localhost","root","","hue-cms");
			$connect->set_charset("utf8");
			if ($connect->connect_error) {
				die("Failed !".$connect->connect_error);
			}
			$query = "SELECT comments.id, email,comments.name, timecomment, noidung, comments.slug as slug,comments.isHide as isHide,post.title,post.author as author, post.title as title FROM comments JOIN post ON comments.slug = post.slug WHERE post.author = '{$author}'";
			$result = $connect->query($query);
			$rs = array();
			if ($result->num_rows > 0) {
				while ($rows = $result->fetch_assoc()) {
					array_push($rs,new Comment(
	                    $rows["id"],
						$rows["name"],
						$rows["email"],
	                    $rows["noidung"],
	                    $rows["timecomment"],
						$rows["slug"],
                        $rows["isHide"],
                        $rows["author"],
                        $rows["title"],
	                ));
				}
	        }	
			$connect->close();
			return $rs;
		}
	}
?>