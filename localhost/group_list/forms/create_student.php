<?php
	include(__DIR__ . '/../auth/check_auth.php');

	if($_POST){
	    require_once "../model/autorun.php";
	    $myModel=Model\Data::makeModel(Model\Data::FILE);
	    $myModel->setCurrentUser($_SESSION['user']);

	    $student=(new \Model\Student())
            ->setGroupId($_GET['group'])
	        ->setName($_POST['stud_name'])
            ->setDob(new DateTime($_POST['stud_dob']))
            ->setPrivilege($_POST['stud_privilege'])
            ->setFemaleGender();
	    if($_POST['stud_gender']=='чол'){
	        $student->setMaleGender();
        }
	    if(!$myModel->addStudent($student)){
	        die($myModel->getError());
        } else {
	        header("Location: ../index.php?group=" . $_GET['group']);
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Додавання студента</title>
	<link rel='stylesheet' type='text/css' href='../styles/edit_student_form_style.css'>
</head>
<body>
	<a href='../index.php?group=<?php echo($_GET["group"]);?>'><На головну</a>
	<form name='edit_student' method='post'>
		<div>
			<label for='../index.php'>Прізвище : </label>
			<input type='text' name='stud_name'/>
		</div>
		<div>
			<label for='stud_gender'>Стать : </label>
			<select name='stud_gender'>
				<option disabled>Стать</option>
				<option value='чол'>Чоловіча</option>
				<option value='жін'>Жіноча</option>
			</select>
		</div>
		<div>
			<label for='stud_dob'>Дата народження : </label>
			<input type='date' name='stud_dob'/>
		</div>
		<div><input type='checkbox' name='stud_privilege' value=1/> пільга </div>
		<div><input type='submit' name='ok' value='додати'/></div>
	</form>
</body>
</html>