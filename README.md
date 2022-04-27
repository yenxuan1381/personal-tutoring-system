# NottsTutor 2.0 by Group 2b

## Project Description

The goal of our project is to develop an automated system that will make it easier for personal tutors to complete their responsibilities. The major goal is to develop a system that would assist in automating the process of allocating tutors to students, which is now done by senior tutors manually using an Excel Sheet. Meanwhile, the system would cater to tutors' demands, such as being able to access updated tutee information at all times, keeping records of students' information, and managing their information through the system rather than the manual method of keeping records on an excel sheet. The NottsTutor 2.0 website is being built with the goal of delivering a more functioning, robust system that will help senior tutors minimise their burden.

## Project Setup

First, download the COMP2019_Group2B_PersonalTutoringSystem ZIP file and extract the COMP2019_Group2B_PersonalTutoringSystem folder.


### XAMPP

#### Install XAMPP
XAMPP needs to be installed to run the code to access our system. Please follow this link:https://www.wikihow.com/Install-XAMPP-for-Windows to guide you on the installation of XAMPP on your computer.


#### Upload the Database
1. Run XAMPP

2. Click the start button for Apache and MySQL
![Apache and MySQL buttons](https://i.imgur.com/hH2ANWs.jpg)

3. Type in `localhost` in your browser and the XAMPP dashboard should be opened.

4. Click on phpMyAdmin to open the phpMyAdmin dashboard.

![phpMyAdmin](https://i.imgur.com/OM2mY80.jpg)

5. Create a new database by clicking on `Create` on the left side of the panel panel.

![create database](https://user-images.githubusercontent.com/62388054/115763638-57a47f00-a3ad-11eb-9753-931d514a77ba.png)

6. Type in the database name `csv_db 15` and click `Create`.

![csv_db 15](https://user-images.githubusercontent.com/62388054/115763966-ad792700-a3ad-11eb-8ccb-114068351d51.png)

**Make sure that the name of the database created is csv_db 15 so the SQL file can be imported correctly.**

7. Click the `Import` button.

![import button](https://i.imgur.com/27SMYQb.jpg)

8. Click the `Choose File` and choose the SQL file named 'csv_db 15.sql'.

![choose_file_button](https://i.imgur.com/Gr1RKpm.jpg)

After that, scroll to the bottom of the page and click the `Go` button.

9. The SQL file should be imported successfully and the csv_db 15 database should have the following tables accordingly:

![tables in database](https://i.imgur.com/ATAKNow.jpg)

#### Setup the  Website
1. Inside the XAMPP folder, click into the `htdocs` folder.

![htdocs](https://i.imgur.com/8lSZi4M.jpg)

Extract the 'COMP2019_Group2B_PersonalTutoringSystem' folder and place it inside the htdocs folder. The system is now accessible using local host.

2. Type in `http://localhost/COMP2019_Group2B_PersonalTutoringSystem/Codes/Loginpage.php` in your browser to access the Login screen of NottsTutor 2.0.

![login page](https://i.imgur.com/tqWSNGD.png)

### Accessing the Website

In our system, different users have different privilages. The login credentials for each role has been provided below for demonstration purposes:

1. Administrator

ID: 10000001  
Password: 0000

2. Regular Tutor

ID: 50000033  
Password: 1234

3. Senior Tutor

ID: 50000031  
Password: 1234

4. Student

ID: 20050927  
Password: 1234


The system operates as follow:
1. User logs in as administrator and uploads a .csv file containing all the student's data. 
2. Our system will then automatically allocate the students into groups and assign each group of student with a tutor.
3. Tutors are able to log in as senior tutor or regular tutor to view their assigned tutees. Senior tutor has an additional privilage to view all students' information and their assigned tutor.
4. Students can then log into the system to view own profile and their assigned tutor's profile.


**Refer to final report for the complete user manual**

