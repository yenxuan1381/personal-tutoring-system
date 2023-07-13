# NottsTutor 2.0 by Group 2b

## Project Description

NottsTutor 2.0 is an automated system designed to streamline the process of personal tutoring in educational institutions. It is primarily developed to automate the allocation of tutors to students, a task traditionally done manually using Excel sheets by senior tutors.

The system is built using PHP for server-side scripting, MySQL for database management, and HTML/CSS for frontend design. It leverages the XAMPP platform, which provides an easy-to-use control panel for managing Apache, MySQL, and other services.

NottsTutor 2.0 provides real-time access to updated tutee information, maintains records of students' information, and allows tutors to manage this information through the system. This eliminates the need for manual record-keeping, thus increasing efficiency and reducing the likelihood of errors.

In a professional context, NottsTutor 2.0 can be used by educational institutions to manage their tutoring programs. It can help senior tutors minimize their workload by automating routine tasks. Furthermore, it can provide tutors with a more efficient way to manage their tutees and access relevant information.

### Table of Contents  
- **[Project Setup](#project-setup)**<br> 
- **[Prototype Demo](#prototype-demo)**<br>

## Project Setup

1.	Download the COMP2019_Group2B_PersonalTutoringSystem ZIP file and extract the COMP2019_Group2B_PersonalTutoringSystem folder. The extracted file will include files as shown in the picture below
![download and extract folder](https://i.imgur.com/bcrx7ha.png)

### XAMPP

#### Install XAMPP
2.	After that, XAMPP needs to be installed to run the code to access our system. Please follow this link:https://www.wikihow.com/Install-XAMPP-for-Windows to guide you on the installation of XAMPP on your computer.

#### Upload the Database

3.	After completing the installation, run the XAMPP software. Click the two `Start` buttons marked in red in the image  below to run Apache and SQL.

![Apache and MySQL](https://i.imgur.com/1bThnaD.png)

4.	Now click on Admin button in MySQL to open PhpMyAdmin.
![Admin](https://i.imgur.com/WSOjFTk.png)

5.	Type in `localhost` in your browser and the XAMPP dashboard should be opened.

6.	Click on phpMyAdmin to open the phpMyAdmin dashboard.
![phpMyAdmin](https://i.imgur.com/eVuhh0J.png?1)

7.	Create a new database by clicking on `Create` on the left side of the panel panel.
![create database](https://i.imgur.com/F2RsUUZ.png)

8. Type in the database name `csv_db 15` and click `Create`.
**Make sure that the name of the database created is csv_db 15 so the SQL file can be imported correctly.**
![csv_db 15](https://i.imgur.com/f0Z3mLL.png)

9.	Click the `Import` button.
![import button](https://i.imgur.com/nlndl00.png)

10.	Click the `Choose File` and choose the SQL file named 'csv_db 15.sql'. The SQL file is in our COMP2019_Group2B_PersonalTutoringSystem-main/Database
![choose_file_button](https://i.imgur.com/GpIxDyQ.png)

11.	You can file the csv_db 15.sql in the Database folder as shown on the picture below.
![database file](https://i.imgur.com/a6MgqJu.png)

12.	After that, scroll to the bottom of the page and click the `Go` button.

13.	The SQL file should be imported successfully and the csv_db 15 database should have the following tables accordingly:
![tables in database](https://i.imgur.com/PAKJARE.png)

#### Setup the  Website
14.	Inside the XAMPP folder, click into the `htdocs` folder and place the extracted folder “COMP2019_Group2B_PersonalTutoringSystem” in there.  
![htdocs](https://i.imgur.com/OaL1Ef8.png)

15.	The system is now accessible using local host. Type in the following link: `http://localhost/COMP2019_Group2B_PersonalTutoringSystem/Codes/Loginpage.php` 
You have now entered the login page. Please follow the instructions in the next section to use the function to use the features in the NottsTutor 2.0 website.

### Accessing the Website

To sign in to your account, key in your student ID and password on the login page. Then, click on the `LOGIN` button .

|      Role      |       ID      |    Password   |
| -------------  | ------------- | ------------- |
| Administrator  |    10000001   |      0000     |
| Regular Tutor  |    50000033   |      1234     |
| Senior Tutor   |    50000031   |      1234     |
| Student        |    20050927   |      1234     |

The system operates as follow:
1. User logs in as administrator and uploads a .csv file containing all the student's data. 
2. Our system will then automatically allocate the students into groups and assign each group of student with a tutor.
3. Tutors are able to log in as senior tutor or regular tutor to view their assigned tutees. Senior tutor has an additional privilage to view all students' information and their assigned tutor.
4. Students can then log into the system to view own profile and their assigned tutor's profile.


## Prototype Demo
[Download PDF](/prototype-demo.pdf)
