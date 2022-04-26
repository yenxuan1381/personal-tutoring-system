<?php

namespace Model;

class announcement{

    private $conn;
    private $announcement;
    private $announcementid;
    private $announcementList;
    private $commentList;
    private $comment;
    private $name;
    

    public function __construct($user_name,$announcement_id){

        include('Connection.php');
        $this->name = $user_name;
        $this->conn = $conn;
        $this->announcementid = $announcement_id;
        $AnnouncementListQuery = "SELECT * FROM announcement WHERE tutor_name = '$user_name'";
        $AnnouncementList = mysqli_query($conn, $AnnouncementListQuery) or die("Error fetching announcement list.");
        $this->announcementList = $AnnouncementList;

        $AnnouncementQuery = "SELECT * FROM announcement WHERE announcement_id = '$announcement_id'";
        $getAnnouncement = mysqli_query($conn, $AnnouncementQuery) or die("Error fetching announcement.");
        $this->announcement = mysqli_fetch_array($getAnnouncement,MYSQLI_ASSOC);

        $CommentQuery = "SELECT * FROM comment WHERE announcement_id = '$announcement_id'";
        $getCommentList = mysqli_query($conn, $CommentQuery) or die("Error fetching comments.");
        $this->commentList = $getCommentList;
        
    }




    public function get_announcement_list(){
        return $this->announcementList;
    }

    public function get_announcement(){
        return $this->announcement;
    }

    public function add_announcement($user_name){
        $title = $_POST['title'];
        $content = $_POST['text'];

        $sql = "INSERT INTO announcement (title,content,tutor_name) VALUES ('$title','$content','$user_name')";
        if(mysqli_query($this->conn, $sql)){
    		header("Location:Announcement.php");
		} else {
    			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
    }

    public function delete_announcement(){
        $id = $_POST['id'];
		$DeleteQuery = "DELETE FROM announcement WHERE announcement_id='$id'";          
		if(mysqli_query($this->conn, $DeleteQuery)){
    		header('Location:'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);
		} else {
    			echo "ERROR: Could not able to execute $DeleteQuery. " . mysqli_error($link);
		}
    }

    public function get_comment(){
        return $this->commentList;
    }

    public function add_comment(){
        $comment = $_POST['text'];
        $sql = "INSERT INTO comment (user_name,announcement_id,content) VALUES ('$this->name','$this->announcementid','$comment')";
        if(mysqli_query($this->conn, $sql)){
			header("Location:Announcementview.php?announcementid=$this->announcementid");
		} 
		else {
    			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
    }

    public function edit_announcement(){
        $title = $_POST['title'];
		$content = $_POST['text'];
        $sql = "UPDATE announcement SET title='$title',content='$content' WHERE announcement_id='$this->announcementid' ";
        if(mysqli_query($this->conn, $sql)){
    		header("Location:Announcement.php");
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }


}
?>