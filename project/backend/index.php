<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('h.php'); ?>
    <title>Member Page</title>
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Adjust the path as needed -->
</head>
<body>
    <div class="container">
        <?php include('navbar.php'); ?>
        
        <div class="row">
            <div class="col-md-3">
            สวัสดี คุณ <?php echo $a_name; ?> 

                <?php include('menu_left.php'); ?>
            </div>
            <div class="col-md-9">
                <h2 class="text-center">Member</h2>
                <p>ยินดีเข้าสู่ระบบ....</p>

                <!-- Your content, such as a table of members or other details -->
                <table id="myTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("con_db.php");
                        // Example query to fetch member data
                        $sql = "SELECT * FROM tbl_member";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>{$row['member_id']}</td>";
                            echo "<td>{$row['m_user']}</td>";
                            echo "<td>{$row['m_email']}</td>";
                            echo "<td>{$row['m_tel']}</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="path/to/dataTables.js"></script> <!-- Adjust the path for DataTables if necessary -->
    <script>
        let table = new DataTable('#myTable', {
            // config options...
        });
    </script>
</body>
</html>
