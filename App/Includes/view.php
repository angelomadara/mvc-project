<?php 

function view($view,$_COUT = []){
	require_once 'App/Views/header.php';
	require_once 'App/Views/'.$view.'.php';
	require_once 'App/Views/footer.php';
}