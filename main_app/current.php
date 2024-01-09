<?php 
    session_start();
    $progpy=intval($_SESSION['pylevel']*100/3);
    $progcpp=intval($_SESSION['cpplevel']*100/3);
    $progjava=intval($_SESSION['javalevel']*100/3);
    $progweb=intval($_SESSION['weblevel']*100/3);

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Current tasks</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<style>
    @import url("https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700");
@import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
body {
  font-family: "Open Sans", sans-serif;
  height: 95vh;
  text-align: center;
}



.container {
 
  
  margin: 0 auto;
  
  height: 90vh;
  width: 1406px;
  position: relative;
  z-index: 100;
}


.main-content .app {
  display: flex;
  flex-direction: column;
}


.main-content .app .app-content {
  margin: 25px;
  margin-left: 180px;
  background: transparent;
  border-radius: 5px;
  height: 95vh;
  width: 160vh;
  
}
.main-content .app .app-content header {
  margin: 20px;
  display: flex;
  justify-content: space-between;
}
.main-content .app .app-content header .searchbox {
  display: flex;
  padding: 10px;
  margin-left: 80px;
  border: 1px solid #FF7D2C;
  border-radius: 5px;
  width: 200px;
}
.main-content .app .app-content header .searchbox .icon {
  color: #FF7D2C;
  margin: 0 5px;
}
.main-content .app .app-content header .searchbox input.search-text {
  border: none;
  background: inherit;
  font-size: 0.75em;
  font-weight: 600;
  outline: none;
  color: #FF7D2C;
}

.app-content header .app-list-options {
  display: flex;
  justify-items: center;
  align-items: center;
}
.app-content header .app-list-options .sort-dropdown {
  display: flex;
  border: 1px solid #FF7D2C;
  border-radius: 5px;
  padding: 12px;
  color: #FF7D2C;
  font-size: 0.75em;
  font-weight: 600;
}
.app-content header .app-list-options .sort-dropdown .by,
.app-content header .app-list-options .sort-dropdown i {
  color: #1e2026;
  margin-left: 5px;
}
.app-content header .app-list-options .sort-dropdown .drop {
  border-left: 1px solid #FF7D2C;
  margin-left: 10px;
}
.app-content header .app-list-options .icon {
  margin: 0 10px;
  padding: 10px;
  border-radius: 5px;
  box-shadow: 0px 1px 1px 1px rgba(181, 181, 181, 0.38);
  position: relative;
  color: #FF7D2C;
}
.app-content header .app-list-options .icon:first-child {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}
.app-content header .app-list-options .icon:last-child {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}
.app-content header .app-list-options .icon.selected {
  background: #FF7D2C;
  color: #11CCF5;
}
.app-content header .app-list-options .display-group {
  display: flex;
}
.app-content header .app-list-options .display-group .icon {
  margin-right: 0;
  margin-left: 0;
}

.projects {
  list-style: none;
  display: flex;
  flex-wrap: wrap;
  margin: 10px;
  padding-left: 140px;
  padding-bottom :50px;
  height: 550px;
  
}
.projects .project-item {
  padding: 16px;
  margin: 18px;
  box-sizing: border-box;
  display: flex;
  flex-direction: column;
  text-align: center;
  border:1px solid #FF7D2C;
  border-radius: 5px;
  box-shadow: 0px 1px 1px 1px rgba(181, 181, 181, 0.38);
  background: linear-gradient(to top, #11CCF5, #FF7D2C)
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  width: 285px;
}
.projects .project-item .logo-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.projects .project-item .logo-row img {
  border-radius: 8px;
  display: block;
  padding-left: 10px;
}
.projects .project-item .logo-row .icon {
  color: #FF7D2C;
}
.projects .project-item .title-row {
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  margin: 20px 0 10px;
}
.projects .project-item .title-row h3 {
  font-weight: bold;
}
.projects .project-item .title-row .links {
  display: flex;
  align-content: center;
  padding: 8px 0;
  color: rgb(221, 16, 16);
  font-size: 0.78em;
}
.projects .project-item .title-row .links .icon {
  margin-right: 5px;
}
.projects .project-item .title-row .links a {
  padding: auto;
  color: #FF7D2C;
  text-decoration: none;
  text-align: center;
}
.projects .project-item .title-row .links a:hover {
  padding: auto;
  color: rgb(48, 2, 255);
  text-decoration: none;
  text-align: center;
}
.projects .project-item .desc-row {
 
  color: #152B6B;
  font-size: 17px;
  font-weight: 500;
  line-height: 18px;
}
.projects .project-item .progress-row {
  display: flex;
  flex-direction: column;
  margin: 20px 0;
}
.projects .project-item .progress-row p.value-label {
  display: block;
}
.projects .project-item .progress-row p[data-value] {
  position: relative;
}
.projects .project-item .progress-row p[data-value]:after {
  content: attr(data-value) "%";
  color: white;
  font-size: 12px;
  position: absolute;
  display: block;
  right: -10px;
}
.projects .project-item .progress-row progress {
  display: block;
  position: relative;
  width: 100%;
  margin-top: 20px;
  height: 15px;
}
.projects .project-item .progress-row progress::-webkit-progress-bar {
  background-color: #d7dce0;
  border-radius: 5px;
}
.projects .project-item .progress-row ::-webkit-progress-value {
  background-color: #17c993;
  border-radius: 5px;
}
.projects .project-item .progress-row .low::-webkit-progress-value {
  background-color: #ec407a;
}
.projects .project-item .footer-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
 /* Button Styles */
 .btncontinue {
      display: inline-block;
      margin-top: 10px; /* Adjust as needed */
    }

    .btncontinue input[type="button"] {
      padding: 10px 20px;
      font-size: 16px;
      text-align: center;
      text-decoration: none;
      cursor: pointer;
      border: 2px solid #3498db; /* Border color */
      border-radius: 5px; /* Rounded corners */
      color: #3498db; /* Text color */
      background-color: #fff; /* Background color */
      transition: background-color 0.3s, color 0.3s; /* Transition effects */
    }

    /* Hover Styles */
    .btncontinue input[type="button"]:hover {
      background-color: #3498db; /* Change background color on hover */
      color: #fff; /* Change text color on hover */
    }
</style>
</head>
<body>


<div class="container">
	<div class="content">
    <!-- Sidebar  -->
    <?php include "sidebar.php";?>
		<section class="main-content">
			<div class="app">
				<section class="app-content">
					<header>
						<div class="searchbox">
							<div class="icon"> <i class="fa fa-search" aria-hidden="true"></i> </div>
							<input type="text" name="search" placeholder="Search a project" class="search-text"> </input>
						</div>

						<div class="app-list-options">
							<div class="sort-dropdown"> Sort by <span class="by"> Project progress </span> <i class="fa fa-sort-amount-desc" aria-hidden="true"></i>
								<div class="drop"> <i class="fa fa-caret-down" aria-hidden="true"></i> </div>
							</div>
							<div class="icon"> <i class="fa fa-filter" aria-hidden="true"></i> </div>
							<div class="display-group">
								<div class="icon"> <i class="fa fa-bars" aria-hidden="true"></i> </div>
								<div class="icon selected"> <i class="fa fa-th" aria-hidden="true"></i> </div>
							</div>
						</div>

					</header>

					<ul class="projects">
						<li class="project-item">
							<div class="logo-row"> <img src="assets//python.png" alt="Image 001" />
								<div class="icon"> <i class="fa fa-ellipsis-h icon" aria-hidden="true"></i> </div>
							</div>
							<div class="title-row">
								<h3> Python </h3>
								<br>
								<div class="desc-row">
									<p>Level <?php echo isset($_SESSION['pylevel'])?></p>
								</div>
								<div class="links"> <i class="fa fa-external-link icon" aria-hidden="true"></i> <a href="https://www.w3schools.com/python/">Learn Python</a> </div>
							</div>
							
							<div class="progress-row">
								<p class="value-label" style="width:<?php  echo $progpy ?>%" data-value="<?php  echo $progpy ?>"></p>
								<progress max="100" value="<?php  echo $progpy ?>" data-value="<?php  echo $progpy ?>"> <?php  echo $progpy ?>% </progress>
							</div>
              <a href="py.php">
              <div class="footer-row">
								<div class="btncontinue"><input type="button" value="Continue"></div>
							</div>
              </a>
							
						</li>
						<li class="project-item">
							<div class="logo-row"> <img src="assets//c++.png" alt="Image 001" />
								<div class="icon"> <i class="fa fa-ellipsis-h icon" aria-hidden="true"></i> </div>
							</div>
							<div class="title-row">
								<h3> C++ </h3>
								<br>
								<div class="desc-row">
                <p>Level <?php echo isset($_SESSION['cpplevel'])?></p>
								</div>
								<div class="links"> <i class="fa fa-external-link icon" aria-hidden="true"></i> <a href="https://www.w3schools.com/python/">Learn Python</a> </div>
							</div>
							
							<div class="progress-row">
								<p class="value-label" style="width:<?php  echo $progcpp ?>%" data-value="<?php  echo $progcpp ?>"></p>
								<progress max="100" value="<?php  echo $progcpp ?>" data-value="<?php  echo $progcpp ?>"> <?php  echo $progcpp ?>% </progress>
							</div>
              <a href="cpp.php">
              <div class="footer-row">
								<div class="btncontinue"><input type="button" value="Continue"></div>
							</div>
              </a>
							
						</li>
						<li class="project-item">
							<div class="logo-row"> <img src="assets//java.png" alt="Image 001" />
								<div class="icon"> <i class="fa fa-ellipsis-h icon" aria-hidden="true"></i> </div>
							</div>
							<div class="title-row">
								<h3> Java </h3>
								<br>
								<div class="desc-row">
                <p>Level <?php echo isset($_SESSION['javalevel'])?></p>
								</div>
								<div class="links"> <i class="fa fa-external-link icon" aria-hidden="true"></i> <a href="https://www.w3schools.com/python/">Learn Python</a> </div>
							</div>
							
							<div class="progress-row">
								<p class="value-label" style="width:<?php  echo $progjava ?>%" data-value="<?php  echo $progjava ?>"></p>
								<progress max="100" value="<?php  echo $progjava ?>" data-value="<?php  echo $progjava ?>"> <?php  echo $progpy ?>% </progress>
							</div>
							<a href="java.php">
              <div class="footer-row">
								<div class="btncontinue"><input type="button" value="Continue"></div>
							</div>
              </a>
						</li>
						<li class="project-item">
							<div class="logo-row"> <img src="assets//web.png" alt="Image 001" />
								<div class="icon"> <i class="fa fa-ellipsis-h icon" aria-hidden="true"></i> </div>
							</div>
							<div class="title-row">
								<h3> WEB </h3>
								<br>
								<div class="desc-row">
                <p>Level <?php echo isset($_SESSION['weblevel'])?></p>
								</div>
								<div class="links"> <i class="fa fa-external-link icon" aria-hidden="true"></i> <a href="https://www.w3schools.com/python/">Learn Python</a> </div>
							</div>
							
							<div class="progress-row">
								<p class="value-label" style="width:<?php  echo $progweb ?>%" data-value="<?php  echo $progweb ?>"></p>
								<progress max="100" value="<?php  echo $progweb ?>" data-value="<?php  echo $progweb ?>"> <?php  echo $progweb ?>% </progress>
							</div>
							<a href="web.php">
              <div class="footer-row">
								<div class="btncontinue"><input type="button" value="Continue"></div>
							</div>
              </a>
						</li>
					</ul>
				</section>
			</div>
		</section>
	</div>
</div>

  
</body>
</html>
