<?php
session_start();
include('connection.php');
$valid_extension = array('jpeg','jpg','png','PNG','JPG','JPEG','jfif','JFIF','svg');
$content=$_POST['content'];
$id=$_POST['club_id'];
$email=$_SESSION['email'];
$path = '../img/club_discussion images/';
if(!empty($_FILES["img"]))
{

    $img = $_FILES['img']['name'];
    $tmp = $_FILES['img']['tmp_name'];
    $ext = pathinfo($img, PATHINFO_EXTENSION); 

    if(in_array($ext, $valid_extension)){
        $path = $path.strtolower($img);
    }
    if(move_uploaded_file($tmp, $path)){

    }
        // $path='./img/club_discussion images/';
        $query = $db->prepare('INSERT INTO clubdiscussion(club_id,description,email,image) VALUES (?,?,?,?)');
        $data=array($club_id,$content,$email,$path);
        $execute=$query->execute($data);
        
        if($execute)
        {
            echo 0;
        }
        else
        {
            echo 1;
        }
    }	
else
{
    $query = $db->prepare('INSERT INTO clubdiscussion(club_id,description,email) VALUES (?,?,?)');
    $data=array($club_id,$content,$email);
    $execute=$query->execute($data);
    if($execute)
    {
        echo 0;
    }
    else
    {
        echo 1;
    }
    
}


?>