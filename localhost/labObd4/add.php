<?php
require 'model.php';
$db=new CarDB();
if($_POST){
	$db->addCar(new Car(0,$_POST['carNumber'],$_POST['carPlaces'],new Owner($_POST['codeOwner']),new Autopark($_POST['codeAutopark'])));
	header("Location: index.php");
}
$owners=$db->getOwners();
$autoparks=$db->getAutoparks();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Car owners</title>
</head>
<body>
	<form method="post">
		<div class="container">
			<div class="row text-center">
				<div class="col-sm-6 col-md-4 col-lg-3 col-sm-offset-3 col-md-offset-4">
					<div class="form-car">
						<label for="carNumber">
							Number
						</label>
						<input type="text" class="form-control" name="carNumber" placeholder="Number">
					</div>
					<div class="form-car">
						<label for="carPlaces">
						Places
						</label>
						<input type="text" class="form-control" name="carPlaces" placeholder="Places">
					</div>
					<div class="form-car">
						<label for="codeOwner">
							Owner
						</label>
						<select class="form-control" name="codeOwner">
							<?php
							foreach ($owners as $owner) {
								echo "<option $selected value='". $owner->getCode() . "'>". $owner->getCode() . "</option>";
							}
							?>
						</select>
					</div>
					<div class="form-car">
						<label for="codeAutopark">
							Autopark
						</label>
						<select class="form-control" name="codeAutopark">
							<?php
							foreach ($autoparks as $autopark) {
								echo "<option $selected value='". $autopark->getCode() . "'>". $autopark->getCode() . "</option>";
							}
							?>
						</select>
					</div>
					<button type="sumbit" class="btn btn-success">
						Додати
					</button>
				</div>
			</div>
		</div>
	</form>
</body>
</html>