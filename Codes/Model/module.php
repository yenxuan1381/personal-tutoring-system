<?php

namespace Model;

class module{
    private $conn;
    private $school;
    private $allmodule;

    public function __construct(){
        include('Connection.php');
        $this->conn = $conn;

        $schoolQuery = 'SELECT DISTINCT School FROM `academic plan codes`';
        $getschool = mysqli_query($conn,$schoolQuery) or die('school error');
	    $school = mysqli_fetch_array($getschool, MYSQLI_ASSOC);
        $this->school = $school;

        $allmoduleQuery = 'SELECT * FROM `academic plan codes`';
        $getallmodule = mysqli_query($conn,$allmoduleQuery) or die('all module query error');
        $this->allmodule = $getallmodule;
    }

    public function get_specific_module($whichschool){
        $specificmoduleQuery = 'SELECT * FROM `academic plan codes` WHERE school LIKE "'.$whichschool.'"';
        $getspecificmodule = mysqli_query($this->conn,$specificmoduleQuery) or die('specific module query error');
        return $getspecificmodule;
    }

    public function get_all_module(){
        return $this->allmodule;
    }

    public function get_school(){
        return $this->school;
    }

    public function get_previous_module($oldcode){
        $oldmoduleQuery ='SELECT * FROM `academic plan codes` WHERE Code LIKE "'.$oldcode.'"';
        $getoldmodule = mysqli_query($this->conn, $oldmoduleQuery) or die('Get a Module error');
		$oldmodule = mysqli_fetch_array($getoldmodule, MYSQLI_ASSOC);
        return $oldmodule;
    }

    public function search_module($search){
        $searchQuery = 'SELECT * FROM `academic plan codes` WHERE `Code` LIKE "%'.$search.'%" OR `Academic Plan` LIKE "%'.$search.'%"';
        $getsearch = mysqli_query($this->conn,$searchQuery) or die('search module error');
        return $getsearch;
    }

    public function add_module($code,$acadplan,$school){
        $addmoduleQuery = 'INSERT INTO `academic plan codes` (`Code`, `Academic Plan`, `School`) VALUES ("'.$code.'", "'.$acadplan.'", "'.$school.'")';
        $addmodule = mysqli_query($this->conn, $addmoduleQuery);
    }

    public function edit_module($code,$acadplan,$school,$codebeforeedit){
        $updatemoduleQuery ='UPDATE `academic plan codes` SET `Code` ="'.$code.'",`Academic Plan` = "'.$acadplan.'", `School` = "'.$school.'" WHERE Code LIKE "'.$codebeforeedit.'"';
        $updatemodule = mysqli_query($this->conn, $updatemoduleQuery);
    }

    public function delete_module($codebeforeedit){
        $deletemoduleQuery ='DELETE FROM `academic plan codes` WHERE `Code` LIKE "'.$codebeforeedit.'"';
        $deletemodule = mysqli_query($this->conn, $deletemoduleQuery);
    }
}
?>