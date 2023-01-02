<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Patient Profile</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/PatientProfile.css">

</head>
<body>
   
<header class="header">

   <section class="flex">

      <div class="icon">
         <img src="images/medico.png" height="60px" width="140px">
      </div>

      <nav class="navbar">
         <a href="#">HOME</a>
         <a href="#">HISTORY</a>
         <a href="#">PRESCRIPTION</a>
         <a href="#">ALLERGIES</a>
      </nav>

      <div class="icons">
         <div id="user-btn" class="fas fa-user"></div>
         <div id="menu-btn" class="fas fa-bars"></div>
      </div>

      <div class="profile">
         <div class="flex">
            <a href="PatientProfile.html" class="btn">profile</a>
            <a href="#" class="delete-btn">logout</a>
         </div>
      </div>


   </section>
 
</header>

<div class="heading">
   <h3>Full Name</h3>
   <p><i class="fa-solid fa-person"></i> <span>BMI</span></p>
   <p><i class="fa-solid fa-droplet"></i> <span>Blood Type</span></p>
</div>

<section class="user-details">

   <div class="user">
      <img src="images/qr.png" alt="">
      <p><i class="fas fa-user"></i> <span>Full Name</span></p>
      <p><i class="fa-solid fa-id-card-clip"></i><span>200000000000</span></p>
      <p><i class="fa-solid fa-cake-candles"></i><span>00/00/0000</span></p>
      <p><i class="fa-solid fa-genderless"></i><span>Male</span></p>
      <p><i class="fas fa-phone"></i> <span>011 1111111</span></p>
      <p><i class="fas fa-envelope"></i> <span>example@gmail.com</span></p>
      <p><i class="fas fa-map-marker-alt"></i> <span>No/ Line01, Line02</span></p>
      <a href="PatientProfileEdit.html" class="btn">update profile</a>
   </div>

</section>

<footer class="footer">

   <div class="credit"><span>SLMedico</span> | The Open University</div>

</footer>

<div class="loader">
   <img src="images/favicon.png" alt="">
</div>

<script src="js/PatientProfile.js"></script>

</body>
</html>