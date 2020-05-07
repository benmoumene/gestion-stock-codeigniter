$(document).ready(function () {
	$(document).on("click", "#save", function (event) {
		event.preventDefault();
		add();
		$('#m_ajouter').modal("hide");
		location.reload(true);
	});


//=========================================== FUNCTION ======================================

	function add() {
		var data = $('#add_form').serialize();
		$.ajax({
			url: base_url + "admin/user/add",
			method: "POST",
			data: data,
			dataType: 'json',
			success: function (result) {
				console.log(result);
				$('[name="identifiant"]').val("");
				$('[name="name"]').val("");
				$('[name="username"]').val("");
				$('[name="poste"]').val("");
				$('[name="password"]').val("");
				location.reload(true);
			},
			error: function (result) {
				console.log(result);
			}
		});
	}
});

