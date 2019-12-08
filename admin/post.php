<?php
    session_start();
    if($_SERVER['REQUEST_METHOD']==='POST'){
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $title = $_POST['title'];
            $slug = $_POST['slug'];
            $time_post = date('d-m-Y');
            $tag = $_POST['tag'];
            $thumb_img = basename($_FILES['thumb_img']['name']);
            $category = $_POST['category'];
            $target_img = "thumbnail/".$thumb_img;
            $content = $_POST['content'];
            $author = $_SESSION['username'];
            if(file_exists($target_img)==1){
                $i = 1;
                $duoifile = substr($thumb_img,strpos($thumb_img,'.')+1);
                $tenfile = substr($thumb_img,0,strpos($thumb_img,'.')); 
                while(file_exists($tenfile."_".$i)==1){
                    $i++;
                }
                $target_img = "thumbnail/".$tenfile."_".$i.".".$duoifile;
            }
            
            //echo $target_img;

            if($title == '' || $slug == '' || $thumb_img == '' || $content == ''){
                header('location:index.php?action=add-post&status=error');
            }else{                
                move_uploaded_file($_FILES['thumb_img']['tmp_name'],$target_img);
                include_once('model/entity/post.php');
                if(Post::insertPost($title,$slug,$target_img,$content,$author,$time_post,$category,$tag)){
                    header('location:index.php?action=add-post&status=success');
                }else{
                    header('location:index.php?action=add-post&status=error');
                }
            }             
    }else{
        header('location:index.php?action=add-post&status=error');
    }
?>