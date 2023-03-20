                <?php require 'header.php'; ?>
                <h1 class="h3 mb-2 text-gray-800"> Vikwatani/ Create Account</h1>
                <hr><hr>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-3 d-none d-lg-block "></div>
                            <div class="col-lg-7">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                        </div>
                                        <form class="user" action="config.php" method="post">

                                            <div class="form-group">
                                                <input type="text" pattern="[a-zA-Z ]*"  class="form-control form-control-user" id="exampleInputEmail"
                                                    placeholder="Full Name" name="name" required>
                                            </div>

                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                                    placeholder="Email Address" name="email" required>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" pattern="[a-zA-Z ]*" class="form-control form-control-user" id="exampleInputEmail"
                                                    placeholder="Specialties" name="specialties" required>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="password" class="form-control form-control-user"
                                                        id="exampleInputPassword" placeholder="Password" name="password" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="password" class="form-control form-control-user"
                                                        id="exampleRepeatPassword" placeholder="Repeat Password" name="c_password" required>
                                                </div>
                                            </div>
                                            <input type="submit" name="signup" class="btn btn-primary btn-user btn-block" placeholder="Register Account">
                                            <hr>
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="login.php">Already have an account? Login!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php require 'footer.php';?>
            </div>   
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