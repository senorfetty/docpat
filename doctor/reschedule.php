                <?php require 'header.php';?>
                <h1 class="h3 mb-2 text-gray-800"> Vikwatani/ Book Appointment</h1>
                <hr><hr>
                <?php 
                    $id = $_GET['appointment_id'];
                    $_SESSION["appid"] =$id;
                    $sql = "SELECT * FROM appointments WHERE appointment_id ='".$id."' AND appointment_id='".$id."'";
                    $result = $conn->query($sql);
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <?php
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $_SESSION["patient"] = $row['patient_email'];
                                ?>
                                    <div class="col-lg-6">
                                        <div class="card shadow mb-4">
                                            <div
                                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold text-primary"><?php echo "Patient's Name: ". $row["patient_name"]; ?></h6>
                                            </div>
                                            <!-- Card Body -->
                                            <div class="card-body">
                                                <p><b>Email: </b><?php echo $row["patient_email"]; ?></p>
                                                <p><b>Booked on: </b><?php echo $row["booking_time"]; ?></p>
                                                <p><b>Suggested Date: </b>From <?php echo $row["start_time"];?> To <?php echo $row["end_time"]?> </p>
                                            </div>
                                                <form class="user" action="config.php" method="post">
                                                    <div class="form-group">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <p><b>From:</b></p>
                                                        </div>
                                                        <?php 
                                                        date_default_timezone_set("Africa/Nairobi");?>
                                                        <div class="col-sm-6">
                                                            <input type="datetime-local" min="<?php echo date("Y-m-d")."T".date("h:i"); ?>" class="form-control form-control-user" name="start_time">
                                                        </div>
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <p><b>To:</b></p>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="datetime-local" min="<?php echo date("Y-m-d")."T".date("h:i"); ?>" class="form-control form-control-user" name="end_time">
                                                        </div>
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <hr>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="submit" value="Reschedule" name="reschedule" class="btn btn-primary btn-user btn-block">
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