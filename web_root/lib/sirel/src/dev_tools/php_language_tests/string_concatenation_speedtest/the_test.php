<?php

// The comments on the
// next 2 lines show arithmetic mean of (user time + sys time) for 200 runs.
$b_suboptimal=False; // 0.0611 seconds
$b_suboptimal=True;  // 0.0785 seconds
// The time consumed by the optimal version is about 78% of the
// time consumed by the suboptimal version.
//
// The number of concatenations is the same and the resultant
// string is the same, but what differs is the "average" and maximum
// lengths  of the tokens that are used for assembling the $s_whole.
$n=1000;
$s_token="This is a string with a Linux line break.\n";
$s_whole='';

if($b_suboptimal) {
	for($i=0;$i<$n;$i++) {
		$s_whole=$s_whole.$s_token.$i;
	} // for
} else {
	$i_watershed=(int)round((($n*1.0)/2),0);
	$s_part_1='';
	$s_part_2='';
	for($i=0;$i<$i_watershed;$i++) {
		$s_part_1=$s_part_1.$i.$s_token;
	} // for
	for($i=$i_watershed;$i<$n;$i++) {
		$s_part_2=$s_part_2.$i.$s_token;
	} // for
	$s_whole=$s_part_1.$s_part_2;
} // else

// To circumvent possible optimization one actually "uses" the
// value of the $s_whole.
$file_handle=fopen('./it_might_have_been_a_served_HTML_page.txt','w');
fwrite($file_handle, $s_whole);
fclose($file_handle);

?>
