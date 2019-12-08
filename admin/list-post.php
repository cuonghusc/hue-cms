<?php
    include_once('model/entity/Category.php');    
    $category = Category::getAllCategory();
?>
<div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Danh sách bài viết của bạn</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <!-- Content Row -->
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-12">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ảnh</th>
                                        <th>Tiêu đề</th>
                                        <th>Tác giả</th>
                                        <th>Thời gian đăng</th>
                                        <th>Chủ đề</th>
                                        <th>Hide/Show</th>
                                        <th>Chỉnh sửa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include_once('model/entity/post.php');
                                        $post= Post::getPost($_SESSION['username']);
                                        $i = 1;
                                        foreach($post as $key => $value){
                                            $check = ($value->isHide)=='0'?'checked':'';
                                            echo "<tr>";
                                            echo "<td>".$i."</td>";
                                            echo "<td><img src='".$value->thumbnail."' width='50px'></td>";
                                            echo "<td>".$value->title."</td>";
                                            echo "<td>".$value->author."</td>";
                                            echo "<td>".$value->timesend."</td>";
                                            echo "<td>".$value->category."</td>";
                                            echo "<td>
                                            <label class='switch'>
                                                <input type='checkbox'". $check." value='".$value->isHide."' class='hideShow' id='".$value->id."'>
                                                <span class='slider round'></span>
                                            </label></td>";
                                            echo "<td><button class='btn btn-success btn-edit'><a href='index.php?action=edit&slug=".$value->slug."'>Sửa</a></button></td>";
                                            $i++;
                                        }
                                    ?>                                        
                                    </tr>
                                </tbody>       
                                                       
                            </table>                            
                        </div>                                            
                    </div>
                </div>
            </div>
          <!-- Content Row -->
        </div>    