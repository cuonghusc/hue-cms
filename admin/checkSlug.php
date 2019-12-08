<?php
    if(isset($_GET['temp_slug'])){
        include_once('model/entity/slug.php');
        $oldslug = $_GET['temp_slug'];
        $sl = Slug::checkSlug($_GET['temp_slug']);
        if($sl == true){
            print_r($oldslug);
        }else{     
            $i = 1;       
            while(Slug::checkSlug($oldslug."-".$i)==false){
                $i++;                 
            }
            print_r($oldslug."-".$i);
        }
    }
?>