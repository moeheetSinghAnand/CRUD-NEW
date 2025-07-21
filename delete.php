<?php
    include "dbconfig.php";
    if (isset($_GET['id'])) {
        
        $id =$_GET['id'];
        $delete ="DELETE FROM students WHERE id='$id' ";
        $result = mysqli_query($conn, $delete); 

        if ($result === TRUE){
            echo " Record Deleted successfully";
        } 

        else{
             echo "Error:" . $delete . "<br>" . $conn->error;
        }
}
    else{
        echo "NULL";
    }

?>