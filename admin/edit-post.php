<?php
    include_once('model/entity/Category.php');    
    $category = Category::getAllCategory();    
?>
<div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sửa bài viết</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <!-- Content Row -->
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-12">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <?php
                                if($chitiet==null){
                                    echo '<h2>Không tìm thấy bài viết hoặc bài viết không thuộc sở hữu của bạn</h2>';
                                }else{

                            ?>
                            <form action="update.php" method="POST" enctype="multipart/form-data">
                                <?php
                                    if(isset($_GET['status'])){
                                        switch($_GET['status']){
                                            case 'success' :
                                                echo "<div class='alert alert-success' role='alert'>
                                                    Sửa thành công !
                                                </div>";
                                                break;
                                            case 'error' :
                                                echo "<div class='alert alert-danger' role='alert'>
                                                Sửa thất bại !
                                                </div>";
                                                break;
                                            default :
                                                echo '';
                                            break;
                                        }
                                        
                                    }                                    
                                ?>
                                <div class="form-data">
                                    <label>Tiêu đề</label>
                                    <input class="form-control title" type="text" name="title" value="<?php echo $chitiet[0]->title?>" required>
                                </div>
                                <div class="form-data">
                                    <label>Category</label>
                                    <select class="form-control" name="category" required>
                                        <?php foreach($category as $key => $value){
                                            if($value->slug!=$chitiet[0]->category){
                                                echo "<option value='".$value->slug."'>".$value->name."</option>";
                                            }else{
                                                echo "<option value='".$value->slug."' selected>".$value->name."</option>";
                                            }
                                            
                                        }?>                                                    
                                    </select>
                                </div>
                                <div class="form-data">
                                    <label>Slug</label>
                                    <input class="form-control slug"  type="text" name="slug" readonly="true" value="<?php echo $chitiet[0]->slug?>" required>
                                </div>
                                <div class="form-data">
                                    <label>Tag <i>(Các thẻ cách nhau bởi nhau phẩy ",")</i></label>
                                    <input class="form-control" value="<?php echo $chitiet[0]->tag?>" type="text" name="tag" placeholder="tag1, tag2,...">
                                </div>
                                <div class="form-data">
                                    <label>Thumbnail</label>
                                    <img src="<?php echo $chitiet[0]->thumbnail?>" width="50px">
                                    <input name="thumb_img" type="file" class="form-control" accept="image/*">
                                </div>
                                <div class="form-data">
                                    <label>Nội dung bài viết</label>
                                    <textarea name="content" class="ckeditor" id="ckeditor" required><?php echo $chitiet[0]->content?></textarea>
                                </div>
                                <br>
                                <input type="hidden" class="oldslug" name="oldslug" value="<?php echo $chitiet[0]->slug?>">
                                <input type="hidden" class="author" name="author" value="<?php echo $_SESSION['fullname']?>">
                                <input type="hidden" class="username" name="username" value="<?php echo $_SESSION['username']?>">
                                <button type="button" class="btn btn-warning btn-danger btn-delete"><?php echo "<a href='index.php?action=delete&slug=".$chitiet[0]->slug."'>Xóa bài viết</a>"?></button>     
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                                  
                            </form>
                                    <?php }?>
                        </div>                        
                    </div>
                </div>
            </div>
          <!-- Content Row -->
        </div>    