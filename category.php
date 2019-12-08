<?php include_once('header.php');?>	
	<main>
		<div class="container">
			<div class="row">
				<div class="col col-8">
					<div class="ten-category">						
						<h2>Chủ đề : <?php echo $namecate[0]->name;?></h2>
						<hr>
					</div>
					<div class="mini-post">
						<ul>
							<?php
							include_once('admin/model/entity/post.php');
							$postcate = Post::getPostByCategory($_GET['name-cate']);
								foreach($postcate as $key => $value){
									echo "<li class='post-in-cate'>";
									echo "<a href='chitiet.php?slug-bai-viet=".$value->slug."'>";
									echo "<img src='admin/".$value->thumbnail."'>";
									echo "<h4>.$value->title.</h4>";
									echo "</a><hr>";
									echo "</li>";
								}
							?>
													
						</ul>
					</div>
				</div>
				<div class="col col-4 mini-post">
					<div class="menu-tin-moi">
						<a href="#">tin mới</a>
					</div>
					<ul>
						<?php
							foreach($newpost as $key => $value){
								echo "<li class='min-post-detail'>";
								echo "<a href='chitiet.php?slug-bai-viet=".$value->slug."'><img src='admin/".$value->thumbnail."'>";
								echo "<p>".$value->title."</p>";
								echo "</a>";
								echo "</li>";
							}
						?>												
					</ul>
				</div>				
			</div>
			<!-- <div class="phan-trang">
				<a href="#">1</a>
				<a href="#">1</a>	
				<a href="#">1</a>
				<a href="#">1</a>
			</div> -->
		</div>
	</main>
	<?php include_once('footer.php');?>