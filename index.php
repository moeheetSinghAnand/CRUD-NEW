<?php include 'dbconfig.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CRUD</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Sweet Alert Notification-->

</head>


<body>

    <div class="container mt-5">
        <section>
            <div class="row mb-4">
                <div class="col-12">
                    <div class="bg-dark p-3 text-white">
                        <h1 class="text-center">Crud Application</h1>
                    </div>
                </div>
            </div>
        </section>

        <div class="row mb-5">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Student Table</h2>
                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#myForm">
                        Add Student
                    </button>
                </div>
            </div>
        </div>

      <!-- Student tables -->
<div class="row">
    <div class="col">
        <table class="table table-hover table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Roll</th>
                    <th>Grade</th>
                    <th>Sex</th>
                    <th>Email</th>
                    <th>Hobbies</th>
                    <th>DOB</th>
                    <th>Picture</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM students";
                    $index = 0;
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ++$index;
                ?>
                    <tr>
                        <td><?php  echo $index; ?></td> 
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['grade']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['hobby']; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($row['dob'])); ?></td>
                        <td><img src="./image/<?php echo $row['student_picture']?>" alt="none" width="25px" height="25px"> </td>
                        <td>
                            <button class="btn btn-outline-info btn-sm me-2" data-bs-toggle="modal"
                                    data-bs-target="#viewbtn">
                                <i class="ri-eye-line"></i>
                            </button>
                            <!-- <button class="btn btn-outline-warning btn-sm me-2" data-bs-toggle="modal"
                                    data-bs-target="#editbtn"><i class="ri-edit-2-line"></i></button> -->
                                    <a href="editbtn.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-warning btn-sm me-2" >Edit</a>
                            <button class="btn btn-outline-danger btn-sm" onclick="deleteButton()">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </td>
                    </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
            </table>
         </div>
        </div>
        <!-- modals -->

        <!-- Add-Student-Modal -->
        <div class="modal fade" id="myForm" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Add Student</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form method="post" action="student_curd.php" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input class="form-control mb-3" type="text" placeholder="Name" id="studentName" name="name" required>
                            <input class="form-control mb-3" type="number" placeholder="Roll Number" id="studentRoll" name="id">
                            <input class="form-control mb-3" type="text" placeholder="Grade" id="studentGrade" name="grade">

                            <div class="mb-3">
                                <label class="form-label d-block">Gender </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="genderMale"
                                        value="Male" checked>
                                    <label class="form-check-label" for="genderMale">Male </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="genderFemale"
                                        value="Female">
                                    <label class="form-check-label" for="genderFemale">Female</label>
                                </div>

                            </div>

                            <input class="form-control mb-3" type="date" id="studentDOB" name="dob">
                            <input class="form-control mb-3" type="text" placeholder="email" id="studentName" name="email">

                            <label class="form-check-label" for="hobbies">Hobbies</label>
                            <div class="ms-3">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" value="Swimming" id="checkSwimming" name="hobby[]">
                                    <label class="form-check-label" for="checkSwimming"> Swimming</label>
                                </div>

                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" value="Dancing" id="checkDancing" name="hobby[]">
                                    <label class="form-check-label" for="checkDancing"> Dancing </label>
                                </div>

                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" value="Anime" id="checkAnime" name="hobby[]">
                                    <label class="form-check-label" for="checkAnime"> Anime</label>
                                </div>
                            </div>

                            <input class="form-control mb-3" type="file" placeholder="Name" id="studentPicture" name="picture">
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="submit" value="submit" name="submit">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- View-Student-Modal -->
        <div class="modal fade" id="viewbtn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Student Details</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body ">
                        <table class="table table-borderless fw-lighter">
                            <tr>
                                <th class="text-dark fw-light">Roll Number:</th>
                                <td class="fw-lighter">101</td>
                            </tr>

                            <tr>
                                <th class="text-dark fw-light">Name:</th>
                                <td class="fw-lighter">Mohit Anand</td>
                            </tr>

                            <tr>
                                <th class="text-dark fw-light">Grade</th>
                                <td class="fw-lighter">6</td>
                            </tr>

                            <tr>
                                <th class="text-dark fw-light">Gender</th>
                                <td class="fw-lighter">Male</td>
                            </tr>

                            <tr>
                                <th class="text-dark fw-light">DOB:</th>
                                <td class="fw-lighter">2001-05-17</td>
                            </tr>
                        </table>
                        <div class="text-center fs-3">
                            <i class="ri-printer-line"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!--               Edit Button                            -->
         <!--         -->

    </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function submitButton() {

            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Student has been added ',
                draggable: true
            });
        }

        function editButton() {
            Swal.fire({
                title: "Do you want to save the changes?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Save",
                denyButtonText: `Don't save`
            }).then((result) => {

                if (result.isConfirmed) {
                    Swal.fire("Saved!", "", "success");
                } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                }
            });
        }

        function deleteButton() {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "This record has been deleted",
                        icon: "success"
                    });
                }
            });
        }
    </script>

</body>

</html>