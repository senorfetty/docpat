                <?php require 'header.php';?>
                <h1 class="h3 mb-2 text-gray-800"> Vikwatani/ Book Appointment</h1>
                <hr><hr>
                <?php 

                    $id = $_GET['appointment_id'];
                    $_SESSION["appid"] =$id;

                    $sql = "SELECT * FROM appointments WHERE specialty ='".$_SESSION["Specialty"]."' AND appointment_id='".$id."'";
                
                    $result = $conn->query($sql);
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">

                        <?php
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $_SESSION["patient"] = $row['pEmail'];
                                ?>
                                    <div class="col-lg-6">
                                        <div class="card shadow mb-4">
                                            <div
                                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold text-primary"><?php echo "Patient's Name: ". $row["patient_name"]; ?></h6>
                                            </div>
                                            <!-- Card Body -->
                                            <div class="card-body">
                                                <p><b>Email: </b><?php echo $row["pEmail"]; ?></p>
                                                <p><b>Date: <?php echo $row["appo_date"];?>   Time: <?php echo $row["appo_slot"]?> </p>
                                            </div>
                                                <form class="user" action="config.php" method="post">
                                                    <div class="form-group">
                                                        <div class="col-sm-6">
                                                            <input type="submit" value="Schedule" name="schedule" class="btn btn-primary btn-user btn-block">
                                                        </div>
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <hr>
                                                        </div>
                                                    </div> 
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        ?>  
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php require 'footer.php'; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>