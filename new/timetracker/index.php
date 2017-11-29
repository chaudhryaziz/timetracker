<html>

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="table.css">
<script src="tablescript.js"></script>

</head>
<body>
<!-- Key Legend Box -->
<div class="keybox">
 <table cellspacing="0" cellpadding="0" >
	<tr>
		<th>KEY</th>
	</tr>
	<tr>
		
		<td><div><input type="text" style="background-color: #999999; " disabled >Sleep(sleep)</div></td>
	</tr>
	<tr>
		<td><div><input type="text" style="background-color: #32603B; " disabled >Work Related Activity(work)</div></td>
	</tr>
	<tr>
		<td><div><input type="text" style="background-color: #FA7135; " disabled >Downtime (eg. Free time)(down)</div></td>
	</tr>
	<tr>
		<td><div><input type="text" style="background-color: #9900FF; " disabled >Professional Development(Coding)(prof)</div></td>
	</tr>
	<tr>
		<td><div><input type="text" style="background-color: #00FFFF; " disabled >Dating/Partner(dating)</div></td>
	</tr>
	<tr>
		<td><div><input type="text" style="background-color: #00FF00; " disabled >Social Time(social)</div></td>
	</tr>
	<tr>
		<td><div><input type="text" style="background-color: #0000FF; " disabled >Exercise(exer)</div></td>
	</tr>
	<tr>
		<td><div><input type="text" style="background-color: #CC4125; " disabled >Productive Time(Housework)(prod)</div></td>
	</tr>
	<tr>
		<td><div><input type="text" style="background-color: #783F04; " disabled >Wasted Time(HN,Reddit etc.)(waste)</div></td>
	</tr>
	<tr>
		<td><div><input type="text" style="background-color: #FF00FF; " disabled >Family Time(family)</div></td>
	</tr>
	<tr>
		<td><div><input type="text" style="background-color: #000000; " disabled >Travel(travel)</div></td>
	</tr>
</table>
</div>



<table cellspacing="0" cellpadding="0" >
<!-- Top row for Time -->
  <tr>
	<th></th>
    <th>0:00</th>
    <th>1:00</th>
	<th>2:00</th>
    <th>3:00</th>
	<th>4:00</th>
    <th>5:00</th>
	<th>6:00</th>
    <th>7:00</th>
	<th>8:00</th>
    <th>9:00</th>
	<th>10:00</th>
    <th>11:00</th>
	<th>12:00</th>
    <th>13:00</th>
	<th>14:00</th>
    <th>15:00</th>
	<th>16:00</th>
    <th>17:00</th>
	<th>18:00</th>
    <th>19:00</th>
	<th>20:00</th>
    <th>21:00</th>
	<th>22:00</th>
    <th>23:00</th>
  </tr>
  
  
<!-- Generate the cells and color them based on contents of backend data -->

<?php
ini_set('display_errors', 'On');
// Read file containing data
$file = file_get_contents('./schedule.txt', FILE_USE_INCLUDE_PATH);
// Expand into array based on end of line and further split based on spaces
$arr = explode(PHP_EOL, $file);
$te2 = explode(" ", $file);
$output = preg_split( "/ (;|A) /", $file );
// Date vars to generate year column
$date = '2017-01-01';
$end_date = '2017-12-31';
for ($i = 0; $i<count($arr); $i++)
{
	echo '<tr>';
	$te = explode(" ", $arr[$i]);
	for ($z = 0; $z < count($te); $z++)
	{
		
		//Color cells and fill in default text based on event
		if ($te[$z] == 'A') 
		{
			echo '<td><div><input type="text" style="background-color: #00FFFF;" value="dating"></div></td>';
		} elseif ($te[$z] == 'S') 
		{
			echo '<td><div><input type="text" style="background-color: #999999;" value="sleep"></div></td>';
		} elseif ($te[$z] == 'W') 
		{
			echo '<td><div><input type="text" style="background-color: #32603B;" value="work"></div></td>';
		} elseif ($te[$z] == 'D') 
		{
			echo '<td><div><input type="text" style="background-color: #FA7135;" value="down"></div></td>';
		} elseif ($te[$z] == 'P') 
		{
			echo '<td><div><input type="text" style="background-color: #9900FF;" value="prof"></div></td>';
		} elseif ($te[$z] == 'O') 
		{
			echo '<td><div><input type="text" style="background-color: #00FF00;" value="social"></div></td>';
		} elseif ($te[$z] == 'E') 
		{
			echo '<td><div><input type="text" style="background-color: #0000FF;" value="exer"></div></td>';
		} elseif ($te[$z] == 'H') 
		{
			echo '<td><div><input type="text" style="background-color: #CC4125;" value="prod"></div></td>';
		} elseif ($te[$z] == 'X') 
		{
			echo '<td><div><input type="text" style="background-color: #783F04;" value="waste"></div></td>';
		} elseif ($te[$z] == 'F') 
		{
			echo '<td><div><input type="text" style="background-color: #FF00FF;" value="family"></div></td>';
		} elseif ($te[$z] == 'T') 
		{
			echo '<td><div><input type="text" style="background-color: #000000;" value="travel"></div></td>';
		} elseif ($te[$z] == '-') 
		{
			echo '<td><div><input type="text" style="background-color: #FFFFFF;"></div></td>';
		} else
		{
			if ($te[$z] != '\040')
			{
				 // Generate date column based on specified date vars
				echo '<td><div style = "height: 15px;font-weight:bold; padding-right:5px;">'.$date.'</div></td>';
				$date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
			}
		}		
	}	
 echo '</tr>';
}
?>

</table>
</body>
</html>