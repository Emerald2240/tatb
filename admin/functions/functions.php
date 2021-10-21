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

function processNewPost($formstream, $editId = null)
{
    //This function processes what user data is being stored and checks if they are accurate or entered at all.
    //It also helps in confirming if what the user entered is Okay, like someone entering two different things in the password and confirm password box
    extract($formstream);

    if (isset($submit)) {

        $datamissing = [];

        if (empty($title)) {
            $datamissing['bt'] = "Missing blog title";
        } else {
            $title = trim(Sanitize($title));
        }

        if (empty($bp)) {
            $datamissing['bp'] = "Missing blog post";
        } else {
            $bp = htmlentities($bp, ENT_QUOTES);
        }

        if (empty($tag)) {
            $datamissing['tag'] = "Missing blog tags";
        } else {
            $tag = trim(Sanitize($tag));
        }

        //image adding section
        if (empty($_FILES['bi']['name'])) {
            $datamissing['image'] = "Missing blog Image";
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
                } else {
                    echo '<br>';
                    echo 'Something went wrong with the image upload';
                    $datamissing['image'] = "Missing blog Image";
                }
            } else {
                $datamissing['image'] = "Invalid file type";
            }
        }

        if (empty($datamissing)) {

            if (isset($editId)) {
                unlink("blog_images/" . $_SESSION['editImage']);
                EditPost($editId, $title, $bp, $tag, $imagename, $minread);
                $_SESSION['editpost'] = null;
            } else {
                AddPost($title, $bp, $tag, $imagename, $minread);
                //echo $minread;
                // die;
            }
        } else {
            return $datamissing;
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

function showDataMissing($datamissing)
{
    //this function checks if the datamissing array passed in is empty. if it isnt it prints out all of its contents. if it is empty nothing happens
    if (isset($datamissing)) {
        foreach ($datamissing as $miss) {
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
            $string = substr($row['title'], 0, 25) . "...";
            echo ucwords(strtolower($string));
            //echo '</a>';
            echo '</td>';

            //post
            echo '<td>';
            $string = substr($row['blog_post'], 0, 25) . "...";
            echo $string;
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
            echo '&image=';
            echo ucwords(strtolower($row['imagename']));
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
            echo 'No Posts Added Yet';
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

function validateMailAddress($email)
{
    global $db;
    $sql = "SELECT * FROM `admins` WHERE `email`='$email'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        $result = $result->fetch_assoc();
        if ($email == isset($result['email'])) {
            return false;
        } else {
            return true;
        }
    } else {
        return true;
    }
}

function processNewAdmin($formstream, $editId = null)
{
    //This function processes what user data is being stored and checks if they are accurate or entered at all.
    //It also helps in confirming if what the user entered is Okay, like someone entering two different things in the password and confirm password box
    extract($formstream);

    if (isset($submit)) {

        $datamissing = [];

        //firstname
        if (empty($firstname)) {
            $datamissing['firstname'] = "Missing First Name";
        } else {
            $firstname = trim(Sanitize($firstname));
        }

        //lastname
        if (empty($lastname)) {
            $datamissing['lastname'] = "Missing Last Name";
        } else {
            $lastname = trim(Sanitize($lastname));
        }

        //facebook
        if (empty($facebook)) {
            $datamissing['facebook'] = "Missing facebook profile page";
        } else {
            $facebook = trim(Sanitize($facebook));
        }

        //twitter
        if (empty($twitter)) {
            $datamissing['twitter'] = "Missing twitter page";
        } else {
            $twitter = trim(Sanitize($twitter));
        }

        //instagram
        if (empty($instagram)) {
            $datamissing['instagram'] = "Missing instagram page";
        } else {
            $instagram = trim(Sanitize($instagram));
        }

        //linkedin
        if (empty($linkedin)) {
            $datamissing['linkedin'] = "Missing Linkedin page";
        } else {
            $linkedin = trim(Sanitize($linkedin));
        }

        //email address
        if (empty($email)) {
            $datamissing['email'] = "Missing email Address";
        } else {
            $email = trim(Sanitize($email));
            if (!validateMailAddress($email)) {
                $datamissing['email'] = "Email already exists";
            }
        }
        //phone number
        // if (empty($phone)) {
        //     $datamissing['phone'] = "Phone Number";
        // } else {
        //     $phone = trim(Sanitize($phone));
        // }


        if (empty($password)) {
            $datamissing['password'] = "Missing Password";
        } else {
            $password = trim(Sanitize($password));
        }

        if (empty($password1)) {
            $datamissing['confpass'] = "Missing Confirm Password";
        } else {
            $password1 = trim(Sanitize($password1));
            if ($password != $password1) {
                $datamissing['confpass'] = "Password Mismatch";
            } else {
                // $password1 = trim(Sanitize($password1));
                $password = sha1($password);
            }
        }

        if (empty($datamissing)) {

            AddRegistered($firstname, $lastname, $email, $password, $facebook, $twitter, $linkedin, $instagram);
        } else {
            return $datamissing;
        }
    }
}

function AddRegistered($fname, $lname, $em, $pass, $facebook, $twitter, $linkedin, $instagram)
{
    //This simply adds the filtered and cleansed data into the database 
    global $db;
    $sql = "INSERT INTO admins(  	firstname, 	lastname,	email, 	password, 	facebook, 	twitter, 	linkedin, 	instagram 	) VALUES ('$fname', '$lname', '$em', '$pass', '$facebook', '$twitter', '$linkedin', '$instagram')";

    if (mysqli_query($db, $sql)) {
        $_SESSION['registered'] = "true";
        gotoPage("login.php");
        //echo "New record created successfully";
    } else {
        //echo  "<br>" . "Error: " . "<br>" . mysqli_error($db);
    }
    mysqli_close($db);
}

function processLogin($formstream)
{
    //This simply queries the database to see if the users data is really available then sets the users data to a session to show theyve logged in
    extract($formstream);
    global $db;


    if (isset($submit)) {
        // username and password sent from form 

        $myusername = Sanitize($email);
        $mypassword = trim(Sanitize($password));
        $mypassword = sha1($mypassword);

        $result = mysqli_query($db, "SELECT * FROM admins WHERE email ='$myusername' AND password = '$mypassword'      ");

        if (mysqli_num_rows($result) > 0 && mysqli_num_rows($result) == 1) {
            $result = $result->fetch_assoc();

            $_SESSION['username'] = ucwords(strtolower($result['firstname'])) . " " . ucwords(strtolower($result['lastname']));
            $_SESSION['firstname'] = $result['firstname'];
            $_SESSION['lastname'] = $result['lastname'];
            $_SESSION['admin_id'] = $result['id'];

            //$_SESSION['datejoined'] = $result['datejoined'];
            $_SESSION['email'] = $result['email'];
            //$_SESSION['phone'] = $result['phone'];
            // $_SESSION['profilepic'] = $result['profilepic'];

            $_SESSION['log'] = "true";


            //print_r($formstream);
            //die;

            //This is the line of code for saving cookies AKA remember me

            // if (isset($remember)) {
                if ($remember == true) {
                    //die;
                setcookie("mem_mail",  $_SESSION['email'], time() + (10 * 365 * 24 * 60 * 60));
                setcookie("mem_pass", $password, time() + (10 * 365 * 24 * 60 * 60));
                setcookie("mem_sele",  $_SESSION['admin_id'], time() + (10 * 365 * 24 * 60 * 60));
            } else {
                if (isset($_COOKIE['mem_log'])) {
                    setcookie('mem_log', '');
                }
            }

            setcookie("mem_mail",  $_SESSION['email'], time() + (10 * 365 * 24 * 60 * 60));

            // echo "<pre>";
            // print_r($_COOKIE);
            // die;

            // echo "<br>";
            // echo 'Logged In';
            // echo "<pre>";
            // print_r($result);
            gotoPage('index.php');
        } else {

            //     echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            //     <strong>Holy guacamole!</strong> Your username or password are incorrect.
            //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //       <span aria-hidden="true">&times;</span>
            //     </button>
            //   </div>';
            $datamissing['login_error'] = 'Your email or password are incorrect.';
            return $datamissing;
        }
    }
}
