<?php include 'dbconfig.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Student</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">                                                            
         <?php  
            $sql3= "SELECT * FROM students where id=".$_GET['id']."";
            $query = mysqli_query($conn,$sql3);
            $count = mysqli_num_rows($query);

        ?> 

        <?php if($count > 0){
            
            $result = mysqli_fetch_assoc($query);
            ?>
        <!-- Form for editing student -->
         <div class="row justify-content-center">
            <div class="col-md-6">
                
                    <h2 class="mb-3 fw-bold text-center">Edit Student</h2>
                <form id="editForm" method="post" action="update.php">
                    <input type="hidden" name="id" value="<?= $_GET['id']?>"/>
                    <div class="mb-3">
                        <label for="studentName" class="form-label">Student Name</label>
                        <input class="form-control form-control-sm" type="text" placeholder="" name="name" id="studentName" value="<?= $result['name']?>">
                    </div>
                    <div class="mb-3">
                        <label for="studentRoll" class="form-label">Roll Number</label>
                        <input class="form-control form-control-sm" type="number"  placeholder="" name="roll" id="studentRoll" value="<?= $result['id']?>">
                    </div>

                    <div class="mb-3">
                        <label for="studentGrade" class="form-label">Grade</label>
                        <input class="form-control form-control-sm" type="text" name="grade" placeholder="" id="studentGrade" value="<?= $result['grade']?>">
                    </div>

                    <div class="mb-3">
                        <label for="studentEmail" class="form-label">email</label>
                        <input class="form-control form-control-sm" type="email" name="email" id="studentEmail" value="<?= $result['email']?>">
                    </div>

                    <div class="mb-3">
                              <?php if ($result['gender'] == 'Male' ) { ?>
                    
                        <label class="form-label d-block">Gender</label>
                        <div class="form-check form-check-inline">
                            
                            <input class="form-check-input" type="radio" name="gender[]" id="genderMale" value=""  <?= 'checked'; }  else{?>>
                            <label class="form-check-label" for="genderMale">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender[]" id="genderFemale" value="" <?= 'checked';} ?>>
                            <label class="form-check-label" for="genderFemale">Female</label>
                        </div>
                    </div>

                <label class="form-check-label" for="hobbies">Hobbies</label>

                <div class="ms-3">

                            <?php $hobbies = explode(",",$result['hobby']); if(count($hobbies) >0) { ?>           
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="Swimming" id="checkSwimming" name="hobby[]"  
                                <?php if (in_array("Swimming", $hobbies)){ echo 'checked'; } ?>>
                                <label class="form-check-label" for="checkSwimming"> Swimming</label>
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="Dancing" id="checkDancing" name="hobby[]" 
                                <?php if (in_array("Dancing", $hobbies)) { echo 'checked'; } ?>>
                                <label class="form-check-label" for="checkDancing"> Dancing </label>
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="Anime" id="checkAnime" name="hobby[]" 
                                <?php if (in_array("Anime", $hobbies)) { echo 'checked'; } ?>>
                                <label class="form-check-label" for="checkAnime"> Anime</label>
                            </div>

                            <?php } ?>
                            </div>


                    <div class="mb-3">
                        <label for="studentDOB" class="form-label">DOB</label>
                        <input class="form-control form-control-sm" type="date" id="studentDOB" name="dob" value="<?= $result['dob']?>">
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="me-2">
                            <input class="form-control"type="file" placeholder="" id="studentPicture" name="picture">
                        </div>
                        <div>
                            <img src="./image/<?= $result['student_picture'] ?>" alt="none" width="40px" height="40px" class="rounded">
                        </div>
                        
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <button class="btn btn-danger">Cancel</button>
                        <button class="btn btn-success" type="submit" name="submit">Submit</button>
                    </div>

                </form>
        </div>
    <?php }?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>






