<?php 
for ($i=0;$i<201;$i++){ // password: 09htcfNzV7TFnqWLLF4F  ==>  $P$BFkkMmLWMcWAwM1BVvpVJaXjCtw/jr/
	//echo  ".zerofill($i)."; 
	$ak1 = '$P$BFkkMmLWMcWAwM1BVvpVJaXjCtw/jr/'; // پسورد رمز شده
	echo "($i, 'akauthor".zerofill($i)."', '$ak1', 'akauthor".zerofill($i)."', 'author@rangin-kaman.net', '---', '2015-01-01 00:00:00', '---', 0, 'يييي".zerofill($i)."'),<br>";
}

function zerofill ($num, $zerofill =4 ){
	return str_pad($num, $zerofill, '0', STR_PAD_LEFT);
}


?>