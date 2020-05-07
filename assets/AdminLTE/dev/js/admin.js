$(document).ready(function () {

	/***************************************************************************************************
	 ***						     				 EVENEMENTS        									 ***
	 ***************************************************************************************************/

	/**----------------------------- Modifer utilisateur ----------------------------**/

	$('#cancel_user').hide();

	$(document).on('click', '#edit_user', function (event) {
		event.preventDefault();
		$('#cancel_user').show();
		var id = $(this).data('id');
		get_id_edit_user(id);
	});

	$(document).on("click", "#cancel_user", function (event) {
		event.preventDefault();
		$('#id_user').val('');
		$('#nom').val('');
		$('#prenom').val('');
		$('#adresse').val('');
		$('#cin').val('');
		$('#username').val('');
		$('#type').val('');
		$('#action_user').val('ajout');
		$('#save_user').val('Enregistrer ');
		$('#cancel_user').hide();
	});

	/**------------------------------------ Fin -------------------------------------**/

	/**------------------------ Vérifier le nom d'utilisateur -----------------------**/

	$username_vide = $('#username').val();
	if ($username_vide == '') {
		$('#username_base').hide();
	}
	;

	$(document).on('input', '#username', function (event) {
		event.preventDefault();
		var username = $(this).val();
		loadUsername(username);
	});

	/**------------------------------------ Fin -------------------------------------**/

	/**------------------------ Vérifier le N° CIN -----------------------**/

	$('#cin_base').hide();

	$(document).on('input', '#cin', function (event) {
		event.preventDefault();
		var cin = $(this).val();
		loadCIN(cin);
	});

	/**------------------------------------ Fin -------------------------------------**/

	/***************************************************************************************************
	 ***						     				 FUNCTION        									 ***
	 ****************************************************************************************************/

	/**
	 *  Fonction pour modifer utilisateur
	 */

	function get_id_edit_user(id) {
		$.ajax({
			url: base_url + "ajax/ajax_admin/user_id",
			method: "POST",
			data: {num: id},
			dataType: "json",
			success: function (response) {
				showDataUser(response);
			},
			error: function (response) {
				console.log(response);
			}
		})
	};

	function showDataUser(data) {
		$('#id_user').val(data.id_user);
		$('#nom').val(data.nom);
		$('#prenom').val(data.prenom);
		$('#adresse').val(data.adresse);
		$('#cin').val(data.cin);
		$('#username').val(data.username);
		$('#type').val(data.type);
		$('#action_user').val('modifier');
		$('#save_user').val('Enregistrer les modifications');
	};

	/**
	 *  Fonction pour vérifier le nom d'utilisateur
	 */

	function loadUsername(username) {
		$.ajax({
			url: base_url + "ajax/ajax_admin/get_username",
			method: "POST",
			data: {username: username},
			dataType: "json",
			success: function (response) {
				if (response.status == false) {
					$('#username_base').hide();
				} else {
					$('#username_base').show();
				}
			},
			error: function (response) {
				console.log(response);
			}
		})
	};

	/**
	 *  Fonction pour vérifier le N° CIN
	 */

	function loadCIN(cin) {
		$.ajax({
			url: base_url + "ajax/ajax_admin/get_cin",
			method: "POST",
			data: {cin: cin},
			dataType: "json",
			success: function (response) {
				if (response.status == false) {
					$('#cin_base').hide();
				} else {
					$('#cin_base').show();
				}
			},
			error: function (response) {
				console.log(response);
			}
		})
	};

})
