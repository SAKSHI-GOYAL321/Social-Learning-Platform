<?php
    session_start();
	$valid_extension = array('pdf','docx','xlxs','xlsm');
	$path = '../Uploaded_Resources/';
    include("connection.php");
    // echo isset($_POST['link']) . ", ";
    // echo !empty($_FILES['pdf_file']); ($_POST['link'] != "" 
    // echo "hello 1";

    if(( $_POST['link'] == "" && !empty($_FILES["pdf_file"]) ) || ($_POST['link'] != "" ) ){

        $subject=$_POST['cfield'];
		$topic=$_POST['topic'];
        $link = $_POST['link'];
		$author = $_SESSION['uname'];
        
        if($_POST['link'] != ""){
            $pathDB = NULL;
        }
        else
        {
            // echo "hello 2";
            $doc = $_FILES['pdf_file']['name'];
		    $tmp = $_FILES['pdf_file']['tmp_name'];
            $link = NULL;
            $ext = pathinfo($doc, PATHINFO_EXTENSION);
            if(in_array($ext, $valid_extension)){
                $path = '../Uploaded_Resources/'.basename($doc);
                $pathDB = 'Uploaded_Resources/'.basename($doc);
		    }
            echo $path;
            if(move_uploaded_file($tmp, $path)){
		    }
        }
        // echo "hello3";

        $query = $db->prepare('INSERT INTO resources(Subjects, Topic, Files,  Link, Author) VALUES (?,?,?,?,?)');
		$data=array($subject, $topic, $pathDB, $link, $author);
		$execute=$query->execute($data);
        // echo "hello 4";

        if($execute){
            echo 0;
        }
        else{
            echo 1;
        }
    }
    else{
        echo 2;
    }
?>