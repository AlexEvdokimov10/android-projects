<?php
require 'model.php';
$status=2;
$db=new CarDB();
if ($_GET['code'] && $_POST) {
	$status=$db->editCar(new Car($_GET['code'],$_POST['carNumber'],$_POST['carPlaces'],new Owner($_POST['codeOwner']), new Autopark($_POST['codeAutopark'])));
	
		header("Location: index.php");
	

}
$car=$db->readCar(new Car($_GET['code']));
$owners=$db->getOwners();
$autoparks=$db->getAutoparks();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit car</title>
</head>
<body>
<form name="my" method="post" action='edit.php?code=<?php echo $_GET['code'];?>'>
	<div class="container">
		<div class="row text-center">
			<div class="col-sm-6 col-md-4 col-lg-3 col-sm-offset-3 col-md-offset-4">
				<?php
				if($status!=2){
					echo "<h2 class='text-danger'> Помилка зміни даних </h2>";
				}
				?>
				<div class="form-owner">
					<label for='carNumber'>
						Number
					</label>
					<input type="text" class="form-control" name="carNumber" placeholder="Number" value="<?php echo $car->getNumber();?>">
				</div>
				<div class="form-owner">
					<label for="carPlaces">
						Places
					</label>
					<input type="text" placeholder="Places" name="carPlaces" value="<?php echo $car->getPlaces();?>">
				</div>
				<div class="form-owner">
					<label for="codeOwner">
						Owner
					</label>
					<select class="form-control" name="codeOwner">
						<?php
						foreach ($owners as $owner) {
							$selected=($owner->getCode() == $car->getOwner()->getCode()) ? "selected" : "";
							echo "<option $selected value='". $owner->getCode() . "'>'". $owner->getCode() . "</option>";
						}
						?>
						
					</select>
				</div>
				<div class="form-owner">
					<label for="codeAutopark">
						Autopark
					</label>
					<select class="form-control" name="codeAutopark">
						<?php
						foreach ($autoparks as $autopark) {
							$selected=($autopark->getCode() == $car->getAutopark()->getCode()) ? "selected" : "";
							echo "<option $selected value='". $autopark->getCode() . "'>'". $autopark->getCode() . "</option>";
						}
						?>
						
					</select>
				</div>
				<button type="sumbit" class="btn btn-primary">
					Change
				</button>
			</div>
		</div>
	</div>
	
</form>
</body>
</html>