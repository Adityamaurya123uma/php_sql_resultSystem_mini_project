<!DOCTYPE html>
<html>

<head>
    <title>Document</title>
</head>

<body>
    <?php
    include 'configure.php';
    ?>
    <div class="container">
        <form method="get">
            <span>Name : <input type="text" name="uname" value=""></span>
            <br>
            <br>
            <span>Password : <input type="text" name="upassword" value=""></span>
            <br>
            <br>
            <input type="submit" name="submit" value="Login">
        </form>
    </div>
    <?php
    error_reporting();
    $username = $_GET['uname'];
    $password = $_GET['upassword'];
    session_start();

    $_SESSION['admin_name']=$username;
 
    if (isset($_GET['submit'])) {
        $query = "SELECT * from student_main WHERE admin_name = '$username'";
        $count = mysqli_query($con, $query);
        $total  = mysqli_num_rows($count);
        if($total==0){
            echo "<script>alert('Invalid username and password')</script>";
            ?>
            <script type="text/javascript">
                window.location("loginAdmin.php");
            </script>
            <?php
        }else{
            $ql="select * from admin_main";
            $qur=mysqli_query($con,$ql);
            while($data=mysqli_fetch_array($qur)){
                if(($username==$data['admin_name']) && ($password==$data['admin_password'])){
                    header('location:index.php');
                }
            }
            echo"<script>alert('Invalid username and password')</script>";
        }

        }
    ?>
</body>

</html>