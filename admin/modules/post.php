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
	
	
	$selectedPost = new Post;
	
	if(isset($_GET['oid'])){
		$selectedPost = Post::get($_GET['oid']);

	}
	
	if(isset($_POST['btn_insert'])){
		$selectedPost = new Post;
		$selectedPost->naslov = $_POST['tb_naslov'];
		$selectedPost->sadrzaj = $_POST['tb_sadrzaj'];
		$selectedPost->datum = $_POST['tb_datum'];
		
			
		if(isset($_FILES['fup_picture'])){
			move_uploaded_file($_FILES['fup_picture']['tmp_name'],"../Images/".$_FILES['fup_picture']['name']);
			$selectedPost->slika = $_FILES['fup_picture']['name'];
		}
		$selectedPost->insert();
	}
	if(isset($_POST['btn_update'])){
		$selectedPost = Post::get($_POST['selPost']);
		$selectedPost->naslov = $_POST['tb_naslov'];
		$selectedPost->sadrzaj = $_POST['tb_sadrzaj'];
		$selectedPost->datum = $_POST['tb_datum'];
		if(isset($_FILES['fup_picture'])){
			move_uploaded_file($_FILES['fup_picture']['tmp_name'],"../Images/".$_FILES['fup_picture']['name']);
			$selectedPost->slika = $_FILES['fup_picture']['name'];
		}
		$selectedPost->save();	
		
	}
	if(isset($_POST['btn_delete'])){
		$selectedPost = Post::get($_POST['selPost']);
		$selectedPost->naslov = $_POST['tb_naslov'];
		$selectedPost->sadrzaj = $_POST['tb_sadrzaj'];
		$selectedPost->datum = $_POST['tb_datum'];
		if(isset($_FILES['fup_picture'])){
			$selectedPost->slika = $_FILES['fup_picture']['name'];
		}
		$selectedPost->delete($selectedPost->id);
	}

?>

<div class="post">
<h2>Objave</h2>

<form action="" method="post" enctype="multipart/form-data">
<?php
$allPosts = Post::getAll("order by id desc limit 10");
?>
<select onchange="window.location='?page=1&oid='+this.value" name="selPost">
<option value="-1">Selektuj Objavu</option>
<?php	
foreach($allPosts as $rw){
	echo "<option " . ($selectedPost->id==$rw->id?"selected":"") . " value='{$rw->id}'>{$rw->naslov}</option>";
}	
?>
</select>
<br>
<br>
Naslov:<br>
<input type="text" name="tb_naslov" value="<?php echo $selectedPost->naslov; ?>">
<br>
<img src="../Images/<?php echo $selectedPost->slika; ?>" height="100"><br>
Slika:<br>
<input type="file" name="fup_picture"><br>
Sadrzaj:<br>
<textarea name="tb_sadrzaj"><?php echo $selectedPost->sadrzaj; ?></textarea>
<br>
Datum:<br>
<input type="text" name="tb_datum" value="<?php echo date('d.m.Y.'); ?>">

<br><br>
<input type="submit" name="btn_insert" value="Dodaj novi">
<input type="submit" name="btn_update" value="Azuriraj">
<input type="submit" name="btn_delete" value="Izbrisi">
</form>
</div>