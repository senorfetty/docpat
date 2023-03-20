                <?php require 'header.php';?>

                    <h1 class="h3 mb-2 text-gray-800"> Vikwatani/ Appointments</h1>
                    <hr><hr>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Total Appointments</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                    <?php 
                                        $sql = "SELECT * FROM appointments";
                                        $result = $conn->query($sql);
                                    ?>
                                    <thead>
                                        <tr>
                                            <th>Appointment ID</th>
                                            <th>Patient's Email</th>
                                            <th>Specialty</th>
                                            <th>Appointment Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Appointment ID</th>
                                            <th>Patient's Email</th>
                                            <th>Specialty</th>
                                            <th>Appointment Date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row["appointment_id"]; ?></td>
                                                        <td><?php echo $row["pEmail"]; ?></td>
                                                        <td><?php echo $row["specialty"]; ?></td>
                                                        <td><b>Date:</b> <?php echo $row["appo_date"];?> <b>  Time:</b> <?php echo $row["appo_slot"]?></td>
                                                    </tr>
                                                <?php
                                            }
                                        } 
                                        else {
                                              echo "0 results";
                                        }
                                    ?>  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

            <?php require 'footer.php';?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>


