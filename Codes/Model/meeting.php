<?php

namespace Model;

class meeting
{
    private $conn;
    private $student_meeting;
    private $tutor_meeting;
    
    public function __construct($user_name,$date1){
        include('Connection.php');
        $this->conn = $conn;
        $StudentMeetingQuery = "SELECT * FROM meeting WHERE student_name ='$user_name'";
        $getStudentMeeting = mysqli_query($conn, $StudentMeetingQuery) or die("Error fetching students' meeting.");
        $this->student_meeting = $getStudentMeeting;
        $TutorMeetingQuery = "SELECT * FROM meeting WHERE date='$date1' AND tutor_name ='$user_name'";
        $getTutorMeeting = mysqli_query($conn, $TutorMeetingQuery) or die("Error fetching tutors' meeting.");
        $this->tutor_meeting = $getTutorMeeting;
    }

    public function get_student_appointment(){
        return $this->student_meeting;
    }

    public function get_tutor_appointment(){
        return $this->tutor_meeting;
    }

    public function add_appointment($user_name,$date){
        $studentname = $_POST['student'];
		$start = $_POST['start'];
		$end = $_POST['end'];
		echo "<script>console.log('$start')</script>";

		$sql2 = "INSERT INTO meeting (date,start_time,end_time,tutor_name,student_name) VALUES ('$date','$start','$end','$user_name','$studentname')";
		if(mysqli_query($this->conn, $sql2)){
    		header("Location:Appointmentview.php?date=$date");
		} else {
    		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
    }
    public function delete_appointment(){
        $id = $_POST['id'];
		$DeleteQuery = "DELETE FROM meeting WHERE meeting_id='$id'";          
		if(mysqli_query($this->conn, $DeleteQuery)){
    		header('Location:'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);
		} else {
    			echo "ERROR: Could not able to execute $DeleteQuery. " . mysqli_error($link);
		}
    }
}
?>