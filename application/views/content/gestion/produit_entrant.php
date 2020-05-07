<?php
$data['list_entrant'] = $list_entrant;
$data['type_liste'] = $type_liste;
?>
<div class="wrapper">
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				<i class="fab fa-product-hunt"></i>
				Produits entrant
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('gestion'); ?>"><i class="fas fa-home"></i> Home</a></li>
				<li class="active">Produits entrants</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="box box-success">
					<div class="box-body">
						<div class="col-md-3">
							<div class="box box-default">
								<div class="box-body">
									<form class="form-horizontal"
										  action="<?php echo base_url('gestion/produit_entrant'); ?>" method="post">
										<input type="hidden" id="action_achat" name="action_achat" value="ajout">
										<input type="hidden" name="id_achat" id="id_achat" value="">

										<div class="form-group">
											<div class="col-sm-12">
												<input type="text" class="form-control" name="achat_date"
													   id="achat_date" value="<?php echo date('d/m/Y'); ?>" readonly>
											</div>
										</div>

										<div class="form-group">
											<div class="col-sm-12">
												<input type="text" class="form-control" name="achat_marque"
													   id="achat_marque" value="" placeholder="Marque du produit">
											</div>
										</div>

										<div class="form-group">
											<i id="note_entrant" class="fas fa-exclamation-circle" style="color: red"
											   data-toggle="modal" data-target="#modal-default"></i>
											<?php $this->load->view('message/msg_entrant'); ?>

											<div class="col-sm-11">
												<font color="red">*</font><input type="text" class="form-control"
																				 name="achat_model" id="achat_model"
																				 value=""
																				 placeholder="Model du produit">
											</div>
											<span class="text-danger">
												<?php echo form_error('achat_model'); ?>
											</span>
										</div>

										<div class="form-group">
											<div class="col-sm-12">
												<input type="text" class="form-control" name="achat_num_serie"
													   id="achat_num_serie" value="" placeholder="N° de série">
											</div>
										</div>

										<div class="form-group">
											<div class="col-sm-12">
												<textarea class="form-control" rows="3" name="achat_descript"
														  id="achat_descript" value=""
														  placeholder="Déscription du produit"></textarea>
											</div>
										</div>

										<div class="form-group">
											<div class="col-sm-12">
												<select class="form-control" name="achat_type" id="achat_type">
													<option selected>Sélectionner le type</option>
													<?php
													foreach ($type_liste as $row):
														$row = get_object_vars($row);
														$type_name = $row['type_name'];
														?>
														<option
															value="<?php echo $type_name ?>"> <?php echo $type_name ?></option>
													<?php
													endforeach;
													?>
												</select>
											</div>
										</div>

										<div class="form-group">
											<div class="col-sm-12">
												<font color="red">*</font><input type="text" class="form-control"
																				 name="achat_quantite"
																				 id="achat_quantite" value=""
																				 placeholder="Quantité du produit">
											</div>
											<span class="text-danger">
												<?php echo form_error('achat_quantite'); ?>
											</span>
										</div>

										<div class="form-group">
											<div class="col-sm-offset-0 col-sm-10">
												<input type="submit" id="save_achat" class="btn btn-success"
													   value="Enregistrer">
												<button type="submit" id="cancel_achat" class="btn btn-danger">Annuller
													modification
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
												<td class="text-center">
													<a href="#" id="edit_achat" data-id="<?php echo $id_achat; ?>"><i
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
