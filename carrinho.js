$('.btnCarrinho').on('click', function (element) {
	let request = $.ajax({
		type: 'POST',
		url: 'addCarrinho.php',
		data: {
			produtoId: $(this).data('id')
		}
	});
});