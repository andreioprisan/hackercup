<?php
if (count($argv) != 2) {
    die("Usage: fizzbuzz <datafile>\n");
}
$file_handle = fopen($argv[1], "rb");

while (!feof($file_handle) ) {
	$parts = explode(' ', fgets($file_handle));
	if (count($parts) < 3)
		break;
		
	for ($i = 1; $i<= $parts[2]; $i++)
	{
		$spacing = " ";
		if ($i == $parts[2])
			$spacing = "";
			
		if ($i % $parts[0] != 0 && $i % $parts[1] != 0)
			echo $i.$spacing;
		else if ($i % $parts[0] == 0 && $i % $parts[1] == 0)
			echo "FB".$spacing;
		else if ($i % $parts[0] == 0)
			echo "F".$spacing;
		else if ($i % $parts[1] == 0)
			echo "B".$spacing;
		
		if ($i == $parts[2])
			echo "\n";
	}
}

fclose($file_handle);
?>

<?php
echo "14";
return 0;
?>