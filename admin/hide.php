<?php
session_start();
    if(isset($_SERVER['REQUEST_METHOD'])){
        $id = $_POST['id'];
        $username = $_SESSION['username'];
        $status = $_POST['status'];
        include_once('model/entity/post.php');
        if(Post::hideShow($id,$username,$status)==true){
            echo 'ok';
        }else{
            echo 'error';
        };
    }
?>