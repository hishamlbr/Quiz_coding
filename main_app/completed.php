<?php
    include "connection.php";
    include "sidebar.php";
   
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            
            justify-content: center;
            align-items: center;
            min-height: 98vh;
            margin: 0;
            gap: 20px;
            background-color: #f0f0f0;
        }
        
        h1{
            padding-left :20%; 
            padding-top:2%;
            color:#FF7D2C;
            font-size:36px;
        }
        .message {
            text-align: center;
            
            border: 1px solid #ccc;
            border-radius: 8px;
            background: linear-gradient(to right, #FF7D2C, #11CCF5);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px; /* Adjust as needed */
        }
        .message h1{
            
            padding-left :1%;
            color:#fff;
            
        }
        .cards-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: left;
            padding-left :20%;
            padding-top:3%;
           

        }

        .box {
            background: linear-gradient(to right, #FF7D2C, #11CCF5);
            border-radius: 20px;
            display: grid;
            grid-template-columns: 64px 1fr;
            position: relative;
            width: 350px;
        }

        .box-icon {
            display: grid;
            place-items: center;
            
        }

        .box-label {
            height: 64px;
            display: flex;
            align-items: center;
            padding-left: 16px;
            font-size: 17px;
            letter-spacing: 0.125em;
            color: #152B6B;
        }

        .box-title {
            white-space: nowrap;
            display: flex;
            align-items: center;
            writing-mode: vertical-rl;
            text-orientation: mixed;
            font-size: 24px;
            padding-top: 60px;
            color: #152B6B;
        }

        .box-image {
            width: 100%;
            height: 200px;
            border-radius: 18px 0 18px 0;
            overflow: hidden;
            padding-bottom: 20px;  
        }

        .box-image img {
            width: 100%;
            display: block;
           
        }

        .studio-button {
            position: absolute;
            bottom: 24px;
            right: 16px;
            display: flex;
            align-items: center;
            background: #FF7D2C;
            color: white;
            padding: 8px 10px;
            border-radius: 50px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.25);
            transition: 0.35s ease all;
            overflow: hidden;
            max-width: 22px;
        }

        .studio-button-icon {
            position: relative;
            top: 1px;
        }

        .studio-button-label {
            text-transform: uppercase;
            white-space: nowrap;
            padding: 0 8px;
            opacity: 0;
            transform: translateX(10px);
            transition: 0.25s ease all;
        }

        .studio-button-label a:hover {
            color: #152B6B;
            text-decoration: none;
        }

        .studio-button-label a {
            color: white;
            text-decoration: none;
        }

        .box:hover .studio-button {
            max-width: 100%;
        }

        .box:hover .studio-button-label {
            opacity: 1;
            transform: translateX(0);
            transition: 0.25s 0.1s ease-in opacity, 0.15s 0.1s cubic-bezier(.175, .885, .32, 1.275) transform;
        }
    </style>
    <script>
        function downloadCertificate(username) {
            // Make a fetch request to the PHP script
            fetch('addcertificat.php?username=' + username)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error generating certificate');
                    }
                    return response.blob();
                })
                .then(blob => {
                    // Create a temporary link to trigger the download
                    var link = document.createElement('a');
                    link.href = URL.createObjectURL(blob);
                    link.target = '_blank'; // Open in a new tab
                    link.download = 'certificate.png';
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                })
                .catch(error => {
                    console.error(error.message);
                });
        }
    </script>
</head>
<body>
<h1 >Your Certificates</h1>
<div class="cards-container">
    <?php
    // Assuming you have an array of certificates
    $certificates = [
        ['username' => 'user1', 'label' => 'Code Brain', 'title' => 'Python'],
        
        
    ];
    if ($_SESSION['pylevel']==3){
        foreach ($certificates as $certificate) {
            ?>
            <div class="box">
                <div class="box-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M19.864 8.465a3.505 3.505 0 0 0-3.03-4.449A3.005 3.005 0 0 0 14 2a2.98 2.98 0 0 0-2 .78A2.98 2.98 0 0 0 10 2c-1.301 0-2.41.831-2.825 2.015a3.505 3.505 0 0 0-3.039 4.45A4.028 4.028 0 0 0 2 12c0 1.075.428 2.086 1.172 2.832A4.067 4.067 0 0 0 3 16c0 1.957 1.412 3.59 3.306 3.934A3.515 3.515 0 0 0 9.5 22c.979 0 1.864-.407 2.5-1.059A3.484 3.484 0 0 0 14.5 22a3.51 3.51 0 0 0 3.19-2.06 4.006 4.006 0 0 0 3.138-5.108A4.003 4.003 0 0 0 22 12a4.028 4.028 0 0 0-2.136-3.535zM9.5 20c-.711 0-1.33-.504-1.47-1.198L7.818 18H7c-1.103 0-2-.897-2-2 0-.352.085-.682.253-.981l.456-.816-.784-.51A2.019 2.019 0 0 1 4 12c0-.977.723-1.824 1.682-1.972l1.693-.26-1.059-1.346a1.502 1.502 0 0 1 1.498-2.39L9 6.207V5a1 1 0 0 1 2 0v13.5c0 .827-.673 1.5-1.5 1.5zm9.575-6.308-.784.51.456.816c.168.3.253.63.253.982 0 1.103-.897 2-2.05 2h-.818l-.162.802A1.502 1.502 0 0 1 14.5 20c-.827 0-1.5-.673-1.5-1.5V5c0-.552.448-1 1-1s1 .448 1 1.05v1.207l1.186-.225a1.502 1.502 0 0 1 1.498 2.39l-1.059 1.347 1.693.26A2.002 2.002 0 0 1 20 12c0 .683-.346 1.315-.925 1.692z"></path></svg>
                </div>
                <div class="box-label"><?= $certificate['label'] ?></div>
                <div class="box-title"><?= $certificate['title'] ?></div>
                <div class="box-image">
                    <img src="certificate.png" alt="">
                </div>
                <div class="studio-button">
                    <div class="studio-button-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             style="fill: #152B6B;">
                            <path d="M19 9h-4V3H9v6H5l7 8zM4 19h16v2H4z"></path>
                        </svg>
                    </div>
                    <div class="studio-button-label">
                        <a href="#" onclick="downloadCertificate('<?= $certificate['username'] ?>')">Download Certificate</a>
                    </div>
                </div>
            </div>
            <?php
        } 
    }else {
        ?>
        <div class="message">
            <h1>You don't have any certificate  yet!</h1>
        </div>
    <?php
    }
    ?>
</body>

</html>
