$('.formInscription').on("click", function() {
	if ('.formInscription' === "") {
		$('#validerInscription').addClass('blank');
		$('#noMatch').addClass('blank');
		$('#champs').removeClass('blank');
	} else if ('#password' !== '#confirm') {
		$('#validerInscription').addClass('blank');
		$('#champs').addClass('blank');
		$('#noMatch').removeClass('blank');
	} else {
		$('#champs').addClass('blank');
		$('#noMatch').addClass('blank');
		$('#validerInscription').removeClass('blank');
	}
};
