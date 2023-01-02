<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pharmacist_Profile</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/PharmacistProfile.css">

</head>
<body>
   
<header class="header">

   <section class="flex">

      <div class="icon">
         <img src="images/medico.png" height="60px" width="140px">
      </div>

      <!--<nav class="navbar">
         <a href="#">HOME</a>
         <a href="#">HISTORY</a>
         <a href="#">PRESCRIPTION</a>
         <a href="#">ALLERGIES</a>
      </nav>-->

      <div class="icons">
         <div id="user-btn" class="fas fa-user"></div>
         <div id="menu-btn" class="fas fa-bars"></div>
      </div>

      <div class="profile">
         <div class="flex">
            <a href="PharmacistProfile.html" class="btn">profile</a>
            <a href="#" class="delete-btn">logout</a>
         </div>
      </div>


   </section>
 
</header>

<div class="heading">
   <h3>Pharmacy Name</h3>
</div>

<section class="user-details">

   <div class="user">
      <p><i class="fas fa-user"></i> <span>Pharmacy Name</span></p>
      <p><i class="fas fa-user"></i><span>Owner's name</span></p>
      <p><i class="fas fa-address-book"></i> <span>Registation number</span></p>
      <p><i class="fas fa-phone"></i> <span>011 1111111</span></p>
      <p><i class="fas fa-envelope"></i> <span>example@gmail.com</span></p>
      <p><i class="fas fa-map-marker-alt"></i> <span>No/ Line01, Line02</span></p>
      <a href="PharmacistProfileEdit.html" class="btn">update profile</a>
   </div>

</section>

<div class="file__upload">
   <div class="header">
      <p><i class="fa fa-cloud-upload fa-2x"></i><span><span>up</span>load</span></p>			
   </div>
   <form class="body">
      <input type="file" id="upload">
      <label for="upload">
         <i class="fa fa-file-text-o fa-3x"></i>
         <p>
            <strong>Drag and drop</strong> files here<br>
            or <span>browse</span> to begin the upload
         </p>
      </label>
   </form>
</div>

</div>

<footer class="footer">

   <div class="credit"><span>SLMedico</span> | The Open University</div>

</footer>

<div class="loader">
   <img src="images/favicon.png" alt="">
</div>

<script src="js/PatientProfile.js"></script>

</body>
</html>