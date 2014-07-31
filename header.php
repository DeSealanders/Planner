<?php
require('php/config/conf.Default.php');
?>
<!DOCTYPE html>
<html>
<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-combined.min.css">
    <script src="js/bootstrap-datetimepicker.min.js"></script>
    <script src="js/documentready.js"></script>
</head>
<body>
<nav role="navigation">
    <span class="entypo-menu" id="toggle-menu"></span>

    <a href="index.php"><div class="logo">Planner</div></a>

    <ul>
        <li><a href="index.php" title="Planner">Index</a></li>
        <li><a href="add.php" title="Toevoegen">Toevoegen</a></li>
        <li><a href="#">Explore</a></li>
        <li><a href="#">Support</a></li>
        <li><a href="#">Sign Up</a></li>
    </ul>

</nav>

<div class="container">

        <?php if($user = UserManager::getInstance()->getUser()) { ?>
        <div class="user"><p>Logged in as <span class="name"><?php echo $user->getName(); ?></span> <span class="username">(<?php echo $user->getUsername(); ?>)</span></div>
        <?php } ?>
