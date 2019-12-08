<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Preview</title>
</head>
<body>    
    
    <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = getdate();
            $time = $date['hours']."h".$date['minutes']." - ".$date['mday']."/".$date['mon']."/".$date['year'];

            $title = isset($_POST['title'])?$_POST['title']:'Tiêu đề';
            $author = isset($_POST['author'])?$_POST['author']:'Tác giả';
            echo "<h2>".$title."</h2>";
            echo "<hr>";
            echo "<p>Đăng bởi : ".$author." | lúc : ".$time."</p>";
            echo "<hr>";
            echo isset($_POST['content'])?$_POST['content']:'Dữ liệu rỗng';
        }else{
            echo 'Dữ liệu rỗng';
        }
    ?>
</body>
</html>