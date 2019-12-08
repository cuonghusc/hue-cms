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
			                $('.nav-header').addClass('fixed');
			            } else {
			                $('#back-to-top').removeClass('show');
			                $('.nav-header').removeClass('fixed');
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