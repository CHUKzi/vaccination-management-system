<?php session_start();
$PageNum = 5;
require_once(__DIR__.'/includes/connection.php');
require_once(__DIR__.'/includes/functions.php');
require_once(__DIR__.'/includes/time-functions.php');
require_once(__DIR__.'/includes/check-sessions.php');
//require_once(__DIR__.'/includes/AddNewMember.php');
require_once(__DIR__.'/includes/AddNewUser.php');
require_once(__DIR__.'/includes/main/CodeWithParameterMessageSystem.php');
require_once(__DIR__.'/includes/main/RoleSystem.php');

?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/images/favicon.png">
    <title><?php echo $setting['system_name'];?> - Vaccinated Users</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
</head>

<body>

<?php include(__DIR__.'/includes/loading.php');?>

    <div class="dashboard-main-wrapper">
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <?php include(__DIR__.'/includes/header.php');?>
            </nav>
        </div>

       <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <?php include(__DIR__.'/includes/left-slidebar.php');?>
                </nav>
            </div>
        </div>

        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">

                <div class="row">
                    <?php //include(__DIR__.'/includes/pageheader.php');?>
                </div>
                    <?php 
                    include(__DIR__.'/includes/Alert.php');
                    //include(__DIR__.'/includes/home-count-update.php');
                    ?>
                <div class="row">
                    <?php include(__DIR__.'/includes/vaccinated_users_tb.php');?>
                </div>
                <?php //include(__DIR__.'/includes/charts.php');?>
            </div>
            <?php include(__DIR__.'/includes/footer.php');?>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <script src="assets/main.js"></script>
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/vendor/multi-select/js/jquery.multi-select.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/vendor/datatables/js/data-table.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    
</body>
</html>

<?php mysqli_close($connection); ?>