<?php
	
	if(!$status){
		die('Morate se ulogovati');
	}
	else {
		if($status!=3&&$status!=5){
			die('Nemate pravo pristupa');
		}
	}

	$selectedTim = new Tim;
	
	if(isset($_GET['tid'])){
		$selectedTim = Tim::get($_GET['tid']);

	}
	
	if(isset($_POST['btn_timIns'])){
		$selectedTim = new Tim;
		$selectedTim->naziv = $_POST['tb_name'];
		$selectedTim->insert();
	}
	if(isset($_POST['btn_timUp'])){
		$selectedTim = Tim::get($_POST['selTim']);
		$selectedTim->naziv = $_POST['tb_name'];
		$selectedTim->save();	
	}
	if(isset($_POST['btn_timDel'])){
		$selectedTim = Tim::get($_POST['selTim']);
		$selectedTim->naziv = $_POST['tb_name'];
		$selectedTim->delete($selectedTim->id);
	}

?>

<div class="post">
<h2>Timovi</h2>
<form method="post" action="">
	<?php
		$allTeams = Tim::getAll();
		?>
		<select onchange="window.location='?page=8&tid='+this.value" name="selTim">
		<option value="-1">Tim</option>
		<?php	
		foreach($allTeams as $rw){
			echo "<option " . ($selectedTim->id==$rw->id?"selected":"") . " value='{$rw->id}'>{$rw->naziv}</option>";
		}	
		?>
		</select>
		<br>
		Naziv:<br>
		<input type="text" name="tb_name" value="<?php echo $selectedTim->naziv ?>">
		<br>
		<br>
		<input type="submit" name="btn_timIns" value="Dodaj">
		<input type="submit" name="btn_timUp" value="Ažuriraj">
		<input type="submit" name="btn_timDel" value="Obriši">
</form>
</div>