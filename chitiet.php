<?php include_once('header.php');	
?>
	<main>
		<div class="container">
			<div class="row">
				<div class="col col-8">
					<div class="bai-viet">
						<div class="tieu-de-bai-viet">
							<h2><?php echo $chitiet[0]->title?></h2>
							<div class="make-color"></div>
						</div>
						<div class="thoigian-tacgia">
							<small><i>Đăng ngày : <?php echo $chitiet[0]->timesend?></i> | </small>
							<small><i>Tác giả : <?php echo $chitiet[0]->author?></i></small>
						</div>
						<hr class="line">
						<p class="noidungtin"><?php echo $chitiet[0]->content?></p>	
						<style>
							.bai-viet img{
								max-width:100%;
							}
						</style>
					</div>
					<?php
						if($chitiet[0]->tag!=null){
						?>
						<div class="tag">
						<span>Thẻ :<?php $arr = explode(',', $chitiet[0]->tag);
						foreach($arr as $key => $value){
							echo "<a href='#'>".$value."</a> ";
						}
						?></span>
					</div>
					<?php }
					?>
					
					<hr class="line">	
					<?php
						$tincungchude = Post::getPostByCategoryChitiet($chitiet[0]->category);
					?>			
					<div class="tin-lien-quan">
						<div class="menu-tin-moi">
							<a href="#">tin cùng chủ đề</a>
						</div>
						<div class="row list-tin-lien-quan">
							<ul>
								<?php
									foreach($tincungchude as $key => $value){
										echo "<li class='min-post-detail'>";
										echo "<a href='chitiet.php?slug-bai-viet=".$value->slug."'><img src='admin/".$value->thumbnail."'>";
										echo "<p>".$value->title."</p>";
										echo "</a></li>";
									}
								?>
																
							</ul>
						</div>
					</div>
					<hr class="line">
					<!-- <div class="list-comment">
						<ul>
							<li class="anh-noidung-comment">
								<img src="img/avatar/<?php echo(rand(1,6));?>.jpg" alt="" class="img-circle" width="100px">
								<div class="chitiet-binhluan">
									<h4>Michael Jackson</h4>
									<p>Huế đẹp lắm Huế đẹp lắm Huế đẹp lắm Huế đẹp lắm Huế đẹp lắm Huế đẹp lắm Huế đẹp lắm Huế đẹp lắm Huế đẹp lắm Huế đẹp lắm Huế đẹp lắm Huế đẹp lắm Huế đẹp lắm Huế đẹp lắm</p>
									<small><i>03 : 51 : 55 Chủ Nhật, ngày 8, tháng 12, năm 2019</i></small>
									<hr>
								</div>
							</li>
							<li class="anh-noidung-comment">
								<img src="img/avatar/<?php echo(rand(1,6));?>.jpg" alt="" class="img-circle" width="100px">
								<div class="chitiet-binhluan">
									<div class="chitiet-binhluan">
										<h4>Michael Jackson</h4>
										<p>Huế đẹp lắm</p>
										<small><i>03 : 51 : 55 Chủ Nhật, ngày 8, tháng 12, năm 2019</i></small>
									</div>
								</div>
							</li>
						</ul>
					</div> -->
					<!-- <div class="tin-lien-quan">
						<div class="menu-tin-moi">
							<a href="#">bình luận</a>
						</div>
						<form>
							<div class="form-group">
								<i>Tên của bạn (*)</i>
								<input type="text" name="tennguoibinhluan" class="form-control" required>
							</div>
							<div class="form-group">
								<i>Email của bạn (*)</i>
								<input type="email" name="tennguoibinhluan" class="form-control" required>
							</div>
							<div class="form-group">
								<i>Nội dung bình luận (*)</i>
								<textarea type="text" name="tennguoibinhluan" class="form-control" rows="10"></textarea>
							</div>
							<button class="btn btn-comment">GỬI BÌNH LUẬN</button>
						</form>
					</div> -->
					<br>
				</div>
				
				<div class="col col-4 mini-post">
					<div class="menu-tin-moi">
						<a href="#">tin cùng tác giả</a>
					</div>
					<ul>
					<?php
						$postAuth = Post::getPostByAuthor($chitiet[0]->author);
						foreach($postAuth as $key => $value){
					?>					
						<li class="min-post-detail">
							<a href="chitiet.php?slug-bai-viet=<?php echo $value->slug?>"><img src="admin/<?php echo $value->thumbnail?>">
								<p><?php echo $value->title?>
								</p>
							</a>
						</li>
						<?php }?>						
					</ul>
					<hr>
					<div class="thong-ke-bai-viet">
						<div class="menu-tin-moi">
							<a href="#">các chủ đề khác</a>
						</div>
						<ul>
						<?php
							include_once('admin/model/entity/category.php');
							$post= Category::getAllCategory();
							$i = 1;
							foreach($post as $key => $value){
								echo "<li>";
								echo "<a href='category.php?slug-bai-viet=".$value->slug."' class='name-cate'>".$value->name."</a>";
								echo "<span class='count-post'>".Category::countPostInCate($value->slug)."</span>";
								echo "</li>";
								$i++;
							}
						?> 
						</ul>
					</div>
				</div>
			</div>

		</div>
	</main>
	<footer>
		<div class="wrapper">
			<div class="container">
				<div class="row">
				<div class="col col-6 detail-footer">
					<p>Trang thông tin điện tử tổng hợp Tin Tức Huế</p>
					<p>Giấy phép số : - - - - - - - - </p>
					<p>Chịu trách nhiệm nội dung: - - - - - - -  -</p>
					<p>Đơn vị vận hành: Hệ Thống Truyền Thông Online hue.vn</p>
					<p>ĐC: Tp. Huế - ĐT: 0999.999.999 – Email: info@hue.vn</p>
					<p>Đơn vị chủ quản: Công ty TNHH Truyền thông Hue.vn</p>
					<p>ĐC: Tp. Huế - ĐT: 0999.999.999 – Email: info@hue.vn</p>
				</div>
				<div class="col col-6 fanpage">
					<div class="fb-page" data-href="https://www.facebook.com/Thebeautyofhue/" data-tabs="timeline" data-width="500" data-height="130" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/Thebeautyofhue/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Thebeautyofhue/">The Beauty of Huế</a></blockquote></div>
				</div>
			</div>
			</div>			
		</div>
	</footer>
	<a href="#" id="back-to-top" title="Back to top">&uarr;</a>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0&appId=983738891965251&autoLogAppEvents=1"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script>
		window.addEventListener('scroll', function() {
			if(pageYOffset>=180){
				$('.nav-header').addClass('fixed');
			}else{
				$('.nav-header').removeClass('fixed');
			}
		});
	</script>
	<script>
		$(document).ready(e => {
			var i = 0;
			$('.hamburger-box').click(e => {
				if (i%2==0) {
					$('.nav-header').addClass('active');
					$('.hamburger--spin').addClass('is-active');
					i++;
				}else{
					$('.nav-header').removeClass('active');
					$('.hamburger--spin').removeClass('is-active');
					i++;
				}				
			});
			var monthNames = [ "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12" ];
			var dayNames= ["Chủ Nhật","Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7"]
			var newDate = new Date();
			newDate.setDate(newDate.getDate());
			// Xuat ngay thang, nam
			$('#Date').html(dayNames[newDate.getDay()] + ", ngày " + newDate.getDate() + ', tháng ' + monthNames[newDate.getMonth()] + ', năm ' + newDate.getFullYear());
			setInterval( function() {
			    var seconds = new Date().getSeconds();
			    var minutes = new Date().getMinutes();
			    var hours = new Date().getHours();
			    $("#time").html(( hours < 10 ? "0" : "" ) + hours + " : " + ( minutes < 10 ? "0" : "" ) + minutes + " : "+( seconds < 10 ? "0" : "" ) + seconds);
			    },1000);
			if ($('#back-to-top').length) {
			    var scrollTrigger = 100, // px
			        backToTop = function () {
			            var scrollTop = $(window).scrollTop();
			            if (scrollTop > scrollTrigger) {
			                $('#back-to-top').addClass('show');
			            } else {
			                $('#back-to-top').removeClass('show');
			            }
			        };
			    backToTop();
			    $(window).on('scroll', function () {
			        backToTop();
			    });
			    $('#back-to-top').on('click', function (e) {
			        e.preventDefault();
			        $('html,body').animate({
			            scrollTop: 0
			        }, 700);
			    });
			}		
		});
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>