<?php

namespace Model;

// Class for file_csv model
class file_csv{
    private $conn;

	// Constructor for file_csv model class
    public function __construct(){
        include('Connection.php');
        $this->conn = $conn;
    }

	// Function to add student csv file into database
    public function submit_file_student(){
        if(mysqli_connect_error())
		{
			die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
		}
		else
		{
			$errorcheck = 0;
			
			$filename = $_SERVER['DOCUMENT_ROOT']."/".$_FILES["file"]["name"];
			$ext = substr($filename,strrpos($filename,"."),(strlen($filename)-strrpos($filename,".")));
			if($ext==".csv")
			{
				mysqli_query($this->conn, 'TRUNCATE TABLE temp') or die("Truncate error");
				move_uploaded_file($_FILES["file"]["tmp_name"],$filename);
				$file = fopen($filename, "r");
				fgetcsv($file);
				while (($datacol = fgetcsv($file)) !== FALSE)
				{
					// If not registered then skip the line
					if ($datacol[16] != "Yes")
					{
						continue;
					}
					
					// Check if module does not exists here, datacol[6]
					$moduleexist = mysqli_query($this->conn,'SELECT * FROM `academic plan codes` WHERE Code LIKE "'.$datacol[6].'"') or die('module check error');
					if(mysqli_num_rows($moduleexist) == 0)
					{
						$errorcheck = 1;
						break;
					}
					
					// For any empty column, fill in "Null"
					for ($i = 0; $i < 19; $i++)
					{
						$datacol[$i] = Addslashes($datacol[$i]);
						if (empty($datacol[$i]))
						{
							$datacol[$i] = Null;
						}
						elseif ($datacol[$i] == "NA")
						{
							$datacol[$i] = "Null";
						}
					}
					
					// Set the year for Foundation, Postgraduates taught and research to 0, 6 & 7 respectively
					if ($datacol[13] == "Foundation")
					{
						$datacol[9] = "0";
					}
					elseif ($datacol[13] == "Postgraduate Taught")
					{
						$datacol[9] = 6;
					}
					elseif ($datacol[13] == "Postgraduate Research")
					{
						$datacol[9] = 7;
					}

					$sql = "INSERT into temp(`Student ID`,`Full Name`,`First Name`,`Last Name`,`Nationality`,`Gender`,`Academic Plan Code`,`Intake`,`Year of Entry (UG)`,`Fnd 2-sem or 3-sem?`,`New / Progressing`,`Level`,`Email Address`,`Registration Date`,`Registered`,`Remarks`,`Remarks 2`) values($datacol[0],'$datacol[1]','$datacol[2]','$datacol[3]','$datacol[4]','$datacol[5]','$datacol[6]','$datacol[8]',$datacol[9],'$datacol[10]','$datacol[11]','$datacol[13]','$datacol[14]','$datacol[15]','$datacol[16]','$datacol[17]','$datacol[18]')";
					mysqli_query($this->conn, $sql) or die("Import error");
					
				}
				fclose($file);
				if($errorcheck == 1)
				{
					echo '<script>window.confirm("There exists new unregistered code in the file. Which is:\n\n';
					echo $datacol[6].' -- '.$datacol[7].' -- '.$datacol[12].'\n';
					echo '\nPlease register the codes under the \'Modules\' Tab before importing the file.");</script>';
				}
				else
				{
					$sortnew = new sortnew($this->conn);
					$sortnew->sort_data();
					echo '<script>window.confirm("CSV File has been successfully Imported and tutees have been assigned.");</script>';
				}
			}
			else
			{
				echo '<script>window.confirm("Error: Please Upload only CSV File");</script>';
			}
		}
    }
	// Function to add tutor csv file into database
	public function submit_file_tutor(){
		if(mysqli_connect_error())
		{
			die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
		}
		else
		{
            {
                
                $filename = $_SERVER['DOCUMENT_ROOT']."/".$_FILES["filename"]["name"];
                $ext = substr($filename,strrpos($filename,"."),(strlen($filename)-strrpos($filename,".")));
                if($ext==".csv")
                {
                    mysqli_query($this->conn, 'TRUNCATE TABLE temp') or die("Truncate error");
                    move_uploaded_file($_FILES["filename"]["tmp_name"],$filename); //change here
                    $file = fopen($filename, "r");
                    fgetcsv($file);
                    while (($datacol = fgetcsv($file)) !== FALSE)
                    {
                        
                        // For any empty column, fill in "Null"
                        for ($i = 0; $i < 5; $i++)
                        {
                            $datacol[$i] = Addslashes($datacol[$i]);
                            if (empty($datacol[$i]))
                            {
                                $datacol[$i] = Null;
                            }
                            elseif ($datacol[$i] == "NA")
                            {
                                $datacol[$i] = "Null";
                            }
                        }
    
                        $sql = "INSERT into tutors(`Lect ID`,`Name`,`School`,`Password`,`email`,`office`) values($datacol[0],'$datacol[1]','$datacol[2]','$datacol[3]','$datacol[4]','$datacol[5]')";
                        mysqli_query($this->conn, $sql) or die("Import error");
                        
                    }
                    fclose($file);
                    echo '<script>window.confirm("New Tutors added successfully .");</script>';
            }
	    }
    }	
	}
}

?>