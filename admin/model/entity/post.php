<?php 
	class Post{
		var $id;
		var $title;
		var $slug;
		var $thumbnail;
		var $content;
		var $author;
		var $timesend;
		var $category;
		var $tag;
		var $isHide;
		function __construct($id,$title,$slug,$thumbnail,$content,$author,$timesend,$category,$tag,$isHide)
		{
			$this->id = $id;
			$this->title = $title;
			$this->slug = $slug;
			$this->thumbnail = $thumbnail;
			$this->content = $content;
			$this->author=$author;
			$this->timesend=$timesend;
			$this->category=$category;
			$this->tag=$tag;
			$this->isHide=$isHide;
		}
		static function getAllPost(){
			$connect = new mysqli("localhost","root","","hue-cms");
			$connect->set_charset("utf8");
			if ($connect->connect_error) {
				die("Failed !".$connect->connect_error);
			}
			$query = "SELECT post.id,title,slug,thumbnail,content,user.fullname,timesend,category,tag,isHide FROM post JOIN user ON post.author = user.username WHERE isHide = 0 ORDER BY id DESC";
			$result = $connect->query($query);
			$rs = array();
			if ($result->num_rows > 0) {
				while ($rows = $result->fetch_assoc()) {
					array_push($rs,new Post(
	                    $rows["id"],
						$rows["title"],
						$rows["slug"],
	                    $rows["thumbnail"],
	                    $rows["content"],
						$rows["fullname"],
						$rows["timesend"],
						$rows["category"],
						$rows["tag"],
						$rows["isHide"]
	                ));
				}
	        }	
			$connect->close();
			return $rs;
		}
		static function insertPost($title,$slug,$thumbnail,$content,$author,$time_send,$category,$tag){
			$connect = new mysqli("localhost","root","","hue-cms");
			$connect->set_charset("utf8");
			if ($connect->connect_error) {
				die("Failed !".$connect->connect_error);
			}
			$query = "INSERT INTO post (title,slug,thumbnail,content,author,timesend,category,tag)
			VALUES ('{$title}','{$slug}','{$thumbnail}','{$content}','{$author}','{$time_send}','{$category}','{$tag}')";
			$result = mysqli_query($connect,$query);
			if ($result) return true;
			else return false;
		}
		static function getPost($username){
			$connect = new mysqli("localhost","root","","hue-cms");
			$connect->set_charset("utf8");
			if ($connect->connect_error) {
				die("Failed !".$connect->connect_error);
			}
			$query = "SELECT post.id,title,slug,thumbnail,content,user.fullname,timesend,category,tag,isHide FROM post JOIN user ON post.author = user.username WHERE author = '{$username}'";
			$result = $connect->query($query);
			$rs = array();
			if ($result->num_rows > 0) {
				while ($rows = $result->fetch_assoc()) {
					array_push($rs,new Post(
	                    $rows["id"],
						$rows["title"],
						$rows["slug"],
	                    $rows["thumbnail"],
	                    $rows["content"],
						$rows["fullname"],
						$rows["timesend"],
						$rows["category"],
						$rows["tag"],
						$rows["isHide"]
	                ));
				}
	        }	
			$connect->close();
			return $rs;
		}
		static function hideShow($id,$author,$status){
			$connect = new mysqli("localhost","root","","hue-cms");
			$connect->set_charset("utf8");
			if ($connect->connect_error) {
				die("Failed !".$connect->connect_error);
			}
			$query = "UPDATE post SET isHide = {$status} WHERE id = '{$id}' AND author = '{$author}'";
			$result = mysqli_query($connect,$query);
			if ($result) return true;
			else return false;
		}
		static function getChitiet($slug,$author){
			$connect = new mysqli("localhost","root","","hue-cms");
			$connect->set_charset("utf8");
			if ($connect->connect_error) {
				die("Failed !".$connect->connect_error);
			}
			$query = "SELECT post.id,title,slug,thumbnail,content,user.fullname,timesend,category,tag,isHide FROM post JOIN user ON post.author = user.username WHERE slug = '{$slug}' AND author = '{$author}'";
			$result = $connect->query($query);
			$rs = array();
			if ($result->num_rows > 0) {
				while ($rows = $result->fetch_assoc()) {
					array_push($rs,new Post(
	                    $rows["id"],
						$rows["title"],
						$rows["slug"],
	                    $rows["thumbnail"],
	                    $rows["content"],
						$rows["fullname"],
						$rows["timesend"],
						$rows["category"],
						$rows["tag"],
						$rows["isHide"]
	                ));
				}
	        }	
			$connect->close();
			return $rs;
		}
		static function deletePost($slug,$author){
			$connect = new mysqli("localhost","root","","hue-cms");
			$connect->set_charset("utf8");
			if ($connect->connect_error) {
				die("Failed !".$connect->connect_error);
			}
			$query = "DELETE FROM post WHERE author ='{$author}' AND slug = '{$slug}'";
			$result = mysqli_query($connect,$query);
			if ($result) return true;
			else return false;
		}
		static function updatePost($title,$slug,$oldslug,$target_img,$content,$author,$category,$tag)
		{
			$connect = new mysqli("localhost","root","","hue-cms");
			$connect->set_charset("utf8");
			if ($connect->connect_error) {
				die("Failed !".$connect->connect_error);
			}
			if($target_img!=null){
				$query = "UPDATE post
				SET title = '{$title}',
					slug = '{$slug}',
					thumbnail = '{$target_img}',
					content = '{$content}',
					category = '{$category}',
					tag = '{$tag}'
				WHERE author = '{$author}' AND slug = '{$oldslug}'";
			}else{
				$query = "UPDATE post
				SET title = '{$title}',
					slug = '{$slug}',
					content = '{$content}',
					category = '{$category}',
					tag = '{$tag}'
				WHERE author = '{$author}' AND slug = '{$oldslug}'";
			}
			
			$result = mysqli_query($connect,$query);
			if ($result) return true;
			else return false;
		}
		static function getNewPost()
		{
			$connect = new mysqli("localhost","root","","hue-cms");
			$connect->set_charset("utf8");
			if ($connect->connect_error) {
				die("Failed !".$connect->connect_error);
			}
			$query = "SELECT post.id,title,slug,thumbnail,content,user.fullname,timesend,category,tag,isHide FROM post JOIN user ON post.author = user.username WHERE isHide = 0 ORDER BY id DESC LIMIT 1,5";
			$result = $connect->query($query);
			$rs = array();
			if ($result->num_rows > 0) {
				while ($rows = $result->fetch_assoc()) {
					array_push($rs,new Post(
	                    $rows["id"],
						$rows["title"],
						$rows["slug"],
	                    $rows["thumbnail"],
	                    $rows["content"],
						$rows["fullname"],
						$rows["timesend"],
						$rows["category"],
						$rows["tag"],
						$rows["isHide"]
	                ));
				}
	        }	
			$connect->close();
			return $rs;
		}
		static function getPostByCategoryHome($category)
		{
			$connect = new mysqli("localhost","root","","hue-cms");
			$connect->set_charset("utf8");
			if ($connect->connect_error) {
				die("Failed !".$connect->connect_error);
			}
			$query = "SELECT post.id,title,slug,thumbnail,content,user.fullname,timesend,category,tag,isHide FROM post JOIN user ON post.author = user.username WHERE isHide = 0 and category = '{$category}' ORDER BY id DESC LIMIT 0,6";
			$result = $connect->query($query);
			$rs = array();
			if ($result->num_rows > 0) {
				while ($rows = $result->fetch_assoc()) {
					array_push($rs,new Post(
	                    $rows["id"],
						$rows["title"],
						$rows["slug"],
	                    $rows["thumbnail"],
	                    $rows["content"],
						$rows["fullname"],
						$rows["timesend"],
						$rows["category"],
						$rows["tag"],
						$rows["isHide"]
	                ));
				}
	        }	
			$connect->close();
			return $rs;
		}
		static function getChitietOfPost($slug){
			$connect = new mysqli("localhost","root","","hue-cms");
			$connect->set_charset("utf8");
			if ($connect->connect_error) {
				die("Failed !".$connect->connect_error);
			}
			$query = "SELECT post.id,title,slug,thumbnail,content,user.username,timesend,category,tag,isHide FROM post JOIN user ON post.author = user.username WHERE isHide = 0 AND slug = '{$slug}'";
			$result = $connect->query($query);
			$rs = array();
			if ($result->num_rows > 0) {
				while ($rows = $result->fetch_assoc()) {
					array_push($rs,new Post(
	                    $rows["id"],
						$rows["title"],
						$rows["slug"],
	                    $rows["thumbnail"],
	                    $rows["content"],
						$rows["username"],
						$rows["timesend"],
						$rows["category"],
						$rows["tag"],
						$rows["isHide"]
	                ));
				}
	        }	
			$connect->close();
			return $rs;
		}
		static function getPostByCategoryChitiet($category)
		{
			$connect = new mysqli("localhost","root","","hue-cms");
			$connect->set_charset("utf8");
			if ($connect->connect_error) {
				die("Failed !".$connect->connect_error);
			}
			$query = "SELECT post.id,title,slug,thumbnail,content,user.fullname,timesend,category,tag,isHide FROM post JOIN user ON post.author = user.username WHERE isHide = 0 and category = '{$category}' ORDER BY id DESC LIMIT 0,3";
			$result = $connect->query($query);
			$rs = array();
			if ($result->num_rows > 0) {
				while ($rows = $result->fetch_assoc()) {
					array_push($rs,new Post(
	                    $rows["id"],
						$rows["title"],
						$rows["slug"],
	                    $rows["thumbnail"],
	                    $rows["content"],
						$rows["fullname"],
						$rows["timesend"],
						$rows["category"],
						$rows["tag"],
						$rows["isHide"]
	                ));
				}
	        }	
			$connect->close();
			return $rs;
		}
		static function getPostByAuthor($author)
		{
			$connect = new mysqli("localhost","root","","hue-cms");
			$connect->set_charset("utf8");
			if ($connect->connect_error) {
				die("Failed !".$connect->connect_error);
			}
			$query = "SELECT post.id,title,slug,thumbnail,content,user.fullname,timesend,category,tag,isHide FROM post JOIN user ON post.author = user.username WHERE isHide = 0 and author = '{$author}' ORDER BY id DESC LIMIT 0,5";
			$result = $connect->query($query);
			$rs = array();
			if ($result->num_rows > 0) {
				while ($rows = $result->fetch_assoc()) {
					array_push($rs,new Post(
	                    $rows["id"],
						$rows["title"],
						$rows["slug"],
	                    $rows["thumbnail"],
	                    $rows["content"],
						$rows["fullname"],
						$rows["timesend"],
						$rows["category"],
						$rows["tag"],
						$rows["isHide"]
	                ));
				}
	        }	
			$connect->close();
			return $rs;
		}
		static function getPostByCategory($category)
		{
			$connect = new mysqli("localhost","root","","hue-cms");
			$connect->set_charset("utf8");
			if ($connect->connect_error) {
				die("Failed !".$connect->connect_error);
			}
			$query = "SELECT post.id,title,slug,thumbnail,content,user.fullname,timesend,category,tag,isHide FROM post JOIN user ON post.author = user.username WHERE isHide = 0 and category = '{$category}' ORDER BY id DESC";
			$result = $connect->query($query);
			$rs = array();
			if ($result->num_rows > 0) {
				while ($rows = $result->fetch_assoc()) {
					array_push($rs,new Post(
	                    $rows["id"],
						$rows["title"],
						$rows["slug"],
	                    $rows["thumbnail"],
	                    $rows["content"],
						$rows["fullname"],
						$rows["timesend"],
						$rows["category"],
						$rows["tag"],
						$rows["isHide"]
	                ));
				}
	        }	
			$connect->close();
			return $rs;
		}
	}
?>