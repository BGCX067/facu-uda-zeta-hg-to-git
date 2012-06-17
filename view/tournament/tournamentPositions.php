<div class="sn10">Tabla de posiciones</div>
<div class="tab0">
	<div class="tab1a">
		<div class="tab2">Clubes</div>
		<div class="tab3">J</div>
		<div class="tab3">G</div>
		<div class="tab3">E</div>
		<div class="tab3">P</div>
		<div class="tab3">Gf</div>
		<div class="tab3">Gc</div>
		<div class="tab3">Pts</div>
	</div>
	<?php 
		foreach($tournaments as $id => $tournament) {?>
	
	<div class="tab1b">
		<div class="tab2">
			<?php echo $tournament->team;?>
		</div>
		<div class="tab3">
			<?php echo $tournament->getPJ();?>
		</div>
		<div class="tab3">
			<?php echo $tournament->PG;?>
		</div>
		<div class="tab3">
			<?php echo $tournament->PE;?>
		</div>
		<div class="tab3">
			<?php echo $tournament->PP;?>
		</div>
		<div class="tab3">
			<?php echo $tournament->GF;?>
		</div>
		<div class="tab3">
			<?php echo $tournament->GC;?>
		</div>
		<div class="tab4">
			<?php echo $tournament->getPoints();?>
		</div>
	</div>
	<?php } ?>
</div>
