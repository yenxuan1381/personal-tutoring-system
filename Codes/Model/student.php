<?php

namespace Model;

class Student {
    private $student_info;
    private $academicPlan;
    private $conn;
    private $studentid;
    private $tutor_info;
    private $studentList;

	public function __construct($userid){

        include('Connection.php');

        $this->studentid=$userid;
        $this->conn = $conn;
        $studentQuery = 'SELECT students.`First Name`, students.`Last Name`, students.`Nationality`, students.`Email Address`'
					.', students.`Academic Plan Code`, students.`Current Year`, students.`Level`'
					.', students.`Registration Date`, students.`Personal Goals`, students.`remarks` FROM `students` WHERE `Student Id` = '.$userid.'';
	    $getStudent = mysqli_query($conn, $studentQuery) or die("Error fetching student's info.");
	    $this->student_info = mysqli_fetch_array($getStudent,MYSQLI_ASSOC);

        $academicPlanQuery = 'SELECT `academic plan codes`.`Academic Plan` FROM `academic plan codes` JOIN students ON students.`Academic Plan Code` = `academic plan codes`.`Code` WHERE students.`Student Id` ='.$userid.'';
	    $getStudentAcademicPlan = mysqli_query($conn, $academicPlanQuery) or die("Error fetching student's academic plan.");
	    $this->academicPlan = mysqli_fetch_array($getStudentAcademicPlan,MYSQLI_ASSOC);

        $tutorQuery ='SELECT tutors.`Lect ID`, tutors.`Name`, tutors.`School`, tutors.`email`, tutors.`office` FROM tutors JOIN students ON students.`Tutor Id` = tutors.`Lect ID` WHERE students.`Student Id`= ' .$userid.'';
        $getTutor = mysqli_query($conn,$tutorQuery) or die('Error Fetching Tutor Info') ;
	    $this->tutor_info = mysqli_fetch_array($getTutor,MYSQLI_ASSOC);

        $query = 'SELECT students.`Student Id`, students.`First Name`, students.`Last Name`, `academic plan codes`.`Academic Plan`,'
                .' students.`Current Year` FROM `academic plan codes` JOIN students ON students.`Academic Plan Code` = `academic plan codes`.`Code`'
                .' WHERE students.`Tutor Id` LIKE '.$this->tutor_info['Lect ID'].' AND students.`Student Id` NOT LIKE '.$userid.' AND students.`Current Year` LIKE (SELECT students.`Current Year` FROM students WHERE students.`Student Id` LIKE '.$userid.')';
	    $studentsUnderSameTutor = mysqli_query($conn, $query) or die("Error fetching students data.");
        $this->studentList = $studentsUnderSameTutor;

    }
	public function get_student_info():iterable{
        return $this->student_info;
    }

    public function get_academicPlan():iterable{
        return $this->academicPlan;
    }

    public function get_student_id(){
        return $this->studentid;
    }

    public function get_tutor_info():iterable{
        return $this->tutor_info;
    }
    public function get_studentList(){
        return $this->studentList;
    }
    public function set_personalgoal(){
        $personalGoals = $_POST['Personal_Goal'];
        $editPersonalGoalsQuery = "UPDATE students SET `Personal Goals` = '$personalGoals' WHERE `Student Id` = '$this->studentid'";
        if(mysqli_query($this->conn, $editPersonalGoalsQuery)){
    		header("Location: UserInformationStudent.php?studentID=".$this->studentid);
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
    public function set_remark(){
        $remark = $_POST['Remark'];
        $sql = "UPDATE students SET `Remarks`='$remark' WHERE `Student id` = '$this->studentid'";
        if(mysqli_query($this->conn, $sql)){
    		header("Location:UserInformationStudent.php?tuteeid=".$this->studentid);
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
    public function set_studentinfo(){
        $fName = $_POST['First_Name'];
        $lName = $_POST['Last_Name'];
        $nationality = $_POST['Nationality'];
        $email = $_POST['Email'];
        $sql = "UPDATE students SET `First Name`='$fName',`Last Name`='$lName',Nationality='$nationality',`Email Address`='$email' WHERE `Student Id`='$$this->studentid' ";
        if(mysqli_query($this->conn, $sql)){
    		header("Location:UserInformationStudent.php?studentID=".$this->studentid);
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
    public function set_academic(){
        $code = $_POST['Academic_Plan_Code'];
        $level = $_POST['Level'];
        $year = $_POST['Current_Year'];
        $rDate = $_POST['Registration_Date'];
        $sql = "UPDATE students SET `Academic Plan Code`='$code', `Level`='$level',`Current Year` = '$year',`Registration Date`='$rDate' WHERE `Student Id`='$this->studentid'";
        if(mysqli_query($this->conn, $sql)){
    		header("Location:UserInformationStudent.php?tuteeid=".$this->studentid);
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
}
?>
