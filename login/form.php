<!DOCTYPE html>
<html>
    <head> 
        <meta charset="UTF-8">
        <title> Formulaire Inscription</title>
        <link rel="stylesheet" type="text/css" href="cssform.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        
    </head>
    <?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'login_register_db';

if (isset($_POST)){
    $conn = new mysqli($server, $username, $password, $database);
    #$conn->connect_error====$conn.connect_error(class et method en PHP)
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    


    if (isset($_POST['login'])) {

        $email = $_POST['email'];
        $password = md5($_POST['password']);
    
        $sql = "SELECT * FROM `tbl_user` WHERE `email`='$email' AND `password`='$password'";
        $result = mysqli_query($conn, $sql);
    
        if (empty($_POST['email']) && empty($_POST['password'])) {
            echo "<script>alert('Please Fill Email and Password');</script>";
            exit;
        } elseif (empty($_POST['password'])) {
            echo "<script>alert('Please Fill Password');</script>";
            exit;
        } elseif (empty($_POST['email'])) {
            echo "<script>alert('Please Fill Email);</script>";
            exit;
        } else {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
                $username = $row['username'];
                $email = $row['email'];
                $password = $row['password'];
                $pylevel = $row['pylevel'];
                $cpplevel = $row['cpplevel'];
                $javalevel = $row['javalevel'];
                $weblevel = $row['weblevel'];
    
    
                if ($email == $row['email'] && $password == $row['password']) {
                    session_start();
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    $_SESSION['pylevel'] = $pylevel;
                    $_SESSION['cpplevel'] = $cpplevel;
                    $_SESSION['javalevel'] = $javalevel;
                    $_SESSION['weblevel'] = $weblevel;
                    header("Location: ../main_app/index.php");
                    exit();
                }
            } else {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                echo '<script>alert("Invalid Email and Password");</script>';
               
                exit;
            }
            
            }
        }
    
    }



    if(isset($_POST['register']))
    {
        $username=$_POST['username'];
        $email=$_POST['email'];
        $pass=md5($_POST['password']);
        
        // Check if the email already exists
        $check_query = "SELECT * FROM `tbl_user` WHERE email = '$email'";
        $result = $conn->query($check_query);
        if ($result->num_rows > 0) {
            // Username already exists
            echo "<script>alert('Invalid Email ');</script>";
            

        }else{
            $sql   ="INSERT INTO `tbl_user`(`username`, `email`, `password`, `pylevel`, `cpplevel`, `javalevel`, `weblevel`) VALUES ('$username','$email','$pass',0,0,0,0)"; 
            $result=mysqli_query($conn,$sql);
            echo"<script>alert('New User Register Success');</script>";   
        }


       
    
    }

    
?>

<body>
    <div class="wrapper">
        <span class="bg-animate"></span>
        <span class="bg-animate2"></span>
        
        <div class="form-box login">
            <h2 class="animation" style="--i:0; --j:21;">Login</h2>
            <form action="form.php" method="post">
                <div class="input-box animation" style="--i:1; --j:22;">
                    <input name="email" type="email" required>
                    <label> Email </label>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box animation" style="--i:2; --j:23;">
                    <input name="password" type="password" required>
                    <label> Password</label>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" name="login"  class="btn animation" style="--i:3; --j:24;">Login</button>
                <div class="logreg-link animation" style="--i:4; --j:25;">
                    <p> Don't have an account ? 
                        <a href="#" class="register-link">Sign Up</a></p>
                </div>
            </form>
        </div>
        <div class="info-text login">
            <h2 class="animation" style="--i:0; --j:20;"> Welcome Back !</h2>
            <p class="animation" style="--i:1; --j:21;">Continue Your Adventure Of Coding Now !<br> Good Luck</p>
        </div>
            <!--Register--javascript-->
        <div class="form-box register">
            <h2 class="animation" style="--i:17; --j:0;">Sign Up</h2>
            <form action="form.php" method="post">
                <div class="input-box animation" style="--i:18;--j:1;">
                    <input name="username" type="text" required>
                    <label> Username</label>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box animation" style="--i:19; --j:2;">
                    <input type="email" name="email" required>
                    <label> Email</label>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box animation" style="--i:20; --j:3;">
                    <input type="password" name="password" required>
                    <label> Password</label>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" name="register" class="btn animation" style="--i:21; --j:4;">Sign Up</button>
                <div class="logreg-link animation" style="--i:22; --j:5;">
                    <p> Already have an account ? 
                    <a href="#" class="login-link">Login</a></p>
                </div>
            </form>
        </div>
        <div class="info-text register">
            <h2 class="animation" style="--i:17; --j:0;"> Welcome</h2>
        <p class="animation" style="--i:18; --j:1;">Are You Ready To Start  New Adventure With Us ?<br>Let's Do It !</p>
        </div>
    </div>

    <script src="script.js"></script>
    
</body>
</html>