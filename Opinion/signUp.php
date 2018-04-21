<?php
 require_once('signUppage.php');
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="../IMG/IconLogo.png">
    <title>Sign up</title>
    <link rel="stylesheet" type="text/css" href="../CSS/signUp.css">
</head>

<body>
    <div class="slogan">
        <h2>Bengal Gazette</h2>
        <p>Are you missing what’s important?</p>
        <p>Bengal Gazette is the place where you can know everything.</p>
        <p>Be a part of it!!</p>
        <p>Your Region. Your Paper.</p>
    </div>
    <div class="form">
        <h3>Sign Up!!!</h3>
        <hr>
        <?php  include ("errors.php");?>
        <form action="signUp.php" method="post">
            <table>
                <tr>
                    <td class="lbl">FIRST NAME</td>
                    <td><input type="text" placeholder="Enter Firstname" name="firstname" size="30" maxlength="30"/></td>
                </tr>
                <tr>
                    <td class="lbl">LAST NAME</td>
                    <td><input type="text" placeholder="Enter Lastname" name="lastname" size="20" maxlength="30"/></td>
                </tr>
                <tr>
                    <td class="lbl">User Name</td>
                    <td><input type="text" placeholder="Enter Username" name="username" size="20" required/></td>
                </tr>
                <tr>
                    <td class="lbl">DATE OF BIRTH</td>
                    <td><input type="date" name="dob"></td>
                </tr>
                <tr><td class="lbl">EMAIL</td>
                    <td><input type="email" placeholder="Enter email" name="email" size="20" maxlength="100" required/></td>
                </tr>

                <tr>
                    <td class="lbl">GENDER</td>
                    <td>
                        Male <input type="radio" name="gender" value="male" checked />
                        Female <input type="radio" name="gender" value="female" />
                    </td>
                </tr>
                <tr>
                    <td class="lbl">Password</td>
                    <td><input type="password" placeholder="Enter Password" name="password_1" size="20" required/></td>
                </tr>
                <tr>
                    <td class="lbl">Repeat Password</td>
                    <td><input type="password" placeholder="Re-enter Password" name="password_2" size="20" required/></td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        <input type="reset" value="Reset" name="reset">
                        <input type="submit" value="Submit" name="submit">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>