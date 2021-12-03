<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

include 'configure.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $department = mysqli_real_escape_string($con, $_POST['Course']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $photo = mysqli_real_escape_string($con, $_POST['photo']);
    $status = mysqli_real_escape_string($con, $_POST['status']);


    //checking of repeatation of eamil
    $emailquery = "select * from admin_main where admin_email='$email'";
    $query = mysqli_query($con, $emailquery);
    //returns the number of rows having the same email id as entered above
    $emailcount = mysqli_num_rows($query);

    if ($emailcount > 0) {
        ?>
                    <script>
                        alert("Email already Exist");
                    </script>
                <?php
    } else {
        if ($emailcount === 0) {
            $insertquery = "insert into admin_main(admin_name,admin_department,admin_email,admin_contact,admin_password,admin_photo,admin_status) values ('$name','$department','$email','$mobile','$password','$photo','$status')";

            $iquery = mysqli_query($con, $insertquery);
            if ($con) {
?>
                <script>
                    alert("Regsitered Successful");
                    window.location.href = index.php;
                </script>
            <?php
            
            } else {
            ?>
                <script>
                    alert("Registration Unsuccessful");
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert("Password are not Matching");
            </script>
<?php
        }
    }
}

?>


<div class="heading">
    <h1>Student Registration and Result Generation System</h1>
</div>
<form action="" name="StudentRegistration" method="POST" onSubmit="return(validate());">
    <table cellpadding="2" width="20%" align="center" cellspacing="2">
        <tr>
            <td colspan=2>
                <center>
                    <font size=4><b>Registration Form</b></font>
                </center>
            </td>
        </tr>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <td>Department</td>
            <td><select name="Course">
                    <option value="-1" selected>select..</option>
                    <option value="B.Tech">B.TECH</option>
                    <option value="MCA">MCA</option>
                    <option value="MBA">MBA</option>
                    <option value="BCA">BCA</option>
                </select></td>
        </tr>
        <tr>
            <td>EmailId</td>
            <td><input type="text" name="email" id="emailid"></td>
        </tr>
        <tr>
            <td>MobileNo</td>
            <td><input type="text" name="mobile" id="mobileno"></td>
        </tr>

        <tr>
            <td>Password</td>
            <td><input type="text" name="password" id="password"></td>
        </tr>
        <tr>
            <td>Photo :</td>
            <td><input type="file" name="photo" id="photo"></td>
        </tr>
        <tr>
            <td>Status</td>
            <td><select name="status">
                    <option value="-1" selected>select..</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select></td>
        </tr>
        <tr>
            <td><button>
                    <input type="submit" name="submit" value="Register">
                </button></td>
        </tr>
    </table>
</form>
<table cellpadding="2" width="20%" align="center" cellspacing="2" border="2">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Password</th>
            <th>Status</th>
        </tr>
        <?php

        include "configure.php"; // Using database connection file here

        $records = mysqli_query($con, "select * from admin_main"); // fetch data from database

        while ($data = mysqli_fetch_array($records)) {
        ?>
            <tr>
                <td><?php echo $data['admin_id']; ?></td>
                <td><?php echo $data['admin_name']; ?></td>
                <td><?php echo $data['admin_department']; ?></td>
                <td><?php echo $data['admin_email']; ?></td>
                <td><?php echo $data['admin_contact']; ?></td>
                <td><?php echo $data['admin_password']; ?></td>
                <td><?php echo $data['admin_status']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>
