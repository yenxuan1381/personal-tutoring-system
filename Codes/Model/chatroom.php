<?php

namespace Model;

class chatroom{

    private $conn;
    private $message;
    private $room;
    public function __construct(){
        include('Connection.php');
        $this->conn = $conn;
    }

    public function send_message($name,$date){
        $msg = addslashes($_POST['msg']);
		$id = $_POST['id'];
		mysqli_query($this->conn,"INSERT into `general_chat` (chat_room_id, chat_msg, username, chat_date) 
		values ('$this->room', '$msg' , '".$name."', '$date')") or die(mysqli_error($this->conn));
    }

    public function read_message(){
        return $this->message;
    }

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