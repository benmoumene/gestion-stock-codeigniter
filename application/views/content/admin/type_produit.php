<?php $data['type_liste'] = $type_liste; ?>
<div class="wrapper">
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Type des produits
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('admin'); ?>"><i class="fas fa-home"></i> Home</a></li>
				<li class="active">Produits</li>
				<li class="active">Type</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="box box-info">
					<div class="box-body">
						<div class="col-md-3">
							<div class="box box-default">
								<div class="box-body">
									<form class="form-horizontal" action="<?php echo base_url('admin/add_type'); ?>"
										  method="post">
										<div class="form-group">
											<label class="col-sm-2 control-label">Date</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" name="type_date" id="type_date"
													   value="<?php echo date('d/m/Y'); ?>" readonly>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-2 control-label">Type</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" name="type_name" id="type_name">
												<span class="text-danger">
													<?php echo form_error('type_name'); ?>
												</span>
											</div>
										</div>

										<div class="form-group">
											<div class="col-sm-10">
												<button type="submit" class="btn btn-success">Enregistrer</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>

						<div class="col-md-9">
							<div class="box box-default">
								<div class="box-body">
									<table class="table table-bordered table-striped tableau" style="width: 100%;">
										<thead>
										<tr>
											<th class="column-title">Date de création</th>
											<th class="column-title">Type du produit</th>
											<th class="column-title" style="width: 10%;">Action</th>
										</tr>
										</thead>
										<tbody>
										<?php
										foreach ($type_liste as $row):
											$row = get_object_vars($row);
											$id = $row['id'];
											$type_date = $row['type_date'];
											$type_name = $row['type_name'];
											?>
											<tr>
												<td><?php echo $type_date; ?></td>
												<td><?php echo $type_name; ?></td>
												<td class="text-center">
													<a href="<?php echo site_url('admin/delete_type/' . $id); ?>"
													   onClick="return confirm('Voullez-vous vraiment supprimer?')">
														<i class="fas fa-trash" style="color:#FA0202"></i>
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


