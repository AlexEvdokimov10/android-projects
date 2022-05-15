<?php
require 'model.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Car types</title>
</head>
<body>
<?php
$db=new CarDB();
$cars=$db->getCars();

?>
<section class='container cars'>
	<div class="row" style="margin:20px 20px 20px 20px">
		<a href="add.php" class="btn btn-success add-row"><i class="fas fa-plus-circle" style="margin-right: 10px;"></i>Додати </a>
	</div>
	<div class="row text-center table-cars">
		<table class="table col-xs-12">
			<thead>
				<tr>
					<th>Код</th>
					<th>Номер</th>
					<th>Кількість місць</th>
					<th>Code Власника</th>
					<th>Code Autopark</th>
					<th></th>
				</tr>

			</thead>
			<tbody>
				<?php foreach($cars as $car):?>
					<tr>
						<td>
							<?php echo $car->getCode();?>
						</td>
						<td>
						<?php echo $car->getNumber(); ?>
						</td>
						<td>
							<?php echo $car->getPlaces(); ?>
						</td>
						<td>
							<?php echo $car->getOwner()->getCode(); ?>
						</td>
						<td>
							<?php echo $car->getAutopark()->getCode(); ?>
						</td>
						
						<td>

							<a href="edit.php?code=<?php echo $car->getCode(); ?>">Edit </a>|
							<a href="delete.php?code=<?php echo $car->getCode();?>">Delete </a>
						</td>


					</tr>
				<?php endforeach; ?>
				


			</tbody>
		</table>

	</div>




</section>>
</body>
</html>