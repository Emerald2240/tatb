
<?php
require_once "config/connect.php";
require_once "functions/functions.php";

if (!isset($_SESSION['log'])) {
    //header('location:login.php');
    //exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once('includes/head.php');
    ?>


</head>

<body id="page-top">
 

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        require_once('includes/sidebar.php');
        ?>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                require_once('includes/topbar.php');
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Posts</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="container-fluid">
                            <!-- DataTables Example -->
                            <div class="card shadow mb-4">
                                <!-- <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                                </div> -->
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Course Code</th>
                                                    <th>Course Title</th>
                                                    <th>Faculty</th>
                                                    <th>Level</th>
                                                    <th>Credit</th>
                                                    <th>Semester</th>
                                                    <th>Edit</th>
                                                    <th>New Exam</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Course Code</th>
                                                    <th>Course Title</th>
                                                    <th>Faculty</th>
                                                    <th>Level</th>
                                                    <th>Edit</th>
                                                    <th>Credit</th>
                                                    <th>Semester</th>
                                                    <th>New Exam</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <tr>
                                                    <td>CHE485</td>
                                                    <td><a href="course_detail.php?id=63&coursename=Chemical Technology"> CHEMICAL TECHNOLOGY</a></td>
                                                    <td>Enigneering</td>
                                                    <td>400</td>
                                                    <td>2</td>
                                                    <td>1</td>
                                                    <td><a href="edit_course.php?id=63&coursename=Chemical Technology&creditload=2&faculty=Enigneering&level=4&semester=1&code=CHE485&edit=1"><i class="fa fa-edit"></i></a></td>
                                                    <td><a href="new_exam.php?id=63&coursename=Chemical Technology"><i class="fa fa-plus"></i></a></td>
                                                    <td><a href="delete_course.php?id=63"><i class="fa fa-trash"></i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            require_once('includes/footer.php');
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php
    require_once('includes/logout_modal.php');
    ?>

   

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- DataTable plugins -->
    <!-- <script src="js/jquery.js"></script> -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
    
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>