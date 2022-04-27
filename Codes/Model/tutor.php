<?php 

namespace Model;

// Class for Tutor model
class Tutor{
    private $tutorid;
    private $tutor_info;
    private $student_list;
    private $all_student_list;
    private $tutor_list;
    private $school;
    private $conn;

    // Constructor for Tutor model class
    public function __construct($userid){

        include('Connection.php');

        $this->tutorid=$userid;
        $this->conn = $conn;
        $tutorQuery = "SELECT * FROM tutors WHERE `Lect ID` = '$userid'";
        $getTutor = mysqli_query($conn, $tutorQuery) or die("Error fetching tutor's info.");
	    $this->tutor_info = mysqli_fetch_array($getTutor,MYSQLI_ASSOC);

        $schoolQuery = 'SELECT School FROM `tutors` WHERE `Lect ID` = '.$userid. '';
        $getschool = mysqli_query($conn, $schoolQuery) or die('school error');
        $school = mysqli_fetch_array($getschool, MYSQLI_ASSOC);
        $this->school = $school;

        $ownStudentQuery = "SELECT * FROM `students` WHERE `Tutor Id` ='$userid'";
        $getOwnStudent = mysqli_query($conn, $ownStudentQuery) or die("Error fetching students' info.");
        $this->student_list = $getOwnStudent;

        $allstudentQuery = 'SELECT * FROM `students` INNER JOIN `academic plan codes` ON `students`.`Academic Plan Code` = `academic plan codes`.`Code`'
                    .' INNER JOIN `tutors` ON `students`.`Tutor Id` = `tutors`.`Lect ID` WHERE `academic plan codes`.School LIKE "' . $school['School'] . '"';
        $getAllStudent = mysqli_query($conn, $allstudentQuery) or die('all tutees error' . mysqli_error($conn));
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

    public function get_school(){
        return $this->school;
    }

    // Function to change the variable controlling the change of student list for senior tutor
    public function changeList(){
        if ($_SESSION['all']) {
			$_SESSION['all'] = 0;
		} else {
			$_SESSION['all'] = 1;
		}
        header("Location:Tutorpage.php");
    }

    // Function to edit the personal tutor for student
    public function changeTutor(){
        $changeTutorQuery = 'UPDATE students set `Tutor Id` = '.$_POST['tutoridfinal'].' WHERE `Student Id` = '.$_POST['studentidfinal'];
        $changeTutor = 1;
        if(mysqli_query($this->conn, $changeTutorQuery)){
    		header("Location:Tutorpage.php");
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }

// Functions to create the filtered search for student list in tutor home page
    public function get_filterstudentList($filter){
        $theirtutees = mysqli_query($this->conn,'SELECT * FROM `students` WHERE `Tutor Id` = '.$this->tutorid.' '
                        .'AND `Current Year` = '.$filter) or die('their tutees error');
        return $theirtutees;
    }

    
    public function get_searchstudentList($search){
        $theirtutees = mysqli_query($this->conn,'SELECT * FROM `students` WHERE `Tutor Id` = '.$this->tutorid.' '
                        .'AND (`Student Id` LIKE "%'.$search.'%" OR `First Name` LIKE "%'.$search.'%" OR `Last Name` '
                        .'LIKE "%'.$search.'%" OR `Full Name` LIKE "%'.$search.'%")') or die('their tutees error');
        return $theirtutees;
    }
    public function get_filternsearchstudentList($filter,$search){
        $theirtutees = mysqli_query($this->conn,'SELECT * FROM `students` WHERE `Tutor Id` = '.$this->tutorid.' '
                        .'AND (`Student Id` LIKE "%'.$search.'%" OR `First Name` LIKE "%'.$search.'%" OR `Last Name` '
                        .'LIKE "%'.$search.'%" OR `Full Name` LIKE "%'.$search.'%") AND `Current Year` = '.$filter) or die('their tutees error');
        return $theirtutees;
    }

    public function get_filterallList($filter){
        $alltutees = mysqli_query($this->conn,'SELECT * FROM `students` INNER JOIN `academic plan codes` '
                    .'ON `students`.`Academic Plan Code` = `academic plan codes`.`Code` INNER JOIN `tutors` '
                    .'ON `students`.`Tutor Id` = `tutors`.`Lect ID` WHERE `academic plan codes`.School '
                    .'LIKE "'.$this->school['School'].'" AND `Current Year` = '.$filter) or die('all tutees error');
        return $alltutees;
    }
    public function get_searchallList($search){
        $alltutees = mysqli_query($this->conn,'SELECT * FROM `students` INNER JOIN `academic plan codes` '
                    .'ON `students`.`Academic Plan Code` = `academic plan codes`.`Code` INNER JOIN `tutors` '
                    .'ON `students`.`Tutor Id` = `tutors`.`Lect ID` WHERE `academic plan codes`.School '
                    .'LIKE "'.$this->school['School'].'" AND (`Student Id` LIKE "%'.$search.'%" OR `First Name` '
                    .'LIKE "%'.$search.'%" OR `Last Name` LIKE "%'.$search.'%" OR `Full Name` LIKE "%'.$search.'%")') or die('all tutees error');;
        return $alltutees;
    }
    public function get_filternsearchallList($filter,$search){
        $alltutees = mysqli_query($this->conn,'SELECT * FROM `students` INNER JOIN `academic plan codes` '
                    .'ON `students`.`Academic Plan Code` = `academic plan codes`.`Code` INNER JOIN `tutors` '
                    .'ON `students`.`Tutor Id` = `tutors`.`Lect ID` WHERE `academic plan codes`.School '
                    .'LIKE "'.$this->school['School'].'" AND (`Student Id` LIKE "%'.$search.'%" OR `First Name` '
                    .'LIKE "%'.$search.'%" OR `Last Name` LIKE "%'.$search.'%" OR `Full Name` LIKE "%'.$search.'%") '
                    .'AND `Current Year` = '.$filter) or die('all tutees error');
        return $alltutees;
    }
}


?>