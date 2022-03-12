<?php 

for ($i = 1; $i <= 100; $i++) {
	$a = ($i % 3 == 0);
	$b = ($i % 5 == 0);
	$flag = true;
	if ($a) {
		print "Fizz";
		$flag = false;
	}
	if ($b) {
		print "Buzz";
		$flag = false;
	}
	if ($flag) {
		print $i;
	}
	print "\n";
}

?>