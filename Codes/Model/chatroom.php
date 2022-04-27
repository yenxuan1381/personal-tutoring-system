<?php

namespace Model;

// Class for chatroom model
class chatroom{

    private $conn;
    private $message;
    private $room;

    // Constructor for chatroom model class
    public function __construct(){
        include('Connection.php');
        $this->conn = $conn;
    }

    // Function to insert new messages typed into the database
    public function send_message($name,$date){
        $msg = addslashes($_POST['msg']);
		$id = $_POST['id'];
		mysqli_query($this->conn,"INSERT into `general_chat` (chat_room_id, chat_msg, username, chat_date) 
		values ('$this->room', '$msg' , '".$name."', '$date')") or die(mysqli_error($this->conn));
    }

    public function read_message(){
        return $this->message;
    }

    // Function to obtain chat information according to the chat_room_id
    public function set_room($room){
        $this->room=$room;
        $messageQuery = "SELECT * from `general_chat` where chat_room_id= '$room' order by chat_date asc";
        $getmessage=mysqli_query($this->conn,$messageQuery) or die(mysqli_error($this->conn));
        $this->message = $getmessage;
    }

    public function get_room(){
        return $this->room;
    }
}

?>