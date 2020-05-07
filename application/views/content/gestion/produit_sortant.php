<?php
$data['list_sortant'] = $list_sortant;
$data['produit_stock_marque'] = $produit_stock_marque;
?>
<div class="wrapper">
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				<i class="fab fa-product-hunt"></i>
				Produits sortant
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('gestion'); ?>"><i class="fas fa-home"></i> Home</a></li>
				<li class="active">Produits sortants</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="box box-warning">
					<div class="box-body">
						<div class="col-md-3">
							<div class="box box-default">
								<div class="box-body">
									<form class="form-horizontal"
										  action="<?php echo base_url('gestion/produit_sortant'); ?>" method="post">
										<input type="hidden" id="action_vente" name="action_vente" value="ajout">
										<input type="hidden" name="id_vente" id="id_vente" value="">

										<div class="form-group">
											<div class="col-sm-12">
												<input type="text" class="form-control" name="vente_date"
													   id="vente_date" value="<?php echo date('d/m/Y'); ?>" readonly>
											</div>
										</div>

										<div class="form-group">
											<div class="col-sm-12">
												<select class="form-control" name="vente_marque" id="vente_marque">
													<option selected>Sélectionner la marque</option>
													<?php
													foreach ($produit_stock_marque as $row):
														$row = get_object_vars($row);
														$stock_marque = $row['stock_marque'];
														?>
														<option
															value="<?php echo $stock_marque ?>"> <?php echo $stock_marque ?></option>
													<?php
													endforeach;
													?>
												</select>
											</div>
										</div>

										<div class="form-group">
											<div class="col-sm-12">
												<font color="red">*</font>
												<select class="form-control" name="vente_model" id="vente_model">
												</select>
												<input type="text" class="form-control" name="vente_model_modif"
													   id="vente_model_modif" value="" readonly>
											</div>
										</div>

										<div class="form-group">
											<div class="col-sm-12">
												<input type="text" class="form-control" name="vente_num_serie"
													   id="vente_num_serie" value="" placeholder="N° de série">
											</div>
										</div>

										<div class="form-group">
											<div class="col-sm-12">
												<textarea class="form-control" rows="3" name="vente_descript"
														  id="vente_descript" value=""
														  placeholder="Déscription du produit" readonly></textarea>
											</div>
										</div>

										<div class="form-group">
											<div class="col-sm-12">
												<input type="text" class="form-control" name="vente_type"
													   id="vente_type" value="" placeholder="Type du produit" readonly>
											</div>
										</div>

										<div class="form-group">
											<div class="col-sm-12">
												<input type="text" class="form-control" name="vente_quantite_stock"
													   id="vente_quantite_stock" value=""
													   placeholder="Quantité en stock" readonly>
											</div>
										</div>

										<div class="form-group">
											<div class="col-sm-12">
												<font color="red">*</font><input type="text" class="form-control"
																				 name="vente_quantite"
																				 id="vente_quantite" value=""
																				 placeholder="Quantité du produit">
											</div>
											<span class="text-danger">
												<?php echo form_error('vente_quantite'); ?>
											</span>
										</div>

										<div class="form-group">
											<div class="col-sm-offset-0 col-sm-10">
												<input type="submit" id="save_vente" class="btn btn-success"
													   value="Enregister">
												<button type="submit" id="cancel_vente" class="btn btn-danger">Annuller
													la modification
												</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>

						<div class="col-md-9">
							<div class="box box-default">
								<div class="box-body">
									<table class="table table-bordered table-striped tableau">
										<thead>
										<tr>
											<th class="column-title">Date</th>
											<th class="column-title">Marque</th>
											<th class="column-title">Model</th>
											<th class="column-title">N° série</th>
											<th class="column-title">Descrption</th>
											<th class="column-title">Type</th>
											<th class="column-title">Quantité</th>
											<th class="column-title">Option</th>
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
												<td class="text-center">
													<a href="#" id="edit_vente" data-id="<?php echo $id_vente; ?>"><i
															class="fa fa-edit" style="color:#10922B"></i>
													</a>
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

					</div>
				</div>
			</div>
		</section>
	</div>
</div>
