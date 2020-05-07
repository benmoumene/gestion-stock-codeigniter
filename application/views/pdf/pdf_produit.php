<?php
$data['list_entrant'] = $list_entrant;
?>
<table class="table table-bordered table-striped tableau_sans_form">
	<thead>
	<tr>
		<th class="column-title">Date</th>
		<th class="column-title">Marque</th>
		<th class="column-title">Model</th>
		<th class="column-title">N° série</th>
		<th class="column-title">Descrption</th>
		<th class="column-title">Type</th>
		<th class="column-title">Quantité</th>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach ($list_entrant as $row):
		$row = get_object_vars($row);
		$id_achat = $row['id_achat'];
		$achat_date = $row['achat_date'];
		$achat_marque = $row['achat_marque'];
		$achat_model = $row['achat_model'];
		$achat_descript = $row['achat_descript'];
		$achat_num_serie = $row['achat_num_serie'];
		$achat_type = $row['achat_type'];
		$achat_quantite = $row['achat_quantite'];
		?>
		<tr>
			<td><?php echo $achat_date; ?></td>
			<td><?php echo $achat_marque; ?></td>
			<td><?php echo $achat_model; ?></td>
			<td><?php echo $achat_num_serie; ?></td>
			<td><?php echo $achat_descript; ?></td>
			<td><?php echo $achat_type; ?></td>
			<td><?php echo $achat_quantite; ?></td>
		</tr>
	<?php
	endforeach;
	?>
	</tbody>
</table>

