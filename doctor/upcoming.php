                <?php require 'header.php';?>
                <h1 class="h3 mb-2 text-gray-800"> Vikwatani/ My Schedule</h1>
                <hr><hr>
                <?php
                    if (!isset($_SESSION["DEmail"])) 
                    {
                         ?>
                         <div class="container-fluid">
                             <h1 style="color: red"><?php echo "Please login for you to view your Schedule!";?></h1>
                         </div>
                         <?php
                     }
                     else{ 
                        $sql = "SELECT * FROM appointments WHERE taken_by ='".$_SESSION["DEmail"]."'";
                        $result = $conn->query($sql);
                        ?>
                        <!-- Begin Page Content -->
                        <div class="container-fluid">
                            <div class="row">
                                <?php 
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            ?>
                                                <div class="col-lg-6">
                                                    <div class="card shadow mb-4">
                                                        <div
                                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                            <h6 class="m-0 font-weight-bold text-primary">Patient's Name: <?php echo $row["patient_name"]; ?></h6>
                                                            <div class="dropdown no-arrow">
                                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                                    aria-labelledby="dropdownMenuLink">
                                                                    <div class="dropdown-header">Actions</div>
                                                                    <a class="dropdown-item" value="<?php echo $row['appointment_id']; ?>" name="patient_id" href="served.php?appointment_id=<?php echo $row['appointment_id']; ?>">Mark As Served</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <div class="dropdown-divider"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <!-- Card Body -->
                                                    <div class="card-body">
                                                        <p><b>Email: </b><?php echo $row["pEmail"]; ?></p>
                                                        <p><b>Date: </b> <?php echo $row["appo_date"];?></p> 
                                                            <p><b>Time: </b> <?php echo $row["appo_slot"]?></p>
                                                        <p><b>Doctor's Spectialty: </b><?php echo $row["specialty"]; ?></p>
                                                    </div>  
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    } 
                                    else {
                                          echo "<h1 style='color: green'>You have no Scheduled Appointments!</h1>";
                                    }
                                ?>  
                            </div>

                        </div>
                    <?php 
                }?>
            </div>
            <?php require 'footer.php';?>
        </div>
    </div>

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