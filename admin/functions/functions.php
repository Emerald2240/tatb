<?php
//This starts a session for the entire project
session_start();

//This takes me to any page i want
function gotoPage($location)
{
    header('location:' . $location);
    exit();
}

//This cleans any data i'm accepting. Removing security vulnerabilities and bugs
function Sanitize($data, $case = null)
{
    //This function cleanses and arranges the data about to be stored. like freeing it from any impurities like sql injection
    $result = htmlentities($data, ENT_QUOTES);
    if ($case == 'lower') {
        $result = strtoupper($result);
    } elseif ($case == 'none') {
        //leave it as it is
    } else {
        $result = strtoupper($result);
    }
    return $result;
}

//Look into this function later. it has an unresolved issue.
function processQandA($formstream)
{
    global $db;
    extract($formstream);

    if (isset($submit)) {
        $data_missing = [];

        //the next 5 lines of code are useless and shouldnt be here. especially considering the data is directly added into the database
        if (empty($jsonta)) {
            $data_missing['Q_and_A'] = "Missing questions and answer box";
        } else {
            $jsonta = trim($jsonta);
            //$jsonta = utf8_encode($jsonta), ENT_QUOTES);
        }

        //This simply adds the filtered and cleansed data into the database (questions and answers)

        $sql = "INSERT INTO q_and_a(course_id, 	admin_id, 	year,  	num_questions, 	questions_and_answers, 	lecturers, 	obj_thr, 	time, instructions  ) VALUES ('$course_id', '$admin_id', '$year', '$number_of_questions', '$jsonta', '$lecturers', '$obj_or_theory', '$duration_in_minutes', '$instructions')";

        if (mysqli_query($db, $sql)) {

            //echo "Exam Saved";
            // echo '<p class="text-success">';
            // echo "Course Saved";
            // echo '</p>';
            header("location:courses.php");
        } else {
            // echo  "<br>" . "Error: " . "<br>" . mysqli_error($db);
        }
        mysqli_close($db);
    } else {
        //header("location:new_exam.php");
    }
}

function processNewPost($formstream)
{
    //This function processes what user data is being stored and checks if they are accurate or entered at all.
    //It also helps in confirming if what the user entered is Okay, like someone entering two different things in the password and confirm password box
    extract($formstream);

    if (isset($submit)) {

        $data_missing = [];

        if (empty($title)) {
            $data_missing['bt'] = "Missing blog title";
        } else {
            $title = trim(Sanitize($title));
        }

        if (empty($bp)) {
            $data_missing['bp'] = "Missing blog post";
        } else {
            $bp = htmlentities($bp, ENT_QUOTES);
        }

        //image adding section
        if (empty($_FILES['bi']['name'])) {
            $data_missing['image'] = "Missing Blog Image";
        } else {
            $uniqueimagename = time() . uniqid(rand());

            $target = "../images/" . $uniqueimagename;
            $allowtypes = array('jpg', 'png', 'jpeg', 'gif', 'svg');


            if (!is_dir("../images")) {
                mkdir("../images", 0755);
            }

            // $filename = "";
            // $tmpfilename = "";

            // $filename =  $_FILES['image']['tmp_name'];

$tmpfilename = basename($_FILES['image']['name']);
        }

        if (empty($data_missing)) {
            //$_SESSION['rege'] = "true";
            //AddRegistered($firstname, $lastname, $phone, $email, $username, $password, $job, $twitter, $facebook,  $linkedin, $instagram, $uniqueimagename);
           // AddRegistered($firstname, $lastname, $phone, $email, $password);
            // header('location:login.php');
            // exit;
            // echo '<br>';
            // echo("Everything entered Succesfully");
            // echo '<br>';


                $filetype = pathinfo($tmpfilename, PATHINFO_EXTENSION);
                if (in_array($filetype, $allowtypes)) {

                    //upload file to server
                    if (move_uploaded_file($filename, $target . "." . $filetype)) {

                    } else {
                        echo '<br>';
                        echo 'Something went wrong with the image upload';
                    }
                }
            } else {
                //  echo "<pre>";
                // print_r($data_missing);
                foreach ($data_missing as $miss) {
                    echo '<p class="">';
                    echo "$miss";
                    echo '</p>';
                }
                // echo"</pre>";
                return false;
            }
        } else {
            // foreach ($data_missing as $miss) {
            //     echo '<p class="danger">';
            //     echo "$miss";
            //     echo '</p>';
            // }
            return $data_missing;
        }
    }
}

function aassadsadfsafdsadsaedsadasdasd($formstream)
{
    //This function processes what user data is being stored and checks if they are accurate or entered at all.
    //It also helps in confirming if what the user entered is Okay, like someone entering two different things in the password and confirm password box
    extract($formstream);

    if (isset($submit)) {

        $data_missing = [];

        if (empty($firstname)) {
            $data_missing['fname'] = "Missing First Name";
        } else {
            $firstname = trim(Sanitize($firstname));
        }

        if (empty($lastname)) {
            $data_missing['lname'] = "Missing Last Name";
        } else {
            $lastname = trim(Sanitize($lastname));
        }

        if (empty($email)) {
            $data_missing['email'] = "Missing email Address";
        } else {
            $email = trim(Sanitize($email));
            if (!validateMailAddress($email)) {
                $data_missing['email'] = "Email already exists";
            }
        }

        if (empty($phone)) {
            $data_missing['phone'] = "Phone Number";
        } else {
            $phone = trim(Sanitize($phone));
        }

        if (empty($password)) {
            $data_missing['pass'] = "Missing Password";
        } else {
            $password = trim(Sanitize($password));
        }

        if (empty($password1)) {
            $data_missing['confpass'] = "Missing Confirm Password";
        } else {
            $password1 = trim(Sanitize($password1));
            if ($password != $password1) {
                $data_missing['confpass'] = "Password Mismatch";
            } else {
                // $password1 = trim(Sanitize($password1));
                $password = sha1($password);
            }
        }

        //   //image adding section
        //   if(empty( $_FILES['image']['name'])){
        //     $data_missing['image'] = "Missing Image";
        //   }else{
        //   $uniqueimagename =time().uniqid(rand());

        //   $target = "../images/" . $uniqueimagename;
        //   $allowtypes = array('jpg', 'png', 'jpeg', 'gif', 'svg');


        //   if (!is_dir("../images")) {
        //       mkdir("../images", 0755);
        //   }

        //   $filename = "";
        //   $tmpfilename = "";

        //       $filename =  $_FILES['image']['tmp_name'];

        //       $tmpfilename = basename( $_FILES['image']['name']);
        // }

        if (empty($data_missing)) {
            // $_SESSION['rege'] = "true";
            // AddRegistered($firstname, $lastname, $phone, $email, $username, $password, $job, $twitter, $facebook,  $linkedin, $instagram, $uniqueimagename);
            AddRegistered($firstname, $lastname, $phone, $email, $password);
            header('location:login.php');
            exit;
            //echo '<br>';
            // echo("Everything entered Succesfully");
            //echo '<br>';


            //     $filetype = pathinfo($tmpfilename, PATHINFO_EXTENSION);
            //     if (in_array($filetype, $allowtypes)) {

            //         //upload file to server
            //         if (move_uploaded_file($filename, $target . "." . $filetype)) {

            //         } else {
            //             echo '<br>';
            //             echo 'Something went wrong with the image upload';
            //         }
            //     }
            // } else {
            //     //  echo "<pre>";
            //     // print_r($data_missing);
            //     foreach ($data_missing as $miss) {
            //         echo '<p class="">';
            //         echo "$miss";
            //         echo '</p>';
            //     }
            //     // echo"</pre>";
            //     return false;
            // }
        } else {
            // foreach ($data_missing as $miss) {
            //     echo '<p class="danger">';
            //     echo "$miss";
            //     echo '</p>';
            // }
            return $data_missing;
        }
    }
}
