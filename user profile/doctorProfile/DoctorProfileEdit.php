<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Doctor update profile</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/DoctorProfile.css">

</head>
<body>
   
<header class="header">

   <section class="flex">

      <div class="icon">
         <img src="images/medico.png" height="60px" width="140px">
      </div>

     <!-- <nav class="navbar">
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
            <a href="PatientProfile.html" class="btn">profile</a>
            <a href="#" class="delete-btn">logout</a>
         </div>
      </div>

   </section>

</header>

<section class="form-container">

   <form action="" method="POST">
      <h3>update profile</h3>
      <input type="text" required maxlength="20" name="name" placeholder="enter your name" class="box" oninput="this.value = this.value.replace(/\s/g, '')" value="Full Name">
      <input type="text" required maxlength="100" name="prac_place" placeholder="enter your practice place" class="box" oninput="this.value = this.value.replace(/\s/g, '')" value="Practice Place">
      <input type="text" required maxlength="50" name="position" placeholder="enter your Position" class="box" oninput="this.value = this.value.replace(/\s/g, '')" value="Position">
      <input type="numner" min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false;" placeholder="enter your nic" required class="box" name="number" value="1234567890">
      <input type=date id = DOB class="box" placeholder="enter your date of birth">
      <input type="number" onclick = "ageCalculator()" class="box" placeholder="your age" id="result">
      <script>
         function ageCalculator() {  
    var userinput = document.getElementById("DOB").value;  
    var dob = new Date(userinput);  
    if(userinput==null || userinput=='') {  
      document.getElementById("message").innerHTML = "**Choose a date please!";    
      return false;   
    } else {  
      
    //calculate month difference from current date in time  
    var month_diff = Date.now() - dob.getTime();  
      
    //convert the calculated difference in date format  
    var age_dt = new Date(month_diff);   
      
    //extract year from date      
    var year = age_dt.getUTCFullYear();  
      
    //now calculate the age of the user  
    var age = Math.abs(year - 1970);  
      
    //display the calculated age  
    return document.getElementById("result").innerHTML =    
             "Age is: " + age + " years. ";  
    }  
}  
      </script>
      <div class="box">
      <input type="radio" name="gender" value="male"> Male  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="gender" value="female"> Female   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="gender" value="other"> Other</div>
      <div class="box">
      <input type="radio" name="status" value="single"> Single  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="status" value="married"> Married   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="status" value="other"> Other</div>
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