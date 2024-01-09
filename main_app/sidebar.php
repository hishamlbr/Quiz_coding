
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main jeux educatif</title>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
    <link rel="stylesheet" href="./style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<div id="nav-bar">
    <input id="nav-toggle" type="checkbox"/>
    <div id="nav-header">
        <a id="nav-title" href="index.php" >Code<i class='bx bxs-brain'></i>Brain</i></a>
        <label for="nav-toggle"><span id="nav-toggle-burger"></span></label>
        <hr/>
    </div>
    <div id="nav-content">
        <a class="nav-button" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a>
        <a class="nav-button" href="completed.php"><i class="fas fa-tasks"></i><span>tasks completed</span></a>
        <a href="current.php" class="nav-button"><i class="fas fa-clipboard-list"></i><span>current tasks</span></a>
        <hr/>
        <a class="nav-button" href="py.php"><i class="fab fa-python"></i><span> Python</span></a>
        <a class="nav-button" href="cpp.php"><i class='bx bxl-c-plus-plus' ></i><span>C++</span></a>
        <a class="nav-button" href="java.php"><i class="fab fa-java fa-lg"></i><span>JAVA</span></a>
        <a class="nav-button" href="web.php"><i class="fas fa-code"></i><span>WEB</span></a>
        <hr/>
        <a href="..\login\form.php" class="nav-button"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
        <div id="nav-content-highlight"></div>
    </div>
    <input id="nav-footer-toggle" type="checkbox"/>
    <div id="nav-footer">
        <div id="nav-footer-heading">
            <div id="nav-footer-avatar"><img src="https://gravatar.com/avatar/4474ca42d303761c2901fa819c4f2547"/></div>
            <?php
            
                echo '<div id="nav-footer-titlebox"><a id="nav-footer-title" href="#">' .  $_SESSION['username'] . '</a><span id="nav-footer-subtitle">User</span></div>';
            
            ?>
            <label for="nav-footer-toggle"><i class="fas fa-caret-up"></i></label>
        </div>
        <div id="nav-footer-content">
            <p>"Coding is the art of turning imagination into reality, one line of code at a time, where creativity meets precision."</p>
        </div>
    </div>
</div>

</body>
</html>