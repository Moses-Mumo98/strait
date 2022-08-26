<?php

$valid_extensions = array('jpeg','jpg','png',); // valid extensions
$path = 'uploads/'; // upload directory
if($_POST['request']==1){
 if(!empty($_FILES['user_image']))
{
$img = $_FILES['user_image']['name'];
$tmp = $_FILES['user_image']['tmp_name'];
// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
// can upload same image using rand function
$user_image = rand(1000,1000000).$img;
// check's valid format
if(in_array($ext, $valid_extensions)) 
{ 
$path = $path.strtolower($user_image); 
if(move_uploaded_file($tmp,$path)) 
{
echo "<img src='$path'/>";
//$user_image = $_POST['user_image'];
//$email = $_POST['email'];
//include database configuration file
//include_once 'func.php';
//insert form data in the database
//$insert = $db->query("INSERT tbl_users (user_image) VALUES ('".$user_image."')");
//echo $insert?'ok':'err';
}
} 
else 
{
echo 'invalid';
}
}
}else{

    echo 'Invalid Request';
}





	