<?php
 include "connection.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Dashboard</title>
    
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;500;600&display=swap');

    :root {
        --main-color: #22BAA0;
        --color-dark: #005eff;
        --text-grey: #002fff;
    }

    * {
        margin: 0;
        padding: 0;
        text-decoration: none;
        list-style-type: none;
        box-sizing: border-box;
        font-family: 'Merriweather', sans-serif;
    }

    body {
        margin: 0;
        padding: 0;
    }

    .main-content {
        margin-left: 280px;
        margin-top: -55px;
        width: calc(100% - 290px);
        transition: margin-left 300ms;
    }

    main {
        margin-top: 70px;
    }

    .page-header,
    .page-content {
        padding: 1rem 1rem;
    }

    .page-header h1,
    .page-header small {
        color: #f32020;
    }

    .analytics {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
        margin-top: .5rem;
        margin-bottom: 2rem;
    }

    .card {
        box-shadow: 0px 5px 5px -5px rgb(0 0 0 / 10%);
        background: linear-gradient(to top , #FF7D2C , #11CCF5);
        padding: 1rem;
        border-radius: 15px;
    }

    .card-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-head h2 {
        color: #240cff;
        font-size: 1.8rem;
        font-weight: 500;
    }

    .card-head span {
        font-size: 3.2rem;
        color: var(--text-grey);
    }

    .card-progress small {
        color: #11CCF5;
        font-size: .8rem;
        font-weight: 600;
    }

    .records {
        box-shadow: 0px 5px 5px -5px rgb(0 0 0 / 10%);
        background:  #240cff;
        border-radius: 3px;
        overflow: hidden;
    }

    .record-header {
        padding: 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .add,
    .browse {
        display: flex;
        align-items: center;
    }

    .add span {
        display: inline-block;
        margin-right: .6rem;
        font-size: .9rem;
        color: #666;
    }

    input,
    button,
    select {
        outline: none;
        padding-left: 10px;
    }

    .add select,
    .browse input,
    .browse select {
        height: 35px;
        border: 1px solid #b0b0b0;
        border-radius: 3px;
        display: inline-block;
        width: 75px;
        padding: 0rem .5rem;
        margin-right: .8rem;
        color: #666;
    }

    .add button {
    background: var(--main-color);
    color: #fff;
    height: 37px;
    border-radius: 4px;
    padding: 0rem 1rem;
    border: none;
    font-weight: 600;
    transition: background 0.3s, color 0.3s; /* Added smooth transition */
}

.add button:hover {
    background: #FF7D2C;
    color: #11CCF5;
    cursor: pointer;
}

    .browse input {
        width: 150px;
    }

    .browse select {
        width: 100px;
    }

    .table-responsive {
        width: 100%;
        overflow-x: auto;
        height: 500px; /* Set a fixed height for the table body */
        overflow-y: auto;
        background: linear-gradient(to right , #FF7D2C , #11CCF5);
        border-radius: 15px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    table thead tr,
    table tbody tr {
        border-bottom: 1px solid #dee2e8;
    }

    table thead th {
        padding: 1rem 0rem;
        text-align: left;
        color: #2b59ff;
        font-size: 1.03rem;
    }

    table thead th:first-child,
    table tbody td:first-child {
        padding-left: 1rem;
    }

    table tbody td {
        padding: 1rem 0rem;
        color: #444;
        white-space: nowrap;
    }

    table tbody td:first-child {
        color: var(--main-color);
        font-weight: 600;
        font-size: .9rem;
    }

    .client {
        display: flex;
        align-items: center;
    }

    .client-info h4 {
        color: #555;
        font-size: .95rem;
    }

    .client-info small {
        color: #777;
    }

    @media only screen and (max-width: 1200px) {
        .analytics {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media only screen and (max-width: 768px) {
        .analytics {
            grid-template-columns: 100%;
        }

        .main-content {
            margin-left: 0;
            width: 100%;
        }

        .add,
        .browse {
            margin-left: 10px;
        }
    }
</style>
</head>
<body>
<?php include "sidebar.php";?>
    <div class="main-content">
        <main>
            
            <div class="page-content">
            
                <div class="analytics">
                <?php
                        // Fetch the number of users
                        $sqlUsers = "SELECT COUNT(id) AS totalUsers FROM tbl_user";
                        $resultUsers = $conn->query($sqlUsers);
                        $rowUsers = $resultUsers->fetch_assoc();
                    ?>
                    <div class="card">
                        <div class="card-head">
                            <h2><?php echo $rowUsers['totalUsers']; ?></h2>
                            <span class="las la-user-friends"></span>
                        </div>
                        <div class="card-progress">
                            <small>Users</small>
                            
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <h2>4</h2>
                            <span class="las la-eye"></span>
                        </div>
                        <div class="card-progress">
                            <small>current tasks</small>
                            
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <h2>0</h2>
                            <span ><i class='bx bxs-calendar-week'></i></span>
                        </div>
                        <div class="card-progress">
                            <small>completed tasks</small>
                            
                        </div>
                    </div>

                    <div class="card">
                    
                        <div class="card-head">
                            <h2><?php echo $_SESSION['pylevel']+$_SESSION['cpplevel']+$_SESSION['javalevel']+$_SESSION['weblevel']; ?></h2>
                            <span><i class='bx bx-task'></i></span>
                        </div>
                        <div class="card-progress">
                            <small>Levels passed</small>
                            
                        </div>
                    </div>

                </div>
                <div class="records table-responsive">
                    <div class="record-header">
                        <div class="add">
                            <span>Entries</span>
                            <select name="sortCriteria" id="sortCriteria">
                                <option value="id">ID</option>
                                <option value="pylevel">Python Level</option>
                                <option value="cpplevel">C++ Level</option>
                                <option value="javalevel">Java Level</option>
                                <option value="weblevel">Web Level</option>
                            </select>
                            <button id="applySort">Apply</button>
                        </div>
                    </div>
                    <div>
                    <table id="recordsTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><span class="las la-sort"></span> User</th>
                                    <th class="sortable"><span class="las la-sort"></span> Python level</th>
                                    <th class="sortable"><span class="las la-sort"></span> C++ level</th>
                                    <th class="sortable"><span class="las la-sort"></span> Java level</th>
                                    <th class="sortable"><span class="las la-sort"></span> Web level</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    

                                    // Fetch data from the database
                                    $sql = "SELECT id, username,email, pylevel, cpplevel, javalevel, weblevel FROM tbl_user";
                                    $result = $conn->query($sql);

                                    // Display data in the table
                                    if ($result->num_rows > 0) {
                                        $counter = 1;
                                        while($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $counter . "</td>";
                                            echo "<td>";
                                            echo "<div class='client'>";
                                            echo "<div class='client-info'>";
                                            echo "<h4>" . $row['username'] . "</h4>";
                                            echo "<small>" . $row['email'] . "</small>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</td>";
                                            echo "<td>" . $row['pylevel'] . "</td>";
                                            echo "<td>" . $row['cpplevel'] . "</td>";
                                            echo "<td>" . $row['javalevel'] . "</td>";
                                            echo "<td>" . $row['weblevel'] . "</td>";
                                            echo "</tr>";
                                            $counter++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>No records found</td></tr>";
                                    }

                                    // Close connection
                                    $conn->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Include jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <!-- DataTables initialization script -->
    <script>
        $(document).ready(function () {
            // Initialize DataTables
            var dataTable = $('#recordsTable').DataTable();

            // Event listener for Apply button
            $('#applySort').on('click', function () {
                // Get selected sorting criteria
                var sortCriteria = $('#sortCriteria').val();

                // Get column index based on the selected sorting criteria
                var columnIndex;
                switch (sortCriteria) {
                    case 'pylevel':
                        columnIndex = 2;
                        break;
                    case 'cpplevel':
                        columnIndex = 3;
                        break;
                    case 'javalevel':
                        columnIndex = 4;
                        break;
                    case 'weblevel':
                        columnIndex = 5;
                        break;
                    default:
                        columnIndex = 0; // Default to ID if none selected
                        break;
                }

                // Apply sorting
                dataTable.order([columnIndex, 'asc']).draw();
            });
        });
    </script>
</body>
</html>