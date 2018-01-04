<?php

	if(!$status){
		die('Morate se ulogovati');
	}
	else {
		if($status!=3&&$status!=5){
			die('Nemate pravo pristupa');
		}
	}
	
	error_reporting(0);
	
	$selectedTurnir = new Turnir;
	
	if(isset($_GET['tid'])){
		$selectedTurnir = Turnir::get($_GET['tid']);

	}
	
	if(isset($_POST['btn_insert'])){
		$selectedTurnir = new Turnir;
		$selectedTurnir->naslov = $_POST['tb_naslov'];
		$selectedTurnir->sadrzaj = $_POST['tb_sadrzaj'];
		$selectedTurnir->datum = $_POST['tb_datum'];
		
			
		if(isset($_FILES['fup_picture'])){
			move_uploaded_file($_FILES['fup_picture']['tmp_name'],"../Images/".$_FILES['fup_picture']['name']);
			$selectedTurnir->slika = $_FILES['fup_picture']['name'];
		}
		$selectedTurnir->insert();
	}
	if(isset($_POST['btn_update'])){
		$selectedTurnir = Turnir::get($_POST['selTurnir']);
		$selectedTurnir->naslov = $_POST['tb_naslov'];
		$selectedTurnir->sadrzaj = $_POST['tb_sadrzaj'];
		$selectedTurnir->datum = $_POST['tb_datum'];
		if(isset($_FILES['fup_picture'])){
			move_uploaded_file($_FILES['fup_picture']['tmp_name'],"../Images/".$_FILES['fup_picture']['name']);
			$selectedTurnir->slika = $_FILES['fup_picture']['name'];
		}
		$selectedTurnir->save();	
		
	}
	if(isset($_POST['btn_delete'])){
		$selectedTurnir = Turnir::get($_POST['selTurnir']);
		$selectedTurnir->naslov = $_POST['tb_naslov'];
		$selectedTurnir->sadrzaj = $_POST['tb_sadrzaj'];
		$selectedTurnir->datum = $_POST['tb_datum'];
		if(isset($_FILES['fup_picture'])){
			$selectedTurnir->slika = $_FILES['fup_picture']['name'];
		}
		$selectedTurnir->delete($selectedTurnir->id);
	}

?>

<div class="post">
<h2>Objave</h2>

<form action="" method="post" enctype="multipart/form-data">
<?php
$allTurnirs = Turnir::getAll("order by id desc limit 10");
?>
<select onchange="window.location='?page=5&tid='+this.value" name="selTurnir">
<option value="-1">Selektuj Objavu</option>
<?php	
foreach($allTurnirs as $rw){
	echo "<option " . ($selectedTurnir->id==$rw->id?"selected":"") . " value='{$rw->id}'>{$rw->naslov}</option>";
}	
?>
</select>
<br>
<br>
Naslov:<br>
<input type="text" name="tb_naslov" value="<?php echo $selectedTurnir->naslov; ?>">
<br>
<img src="../Images/<?php echo $selectedTurnir->slika; ?>" height="100"><br>
Slika:<br>
<input type="file" name="fup_picture"><br>
Sadrzaj:<br>
<textarea name="tb_sadrzaj"><?php echo $selectedTurnir->sadrzaj; ?></textarea>
<br>
Datum:<br>
<input type="text" name="tb_datum" value="<?php echo date('d.m.Y.'); ?>">

<br><br>
<input type="submit" name="btn_insert" value="Dodaj novi">
<input type="submit" name="btn_update" value="Azuriraj">
<input type="submit" name="btn_delete" value="Izbrisi">
</form>
</div>