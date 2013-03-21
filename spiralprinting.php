<?php
if (count($argv) != 2) {
    die("Usage: spiral_printing <datafile>\n");
}
$file_handle = fopen($argv[1], "rb");

while (!feof($file_handle) ) {
	$parts = explode(';', fgets($file_handle));
	if (count($parts) < 3)
		break;
		
	$col_maxumbers = explode(' ', $parts[2]);
	
	$array2d = toarray($parts[0], $parts[1], $parts[2]);
	
	traverse($array2d);
	echo "\n";
}

fclose($file_handle);

function toarray($rows, $cols, $line) {
	$result = array();
	$line = preg_split("/\s/", $line);

	for ($row_counter = 0; $row_counter < $rows; $row_counter++)
	{
		for ($column_counter = 0; $column_counter < $cols; $column_counter++)
		{
			$spacing = " ";
			if ($row_counter == 0 && $column_counter == 0)
				$spacing = "";
				
			$result[$row_counter][$column_counter] = $line[($row_counter)*($cols)+$column_counter]." ";
		}
	}
	
	return $result;
}

function traverse($array) {
	$col_max = count($array[0])-1;
	//asdf
	for ($row_pos = 0; $row_pos < $col_max/2; ++$row_pos)
	{
		// first row
		for ($col_pos = $row_pos; $col_pos <= $col_max - $row_pos; ++$col_pos)
			printout($array[$row_pos][$col_pos]);
		// right column	
		for ($col_pos = $row_pos + 1; $col_pos <= $col_max - $row_pos; ++$col_pos)
			printout( $array[$col_pos][$col_max - $row_pos]);
		// inner column
		for ($col_pos = $row_pos + 1; $col_pos <= $col_max - $row_pos; ++$col_pos)
			printout( $array[$col_max - $row_pos][$col_max - $col_pos]);
		// left column
		for ($col_pos = $row_pos + 1; $col_pos < $col_max - $row_pos; ++$col_pos)
			printout( $array[$col_max - $col_pos][$row_pos]);
	}

	// print inner-most digit
	printout( "".trim($array[$col_max/2][$col_max/2]));

	// odd cols logic
	if ($col_max%2 == 1)
	{
		printout( $array[$col_max/2][$col_max/2 + 1]);
		printout( $array[$col_max/2 + 1][$col_max/2 + 1]);
		printout( $array[$col_max/2 + 1][$col_max/2]);
	}

}

function printout($val)
{
	if ($val != NULL)
		echo $val;
}

?>