<?php

	if(isset($_POST['submitfile']))
	{

		include_once('Connection.php');
		
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
                    mysqli_query($conn, 'TRUNCATE TABLE temp') or die("Truncate error");
                    move_uploaded_file($_FILES["filename"]["tmp_name"],$filename); //change here
                    $file = fopen($filename, "r");
                    fgetcsv($file);
                    while (($datacol = fgetcsv($file)) !== FALSE)
                    {
                        
                        //for any empty column, fill in "Null"
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
                        mysqli_query($conn, $sql) or die("Import error");
                        //die(mysqli_error($conn)."\n".$sql); - to check if sql error
                    }
                    fclose($file);
                    echo '<script>window.confirm("CSV File has been successfully Imported and tutees have been assigned.");</script>';
            }
	}
    }	
}
?>