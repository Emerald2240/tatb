<?php
require_once "config/connect.php";
require_once "functions/functions.php";

if (!isset($_SESSION['log'])) {
    gotoPage("login.php");
}

if (isset($_GET['edit'])) {
    $_SESSION['editpost'] = true;
    $_SESSION['editId'] = $_GET['id'];
    $_SESSION['editImage'] = $_GET['image'];
}

if (isset($_SESSION['editpost'])) {
    $datamissing = processNewPost($_POST, $_SESSION['editId']);
    //  print_r($datamissing);
    //  die;
} else {
    $datamissing = processNewPost($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>CREATE NEW POST TATB</title>
    <meta name="description" content="<?= 'Create new post on TATB' ?>">
    <!-- <meta property='og:title' content="TATB HOME"> -->
    <meta property='og:url' content="https://techac.net/tatb">
    <!-- <meta property='og:image' itemprop="image" content="https://techac.net/tatb/assets/images/mike.jpg"> -->
    <meta property='keywords' content="Tech Acoustic, TA, TATB, Tech Blog, Tech, Science, Computers">
    <!-- <meta property='og:locale' content="">
	<meta property='og:type' content=""> -->

    <?php
    require_once('includes/head.php');
    ?>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/ckeditor/ckeditor.js"></script>

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
                        <h1 class="h3 mb-0 text-gray-800">New Post</h1>
                    </div>


                    <main>

                        <div class="centered p-4">
                            <?php
                            showDataMissing($datamissing);
                            ?>
                            <!--  -->
                            <!-- "functions/test.php" <?= $_SERVER['PHP_SELF'] ?>-->
                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="mb-5">
                                    <label for="title">Blog Title</label>
                                    <input type="text" name="title" id="title" class="container" required <?php
                                                                                                            if (isset($_GET['edit']) && $_GET['edit'] == 1) {
                                                                                                                echo 'value="';
                                                                                                                echo $_GET['title'];
                                                                                                                echo '"';
                                                                                                            }
                                                                                                            ?>>
                                </div>


                                <div class="">
                                    <label for="bp">Blog Post</label>
                                    <!-- <div id="editor" class="edit"></div>
        <input type="text" name="rbp" id="editor" class="invisible"> -->
                                    <p>To add code to the text or change classes, just click source after your done and submit. if you undo source before submitting, the changes you make will be removed</p>
                                    <textarea name="bp" id="editor">
                                        <?php if (isset($_GET['edit']) && $_GET['edit'] == 1) {
                                            adminLoadBlogPost($_GET['id']);
                                        } ?>
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('editor', {
                                            //filebrowserBrowseUrl: 'browse.php?type=Files',
                                            //filebrowserUploadUrl: 'upload.php?type=Files'
                                        });
                                        // var editor = CKEDITOR.replace('ckfinder');
                                        // CKFINDER.setupCKEDITOR(editor);
                                    </script>
                                </div>

                                <div class="mb-5 mt-5">
                                    <label for="bi">Blog Image</label>
                                    <input type="file" name="bi" id="image" class="container" required>
                                </div>

                                <div class="mb-5">
                                    <label for="tag">Blog Post Tags(Place semicolon after each one)</label>
                                    <input require type="text" name="tag" id="tag" class="container" <?php
                                                                                                        if (isset($_GET['edit']) && $_GET['edit'] == 1) {
                                                                                                            echo 'value="';
                                                                                                            echo $_GET['tags'];
                                                                                                            echo '"';
                                                                                                        }
                                                                                                        ?>>
                                </div>

                                <!-- <a href="" onclick="showMissingItems()" class="btn btn-danger btn-user btn-block invisible">Process</a> -->
                                <button type="submit" class="btn btn-primary btn-user btn-block" id="submit" name="submit">Submit</button>
                                <!-- <input type="submit" name="Submit" class="btn btn-primary btn-user btn-block"> -->
                            </form>

                        </div>

                    </main>


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
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins
    <script src="vendor/chart.js/Chart.min.js"></script>

    Page level custom scripts
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script> -->

    <!-- ck editor includes -->
    <!-- <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                //toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(err => {
                console.error(err.stack);
            });
    </script> -->
    <script src="functions/functions.js"></script>

</body>