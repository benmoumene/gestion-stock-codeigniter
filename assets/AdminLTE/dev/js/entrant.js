$(document).ready(function () {

	/***************************************************************************************************
	 ***						     				 EVENEMENTS        									 ***
	 ***************************************************************************************************/

	$('#cancel_achat').hide();

	$(document).on("click", "#edit_achat", function (event) {
		event.preventDefault();
		$('#cancel_achat').show();
		$('#achat_quantite').hide();
		var id = $(this).data('id');
		get_id_edit_entrant(id);
	});

	$(document).on("click", "#cancel_achat", function (event) {
		event.preventDefault();
		$('#achat_quantite').show();
		$('#id_achat').val('');
		$('#achat_marque').val('');
		$('#achat_model').val('');
		$('#achat_num_serie').val('');
		$('#achat_descript').val('');
		$('#achat_type').val('');
		$('#action_achat').val('ajout');
		$('#save_achat').val('Enregistrer');
		$('#cancel_achat').hide();
	});

	/***************************************************************************************************
	 ***						     				 FUNCTION        									 ***
	 ****************************************************************************************************/

	function get_id_edit_entrant(id) {
		$.ajax({
			url: base_url + "ajax/ajax_gestion/produit_entrant_id",
			method: "POST",
			data: {num: id},
			dataType: "json",
			success: function (response) {
				//console.log(response);
				showDataEntrant(response);
			},
			error: function (response) {
				console.log(response);
			}
		});
	}

	function showDataEntrant(data) {
		$('#id_achat').val(data.id_achat);
		$('#achat_marque').val(data.achat_marque);
		$('#achat_model').val(data.achat_model);
		$('#achat_num_serie').val(data.achat_num_serie);
		$('#achat_descript').val(data.achat_descript);
		$('#achat_type').val(data.achat_type);
		$('#action_achat').val('modifier');
		$('#save_achat').val('Enregistrer les modifications');
	}
});
