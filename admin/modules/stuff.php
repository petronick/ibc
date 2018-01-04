<?php
	
	if(!$status){
		die('Morate se ulogovati');
	}
	else {
		if($status!=3&&$status!=5){
			die('Nemate pravo pristupa');
		}
	}
	
	$selectedStuff = new Stuff;
	
	if(isset($_GET['sid'])){
		$selectedStuff = Stuff::get($_GET['sid']);

	}
	
	if(isset($_POST['btn_insert'])){
		$selectedStuff = new Stuff;
		$selectedStuff->ime = $_POST['tb_ime'];
		$selectedStuff->prezime = $_POST['tb_prezime'];
		$selectedStuff->opis = $_POST['tb_opis'];
		
			
		if(isset($_FILES['fup_picture'])){
			move_uploaded_file($_FILES['fup_picture']['tmp_name'],"../Images/".$_FILES['fup_picture']['name']);
			$selectedStuff->slika = $_FILES['fup_picture']['name'];
		}
		$selectedStuff->insert();
	}
	if(isset($_POST['btn_update'])){
		$selectedStuff = Stuff::get($_POST['selStuff']);
		$selectedStuff->ime = $_POST['tb_ime'];
		$selectedStuff->prezime = $_POST['tb_prezime'];
		$selectedStuff->opis = $_POST['tb_opis'];
		if(isset($_FILES['fup_picture'])){
			move_uploaded_file($_FILES['fup_picture']['tmp_name'],"../Images/".$_FILES['fup_picture']['name']);
			$selectedStuff->slika = $_FILES['fup_picture']['name'];
		}
		$selectedStuff->save();	
		
	}
	if(isset($_POST['btn_delete'])){
		$selectedStuff = Stuff::get($_POST['selStuff']);
		$selectedStuff->ime = $_POST['tb_ime'];
		$selectedStuff->prezime = $_POST['tb_prezime'];
		$selectedStuff->opis = $_POST['tb_opis'];
		if(isset($_FILES['fup_picture'])){
			$selectedStuff->slika = $_FILES['fup_picture']['name'];
		}
		$selectedStuff->delete($selectedStuff->id);
	}

?>

<div class="post">
<h2>Clanovi</h2>

<form action="" method="post" enctype="multipart/form-data">
<?php
$allStuff = Stuff::getAll();
?>
<select onchange="window.location='?page=2&sid='+this.value" name="selStuff">
<option value="-1">Selektuj Clana</option>
<?php	
foreach($allStuff as $rw){
	echo "<option " . ($selectedStuff->id==$rw->id?"selected":"") . " value='{$rw->id}'>{$rw->ime}</option>";
}	
?>
</select>
<br>
<br>
Ime:<br>
<input type="text" name="tb_ime" value="<?php echo $selectedStuff->ime; ?>">
<br>
Prezime:<br>
<input type="text" name="tb_prezime" value="<?php echo $selectedStuff->prezime; ?>">
<br>
<img src="../Images/stab<?php echo $selectedStuff->slika; ?>" height="100"><br>
Slika:<br>
<input type="file" name="fup_picture"><br>
Opis:<br>
<textarea name="tb_opis"><?php echo $selectedStuff->opis; ?></textarea>
<br>
<br><br>
<input type="submit" name="btn_insert" value="Dodaj novog">
<input type="submit" name="btn_update" value="Azuriraj">
<input type="submit" name="btn_delete" value="Izbrisi">
</form>
</div>