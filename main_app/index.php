<?php 
    session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coding Quiz</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 95vh;
            color: #333;
            position: relative;
        }

        header {
            text-align: center;
            margin-bottom: 40px;
            
            padding: 10px;
            
            position: absolute;
            top: 0;
            left: 0;
            width: 100%; /* Set width to 100% to span the entire viewport */
            box-sizing: border-box; /* Include padding and border in the total width */
        }

        header h1 {
            color: #FF7D2C;
        }

        header p {
            font-style: italic;
            color: #1b02ff;
        }

        .men {
            width: 50%;
            height: 95%;
            position: absolute;
            top: 15%;
            left: 25%;
        }
    </style>
</head>
<body>
    <!-- Sidebar  -->
    <?php include "sidebar.php";?>

    <header>
        <h1>Welcome to <span style="font-weight: bold;">Code Brain</span></h1>
        <p>Test your coding knowledge and enhance your skills. Get ready to dive into the world of coding!</p>
    </header>

    <img class="men" src="assets/bghome.png" alt="Coding">
</body>
</html>
