<div id="left">
<?php
$objava = Turnir::getAll("order by id desc limit 10");
foreach($objava as $rw){
?>
				<div class="post">
					<h2><?php echo $rw->naslov; ?></h2>
					<p><?php echo $rw->datum; ?></p>
					<img src="Images/<?php echo $rw->slika; ?>">
					<p><?php echo $rw->sadrzaj; ?></p>
				</div><hr>
<?php
}
?>
</div>
<div id="right">
</div>