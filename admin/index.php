<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }else{
        include_once('model/entity/post.php');
        $slug = isset($_GET['slug'])?$_GET['slug']:'';
        $username = $_SESSION['username'];
        $chitiet = Post::getChitiet($slug,$username);
        $allpost = Post::getAllPost(); 
        include_once('model/entity/category.php');  
        $cate = Category::getAllCategory(); 
        include_once('model/entity/user.php');  
        $user = User::getAllUser();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CMS</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">

  <script src="http://127.0.0.1/hue-cms/plugins/ckeditor/ckeditor.js"></script>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">HUE CMS</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Tổng quan</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Bài viết/Chủ đề
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#post" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-align-right"></i>  
          <span>Bài viết</span>
        </a>
        <div id="post" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Chức năng</h6>
            <a class="collapse-item" href="index.php?action=add-post">Thêm bài viết</a>
            <a class="collapse-item" href="index.php?action=list-post">Bài viết của bạn</a>
            <a class="collapse-item" href="index.php?action=list-all-post">Tất cả bài viết</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#category" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-tags"></i>
          <span>Category</span>
        </a>
        <div id="category" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Chức năng</h6>
            <a class="collapse-item" href="index.php?action=list-category">Danh sách chủ đề</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#comment" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-comments"></i>
          <span>Bình luận</span>
        </a>
        <div id="comment" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Chức năng</h6>
            <a class="collapse-item" href="index.php?action=list-comment">Danh sách bình luận</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Tài khoản
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-user-check"></i>
          <span>Tài khoản cá nhân</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Chức năng</h6>
            <a class="collapse-item" href="index.php?action=thong-tin-ca-nhan">Thông tin cá nhân</a>
            <a class="collapse-item" href="index.php?action=doi-mat-khau">Đổi mật khẩu</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Xin chào <b><i><?php echo $_SESSION['fullname']; ?></i></b></span>
                <img class="img-profile rounded-circle" src="https://graph.facebook.com/<?php echo $_SESSION['fb']; ?>/picture">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Thông tin cá nhân
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Lịch sử hoạt động
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Đăng xuất
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <?php
        if(isset($_GET['action']) && $_GET['action']=='add-post'){            
            include_once('add.php');
        }
        else if(isset($_GET['action']) && $_GET['action']=='list-post'){            
            include_once('list-post.php');
        }
        else if(isset($_GET['action']) && $_GET['action']=='list-all-post'){
            include_once('list-all-post.php');
        }
        else if(isset($_GET['action']) && $_GET['action']=='edit' && isset($_GET['slug'])){
            include_once('edit-post.php');
        }
        else if(isset($_GET['action']) && $_GET['action']=='delete' && isset($_GET['slug'])){
            include_once('delete-post.php');
        }
        else if(isset($_GET['action']) && $_GET['action']=='list-category'){
            include_once('list-category.php');
        }
        else if(isset($_GET['action']) && $_GET['action']=='list-comment'){
            include_once('list-comment.php');
        }
        else{
          include_once('home.php');
        }
        ?>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; hue.vn 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Bạn có thực sự muốn đăng xuất</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Nhấn "Đăng xuất" nếu bạn muốn kết thúc phiên làm việc</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
          <a class="btn btn-primary" href="logout.php">Đăng xuất</a>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="previewModal" aria-hidden="true">
    <div class="modal-dialog modal-full" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="previewModal">Bản xem trước</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body content-preview">
            <!-- Nội dung -->
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>
  <style>
    .modal-full {
        min-width: 100%;
        margin: 0;
    }

        .modal-full .modal-content {
            min-height: 100vh;
        }
        .modal-body {
            max-height: calc(100vh - 120px);
            overflow-y: auto;
        }
  </style>
  <script src="../plugins/ckeditor/ckeditor.js"></script>
  <script>                
        CKEDITOR.replace( 'ckeditor' );
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script>
        $('.title').keyup(function(){
            title = $('.title').val();
            temp_slug = createSlug(title);
            //$('.slug').val(createSlug(title));
            $.ajax({ 
                url:'checkSlug.php',
                method:'GET',
                data:{temp_slug:temp_slug},
                success:function(data){
                    console.log(data);
                    $('.slug').val(data);
                }
            });
        });
        function createSlug(title){
            slug = title.toLowerCase();        
            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            return slug;
        }
        $('.btn-preview').click(e => {
            var content = CKEDITOR.instances.ckeditor.getData();
            var title = $('.title').val();
            var author = $('.author').val();

            $.ajax({ 
                url:'preview.php',
                method:'POST',
                //dataType : 'json',
                data:{content:content,title:title,author:author},
                success:function(data){
                    $('.content-preview').html(data);  
                    $('#previewModal').modal('show');      
                }
            });
        });            
    </script>
    <script>
        $('.hideShow').click(function() {
            var id = $(this).attr('id');            
            //alert(status);
            if (!$(this).is(':checked')) {
                var status = '1';
                $('.hideShow').val('1');
                $.ajax({ 
                    url:'hide.php',
                    method:'POST',
                    data:{id:id,status:status},
                    success:function(data){
                        alert('Đã ẩn bài viết');
                    }
                })
            }else{
                var status = '0';
                $('.hideShow').val('0');
                $.ajax({ 
                    url:'hide.php',
                    method:'POST',
                    data:{id:id,status:status},
                    success:function(data){
                        alert('Đã hiện bài viết');
                    }
                })
            }
        });
    </script>
    
</body>

</html>
