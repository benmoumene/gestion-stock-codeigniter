$(document).ready(function () {

	/***************************************************************************************************
	 ***						     				 EVENEMENTS        									 ***
	 ***************************************************************************************************/

	$('#cancel_vente').hide();
	$('#vente_model_modif').hide();

	/**------------- Affiche le model du produit par rapport à sa marque -------------**/

	$(document).on('change', '#vente_marque', function () {
		$('#vente_type').val('');
		$('#vente_quantite_stock').val('');
		var vente_marque = $(this).val();
		$('#vente_model').html('<option selected disabled>Séléctionner ici</option>');
		loadModel(vente_marque);
	});

	/**------------------------------------ Fin -------------------------------------**/

	/**------------------------ Affiche le quantité du produit ----------------------**/

	$(document).on('change', '#vente_model', function () {
		var vente_model = $(this).val();
		loadQtt(vente_model);
	});

	/**------------------------------------ Fin -------------------------------------**/

	/**---------------------- Modification des produits sortis --------------------**/

	$(document).on("click", "#edit_vente", function (event) {
		event.preventDefault();
		$('#cancel_vente').show();
		$('#vente_model_modif').show();
		$('#vente_model').hide();
		$('.vente_quantite').hide();
		var id = $(this).data('id');
		get_id_edit(id);
	});

	$(document).on("click", "#cancel_vente", function (event) {
		event.preventDefault();
		$('#vente_model_modif').hide();
		$('#vente_model').show();
		$('.vente_quantite').show();
		$('#id_achat').val('');
		$('#achat_num_serie').val('');
		$('#achat_descript').val('');
		$('#vente_type').val('');
		$('#action_vente').val('ajout');
		$('#save_vente').val('Enregistrer');
		$('#cancel_vente').hide();
	});

	/**------------------------------------ Fin -------------------------------------**/

	/**------------------ Affiche la descrption du produits à sortir ----------------**/

	$(document).on('input', '#vente_num_serie', function (event) {
		event.preventDefault();
		var vente_num_serie = $(this).val();
		loadDescriptt(vente_num_serie);
	});

	/**------------------------------------ Fin -------------------------------------**/


	/***************************************************************************************************
	 ***						     				 FUNCTION        									 ***
	 ****************************************************************************************************/


	/**
	 *  Fonction pour charge le model du produit
	 */

	function loadModel(vente_marque) {
		$.ajax({
			url: base_url + "ajax/Ajax_gestion/produit_stock_model",
			method: "POST",
			dataType: "json",
			data: {vente_marque: vente_marque},
			success: function (data) {
				data.forEach(function (value) {
					$('#vente_model').append('<option value="' + value.stock_model + '">' + value.stock_model + '</option>');
				});
			},
			error: function (data) {
				console.log(data);
			}
		});
	};

	/**
	 *  Fonction pour charger la quantité en stock
	 */
	function loadQtt(vente_model) {
		$.ajax({
			url: base_url + "ajax/Ajax_gestion/produit_stock_qtt",
			method: "POST",
			dataType: "json",
			data: {vente_model: vente_model},
			success: function (data) {
				data.forEach(function (value) {
					$('#vente_type').val(value.stock_type);

					$qtt = value.stock_quantite;
					$stock = 'En stok : ' + $qtt;
					$('#vente_quantite_stock').val($stock);
				});
			},
			error: function (data) {
				console.log(data);
			}
		});
	};

	/**
	 *  Fonction pour modifier les produits sortis
	 */
	function get_id_edit(id) {
		$.ajax({
			url: base_url + "ajax/ajax_gestion/produit_sortant_id",
			method: "POST",
			data: {num: id},
			dataType: "json",
			success: function (response) {
				showData(response);
			},
			error: function (response) {
				console.log(response);
			}
		});
	};

	function showData(data) {
		$('#id_vente').val(data.id_vente);
		$('#vente_marque').val(data.vente_marque);
		$('#vente_model_modif').val(data.vente_model);
		$('#vente_num_serie').val(data.vente_num_serie);
		$('#vente_descript').val(data.vente_descript);
		$('#vente_type').val(data.vente_type);
		$('#action_vente').val('modifier');
		$('#save_vente').val('Enregistrer les modifications');
	};

	/**
	 *  Fonction pour afficher la description du produit à sortir
	 */
	function loadDescriptt(vente_num_serie) {
		$.ajax({
			url: base_url + "ajax/ajax_gestion/get_produit_descript",
			method: "POST",
			data: {vente_num_serie: vente_num_serie},
			dataType: "json",
			success: function (data) {
				data.forEach(function (value) {
					$('#vente_descript').val(value.achat_descript);
				});
			},
			error: function (response) {
				console.log(response);
			}
		})
	};
});
