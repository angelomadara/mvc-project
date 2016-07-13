<?php

function Clean($string){
	$string = strip_tags($string);
	$string = htmlspecialchars($string);
	$string = trim($string);
	return $string;
}