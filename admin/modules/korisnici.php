<?php

	if(!$status){
		die('Morate se ulogovati');
	}
	else {
		if($status!=5){
			die('Nemate pravo pristupa');
		}
	}
	
	error_reporting(0);
	
	$selectedUser = new User;
	
	if(isset($_GET['uid'])){
		$selectedUser = User::get($_GET['uid']);

	}
	
	if(isset($_POST['btn_insert'])){
		$selectedUser = new User;
		$selectedUser->name = $_POST['tb_name'];
		$selectedUser->password = $_POST['tb_pass'];
		$selectedUser->status = $_POST['tb_status'];
		$selectedUser->insertUser();
	}
	if(isset($_POST['btn_update'])){
		$selectedUser = User::get($_POST['selUser']);
		$selectedUser->name = $_POST['tb_name'];
		$selectedUser->password = $_POST['tb_pass'];
		$selectedUser->status = $_POST['tb_status'];
		$selectedUser->save();	
	}
	if(isset($_POST['btn_delete'])){
		$selectedCategory = User::get($_POST['selUser']);
		$selectedCategory->name = $_POST['tb_name'];
		$selectedUser->password = $_POST['tb_pass'];
		$selectedUser->status = $_POST['tb_status'];
		$selectedCategory->delete($selectedCategory->id);
	}

?>

<div class="post">
<h2>Korisnici</h2>

<form action="" method="post">
<?php
$allUsers = User::getAll();
?>
<select onchange="window.location='?page=6&uid='+this.value" name="selUser">
<option value="-1">Selektuj Korisnika</option>
<?php	
foreach($allUsers as $rw){
	echo "<option " . ($selectedUser->id==$rw->id?"selected":"") . " value='{$rw->id}'>{$rw->name}</option>";
}	
?>
</select>
<br>
<br>
Naziv:<br>
<input type="text" name="tb_name" value="<?php echo $selectedUser->name; ?>">
<br>
Sifra:<br>
<input type="text" name="tb_pass" value="<?php echo $selectedUser->password; ?>">
<br>
Status:<br>
<input type="number" name="tb_status" value="<?php echo $selectedUser->status; ?>">

<br><br>
<input type="submit" name="btn_insert" value="Dodaj novog">
<input type="submit" name="btn_update" value="Azuriraj">
<input type="submit" name="btn_delete" value="Izbrisi">
</form>
</div>