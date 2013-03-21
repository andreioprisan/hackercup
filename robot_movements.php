<?php
//echo slowTraverse(0,0,4,4)."\n";
echo fastTraverse(4,4);
return 0;

function slowTraverse($start_ypos, $start_xpos, $end_ypos, $end_xpos) {
	// cover base cases
	if ($start_ypos == $end_ypos && $start_xpos == $end_xpos)
		return 1;
		
	if ($start_ypos > $end_ypos || $start_xpos > $end_xpos)
		return 0;

	// keep traversing down and right towards ending x and y positions
	return slowTraverse($start_ypos+1, $start_xpos, $end_ypos, $end_xpos) + slowTraverse($start_ypos, $start_xpos+1, $end_ypos, $end_xpos);
}

function fastTraverse($row, $col)
{   
	$matrix = array();

	for($i=0;$i < $row;$i++)
		$matrix[$i][$col-1]=1;

	for($i=0;$i < $col;$i++) 
		$matrix[$row-1][$i]=1;

	// reached the end
	$matrix[$i][$j]=0;

	for ($i = $row-2; $i >= 0; $i--)
		for ($j = $col-2; $j >= 0; $j--)
			$matrix[$i][$j] = $matrix[$i+1][$j] + $matrix[$i][$j+1];

	return $matrix[0][0];
}

?>