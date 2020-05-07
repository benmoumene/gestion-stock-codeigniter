<div class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<header class="main-header">
			<?php if ($this->session->type == 'admin') { ?>
			<a href="<?php echo site_url('admin'); ?>" class="logo">
				<?php }else { ?>
				<a href="<?php echo site_url('gestion'); ?>" class="logo">
					<?php } ?>
					<span class="logo-lg" style="font-family: Georgia, serif">
						<b>Gestion</b> <small>des stocks</small>
					</span>
				</a>

				<nav class="navbar navbar-static-top">
					<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
						<span class="sr-only">Toggle navigation</span>
					</a>

					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<li class="dropdown user user-menu">
								<a class="dropdown-toggle" data-toggle="dropdown">
							  	<span class="hidden-xs">
								 	<i class="fas fa-user-circle"></i>
								  	<?php echo $this->session->username; ?> :
									<?php echo $this->session->type; ?>
							  	</span>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>Login/adminlogout"><i class="fas fa-sign-out-alt"></i></a>
							</li>
						</ul>
					</div>
				</nav>
		</header>

		<div class="main-sidebar">
			<section class="sidebar">
				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">MENU DE NAVIGATION</li>

					<?php if ($this->session->type == 'admin') { ?>
						<li>
							<a href="<?php echo site_url('Admin/user'); ?>">
								<i class="fas fa-user" style="color: lightskyblue"></i>
								<span>Utilisateurs</span>
							</a>
						</li>
					<?php } ?>

					<?php if ($this->session->type == 'admin') { ?>
						<li class="treeview">
							<a href="">
								<i class="fab fa-product-hunt" style="color: lightskyblue"></i>
								<span>Produits</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo site_url('admin/product'); ?>">Liste des produits</a></li>
								<li><a href="<?php echo site_url('admin/list_type'); ?>">Type des produits</a></li>
							</ul>
						</li>
					<?php } else {
						; ?>

						<li class="treeview">
							<a href="">
								<i class="fab fa-product-hunt" style="color: lightskyblue"></i>
								<span>Produits</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo site_url('gestion/produit_entrant'); ?>">Produit entrant</a>
								</li>
								<li><a href="<?php echo site_url('gestion/produit_sortant'); ?>">Produit sortant</a>
								</li>
								<li><a href="<?php echo site_url('gestion/stock'); ?>">Produit en stock</a></li>
							</ul>
						</li>
					<?php }; ?>


					<li>
						<a href="<?php echo site_url('setting/parametre'); ?>">
							<i class="fas fa-user-cog" style="color: lightskyblue"></i>
							<span>Profil</span>
						</a>
					</li>
				</ul>
			</section>
		</div>
