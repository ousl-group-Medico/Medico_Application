<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/C,A,Pres(DocView).css">
    <link type="text/css" rel="stylesheet" href="css/Prescription.css">
    <link rel="stylesheet" href="css/PatientProfile(DocView).css">
    <link rel="stylesheet" href="css/MediHistory.css">
    
    
    <title>Patient profile(DocView)</title>
    <script src="js/BMI.js">
		function BMI() {
			var h=document.getElementById('h').value;
			var w=document.getElementById('w').value;
			var bmi=w/(h/100*h/100);
			var bmio=(bmi.toFixed(2));

			document.getElementById("result").innerHTML="Your BMI is " + bmio;
		}
	</script>
</head>
<body>
  <!--Doctor View Patient profile-->
  <div class="PatientPro">
    <h1>Patient Profile
       <!--link to the doctor's profile-->	
      <a class="btn-back" href=".html"><button>Back to My Profile </button></a>		
    </h1>
     

         <!--Pateint Datails-->
      <div>
          <label for="Topic">Name:</label>
          <input type="text2"id="name" name="name"><br>
          <label for="Topic">NIC:   </label>
          <input type="text2"id="NIC" name="NIC"><br>
      
          <label for="Topic">Age:</label>
          <input type="text2"id="Age" name="Age"><br>
     
          <label for="Topic">Address:</label>
          <input type="text2"id="Address" name="Address"><br>
     
          <label for="Topic">Gender:</label>
          <input type="text2"id="Gender" name="Gender"><br>
     
          <label for="Topic">Civil Status:</label>
          <input type="text2"id="Cs" name="CS"><br>
      </div>
       
    </div> 
    
 
      	<!--BMI Calculator-->
		<div class="BMICalc">
			<h2>BMI Calculator</h2>
			<p class="text1">Height</p>
			<input type="text0" id="h">
			<p class="text1">Weight</p>
			<input type="text0" id="w">
			<p class="text1">BMI</p>
			<p id="result"></p>
			<button id="btn1" onClick="BMI()">Calculate</button>
			<p id="info">Please enter height [cm] and weight [kg]</p>
			<p class="text1">Blood Type</p>
			<select id="Blood_Type" name="Blood_Type"style="width:100px">
				<option value="A+">A+</option>
				<option value="A-">A-</option>
				<option value="B+">B+</option>
				<option value="B-">B-</option>
				<option value="AB+">AB+</option>
				<option value="AB-">AB-</option>
				<option value="O+">O+</option>
				<option value="O-">O-</option>
			</select>
		</div>
    <!--link to relevant area-->
    <div class="btn">
      <a href="#Complins"><button>Complains</button></a>
      <a href="#Complications"><button>Complications</button></a>
      <a href="#Allergies"><button>Allergies</button></a> <br>
      <a href="#Prescriptions"><button>Prescriptions</button></a>
      <a href="MediHis/medihis.php"><button>Medical history</button></a>
    </div>
  </div>
  <hr><hr>
  <div class="flex-container">
    <div class="flex-child">
      <!--Complains-->
      <h1 id="Complins">Complains</h1>
      <ul>
        <p><input type="checkbox" id="chk1" name="chkdemo"><label for="chk1"></label> Abdominal pain</p> 
        <p><input type="checkbox" id="chk2" name="chkdemo"><label for="chk2"></label> Backache</p>
        <p><input type="checkbox" id="chk3" name="chkdemo"><label for="chk3"></label> Chest pain</p>
        <p><input type="checkbox" id="chk4" name="chkdemo"><label for="chk4"></label> Cough</p>
        <p><input type="checkbox" id="chk5" name="chkdemo"><label for="chk5"></label> Dizziness</p>
        <p><input type="checkbox" id="chk6" name="chkdemo"><label for="chk6"></label> Dyspnoea</p>
        <p><input type="checkbox" id="chk7" name="chkdemo"><label for="chk7"></label> Earache</p>
        <p><input type="checkbox" id="chk8" name="chkdemo"><label for="chk8"></label> Headache</p>
        <p><input type="checkbox" id="chk9" name="chkdemo"><label for="chk9"></label> Joint pain</p>
        <p><input type="checkbox" id="chk10" name="chkdemo"><label for="chk10"></label> Numbess</p>
        <p><input type="checkbox" id="chk11" name="chkdemo"><label for="chk11"></label> Skin rash</p>
        <p><input type="checkbox" id="chk12" name="chkdemo"><label for="chk12"></label> Sore throat</p>
      </ul>
      </div>
      <div class="flex-child 1">
        <form>
          <textarea class="comment" placeholder="Add New"></textarea>
          <br>
          <div class="btn-submit">
            <button class="submit">Submit</button>
          </div> 
        </form>
      </div>
   </div>
      <hr><hr>
      <!--end of complains-->
    <div class="flex-container">
      <div class="flex-child">
      <!--complications-->
      <h1 id="Complications">Complications</h1> 
        <ul>
          <li>Co-mobidities</li></ul>
        <ul>
          <p><input type="checkbox" id="chkA" name="chkdemo"><label for="chkA"></label>  Hypertention</p>
          <p><input type="checkbox" id="chkB" name="chkdemo"><label for="chkB"></label> Dyslipidaemia</p>
          <p><input type="checkbox" id="chkC" name="chkdemo"><label for="chkC"></label> Obesity</p>
          <p><input type="checkbox" id="chkD" name="chkdemo"><label for="chkD"></label> Smoking</p>
        </ul>
          <li>Micro -Vascular Complication</li>
        <ul>
          <p><input type="checkbox" id="chkE" name="chkdemo"><label for="chkE"></label>  Neuropathy</p>
          <p><input type="checkbox" id="chkF" name="chkdemo"><label for="chkF"></label>  Nephropathy</p>
          <p><input type="checkbox" id="chkG" name="chkdemo"><label for="chkG"></label> Retinopathy </p>
        </ul>
          <li>Macro -Vascular Complication</li>
        <ul>
          <p><input type="checkbox" id="chkH" name="chkdemo"><label for="chkH"></label>  IHD</p>
          <p><input type="checkbox" id="chkI" name="chkdemo"><label for="chkI"></label> Stroke</p>
          <p><input type="checkbox" id="chkJ" name="chkdemo"><label for="chkJ"></label>  Perpheral Vascular Disease</p>
        </ul>
        <br>
        </div>
      <div class="flex-child 1">
        <form>
            <h3>Others:</h3>
            <textarea class="comment1" placeholder="................."></textarea>
            <br>
            <div class="btn-submit">
              <button class="submit">Submit</button>
            </div> 
        </form>
      </div>
    </div><hr><hr>
    <!--end of complication-->
    <div class="flex-container">
      <div class="flex-child">
        <!--Allergies-->
        <h1 id="Allergies">Allergies</h1>
        <table id="table1">
          <tr>
            <th>Drug Allergies</th>
            <th>Food Allergies</th>
          </tr>
          <tr>
            <td>xxxxxxxxxxxxxxxx</td>
            <td>xxxxxxxxxxxxxxxx</td>
          </tr>
          <tr>
            <td>xxxxxxxxxxxxxxxx</td>
            <td>xxxxxxxxxxxxxxxx</td>
          </tr>
          <tr>
            <td>xxxxxxxxxxxxxxxx</td>
            <td>xxxxxxxxxxxxxxxx</td>
          </tr>
          <tr>
            <td>xxxxxxxxxxxxxxxx</td>
            <td>xxxxxxxxxxxxxxxx</td>
          </tr>
        </table>
      </div>
      <div class="flex-child 1">
            <form>
                <textarea class="comment2" placeholder="Add New"></textarea>
                <select>
                    <option>Drug Allergies</option>
                    <option>Food Allergies</option>
                  </select>
                  <div class="btn-submit">
                    <button class="submit">Submit</button>
                  </div>
            </form>
        </div>
    </div>
  <!--end of allergies-->
    <br><br><br><br>
    <hr><hr>
    <!--Prescription-->
    <h1 id="Prescriptions">Prescriptions</h1>
    <div class="container">
      <div class="DateTime" id="DateTime" border="5px">
        <div>Date:<div id="date"></div></div>
        <div>Time:<div id="time"></div></div>
      </div>
    
      <table>
        <tr>
            <td>
                <form autocomplete="off" onsubmit="onFormSubmit()">
                    
                    <h2>Add New</h2>
                    <hr>
                    <div>
                        <input type="text1" name="DrugName" id="DrugName" placeholder="Drug Name">
                    </div>
                    <div>
                        <input type="text1" name="Dosage" id="Dosage" placeholder="Dosage (.mg)">
                    </div>
                    <div>
                        <input type="number" name="Frequency" id="Frequency" placeholder="Frequency">
                    </div>
                    <div>
                        <input type="number" name="Days" id="Days" placeholder="Duration (days)">
                    </div>
                    <div>
                        <input type="date" name="IssueedDate" id="IssueedDate" placeholder="Issueed Date">
                    </div>
                    <div class="form_action--button">
                        <input type="submit" value="Add">
                        <input type="reset" value="Cancel">
                    </div>
                </form>
  
                <td>
                  
                    <table class="list-Press" id="PressList">
                       
                        <thead>
                            <tr>
                                <th>Drug Name</th>
                                <th>Dosage (.mg)</th>
                                <th>Frequency</th>
                                <th>Duration (days)</th>
                                <th>Issueed Date</th>
                            </tr>
                        </thead>
                        <tbody>
  
                        </tbody>
                    </table>
                </td>
            </td>
        </tr>
      </table>
      
      <script src="js/Prescription.js"></script>
    </div>
    <!--end of prescription-->
   
   <!--end of medical history-->
   <!--Back to top arrow-->
   <a href="#" class="top"> &#8593;</a>

   
</body>
</html>