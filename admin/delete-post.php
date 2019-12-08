<div class="container-fluid">
          <!-- Content Row -->
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-12">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <?php
                            $slug = isset($_GET['slug'])?$_GET['slug']:'';
                            $username = $_SESSION['username'];
                                include_once('model/entity/post.php');
                                
                                $ct = Post::getChitiet($slug,$username);
                                $del = Post::deletePost($slug,$username);
                                if($del==true && $ct != null){
                                    echo '<h2>Xóa thành công</h2>';
                                }else{
                                    echo '<h2>Không tìm thấy bài viết hoặc bài viết không thuộc sở hữu của bạn</h2>';
                                }
                            ?>
                        </div>                        
                    </div>
                </div>
            </div>
          <!-- Content Row -->
        </div>    