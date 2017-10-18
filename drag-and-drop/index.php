<?php


// including the config file
include('config.php');

//This is the query that loads the initial data into the page.

$pdo = connect();
// select all items ordered by item_order
$sql = 'SELECT * FROM client ORDER BY item_order ASC limit 400';
$query = $pdo->prepare($sql);
$query->execute();
$list = $query->fetchAll();
?>



<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Drag and Drop using jQuery and Ajax</title>
<link rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="images/BeWebDeveloper.png" alt="BeWebDeveloper" />
        </div><!-- header -->
        <h1 class="main_title">Drag and Drop using jQuery and Ajax</h1>
        <div class="content">

        <ul id="sortable">
            <?php
            foreach ($list as $rs) {
            ?>
            <li id="<?php echo $rs['client_id']; ?>">
                <span></span>
                <p><?php echo $rs['client_name']; ?></p>
                <div><h2><?php echo $rs['client_email']; ?></h2><?php echo $rs['client_id']; ?></div>
            </li>
            <?php
            }
            ?>
        </ul>
        </div><!-- content -->    
        <div class="footer">
            Powered by GX
        </div><!-- footer -->
    </div><!-- container -->
</body>
</html>
