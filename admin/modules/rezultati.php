<?php
	
	if(!$status){
		die('Morate se ulogovati');
	}
	else {
		if($status!=3&&$status!=5){
			die('Nemate pravo pristupa');
		}
	}
	
	$selectedScore = new Score;
	
	if(isset($_GET['sid'])){
		$selectedScore = Score::get($_GET['sid']);

	}
	
	
	if(isset($_POST['btn_update'])){
		$selectedScore = Score::get($_POST['selScore']);
		$selectedScore->p_tim_1 = $_POST['pdselTim'];
		$selectedScore->p_tim_2 = $_POST['pgselTim'];
		$selectedScore->p_rez_1 = $_POST['rpdomaci'];
		$selectedScore->p_rez_2 = $_POST['rpgosti'];
		$selectedScore->n_tim_1 = $_POST['ndselTim'];
		$selectedScore->n_tim_2 = $_POST['ngselTim'];
		$selectedScore->p_takmicenje = $_POST['ptakmicenje'];
		$selectedScore->n_takmicenje = $_POST['ntakmicenje'];
		$selectedScore->save();	
	}


?>

<div class="post">
<h2>Rezultati</h2>

<form action="" method="post">
<?php
$allScore = Score::getAll();
?>
<select onchange="window.location='?page=7&sid='+this.value" name="selScore">
<option value="-1">Selekcija</option>
<?php	
foreach($allScore as $rw){
	echo "<option " . ($selectedScore->id==$rw->id?"selected":"") . " value='{$rw->id}'>{$rw->naziv}</option>";
}	
?>
</select>

<h4>Poslednja odigrana</h4>

			Takmicenje:<input type="text" name="ptakmicenje">
			<div id="rez">
				Domaci<br>
				Naziv:
				<?php
				$allTeams = Tim::getAll();
				?>
				<select  name="pdselTim">
				<option value="-1">Tim</option>
				<?php	
				foreach($allTeams as $rw){
					echo "<option " . ($selectedScore->p_tim_1==$rw->id?"selected":"") . " value='{$rw->naziv}'>{$rw->naziv}</option>";
				}	
				?>
				</select> 
				Broj poena:<input type="text" name="rpdomaci" value="<?php echo $selectedScore->p_rez_1; ?>"><br>
				Gosti<br>
				Naziv:<?php
				$allTeams = Tim::getAll();
				?>
				<select  name="pgselTim">
				<option value="-1">Tim</option>
				<?php	
				foreach($allTeams as $rw){
					echo "<option " . ($selectedScore->p_tim_2==$rw->id?"selected":"") . " value='{$rw->naziv}'>{$rw->naziv}</option>";
				}	
				?>
				</select>  
				Broj poena:<input type="text" name="rpgosti" value="<?php echo $selectedScore->p_rez_2; ?>"><br>
			</div>

			<h4>Naredna</h4>

			Takmicenje:<input type="text" name="ntakmicenje">
			<div id="rez">
				Domaci<br>
				Naziv:<?php
				$allTeams = Tim::getAll();
				?>
				<select  name="ndselTim">
				<option value="-1">Tim</option>
				<?php	
				foreach($allTeams as $rw){
					echo "<option " . ($selectedScore->n_tim_1==$rw->id?"selected":"") . " value='{$rw->naziv}'>{$rw->naziv}</option>";
				}	
				?>
				</select> <br>
				Gosti<br>
				Naziv:<?php
				$allTeams = Tim::getAll();
				?>
				<select  name="ngselTim">
				<option value="-1">Tim</option>
				<?php	
				foreach($allTeams as $rw){
					echo "<option " . ($selectedScore->n_tim_2==$rw->id?"selected":"") . " value='{$rw->naziv}'>{$rw->naziv}</option>";
				}	
				?>
				</select> <br>
			</div>
			<br>

			<br>
			<input type="submit" name="btn_update" value="Ažuriraj">
<br>
<br>
</form>

</div>





