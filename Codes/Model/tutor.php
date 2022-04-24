<?php 

namespace Model;

class Tutor{
    private $tutorid;
    private $tutor_info;
    private $student_list;
    private $all_student_list;
    private $tutor_list;
    private $conn;

    public function __construct($userid){

        include('Connection.php');

        $this->tutorid=$userid;
        $this->conn = $conn;
        $tutorQuery = "SELECT * FROM tutors WHERE `Lect ID` = '$userid'";
        $getTutor = mysqli_query($conn, $tutorQuery) or die("Error fetching tutor's info.");
	    $this->tutor_info = mysqli_fetch_array($getTutor,MYSQLI_ASSOC);

        $ownStudentQuery = "SELECT * FROM `students` WHERE `Tutor Id` ='$userid'";
        $getOwnStudent = mysqli_query($conn, $ownStudentQuery) or die("Error fetching students' info.");
        $this->student_list = $getOwnStudent;

        $schoolQuery = mysqli_query($conn, 'SELECT School FROM `tutors` WHERE `Lect ID` = ' . $userid) or die('school error');
        $school = mysqli_fetch_array($schoolQuery, MYSQLI_ASSOC);

        $getAllStudent = mysqli_query($conn, 'SELECT * FROM `students` INNER JOIN `academic plan codes` ON `students`.`Academic Plan Code` = `academic plan codes`.`Code` INNER JOIN `tutors` ON `students`.`Tutor Id` = `tutors`.`Lect ID` WHERE `academic plan codes`.School LIKE "' . $school['School'] . '"') or die('all tutees error' . mysqli_error($conn));
        $this->all_student_list = $getAllStudent;

        //List of tutors under the same school
        $schooltutors = 'SELECT * FROM `tutors` WHERE School LIKE "' . $school['School'] . '"';
        $changeDataList = mysqli_query($conn, $schooltutors);  
        $this->tutor_list=$changeDataList; 
    }

    public function get_tutor_info():iterable{
        return $this->tutor_info;
    }

    public function get_studentList(){
        return $this->student_list;
    }

    public function get_allList(){
        return $this->all_student_list;
    }

    public function get_tutor_list(){
        return $this->tutor_list;
    }

    public function changeList(){
        if ($_SESSION['all']) {
			$_SESSION['all'] = 0;
		} else {
			$_SESSION['all'] = 1;
		}
    }
}


?>