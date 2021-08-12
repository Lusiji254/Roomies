<?php

function upload_image(){
$picture = explode(".",$_FILES['inputPicture']['name']);
$new_name = rand().".".$picture[1];
$destination = './Images/' .$new_name;
move_uploaded_file($_FILES['inputPicture']['tmp_name'],$destination);
return $new_name;
}


?>