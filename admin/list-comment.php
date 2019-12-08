<?php
    include_once('model/entity/Category.php');    
    $category = Category::getAllCategory();
?>
<div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Danh sách bình luận trên các bài viết của bạn</h1>
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
                                        <th>Thời gian bình luận</th>
                                        <th>Bài viết bình luận</th>
                                        <th>Nội dung bình luận</th>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Hide/Show</th>
                                    </tr>
                                </thead>                                
                                <tbody>
                                    
                                    <?php
                                        include_once('model/entity/comment.php');
                                        $cm= Comment::getAllComment($_SESSION['username']);
                                        //print_r($cm);
                                        $i = 1;
                                        foreach($cm as $key => $value){
                                            $check = ($value->isHide)=='0'?'checked':'';
                                            echo "<tr>";
                                            echo "<td>".$i."</td>";
                                            echo "<td>".$value->timecomment."</td>";
                                            echo "<td>".$value->noidung."</td>";
                                            echo "<td><a href='../chitiet.php?slug=".$value->slug."'>".$value->title."</a></td>";
                                            echo "<td>".$value->name."</td>";
                                            echo "<td>".$value->email."</td>";
                                            echo "<td>
                                            <label class='switch'>
                                                <input type='checkbox'". $check." value='".$value->isHide."' class='hideShowComment' id='".$value->id."'>
                                                <span class='slider round'></span>
                                            </label></td>";
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