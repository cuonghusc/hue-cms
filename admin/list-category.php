<?php
    include_once('model/entity/Category.php');    
    $category = Category::getAllCategory();
?>
<div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tất cả chủ đề trên website</h1>
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
                                        <th>Tên chủ đề</th>
                                        <th>Slug</th>
                                        <th>Số bài viết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include_once('model/entity/category.php');
                                        $post= Category::getAllCategory();
                                        $i = 1;
                                        foreach($post as $key => $value){
                                            echo "<tr>";
                                            echo "<td>".$i."</td>";
                                            echo "<td>".$value->name."</td>";
                                            echo "<td>".$value->slug."</td>";
                                            echo "<td>".Category::countPostInCate($value->slug)."</td>";
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