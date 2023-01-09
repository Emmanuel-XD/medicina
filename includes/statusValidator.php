<?php 
session_start();

if($_SESSION['status'] == "1"){
    ?>
<div id="notAllow1" ></div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script  src="../js/not-allowed.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php
       session_destroy();
       die();
    }
if($_SESSION['status'] === '2'){
    ?>
<div id="notAllow2" ></div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script  src="../js/not-allowed.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php
    die();
}
if($_SESSION['status'] === '3'){
    ?>
<div id="notAllow2" ></div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script  src="../js/not-allowed.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php
       session_destroy();
}
if($_SESSION['status'] === '4'){
    ?>
<div id="notAllow2" ></div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script  src="../js/not-allowed.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php
       session_destroy();
}
if($_SESSION['status'] === '5'){
    ?>
<div id="notAllow2" ></div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script  src="../js/not-allowed.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php
       session_destroy();
}


?>
