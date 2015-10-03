<div class="row">
	<table class="table">
		<?php
			$campos = array_keys($parameters);
			foreach($campos as $cam):
				echo "<tr>";
				echo "<td>".str_replace("_", " ", $cam)."</td>";
				if($cam == "activo") :
					echo '<td><i class="glyphicon glyphicon-';
					echo ($parameters[$cam] == "S") ? "ok" : "remove";
					echo '"></i></td>';
				else :
					echo "<td>".$parameters[$cam]."</td>";
				endif;
				echo "</tr>";
			endforeach;
		?>	
	</table>
</div>