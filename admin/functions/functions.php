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

function processNewPost($formstream, $editId = null)
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

        if (empty($tag)) {
            $data_missing['tag'] = "Missing blog tags";
        } else {
            $tag = trim(Sanitize($tag));
        }

        //image adding section
        if (empty($_FILES['bi']['name'])) {
            $data_missing['image'] = "Missing blog Image";
        } else {
            //creates a unique string to help avoid a situation of files having the same name
            $uniqueimagename = time() . uniqid(rand());

            //stores the target folder name in a variable
            $target = "blog_images/" . $uniqueimagename;
            $allowtypes = array('jpg', 'png', 'jpeg', 'gif', 'svg');

            //if the folder doesn't exist, create it.
            if (!is_dir("blog_images")) {
                mkdir("blog_images", 0755);
            }

            $filename = "";
            $tmpfilename = "";


            $filename =  $_FILES['bi']['tmp_name'];

            $tmpfilename = basename($_FILES['bi']['name']);
            $filetype = pathinfo($tmpfilename, PATHINFO_EXTENSION);
            if (in_array($filetype, $allowtypes)) {

                //upload file to server
                if (move_uploaded_file($filename, $target . "." . $filetype)) {
                    $imagename = $uniqueimagename . "." . $filetype;
                    $minread = floor(strlen($bp) / 200);

                    if ($minread < 1) {
                        $minread  = 1;
                    }
        }  else {
            echo '<br>';
            echo 'Something went wrong with the image upload';
            $data_missing['image'] = "Missing blog Image";
        }

    } else {
        $data_missing['image'] = "Invalid file type";
    }

    }

        if (empty($data_missing)) {
           
                    if (isset($editId)) {
                        
                        EditPost($editId, $title, $bp, $tag, $imagename, $minread);
                        $_SESSION['editpost'] = null;
                    } else {
                        AddPost($title, $bp, $tag, $imagename, $minread);
                        //echo $minread;
                        // die;
                    }
              
                  }  else {
            return $data_missing;
        }
    }
}

function AddPost($title, $bp, $tag, $imagename, $minread)
{
    //This simply adds the filtered and cleansed data into the database 
    global $db;
    $sql = "INSERT INTO posts(title, 	blog_post, 	imagename,	minread, 	tags 	) VALUES ('$title', '$bp', '$imagename', '$minread', '$tag')";

    if (mysqli_query($db, $sql)) {
        //$_SESSION['postJustAdded'] = 1;
        gotoPage("posts.php");
    } else {
        //echo  "<br>" . "Error: " . "<br>" . mysqli_error($db);
    }
    mysqli_close($db);
}

function EditPost($id, $title, $bp, $tag, $imagename, $minread)
{
    //This simply adds the filtered and cleansed data that is edited into the database 
    global $db;
    $sql = "UPDATE `posts` SET `title` = '$title', `blog_post` = '$bp', `imagename` = '$imagename', `minread` = '$minread', `tags` = '$tag' WHERE `posts`.`id` = $id ";
    //$sql = "INSERT INTO posts(title, 	blog_post, 	imagename,	minread, 	tags 	) VALUES ('$title', '$bp', '$imagename', '$minread', '$tag')";

    if (mysqli_query($db, $sql)) {
        //$_SESSION['postJustAdded'] = 1;
        $_SESSION['editpost'] = null;
        gotoPage("posts.php");
    } else {
        echo  "<br>" . "Error: " . "<br>" . mysqli_error($db);
    }
    mysqli_close($db);
}

function showDataMissing($data_missing)
{
    //this function checks if the datamissing array passed in is empty. if it isnt it prints out all of its contents. if it is empty nothing happens
    if (isset($data_missing)) {
        foreach ($data_missing as $miss) {
            echo '<p class="text-danger">';
            echo $miss;
            echo '</p>';
        }
        // } else {
        //     echo '<p class="text-success">';
        //     echo "Success";
        //     echo '</p>';
    }
}

function loadPosts()
{
    //This loads up all the posts available and fills their links/options with the required items so they can be worked on and used to get more data on that particular course
    global $db;
    // $user = $_SESSION['username'];
    // if (!empty($user)) {
    $query = "SELECT id, 	title, 	blog_post, 	imagename, 	datecreated, 	dateupdated, 	minread, 	tags  FROM posts ORDER BY `id` DESC ";
    $response = @mysqli_query($db, $query);
    if ($response) {
        while ($row = mysqli_fetch_array($response)) {
            //code===========================
            echo '<tr><td>';
            echo $row['id'];
            $checker = $row['id'];
            echo '</td>';

            //title============================
            echo  '<td>';
            //echo '<a href="course_detail.php?id=';
            //echo $row['id'];
            //echo '&coursename=';
            //echo ucwords(strtolower($row['title']));


            //echo '"> ';
            echo ucwords(strtoupper($row['title']));
            //echo '</a>';
            echo '</td>';

            //post
            echo '<td>';
            echo ucwords(strtolower($row['blog_post']));
            echo '</td>';

            //image
            echo '<td>';
            echo $row['imagename'];
            echo '</td>';

            //datecreated
            echo '<td>';
            echo $row['datecreated'];
            echo '</td>';

            //dateupdated
            echo '<td>';
            echo $row['dateupdated'];
            echo '</td>';

            //minread
            echo '<td>';
            echo $row['minread'];
            echo '</td>';

            //edit
            echo '<td>';
            echo '<a href="newpost.php?id=';
            echo $row['id'];
            echo '&title=';
            echo ucwords(strtolower($row['title']));
            // echo '&post=';
            // echo ucwords(strtolower($row['blog_post']));
            // echo '&image=';
            // echo ucwords(strtolower($row['imagename']));
            // echo '&created=';
            // echo ucwords(strtolower($row['datecreated']));
            // echo '&updated=';
            // echo ucwords(strtolower($row['dateupdated']));
            echo '&tags=';
            echo ucwords(strtoupper($row['tags']));
            // echo '&minread=';
            // echo ucwords(strtoupper($row['minread']));
            echo '&edit=1';

            echo '">';
            echo '<i class="fa fa-edit"></i></a></td>';

            //delete
            echo '<td><a href="deletepost.php?id=';
            echo $row['id'];
            echo '"';
            echo '><i class="fa fa-trash"></i></a></td>';

            echo '</tr>';
        }
        if (empty($checker)) {
            echo 'No Courses Added Yet';
        }
    }
    //}
}

function loadBlogPost($id)
{
    global $db;
    // $user = $_SESSION['username'];
    // if (!empty($user)) {
    $query = "SELECT blog_post FROM posts  WHERE posts.id = '$id' ";
    $response = @mysqli_query($db, $query);
    if ($response) {
        while ($row = mysqli_fetch_array($response)) {
            //blog posts===========================
            echo $row['blog_post'];
        }
    }
}

function deletePost($id)
{
    global $db;

    //This sql statement deletes the course with the mentioned id
    $sql = "DELETE FROM `posts`  WHERE posts.id = '$id' ";
    if (mysqli_query($db, $sql)) {

        //echo "Course Saved";
        //echo '<p class="text-success">';
        //echo "Course deleted";
        //echo '</p>';
        gotoPage('posts.php');
    } else {
        // echo  "<br>" . "Error: " . "<br>" . mysqli_error($db);
    }
    mysqli_close($db);
}












































































// function aassadsadfsafdsadsaedsadasdasd($formstream)
// {
//     //This function processes what user data is being stored and checks if they are accurate or entered at all.
//     //It also helps in confirming if what the user entered is Okay, like someone entering two different things in the password and confirm password box
//     extract($formstream);

//     if (isset($submit)) {

//         $data_missing = [];

//         if (empty($firstname)) {
//             $data_missing['fname'] = "Missing First Name";
//         } else {
//             $firstname = trim(Sanitize($firstname));
//         }

//         if (empty($lastname)) {
//             $data_missing['lname'] = "Missing Last Name";
//         } else {
//             $lastname = trim(Sanitize($lastname));
//         }

//         if (empty($email)) {
//             $data_missing['email'] = "Missing email Address";
//         } else {
//             $email = trim(Sanitize($email));
//             if (!validateMailAddress($email)) {
//                 $data_missing['email'] = "Email already exists";
//             }
//         }

//         if (empty($phone)) {
//             $data_missing['phone'] = "Phone Number";
//         } else {
//             $phone = trim(Sanitize($phone));
//         }

//         if (empty($password)) {
//             $data_missing['pass'] = "Missing Password";
//         } else {
//             $password = trim(Sanitize($password));
//         }

//         if (empty($password1)) {
//             $data_missing['confpass'] = "Missing Confirm Password";
//         } else {
//             $password1 = trim(Sanitize($password1));
//             if ($password != $password1) {
//                 $data_missing['confpass'] = "Password Mismatch";
//             } else {
//                 // $password1 = trim(Sanitize($password1));
//                 $password = sha1($password);
//             }
//         }

//         //   //image adding section
//         //   if(empty( $_FILES['image']['name'])){
//         //     $data_missing['image'] = "Missing Image";
//         //   }else{
//         //   $uniqueimagename =time().uniqid(rand());

//         //   $target = "../images/" . $uniqueimagename;
//         //   $allowtypes = array('jpg', 'png', 'jpeg', 'gif', 'svg');


//         //   if (!is_dir("../images")) {
//         //       mkdir("../images", 0755);
//         //   }

//         //   $filename = "";
//         //   $tmpfilename = "";

//         //       $filename =  $_FILES['image']['tmp_name'];

//         //       $tmpfilename = basename( $_FILES['image']['name']);
//         // }

//         if (empty($data_missing)) {
//             // $_SESSION['rege'] = "true";
//             // AddRegistered($firstname, $lastname, $phone, $email, $username, $password, $job, $twitter, $facebook,  $linkedin, $instagram, $uniqueimagename);
//             AddRegistered($firstname, $lastname, $phone, $email, $password);
//             header('location:login.php');
//             exit;
//             //echo '<br>';
//             // echo("Everything entered Succesfully");
//             //echo '<br>';


//             //     $filetype = pathinfo($tmpfilename, PATHINFO_EXTENSION);
//             //     if (in_array($filetype, $allowtypes)) {

//             //         //upload file to server
//             //         if (move_uploaded_file($filename, $target . "." . $filetype)) {

//             //         } else {
//             //             echo '<br>';
//             //             echo 'Something went wrong with the image upload';
//             //         }
//             //     }
//             // } else {
//             //     //  echo "<pre>";
//             //     // print_r($data_missing);
//             //     foreach ($data_missing as $miss) {
//             //         echo '<p class="">';
//             //         echo "$miss";
//             //         echo '</p>';
//             //     }
//             //     // echo"</pre>";
//             //     return false;
//             // }
//         } else {
//             // foreach ($data_missing as $miss) {
//             //     echo '<p class="danger">';
//             //     echo "$miss";
//             //     echo '</p>';
//             // }
//             return $data_missing;
//         }
//     }
// }
