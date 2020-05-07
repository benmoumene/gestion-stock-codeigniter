$(document).ready(function () {
	$('.tableau').DataTable({
		"language": {
			"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
		},
		"scrollX": true,
		responsive: true
	});

	$('.tableau_sans_form').DataTable({
		"language": {
			"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
		},
		responsive: true
	});
});
