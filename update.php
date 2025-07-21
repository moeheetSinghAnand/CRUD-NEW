<?php                                  
include "dbconfig.php";
if (isset($_POST['submit'])) {                       // It updates the values in the form
    $id = $_POST['id'];
    $name = $_POST['name'];
    $grade = $_POST['grade'];
    //$gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $hobby = $_POST['hobby'];
    $email = $_POST['email'];
    $hobbies = implode(",", $hobby);

    $filename = $_FILES["picture"]["name"];
    $tempname = $_FILES["picture"]["tmp_name"];
    $folder = "./image/" . $filename;

    $sql1 = "UPDATE `students` SET `name`='$name', `grade`= '$grade', `email`= '$email', `dob`= '$dob' where id='$id' ";
    $result = mysqli_query($conn, $sql1); 

    if ($result === TRUE){
     
        if ($filename != "") {
            $sql2 = "UPDATE `students` SET `student_picture` = '$folder' where id='$id' ";
            $result = mysqli_query($conn, $sql2); 
            move_uploaded_file($tempname, $folder);
            echo " Record updated successfully";
        }
    }
    else {
        echo "Error:" . $sql1 . "<br>" . $conn->error;
    } 
}
// get => not secure , it is visible on url
// post => secure 
?>