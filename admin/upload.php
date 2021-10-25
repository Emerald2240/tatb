
<?php  //image adding section
if (!isset($_FILES['upload']['tmp_name'])) {
    echo 'no image found';
    //echo "<script>console.log('working');</script>";
} else {
    // $function_number = $_GET['CKEditorFuncNum'];
    $function_number = "<script type='text/javascript'>getUrlParam('CKEditorFuncNum');</script>";


    $tmpfilename =  $_FILES['upload']['tmp_name'];
    $filename = ($_FILES['upload']['name']);
    $allowtypes = array('jpg', 'png', 'jpeg', 'gif', 'svg');
    $filetype = pathinfo($filename, PATHINFO_EXTENSION);

    //creates a unique string to help avoid a situation of files having the same name
    $uniqueimagename = time() . uniqid(rand());

    //stores the target folder name in a variable
    $target = "../assets/images" . $uniqueimagename;
    chmod('../assets/images', 0777);

    //if the folder doesn't exist, create it.
    if (!is_dir("../assets/images")) {
        mkdir("../assets/images", 0755);
    }

    // $filename = "";
    // $tmpfilename = "";

    if (in_array($filetype, $allowtypes)) {

        //upload file to server
        if (move_uploaded_file($tmpfilename, $target . "." . $filetype)) {

            $imagename = $uniqueimagename . "." . $filetype;
            $function_number = $_GET['CKEditorFuncNum'];
            $url = 'blog_images/' . $imagename;
            $message = '';
            $function_number = 4;

            echo  "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
        } else {
            echo '<br>';
            echo 'Something went wrong with the image upload';
            //$datamissing['image'] = "Missing blog Image";
        }
    } else {
        //$datamissing['image'] = "Invalid file type";
        echo 'Invalid file type';
    }
}
?>

