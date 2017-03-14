$(document).ready(function(){
	// Allow double clicking to enable the cell input box
$( "td div" ).dblclick(function(event) {
	var colindex = $(this).closest('td').index();
	var rowindex = $(this).closest('tr').index();
	// Debug
	//console.log(rowindex);
	//console.log(colindex);
	$("input").prop('disabled', false);
	
   // alert( "Handler for .dblclick() called." );
});

// Disable the cell when losing focus and process the data within the cell
// Get row and column and text to send to backend and update cell color
$("input").blur(function () {
	if ($(this).val() == "sleep" || $(this).val() == "SLEEP")
	{	
		var colindex = $(this).closest('td').index();
		var rowindex = $(this).closest('tr').index();
		var cellData = 'S';
		postData(rowindex,colindex,cellData);
		console.log(rowindex);
		console.log(colindex);
		$(this).css("background-color","#999999");
		
	}else if ($(this).val() == "dating" || $(this).val() == "DATING")
	{
		var colindex = $(this).closest('td').index();
		var rowindex = $(this).closest('tr').index();
		var cellData = 'A';
		postData(rowindex,colindex,cellData);
		$(this).css("background-color","#00FFFF");
	}else if ($(this).val() == "work" || $(this).val() == "WORK")
	{
		var colindex = $(this).closest('td').index();
		var rowindex = $(this).closest('tr').index();
		var cellData = 'W';
		postData(rowindex,colindex,cellData);
		$(this).css("background-color","#32603B");
	} else if ($(this).val() == "down" || $(this).val() == "DOWN")
	{
		var colindex = $(this).closest('td').index();
		var rowindex = $(this).closest('tr').index();
		var cellData = 'D';
		postData(rowindex,colindex,cellData);
		$(this).css("background-color","#FA7135");
	} else if ($(this).val() == "prof" || $(this).val() == "PROF")
	{
		var colindex = $(this).closest('td').index();
		var rowindex = $(this).closest('tr').index();
		var cellData = 'P';
		postData(rowindex,colindex,cellData);
		$(this).css("background-color","#9900FF");
	} else if ($(this).val() == "social" || $(this).val() == "SOCIAL")
	{
		var colindex = $(this).closest('td').index();
		var rowindex = $(this).closest('tr').index();
		var cellData = 'O';
		postData(rowindex,colindex,cellData);
		$(this).css("background-color","#00FF00");
	} else if ($(this).val() == "exer" || $(this).val() == "EXER")
	{
		var colindex = $(this).closest('td').index();
		var rowindex = $(this).closest('tr').index();
		var cellData = 'E';
		postData(rowindex,colindex,cellData);
		$(this).css("background-color","#0000FF");
	} else if ($(this).val() == "prod" || $(this).val() == "PROD")
	{
		var colindex = $(this).closest('td').index();
		var rowindex = $(this).closest('tr').index();
		var cellData = 'H';
		postData(rowindex,colindex,cellData);
		$(this).css("background-color","#CC4125");
	} else if ($(this).val() == "waste" || $(this).val() == "WASTE")
	{
		var colindex = $(this).closest('td').index();
		var rowindex = $(this).closest('tr').index();
		var cellData = 'X';
		postData(rowindex,colindex,cellData);
		$(this).css("background-color","#783F04");
	} else if ($(this).val() == "family" || $(this).val() == "FAMILY")
	{
		var colindex = $(this).closest('td').index();
		var rowindex = $(this).closest('tr').index();
		var cellData = 'F';
		postData(rowindex,colindex,cellData);
		$(this).css("background-color","#FF00FF");
	} else if ($(this).val() == "travel" || $(this).val() == "TRAVEL")
	{
		var colindex = $(this).closest('td').index();
		var rowindex = $(this).closest('tr').index();
		var cellData = 'T';
		postData(rowindex,colindex,cellData);
		$(this).css("background-color","#000000");
	} else 
	{
		var colindex = $(this).closest('td').index();
		var rowindex = $(this).closest('tr').index();
		var cellData = '-';
		postData(rowindex,colindex,cellData);
		$(this).css("background-color","white");
	}
	//console.log($("input").val());
	$("input").prop('disabled', true);
});

// Format the data to send
// Send the data and catch any errors
function postData(row,col,cData)
{
	
	 var request = $.ajax({
        url: "form.php",
        type: "post",
        data : { rowIndex : row, colIndex : col, cellData : cData }
    }); 
	
	request.done(function (response, textStatus, jqXHR){
		console.log("POST Success");
	 });
	 
	 request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
	});
}
});

