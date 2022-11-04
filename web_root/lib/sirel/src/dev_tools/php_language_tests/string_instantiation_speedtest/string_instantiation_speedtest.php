<?php

// The comments on the
// next 2 lines show arithmetic mean of (user time + sys time) for 200 runs.
$b_instantiate=False; // 0.1624 seconds
$b_instantiate=True;  // 0.1676 seconds
// The time consumed by the reference version is about 97% of the
// time consumed by the instantiation version, but a thing to notice is
// that the loop contains at least 1, probably 2, possibly 4,
// string instantiations at the array_push line.
$ar=array();
$s='This is a string.';
$n=10000;
$s_1=NULL;

for($i=0;$i<$n;$i++) {
	if($b_instantiate) {
		$s_1=''.$s;
	} else {
		$s_1=&$s;
	}
	// The rand is for avoiding optimization at storage.
	array_push($ar,''.rand(0,9).$s_1);
} // for

echo($ar[rand(0,$n)]."\n");

?>
