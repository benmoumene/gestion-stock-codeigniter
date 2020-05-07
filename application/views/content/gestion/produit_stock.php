<?php
$data['stock'] = $stock;
?>
<div class="wrapper">
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				<i class="fab fa-product-hunt"></i>
				Produits en stock
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('admin'); ?>"><i class="fas fa-home"></i> Home</a></li>
				<li class="active">Stock</li>
			</ol>
		</section>
		<section class="content">
			<div class="row">
				<div class="box box-danger">
					<div class="box-body">
						<table class="table table-bordered table-striped tableau_sans_form">
							<thead>
							<tr>
								<th class="column-title">Marque</th>
								<th class="column-title">Model</th>
								<th class="column-title">Type</th>
								<th class="column-title" style="width: 10%">Quantité</th>
							</tr>
							</thead>
							<tbody>
							<?php
							foreach ($stock as $row):
								$row = get_object_vars($row);
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
