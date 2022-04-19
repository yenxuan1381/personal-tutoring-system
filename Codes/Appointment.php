<?php
    session_start();

	include_once('Connection.php');

	// If haven't login, then change to login page
	if((!(isset($_SESSION['userid']))) or (($_SESSION['category'] != "Tutor") and ($_SESSION['category'] != "Student")))
	{
		header("Location:Loginpage.php");
	}
    $userid = $_SESSION['userid'];
?>




<!DOCTYPE html>
<html lang="en">

    
    <head>
        <meta name="vieport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="image/icon.png" sizes="16x16">
        <title>NOTTSTUTOR</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="calender.css">
        

    </head>
    <body>
        <aside>
            <div class="header">
                <div class="logo">
                    <img src="./image/logo1.png" alt="" >
                    <span class="title">NOTTSTUTOR</span>
                </div>
                <div class="hidden">
                    <img src="./image/icon.png" alt="">
                </div>
            </div>
            <div class="menu">
                <?php 
                    if($_SESSION['category'] == "Student") {
                        require_once "sidebar_student.php";
                    }
                    else if($_SESSION['category'] == "Tutor"){
                        require_once "sidebar_tutor.php";
                    }
                ?>
            </div>
            <div class="logout">
                <a href="loginpage.php">
                    <span class="title">Logout</span>
                    <ion-icon name="log-out"></ion-icon>
                </a>
            </div>
        </aside>
        <!-- change any thing you want in main -->
        <main>
            <div class="content">
            <div class="left">
            <div class="container">
                <div class="calendar">
                  <div class="front">
                    <div class="current-date">
                      <p1 class="prev"><</p1>
                      <h1></h1>  
                      <p2 class="next">></p2>
                      <h2></h2>
                    </div>
          
                    <div class="current-month">
                      <ul class="week-days">
                        <li>SUN</li>
                        <li>MON</li>
                        <li>TUE</li>
                        <li>WED</li>
                        <li>THU</li>
                        <li>FRI</li>
                        <li>SAT</li>
                      </ul>
          
                      <div class="days">
                      
                      </div>
   
                    </div>
                  </div>
          
                </div>
              </div>
            </div>
            </div>
        </main>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>

<script>
  const date = new Date();
const date1 = new Date();

const renderCalendar = () =>{
    date.setDate(1);

const monthDays = document.querySelector('.days');


const lastDay = new Date(date.getFullYear(),
date.getMonth() + 1,0).getDate();

const prevLastDay = new Date(date.getFullYear(),
date.getMonth(),0).getDate();

const firstDayIndex = date.getDay();

const lastDayIndex = new Date(
    date.getFullYear(),
    date.getMonth() + 1,
    0
).getDay();

const nextDays = 7 - lastDayIndex - 1;



const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December"
];

document.querySelector('.current-date h1').innerHTML
= months[date.getMonth()]+" "+date.getFullYear();

document.querySelector('.current-date h2').innerHTML
= date1.toDateString();

let days = "";

for(let x=firstDayIndex;x>0;x--){
    days += `<div class="last-month">${prevLastDay-x+1}</div>`;
}

for(let i=1;i<= lastDay;i++){
    year = date.getFullYear();
    month = date.getMonth();
    if(i===new Date().getDate() && date.getMonth()===new Date().getMonth()){
        days += `<div><a href="Appointmentview.php?date=${year}-${month+1}-${i}"><span class="event">${i}</span></a></div>`;
        monthDays.innerHTML = days;
        
    }
    else{
        days += `<div><a href="Appointmentview.php?date=${year}-${month+1}-${i}"><span>${i}</span></a></div>`;
        monthDays.innerHTML = days;
        
    }

}

for(let j=1;i<=nextDays;j++){
    days+=`<div class="last-month"></div>`
    monthDays.innerHTML = days;
}
}


document.querySelector('.prev').
addEventListener('click',()=>{
    date.setMonth(date.getMonth()-1)
    renderCalendar();
})

document.querySelector('.next').
addEventListener('click',()=>{
    date.setMonth(date.getMonth()+1)
    renderCalendar();
})

renderCalendar();

</script>