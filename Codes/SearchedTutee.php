<?php
	use View\View;
    include 'index.php';
	session_start();

	include('Connection.php');

	// get required data
	$search = $_REQUEST["search"];
	$filter = $_REQUEST["filter"];
	$userid = $_SESSION['userid'];
	$alltuteeslist = $_SESSION['all'];

	$tutor = new Model\tutor($userid);
	// Query to look for the current school association
	$school = $tutor->get_school();
	
	//check if empty, then display all
	if($search == "")
	{
		if($filter == -1)
		{
			// Query to look for the tutees of their specific tutees or all tutees under the same school
			$theirtutees = $tutor->get_studentList();
			$alltutees = $tutor->get_allList();
			
		}
		else
		{
			// Query to look for the tutees of their specific tutees or all tutees under the same school
			$theirtutees = $tutor->get_filterstudentList($filter);
			$alltutees = $tutor->get_filterallList($filter);
		}
	}
	else
	{
		if($filter == -1)
		{
			// Query to look for the tutees of their specific tutees or all tutees under the same school
			$theirtutees = $tutor->get_searchstudentList($search);
			$alltutees = $tutor->get_searchallList($search);
		}
		else
		{
			// Query to look for the tutees of their specific tutees or all tutees under the same school
			$theirtutees = $tutor->get_filternsearchstudentList($filter,$search);
			$alltutees = $tutor->get_filternsearchallList($filter,$search);
		}
	}
	
	if($alltuteeslist)
	{
		$displaylist = $alltutees;
	}
	else
	{
		$displaylist = $theirtutees;
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
								<th>Student ID</td>
								<th>Student Full Name</td>';
		
		
		if($alltuteeslist)
		{
			$display .= '<th>Tutor</th><th>Change Tutor</th></tr>';
		}
		
		$display .= '</tr>
					</thead>
					<tbody>';
		
		while($rows = mysqli_fetch_array($displaylist,MYSQLI_ASSOC))
		{
			// main information
			$display .= '<tr>
							<td><a onclick="gototuteepage('.$rows['Student Id'].')" style="cursor: pointer">'.$rows['Student Id'].'</a></td>
							<td>'.$rows['Full Name'].'</td>';
			
			// if is list of all tutees, display tutors and changing option
			if($alltuteeslist)
			{
				$display .= '<td>'.$rows['Name'].'</td>
							<td>
								<form id="'.$rows['Student Id'].'" action="#changetutor" method="POST">
									<input type="hidden" name="studentid" value="'.$rows['Student Id'].'"/>
									<input type="hidden" name="fname" value="'.$rows['Full Name'].'"/>
									<input type="hidden" name="tutorid" value="'.$rows['Tutor Id'].'"/>
									
									<input class="changeTutor" type="submit" value="Change Tutor" />
								</form>
							</td>';
			}
		
			$display .= '</tr>';
		}
		
		$display .= '</tbody>
					</table>';
	}
	
	// Return output to main page
	echo $display;

?>