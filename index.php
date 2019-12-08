<?php include_once('header.php');?>
	<main>
		<div class="container">
			<div class="row">
				<div class="col col-8 big-post">
					<img src="<?php echo "admin/".$allpost[0]->thumbnail?>" class="img-big-post">
					<div class="tieu-de-big-post">
						<a href="chitiet.php?slug-bai-viet=<?php echo $allpost[0]->slug?>"><?php echo $allpost[0]->title?></a>
						<p><?php echo substr($allpost[0]->content,  0, 200)."...";?></p>
					</div>
				</div>
				<div class="col col-4 mini-post">
					<div class="menu-tin-moi">
						<a href="#">tin mới</a>
					</div>
					<ul>
						<?php 
							foreach($newpost as $key => $value){
						?>
						<li class="min-post-detail">
							<a href="chitiet.php?slug-bai-viet=<?php echo $value->slug?>"><img src="<?php echo "admin/".$value->thumbnail?>">
								<p>
									<?php echo $value->title?>
								</p>
							</a>
						</li>
							<?php }?>
					</ul>
				</div>
			</div>
			<hr class="line">
			<div class="row">
				<div class="col col-6">
					<div class="menu-tin-moi">
						<a href="#">chính trị - xã hội</a>											
					</div>
					<?php
						$ctxh = Post::getPostByCategoryHome('chinh-tri-xa-hoi');
					?>
					<div class="noidung-tin">
						<a href="chitiet.php?slug-bai-viet=<?php echo $ctxh[0]->slug?>"><?php echo $ctxh[0]->title?></a>
						<div class="anh-tom-tat">
							<img src="<?php echo "admin/".$ctxh[0]->thumbnail?>">
							<p><?php echo substr($ctxh[0]->content,0,200)."..."?></p>
						</div>
					</div>
					<hr>
					<div class="list-tin">
						<ul>
							<?php
								for($i = 1;$i<count($ctxh);$i++){
									echo "<li><a href='chitiet.php?slug-bai-viet=".$ctxh[$i]->slug."'>".$ctxh[$i]->title."</a></li>";
								}
							?>
						</ul>
					</div>
				</div>
				<div class="col col-6">
					<div class="menu-tin-moi">
						<a href="#">văn hóa - giải trí</a>
					</div>
					<?php
						$ctxh = Post::getPostByCategoryHome('van-hoa-giai-tri');
					?>
					<div class="noidung-tin">
						<a href="chitiet.php?slug-bai-viet=<?php echo $ctxh[0]->slug?>"><?php echo $ctxh[0]->title?></a>
						<div class="anh-tom-tat">
							<img src="<?php echo "admin/".$ctxh[0]->thumbnail?>">
							<p><?php echo substr($ctxh[0]->content,0,200)."..."?></p>
						</div>
					</div>
					<hr>
					<div class="list-tin">
						<ul>
							<?php
								for($i = 1;$i<count($ctxh);$i++){
									echo "<li><a href='chitiet.php?slug-bai-viet=".$ctxh[$i]->slug."'>".$ctxh[$i]->title."</a></li>";
								}
							?>
						</ul>
					</div>
				</div>
			</div>
			<hr class="line">
			<div class="row">
				<div class="col col-6">
					<div class="menu-tin-moi">
						<a href="#">nhịp sống trẻ</a>
					</div>
					<?php
						$ctxh = Post::getPostByCategoryHome('nhip-song-tre');
					?>
					<div class="noidung-tin">
						<a href="chitiet.php?slug-bai-viet=<?php echo $ctxh[0]->slug?>"><?php echo $ctxh[0]->title?></a>
						<div class="anh-tom-tat">
							<img src="<?php echo "admin/".$ctxh[0]->thumbnail?>">
							<p><?php echo substr($ctxh[0]->content,0,200)."..."?></p>
						</div>
					</div>
					<hr>
					<div class="list-tin">
						<ul>
							<?php
								for($i = 1;$i<count($ctxh);$i++){
									echo "<li><a href='chitiet.php?slug-bai-viet=".$ctxh[$i]->slug."'>".$ctxh[$i]->title."</a></li>";
								}
							?>
						</ul>
					</div>
				</div>
				<div class="col col-6">
					<div class="menu-tin-moi">
						<a href="#">huế trong tôi</a>
					</div>
					<?php
						$ctxh = Post::getPostByCategoryHome('hue-trong-toi');
					?>
					<div class="noidung-tin">
						<a href="chitiet.php?slug-bai-viet=<?php echo $ctxh[0]->slug?>"><?php echo $ctxh[0]->title?></a>
						<div class="anh-tom-tat">
							<img src="<?php echo "admin/".$ctxh[0]->thumbnail?>">
							<p><?php echo substr($ctxh[0]->content,0,200)."..."?></p>
						</div>
					</div>
					<hr>
					<div class="list-tin">
						<ul>
							<?php
								for($i = 1;$i<count($ctxh);$i++){
									echo "<li><a href='chitiet.php?slug-bai-viet=".$ctxh[$i]->slug."'>".$ctxh[$i]->title."</a></li>";
								}
							?>
						</ul>
					</div>
				</div>
			</div>
			<hr class="line">
			<div class="row">
				<div class="col col-6">
					<div class="menu-tin-moi">
						<a href="#">nhịp sống huế</a>											
					</div>
					<?php
						$ctxh = Post::getPostByCategoryHome('nhip-song-hue');
					?>
					<div class="noidung-tin">
						<a href="chitiet.php?slug-bai-viet=<?php echo $ctxh[0]->slug?>"><?php echo $ctxh[0]->title?></a>
						<div class="anh-tom-tat">
							<img src="<?php echo "admin/".$ctxh[0]->thumbnail?>">
							<p><?php echo substr($ctxh[0]->content,0,200)."..."?></p>
						</div>
					</div>
					<hr>
					<div class="list-tin">
						<ul>
							<?php
								for($i = 1;$i<count($ctxh);$i++){
									echo "<li><a href='chitiet.php?slug-bai-viet=".$ctxh[$i]->slug."'>".$ctxh[$i]->title."</a></li>";
								}
							?>
						</ul>
					</div>
				</div>
				<div class="col col-6">
					<div class="menu-tin-moi">
						<a href="#">khám phá huế</a>
					</div>
					<?php
						$ctxh = Post::getPostByCategoryHome('kham-pha-hue');
					?>
					<div class="noidung-tin">
						<a href="chitiet.php?slug-bai-viet=<?php echo $ctxh[0]->slug?>"><?php echo $ctxh[0]->title?></a>
						<div class="anh-tom-tat">
							<img src="<?php echo "admin/".$ctxh[0]->thumbnail?>">
							<p><?php echo substr($ctxh[0]->content,0,200)."..."?></p>
						</div>
					</div>
					<hr>
					<div class="list-tin">
						<ul>
							<?php
								for($i = 1;$i<count($ctxh);$i++){
									echo "<li><a href='chitiet.php?slug-bai-viet=".$ctxh[$i]->slug."'>".$ctxh[$i]->title."</a></li>";
								}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</main>
<?php include_once('footer.php');?>