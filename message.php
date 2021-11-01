<?php
require_once "admin/config/connect.php";
require_once "admin/functions/functions.php";
//addCount($_GET['id']);
//$created = getPostDate($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php getMessageInfo($_GET['id']) ?></title>
    <meta name="description" content="<?= 'TATB Message' ?>">
    <!-- <meta property='og:url' content="<?= 'https://techac.net/tatb/post.php' . '?id=' . $_GET['id'] . '&title=' . $_GET['title'] ?>;"> -->
    <!-- <meta property='og:image' itemprop="image" content="https://techac.net/tatb/blog_image/<?= getPostImage($_GET['id']) ?>"> -->
    <!-- <meta property='keywords' content="<?php //loadKeywords($_GET['id']) ?>"> -->
    <!-- <meta property='og:locale' content="">
	<meta property='og:type' content=""> -->

    <?php
    require_once('includes/head.php');

    ?>
    <style>
        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>


</head>



<body>

    <header class="header text-center">
        <?php
        require_once('includes/sideprofilebar.php')
        ?>
    </header>


    <div class="main-wrapper">

        <div class="container text-center m-5">
            <!-- Trigger/Open The Modal -->
            <button id="myBtn">Open Modal</button>

            <!-- The Modal -->
            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <p>Some text in the Modal..</p>
                </div>

            </div>
            <h1>
                <?php getMessageInfo($_GET['id']) ?>
            </h1>
        </div>

        <!-- <footer class="footer text-center py-2 theme-bg-dark">
            <?php
            //require_once('includes/footer.php');
            ?>
        </footer> -->

    </div>
    <!--//main-wrapper-->


    <!-- Javascript -->
    <?php
    require_once('includes/js.php');
    ?>
    <!-- Page Specific JS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.14.2/highlight.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/blog.js"></script>

    <?php
    //require_once('includes/styleswitch.php')
    ?>
    <script id="dsq-count-scr" src="//techac-net-tatb.disqus.com/count.js" async></script>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>