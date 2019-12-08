<?php
    session_start();
    if($_SERVER['REQUEST_METHOD']==='POST'){
            $title = $_POST['title'];
            $oldslug = $_POST['oldslug'];
            $slug = $_POST['slug'];
            $tag = $_POST['tag'];            
            $category = $_POST['category'];            
            $content = $_POST['content'];
            $author = $_SESSION['username'];            
            $thumb_img = isset($_POST['thumb_img'])?basename($_FILES['thumb_img']['name']):null;
            $target_img = "thumbnail/".$thumb_img;
            if($thumb_img!=null){
                if(file_exists($target_img)==1){
                    $i = 1;
                    $duoifile = substr($thumb_img,strpos($thumb_img,'.')+1);
                    $tenfile = substr($thumb_img,0,strpos($thumb_img,'.')); 
                    while(file_exists($tenfile."_".$i)==1){
                        $i++;
                    }
                    $target_img = "thumbnail/".$tenfile."_".$i.".".$duoifile;
                }
            }

            if($title == '' || $slug == '' || $content == ''){
                header('location:index.php?action=edit&status=error');
            }else{     
                include_once('model/entity/post.php');
                if($thumb_img!=null){
                    move_uploaded_file($_FILES['thumb_img']['tmp_name'],$target_img);
                    if(Post::updatePost($title,$slug,$oldslug,$target_img,$content,$author,$category,$tag)){
                        header('location:index.php?action=edit&status=success');
                    }else{
                        header('location:index.php?action=edit&status=error');
                    }
                }else{
                    if(Post::updatePost($title,$slug,$oldslug,null,$content,$author,$category,$tag)){
                        header('location:index.php?action=edit&status=success');
                    }else{
                        header('location:index.php?action=edit&status=error');
                    }
                }            
            }             
    }else{
        header('location:index.php?action=add-post&status=error');
    }
?>