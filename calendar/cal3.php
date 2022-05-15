<?Php
//// Settings, change this to match your requirment //////
$start_year = 2016; // Starting year for dropdown list box
$end_year = 2020;  // Ending year for dropdown list box
////// end of settings ///////////
?>
<!doctype html public "-//w3c//dtd html 3.2//en">
<script langauge="javascript">
function post_value(mm, dt, yy) {
    opener.document.f1.p_name.value = mm + "/" + dt + "/" + yy;
    /// cheange the above line for different date format
    self.close();
}

function reload(form) {
    var month_val = document.getElementById('month').value; // collect month value
    var year_val = document.getElementById('year').value; // collect year value
    self.location = 'cal2.php?month=' + month_val + '&year=' + year_val; // reload the page
}
</script>
<style type="text/css">
table.main {
    width: 90%;
    border: 1px solid black;
    background-color: #efefef;
}

table.main td {
    font-family: verdana, arial, helvetica, sans-serif;
    font-size: 17px;
}

table.main th {
    padding: 2px;
    background-color: #49CBCD;
}

table,
td {
    border: 1px solid white;
}

table #calld {
    background-color: #bebfbe;
    width: 100%;
}
</style>
<script>
var myVar = setInterval(myTimer, 0);

function myTimer() {
    var d = new Date();
    document.getElementById("demo").innerHTML = d.toLocaleTimeString();
}
</script>
<div id='cald'>
    <?Php
	@$month = $_GET['month'];
	@$year = $_GET['year'];

	if (!($month < 13 and $month > 0)) {
		$month = date("m");  // Current month as default month
	}

	if (!($year <= $end_year and $year >= $start_year)) {
		$year = date("Y");  // Set current year as default year 
	}

	$d = 2; // To Finds today's date
	//$no_of_days = date('t',mktime(0,0,0,$month,1,$year)); //This is to calculate number of days in a month
	$no_of_days = cal_days_in_month(CAL_GREGORIAN, $month, $year); //calculate number of days in a month

	$j = date('w', mktime(0, 0, 0, $month, 1, $year)); // This will calculate the week day of the first day of the month
	//echo $j;// Sunday=0 , Saturday =6
	//// if starting day of the week is Monday then add following two lines ///
	$j = $j - 1;
	if ($j < 0) {
		$j = 6;
	}  // if it is Sunday //
	//// end of if starting day of the week is Monday ////
	$adj = str_repeat("<td>&nbsp;</td>", $j);  // Blank starting cells of the calendar 
	$blank_at_end = 42 - $j - $no_of_days; // Days left after the last day of the month
	if ($blank_at_end >= 7) {
		$blank_at_end = $blank_at_end - 7;
	}
	$adj2 = str_repeat("<td>&nbsp;</td>", $blank_at_end); // Blank ending cells of the calendar

	/// Starting of top line showing year and month to select ///////////////
	///count time

	// end of count time
	echo "<div id = 'mainmain'>";
	echo "<table class='main' ><tr><td id = 'calld' colspan = 7><center>Calendar &nbsp; &nbsp; &nbsp;<b id = 'demo'></b></tr>";
	//echo "<tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr><tr>";
	echo "<tr><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th><th>Su</th></tr><tr>";

	////// End of the top line showing name of the days of the week//////////

	//////// Starting of the days//////////
	for ($i = 1; $i <= $no_of_days; $i++) {
		$pv = "'$month'" . "," . "'$i'" . "," . "'$year'";
		echo $adj . "<td><center>$i"; // This will display the date inside the calendar cell
		echo " </td>";
		$adj = '';
		$j++;
		if ($j == 7) {
			echo "</tr><tr>"; // start a new row
			$j = 0;
		}
	}
	echo $adj2;   // Blank the balance cell of calendar at the end 
	echo "</tr></table>";
	echo '</div>';
	?>
</div>