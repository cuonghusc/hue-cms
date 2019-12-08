<?php
    include_once('admin/model/entity/category.php');
	$category = Category::getAllCategory();

	include_once('admin/model/entity/post.php');
// allpost 
	$allpost = Post::getAllPost();
	// print_r($allpost);
	$newpost = Post::getNewPost();
	//print_r($newpost);

	include_once('admin/model/entity/post.php');
	if(isset($_GET['slug-bai-viet'])){
		$chitiet = Post::getChitietOfPost($_GET['slug-bai-viet']);
		if(count($chitiet)==0){
			header('Location: /hue-cms');
		}
	}

	if(isset($_GET['slug-category'])){
		$chitiet = Post::getChitietOfPost($_GET['slug-category']);
		if(count($chitiet)==0){
			header('Location: /hue-cms');
		}
	}

	if(isset($_GET['name-cate'])){
		$namecate = Category::getNameCateBySlug($_GET['name-cate']);
		if(count($namecate)==0){
			header('Location: /hue-cms');
		}		
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tin tức Huế</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="responsive.css">
</head>
<body>
	<header>
		<div class="top-bar">
			<div class="container">
				<div class="row row-nmg justify-content-between align-items-center">
					<div class="box-1">
						<ul>
							<li>
								<div class="clock">		
									<span id="time"></span> <span id="Date"></span>
								</div>
							</li>
							<li>Hotline: 0999.999.999 - 0999.999.999</li>
							<li>Email contact@hue.vn</li>
							<li>Quảng cáo : ads@hue.vn</li>
						</ul>
					</div>
					<div class="box-2">						
						<ul>
							<li>
								<a href="#">
									<img src="img/facebook_ic.png">
								</a>
							</li>
							<li>
								<form method="POST" class="search-form" action="#">
									<div class="search form-group">
										<input type="text" name="search" id="search_box" class="form-control" placeholder="Tìm kiếm...">
									</div>
									<button type="submit" class="btn btn-search">
										<img src="img/Search.png">
									</button>
								</form>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="menu_mobile" class="content" style="display: block;">
	        <div class="container">
	            <div class="row row-nmg justify-content-between align-items-center">
	                <a href="index.php" class="logo">
	                	<img src="img/logo-header.png" alt="hue.vn"></a>
	                <div class="box-ads w728 h90 d-none d-lg-block"></div>	                
	                <button class="hamburger_search d-lg-none hamburger--spin close_icon" type="button" style="display: none">
	                    <i id="close_icon" style="font-weight: 500;font-size: 32px;color:#222;line-height: 45px;margin-right: 10px" class="material-icons">close</i>
	                </button>
	                <button class="hamburger d-lg-none hamburger--spin" type="button">
	                        <span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
	                </button>
	                </div>
	            </div>
	        </div>
	    </div>		
		<div class="nav-header">
			<div class="container">
				<ul class="main">
					<li><a href="index.php">trang chủ</a></li>
                    <?php
                        foreach($category as $key => $value){
                            echo "<li><a href='category.php?name-cate=".$value->slug."'>".$value->name."</a></li>";
                        }
                    ?>
				</ul>
			</div>
		</div>
	</header>	