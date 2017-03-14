<?php
ini_set('display_errors', 'On');
// Get row, column, and the cell text from the Javascript.
$row = isset($_POST['rowIndex']) ? $_POST['rowIndex'] : null; 
$col = isset($_POST['colIndex']) ? $_POST['colIndex'] : null;
$cellData = isset($_POST['cellData']) ? $_POST['cellData'] : null;

//open text file for storage
$myfile = fopen("schedule.txt", "r+") or die("Unable to open file!");

/* Debug 
echo $col;
echo $row;
echo $cellData;
*/

//evaluate the correct offset based on row and column values
if ($row > 0 && $row < 10)
{
	$offset = ((($row - 1) * 50) + (($col)*2));
} 
else if ($row >= 10 && $row < 100) 
{
	$offset = (((($row - 1) * 50) + ($row - 9)) + (($col)*2));
}
else if ($row > 99 && $row <=366)
{
	$offset = ((($row - 1) * 50) + ($row - 9) + ($row - 99) + (($col)*2));
}

//seek to the correct location, write the changes and close the file
fseek($myfile,$offset);
fwrite($myfile, $cellData);
fclose($myfile);
?>
