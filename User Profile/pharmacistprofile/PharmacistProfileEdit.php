<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pharmacist update profile</title>

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
            <a href="PharmacistProfile.php" class="btn">profile</a>
            <a href="#" class="delete-btn">logout</a>
         </div>
      </div>

   </section>

</header>

<section class="form-container">

   <form action="" method="POST">
      <h3>update profile</h3>
      <input type="text" required maxlength="20" name="name" placeholder="enter pharmacy name" class="box" oninput="this.value = this.value.replace(/\s/g, '')" value="Pharmacy Name">
      <input type="text" required maxlength="20" name="name" placeholder="enter owner's name" class="box" oninput="this.value = this.value.replace(/\s/g, '')" value="Owner's Name">
      <input type="text" required maxlength="20" name="number" placeholder="enter registration number" class="box" oninput="this.value = this.value.replace(/\s/g, '')" value="Registation Number">
      <input type="text" required maxlength="50" name="address" placeholder="enter your address" class="box" oninput="this.value = this.value.replace(/\s/g, '')" value="no 15/D, Galle Road, Colombo">
      <input type="email" required maxlength="50" name="email" placeholder="enter your email" class="box" oninput="this.value = this.value.replace(/\s/g, '')" value="example@gmai.com">
      <input type="numner" min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false;" placeholder="enter your number" required class="box" name="number" value="0111111111">
      <input type="password" maxlength="20" name="old_pass" placeholder="enter your old password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" maxlength="20" name="new_pass" placeholder="enter your new password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" maxlength="20" name="confirm_pass" placeholder="confirm your new password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="update now" class="btn" name="submit">
   </form>

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