<?php
	use View\View;
    include 'index.php';
	include('Connection.php');

	// get required data
	$search = $_REQUEST["search"];
	$module = new Model\module();
	//check if empty, then display all
	if($search == "")
	{
		// Query for all available modules
		$displaylist = $module->get_all_module();;
	}
	else
	{
		// Query to look for searched modules
		$displaylist = $module->search_module($search);
	}
	
	// check number of result from query
	$count = mysqli_num_rows($displaylist);
	
	if($count == 0) 
	{
		$display = 'There were no search results!';
	}
	else 
	{
		$display = '<table class="fl-table">
						<thead>
							<tr>
								<th><strong>Code</td>
								<th><strong>Academic Plan</td>
								<th><strong>School</td>';
		
		$display .= '</tr>
					</thead>
					<tbody>';
		
		while($rows = mysqli_fetch_array($displaylist,MYSQLI_ASSOC))
		{
			// main information
			$display .= '<tr>
							<td><a onclick="gotomoduleeditpage(\''.$rows['Code'].'\')" style="cursor: pointer">'.$rows['Code'].'</a></td>
							<td>'.$rows['Academic Plan'].'</td>
							<td>'.$rows['School'].'</td>';
		
			$display .= '</tr>';
		}
		
		$display .= '</tbody>
					</table>';
	}
	
	// Return output to main page
	echo $display;

?>