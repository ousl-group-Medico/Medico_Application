<?php 
    // initialize errors variable
	$errors = "";

	// connect to database
	$db = mysqli_connect("localhost", "root", "", "todo");

	// insert a quote if submit button is clicked
    //medical
	if (isset($_POST['submit'])) {
		if (empty($_POST['task'])) {
			$errors = "You must fill this field";
		}else{
			$task = $_POST['task'];
			$sql = "INSERT INTO tasks (task) VALUES ('$task')";
			mysqli_query($db, $sql);
			header('location: medihis.php');
		}
	}
        // delete task of medical
    if (isset($_GET['del_task'])) {
        $id = $_GET['del_task'];

        mysqli_query($db, "DELETE FROM tasks WHERE id=".$id);
        header('location: medihis.php');
    }	
    //surgical
    if (isset($_POST['submit'])) {
		if (empty($_POST['task1'])) {
			$errors = "You must fill this field";
		}else{
			$task1 = $_POST['task1'];
			$sql = "INSERT INTO surgical (task1) VALUES ('$task1')";
			mysqli_query($db, $sql);
			header('location: medihis.php');
		}
	}	

        // delete task of surgical
    if (isset($_GET['del_task1'])) {
        $id1 = $_GET['del_task1'];

        mysqli_query($db, "DELETE FROM surgical WHERE id1=".$id1);
        header('location: medihis.php');
    }
     //childhood
     if (isset($_POST['submit'])) {
		if (empty($_POST['task2'])) {
			$errors = "You must fill this field";
		}else{
			$task2 = $_POST['task2'];
			$sql = "INSERT INTO childhood (task2) VALUES ('$task2')";
			mysqli_query($db, $sql);
			header('location: medihis.php');
		}
	}	

        // delete task of childhood
    if (isset($_GET['del_task2'])) {
        $id2 = $_GET['del_task2'];

        mysqli_query($db, "DELETE FROM childhood WHERE id2=".$id2);
        header('location: medihis.php');
    }
     //family history
     if (isset($_POST['submit'])) {
		if (empty($_POST['task3'])) {
			$errors = "You must fill this field";
		}else{
			$task3 = $_POST['task3'];
			$sql = "INSERT INTO famhis (task3) VALUES ('$task3')";
			mysqli_query($db, $sql);
			header('location: medihis.php');
		}
	}	

        // delete task of family history
    if (isset($_GET['del_task3'])) {
        $id3 = $_GET['del_task3'];

        mysqli_query($db, "DELETE FROM famhis WHERE id3=".$id3);
        header('location: medihis.php');
    }

?>
   
<!DOCTYPE html>
<html>
<head>

	<title>Medical History</title>
    <link rel="stylesheet" type="text/css" href="medihis.css">
</head>
<body>
    <div>
        <!--Meidcal History-->
        <h1 id="MedicalHistory">Medical History </h1>
    <div class="MedHis">
         <!--Meidcal-->
        <h2 style="font-style: 'Hervetica';">Medical</h2>
        <form method="post" action="medihis.php" class="input_form">
            <input type="text" name="task" class="task_input"placeholder="Enter something....">
            <button type="submit" name="submit" id="add_btn" class="add_btn">Add</button>
            <?php if (isset($errors)) { ?>
                <p><?php echo $errors; ?></p>
                <?php } ?>
        </form>
        <table>
            <thead>
                <tr>
                    <th>N</th>
                    <th>Tasks</th>
                    <th style="width: 60px;">Action</th>
                </tr>
	        </thead>
            <tbody>
                <?php 
                    // select all tasks if page is visited or refreshed
                    $tasks = mysqli_query($db, "SELECT * FROM tasks");

                    $i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
                        <tr>
                            <td> <?php echo $i; ?> </td>
                            <td class="task"> <?php echo $row['task']; ?> </td>
                            <td class="delete"> 
                                <a href="medihis.php?del_task=<?php echo $row['id'] ?>">x</a> 
                            </td>
                        </tr>
                    <?php $i++; } ?>	
            </tbody>
        </table>
    </div>
     <!--Surgical-->
    <div class="surgical">
        <h2 style="font-style: 'Hervetica';">Surgical</h2>
        <form method="post" action="medihis.php" class="input_form">
            <input type="text" name="task1" class="task_input"placeholder="Enter something....">
            <button type="submit" name="submit" id="add_btn" class="add_btn">Add</button>
            <?php if (isset($errors)) { ?>
                <p><?php echo $errors; ?></p>
                <?php } ?>
        </form>
        <table>
            <thead>
                <tr>
                    <th>N</th>
                    <th>Tasks</th>
                    <th style="width: 60px;">Action</th>
                </tr>
	        </thead>
            <tbody>
                <?php 
                    // select all tasks if page is visited or refreshed
                    $surgical = mysqli_query($db, "SELECT * FROM surgical");

                    $i = 1; while ($row = mysqli_fetch_array($surgical)) { ?>
                        <tr>
                            <td> <?php echo $i; ?> </td>
                            <td class="task1"> <?php echo $row['task1']; ?> </td>
                            <td class="delete"> 
                                <a href="medihis.php?del_task1=<?php echo $row['id1'] ?>">x</a> 
                            </td>
                        </tr>
                    <?php $i++; } ?>	
            </tbody>
        </table>
    </div>
     <!--Childhood-->
    <div class="child">
        <h2 style="font-style: 'Hervetica';">Childhood</h2>
        <form method="post" action="medihis.php" class="input_form">
            <input type="text" name="task2" class="task_input"placeholder="Enter something....">
            <button type="submit" name="submit" id="add_btn" class="add_btn">Add</button>
            <?php if (isset($errors)) { ?>
                <p><?php echo $errors; ?></p>
                <?php } ?>
        </form>
        <table>
        
            <thead>
                <tr>
                    <th>N</th>
                    <th>Tasks</th>
                    <th style="width: 60px;">Action</th>
                </tr>
	        </thead>
            <tbody>
                <?php 
                    // select all tasks if page is visited or refreshed
                    $childhood = mysqli_query($db, "SELECT * FROM childhood");

                    $i = 1; while ($row = mysqli_fetch_array($childhood)) { ?>
                        <tr>
                            <td> <?php echo $i; ?> </td>
                            <td class="task2"> <?php echo $row['task2']; ?> </td>
                            <td class="delete"> 
                                <a href="medihis.php?del_task2=<?php echo $row['id2'] ?>">x</a> 
                            </td>
                        </tr>
                    <?php $i++; } ?>	
            </tbody>
        </table>
    </div>
     <!--Family History-->
    <div class="famhis">
        <h2 style="font-style: 'Hervetica';">Family History</h2>
        <form method="post" action="medihis.php" class="input_form">
            <input type="text" name="task3" class="task_input"placeholder="Enter something....">
            <button type="submit" name="submit" id="add_btn" class="add_btn">Add</button>
            <?php if (isset($errors)) { ?>
                <p><?php echo $errors; ?></p>
                <?php } ?>
        </form>
        <table>
            <thead>
                <tr>
                    <th>N</th>
                    <th>Tasks</th>
                    <th style="width: 60px;">Action</th>
                </tr>
	        </thead>
            <tbody>
                <?php 
                    // select all tasks if page is visited or refreshed
                    $famhis = mysqli_query($db, "SELECT * FROM famhis");

                    $i = 1; while ($row = mysqli_fetch_array($famhis)) { ?>
                        <tr>
                            <td> <?php echo $i; ?> </td>
                            <td class="task3"> <?php echo $row['task3']; ?> </td>
                            <td class="delete"> 
                                <a href="medihis.php?del_task3=<?php echo $row['id3'] ?>">x</a> 
                            </td>
                        </tr>
                    <?php $i++; } ?>	
            </tbody>
        </table>
    </div>
    </div>
     <!--end of medical history-->
</body>
</html>
