<?php
$clan = Stuff::getAll();
foreach($clan as $rw){
?>
				<div class="clan">
					<div class="<?php echo (($rw->id+1)%2==0)?"slika_leva":"slika_desna"; ?>">
					<a href="image/<?php echo $rw->slika; ?>"></a>
					</div>
					<div class="<?php echo (($rw->id+1)%2==0)?"tekst_desni":"tekst_levi"; ?>">
						<h3><?php echo $rw->ime; ?> <?php echo $rw->prezime; ?></h3>
						<p><?php echo $rw->opis; ?></p>
					</div>
				</div>
<?php
}
