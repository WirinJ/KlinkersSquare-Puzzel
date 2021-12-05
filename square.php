<?php

define("KLINKERS", ["A", "E", "I", "O", "U"]);

function find($line)
{
	for ($i = 0; $i < strlen($line); $i++) { 
		if (($i + 1) != strlen($line)) {
			if ($line[$i] == $line[$i + 1]) {
				if (in_array($line[$i], KLINKERS)) {
					return [$line[$i], $i];
				}
			}
		}
	}
	return [false, false];
}

$array = explode("\n", file_get_contents('input.txt'));
$index = 0;
foreach ($array as $line) {
	if (($index + 1) < count($array)) {
		list($ltr, $idx) = find($line);
		if ($ltr) {
			if ($ltr == find($array[$index + 1])[0]) {
				echo $ltr . ' gevonden op (' . $idx . ',' . $index . ')' . PHP_EOL;
			}
			$index++;
		}
	}
}

?>