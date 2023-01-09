<?php 
session_start();

//Usado para validar el registro de los usuarios o los usuarios deshabilitados
if($_SESSION['status'] == "0"){
    ?>
    <div id="regcomplete" ></div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script  src="../js/not-allowed.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <?php
        die(); 
}
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
<div id="notAllow3" ></div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script  src="../js/not-allowed.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php
       die();
}


?>
