<?php
function generate_rand($l){
	$c= "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	srand((double)microtime()*1000000);
	for($i=0; $i<$l; $i++) {
		$rand.= $c[rand()%strlen($c)];
	}
	return $rand;
}
