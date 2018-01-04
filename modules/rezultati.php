<?php
$rez = Score::getAll();
foreach($rez as $rw){
?>
	<tr>
		<td><?php echo $rw->naziv; ?></td>
		<td><?php echo $rw->datum; ?></td>
		<td><?php echo $rw->p_takmicenje; ?></td>
		<td><?php echo $rw->p_tim_1; ?></td>
		<td><?php echo $rw->p_tim_2; ?></td>
		<td><?php echo $rw->p_rez_1; ?></td>
		<td><?php echo $rw->p_rez_2; ?></td>
		<td><?php echo $rw->n_takmicenje; ?></td>
		<td><?php echo $rw->n_tim_1; ?></td>
		<td><?php echo $rw->n_tim_2; ?></td>
	</tr>			
<?php
}
