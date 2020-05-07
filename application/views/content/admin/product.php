<?php
$data['list_achat'] = $list_achat;
$data['list_sortant'] = $list_sortant;
$data['stock'] = $stock;
?>
<div class="wrapper">
	<div class="content-wrapper">
		<section class="content-header">
			<h1>
				<i class="fab fa-product-hunt"></i>
				Produits
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('admin'); ?>"><i class="fas fa-home"></i> Home</a></li>
				<li class="active">Produits</li>
				<li class="active">Listes</li>
			</ol>
		</section>

		<section class="content">

			<!------------------------------------------------------------------ ENTRANTS ---------------------------------------------------------------->

			<div class="row">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Entrants</h3>
					</div>
					<div class="box-body">
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
							foreach ($list_achat as $row):
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
					</div>
				</div>
			</div>

			<!------------------------------------------------------------------ SORTANTS ---------------------------------------------------------------->

			<div class="row">

				<div class="box box-warning">
					<div class="box-header with-border">
						<h3 class="box-title">Sortants</h3>
					</div>
					<div class="box-body">
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
							foreach ($list_sortant as $row):
								$row = get_object_vars($row);
								$id_vente = $row['id_vente'];
								$vente_date = $row['vente_date'];
								$vente_marque = $row['vente_marque'];
								$vente_model = $row['vente_model'];
								$vente_descript = $row['vente_descript'];
								$vente_num_serie = $row['vente_num_serie'];
								$vente_type = $row['vente_type'];
								$vente_quantite = $row['vente_quantite'];
								?>
								<tr>
									<td><?php echo $vente_date; ?></td>
									<td><?php echo $vente_marque; ?></td>
									<td><?php echo $vente_model; ?></td>
									<td><?php echo $vente_num_serie; ?></td>
									<td><?php echo $vente_descript; ?></td>
									<td><?php echo $vente_type; ?></td>
									<td><?php echo $vente_quantite; ?></td>
								</tr>
							<?php
							endforeach;
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<!------------------------------------------------------------------ STOCK ---------------------------------------------------------------->

			<div class="row">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Stocks</h3>
					</div>
					<div class="box-body">
						<table class="table table-bordered table-striped tableau_sans_form">
							<thead>
							<tr>
								<th class="column-title">Marque</th>
								<th class="column-title">Model</th>
								<th class="column-title">Type</th>
								<th class="column-title">Quantité</th>
								<th style="width: 10%;">Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							foreach ($stock as $row):
								$row = get_object_vars($row);
								$id_stock = $row['id_stock'];
								$stock_marque = $row['stock_marque'];
								$stock_model = $row['stock_model'];
								$stock_type = $row['stock_type'];
								$stock_quantite = $row['stock_quantite'];
								?>
								<tr>
									<td><?php echo $stock_marque; ?></td>
									<td><?php echo $stock_model; ?></td>
									<td><?php echo $stock_type; ?></td>
									<td><?php echo $stock_quantite; ?></td>
									<td class="text-center">
										<?php if ($stock_quantite == 0) { ?>
											<a href="<?php echo site_url('admin/delete/' . $id_stock); ?>"
											   onClick="return confirm('Voullez-vous vraiment supprimer?')">
												<i class="fas fa-trash" style="color:#FA0202"></i>
											</a>
										<?php } else { ?>
											<p>Pas d'action</p>
										<?php } ?>
									</td>
								</tr>
							<?php
							endforeach;
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
