<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $title; ?></title>

	<!-- Chargement des CSS -->
	<?php
	foreach ($css as $file) {
		echo "\n\t\t";
		?>
		<link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
	}
	echo "\n\t";
	?>
	<!-- Chargement des CSS -->

	<script>
		var base_url = '<?php echo base_url(); ?>';
	</script>

</head>
<body>

<!-- nav bar -->
<?php echo $this->load->get_section('navbar'); ?>
<!-- nav bar -->


<!-- Contenu de la page -->
<?php echo $output; ?>
<!-- Contenu de la page -->


<!-- footer -->
<?php echo $this->load->get_section('footer'); ?>
<!-- footer -->


<!-- Chargement des JS -->
<?php
foreach ($js as $file) {
	echo "\n\t\t";
	?>
	<script src="<?php echo $file; ?>"></script><?php
}
echo "\n\t";
?>
<!-- Chargement des JS -->
</body>
</html>
