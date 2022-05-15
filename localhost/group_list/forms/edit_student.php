<?php
	include(__DIR__ . '/../auth/check_auth.php');

	require_once '../model/autorun.php';
	$myModel=Model\Data::makeModel(Model\Data::FILE);
	$myModel->setCurrentUser($_SESSION['user']);

	if($_POST){
	    $student=(new \Model\Student())
            ->setId($_GET['file'])
            ->setGroupId($_GET['group'])
            ->setName($_POST['stud_name'])
            ->setDob(new DateTime($_POST['stud_dob']))
            ->setPrivilege($_POST['stud_privilege'])
            ->setFemaleGender();
	    if($_POST['stud_gender']=='чол'){
	        $student->setMaleGender();
        }
	    if(!$myModel->writeStudent($student)){
	        die($myModel->getError());
        } else {
	        header("Location: ../index.php?group=" . $_GET['group']);
        }
    }

	$student=$myModel->readStudent($_GET['group'], $_GET['file']);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Pедагування студентa</title>
	<link rel='stylesheet' type='text/css' href='../styles/edit_student_form_style.css'/>
</head>
<body>
	<a href='../index.php?group=<?php echo $_GET['group'];?>'>на головну</a>
	<form name='edit_student' method='post'>
		<div>
			<label for='stud_name'>Прізвище : </label>
			<input type='text' name='stud_name' value="<?php echo $student->getName(); ?>">
		</div>
		<div>
			<label for='stud_gender'>Стать : </label>
			<select name='stud_gender'>
				<option disabled>Стать</option>
				<option <?php echo ($student->isGenderMale())?"selected":""; ?> value="чол">Чоловіча</option>
				<option <?php echo ($student->isGenderFemale())?"selected":""; ?> value="жін">Жіноча</option>
			</select>
		</div>
		<div>
			<label for='stud_dob'>Дата народження : </label>
			<input type="date" name="stud_dob" value='<?php echo $student->getDob()->format('d.m.Y');?>'/>
		</div>
		<div>
			<input type="checkbox" <?php echo ($student->isPrivilege())?"checked":"";?> name="stud_privilege" value='1'/>Пільга
		</div>
		<div>
			<input type="submit" name="OK" value='Змінити'/>
		</div>
	</form>
</body>
</html>