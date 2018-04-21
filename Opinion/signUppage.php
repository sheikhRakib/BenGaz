<?php
    session_start();
    require_once ("../commonCode.php");
    // initializing variables
    $username = "";
    $email    = "";
    $errors = array(); 

    // connect to the database

    // REGISTER USER
    if(isset($_POST['submit'])) {
        $db = DB_START();
        // receive all input values from the form
        $firstname = DataSanitize($_POST["firstname"]);
        $lastname = DataSanitize($_POST["lastname"]);
        $username = DataSanitize($_POST['username']);
        $DoB = DataSanitize($_POST["dob"]);
        $email = DataSanitize($_POST['email']);
        $gender = "";
        $gender = $_POST["gender"];
        $password_1 = DataSanitize($_POST['password_1']);
        $password_2 = DataSanitize($_POST['password_2']);

        // form validation: ensure that the form is correctly filled ...
        // by adding (array_push()) corresponding error unto $errors array
        if(empty($username) || empty($firstname) || empty($lastname) || empty($DoB) || 
          empty($email) || empty($gender) || empty($password_1) || empty($password_2)) {
            array_push($errors, "One/More Field Empty"); 
        }
        if($password_1 != $password_2) {
            array_push($errors, "Passwords do not match"); 
        }
        // first check the database to make sure 
        // a user does not already exist with the same username and/or email
        $user_check_query = "SELECT * FROM users WHERE userName='$username' OR email='$email'";
        
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        
        if($user) {
            if($user['userName'] == $username) {
                array_push($errors, "Username[ $username ] already exists");
            }
            if($user['email'] == $email) {
                array_push($errors, "$email already used");
            }
        }
        // Finally, register user if there are no errors in the form
        if(count($errors) == 0) {
            $password = md5($password_1);//encrypt the password before saving in the database
            $query = "INSERT INTO users(userName, password, firstName, lastName, gender, email, dateOfBirth, role, deleted_at) VALUES('$username','$password', '$firstname', '$lastname', '$gender', '$email', '$DoB', 'user', NULL)";
            mysqli_query($db, $query);
        	header('location: index.php');
        }
  DB_STOP($db);
}