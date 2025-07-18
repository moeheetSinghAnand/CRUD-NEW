<?php
include "dbconfig.php";
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $grade = $_POST['grade'];
    $gender = $_POST['gender[]'];
    $dob = $_POST['dob'];
    $hobby = $_POST['hobby'];
    $email = $_POST['email'];
    $roll = $_POST['roll'];
    $hobbies = implode(",", $hobby);

    // $filename = $_FILES["picture"]["name"];
    // $tempname = $_FILES["picture"]["tmp_name"];
    // $folder = "./image/" . $filename;
    // $date = date('Y-m-d');
    $sql1 = "UPDATE `students` SET `name`='$name', `grade`= '$grade', `email`= '$email', `id`= '$roll'  where id='$id' ";
    $result = mysqli_query($conn, $sql1); 

    if ($result === TRUE){
        echo " Record updated successfully";
        // if ($filename != "") {
        //     move_uploaded_file($tempname, $folder);
        // }
    } 
    
    else {
        echo "Error:" . $sql1 . "<br>" . $conn->error;
    } 
}
// get => not secure , it is visible on url
// post => secure 
?>