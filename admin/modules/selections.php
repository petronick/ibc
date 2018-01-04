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

	$selectedSelection = new Selection;
	
	if(isset($_GET['slid'])){
		$selectedSelection = Selection::get($_GET['slid']);

	}
	
	if(isset($_POST['btn_insert'])){
		$selectedSelection = new Selection;
		$selectedSelection->naziv = $_POST['tb_naziv'];
		$selectedSelection->opis = $_POST['tb_opis'];
		
			
		if(isset($_FILES['fup_picture'])){
			move_uploaded_file($_FILES['fup_picture']['tmp_name'],"../Images/".$_FILES['fup_picture']['name']);
			$selectedSelection->slika = $_FILES['fup_picture']['name'];
		}
		$selectedSelection->insert();
	}
	if(isset($_POST['btn_update'])){
		$selectedSelection = Selection::get($_POST['selSelection']);
		$selectedSelection->naziv = $_POST['tb_naziv'];
		$selectedSelection->opis = $_POST['tb_opis'];
		if(isset($_FILES['fup_picture'])){
			move_uploaded_file($_FILES['fup_picture']['tmp_name'],"../Images/".$_FILES['fup_picture']['name']);
			$selectedSelection->slika = $_FILES['fup_picture']['name'];
		}
		$selectedSelection->save();	
		
	}
	if(isset($_POST['btn_delete'])){
		$selectedSelection = Selection::get($_POST['selSelection']);
		$selectedSelection->naziv = $_POST['tb_naziv'];
		$selectedSelection->opis = $_POST['tb_opis'];
		if(isset($_FILES['fup_picture'])){
			$selectedSelection->slika = $_FILES['fup_picture']['name'];
		}
		$selectedSelection->delete($selectedSelection->id);
	}

?>

<div class="post">
<h2>Selekcije</h2>

<form action="" method="post" enctype="multipart/form-data">
<?php
$allSelection = Selection::getAll();
?>
<select onchange="window.location='?page=4&slid='+this.value" name="selSelection">
<option value="-1">Selektuj Selekciju</option>
<?php	
foreach($allSelection as $rw){
	echo "<option " . ($selectedSelection->id==$rw->id?"selected":"") . " value='{$rw->id}'>{$rw->naziv}</option>";
}	
?>
</select>
<br>
<br>
Naziv:<br>
<input type="text" name="tb_naziv" value="<?php echo $selectedSelection->naziv; ?>">
<br>
<img src="../Images/stab<?php echo $selectedSelection->slika; ?>" height="100"><br>
Slika:<br>
<input type="file" name="fup_picture"><br>
Opis:<br>
<textarea name="tb_opis"><?php echo $selectedSelection->opis; ?></textarea>
<br>
<br><br>
<input type="submit" name="btn_insert" value="Dodaj novu">
<input type="submit" name="btn_update" value="Azuriraj">
<input type="submit" name="btn_delete" value="Izbrisi">
</form>
</div>