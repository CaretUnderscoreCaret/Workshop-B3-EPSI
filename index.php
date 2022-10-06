<?php
include 'includes/header.php';

if(isset($_GET['page'])){
	require 'page/'.$_GET['page'].'.php';
}

include 'includes/footer.php';