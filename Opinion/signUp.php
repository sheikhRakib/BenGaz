<?php
 include('signUppage.php')
 session_start()
?>

<DOCTYPE html>
<html>
<head>
    <title>Sign up Form</title>
    <link rel="stylesheet" type="text/css" href="signUp.css">
</head>

<body>
<h3 align="center"> Sign Up!! </h3>

<form action="index.php" method="post">
<table cellpadding = "30">

    <tr>
        <td>FIRST NAME</td>
        <td height="90"><input type="text" placeholder="Enter firstname (max 30 characters a-z and A-Z)" name="firstname" size="30" maxlength="30"/>
            
        </td>
    </tr>

    <tr>
        <td>LAST NAME</td>
        <td><input type="text" placeholder="Enter lastname (max 30 characters a-z and A-Z)" name="lastname" size="20" maxlength="30"/>
            
        </td>
    </tr>

    <tr>
        <td>DATE OF BIRTH</td>

        <td>
          <input type="date" placeholder="Enter birthday" name="dob">
        </td>
    </tr>

    <tr>
        <td>UserName</td>
        <td>
            <input type="text" placeholder="Enter username" name="username" size="20" required="" />

        </td>
    </tr>

    <tr>
        <td>EMAIL ID</td>
        <td><input type="email" placeholder="Enter email" name="email" size="20" maxlength="100" required/></td>
    </tr>

    <!--<tr>
        <td>MOBILE NUMBER</td>
        <td>
            <input type="number" placeholder="Enter number" name="phone" size="20" maxlength="11" required="" />
            (11 digit number)
        </td>
    </tr>-->

    <tr>
        <td>GENDER</td>
        <td>
            Male <input type="radio" name="gender" value="Male" />
            Female <input type="radio" name="gender" value="Female" />
        </td>
    </tr>

   
   
    <tr>
        <td>Password</td>
        <td>
            <input type="password" placeholder="Enter password" name="password_1" size="20" required="" />

        </td>
    </tr>

    <tr>
        <td> Repeat Password</td>
        <td>
            <input type="password" placeholder="Re enter password" name="password_2" size="20" required="" />

        </td>
    </tr>

    <!--<tr>
        <td>ADDRESS <br /><br /><br /></td>
        <td><textarea name="address" rows="6" cols="40"></textarea></td>
    </tr>-->

    <tr>
        <td colspan="2" align="center">
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </td>
    </tr>
        
</table>
</form>

<div>
  <h2>Bengal Gazette</h2>
  <p>Are you missing what’s important?</p>
  <p>Bengal Gazette is the place where you can know everything.</p>
  <p>Be a part of it!!</p>
  <p>Your Region. Your Paper.</p>
</div>

</body>
</html>