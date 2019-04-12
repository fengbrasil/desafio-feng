function showLoading(mensagem){
	(mensagem) ? mensagem : mensagem = 'Carregando...';
	$('div#ajaxLoading SPAN').text(mensagem);
	$('div#ajaxLoadingFundo').show();
	$('div#ajaxLoading').show();
	return false;
}

function hideLoading(mensagem){
	(mensagem) ? mensagem : mensagem = 'Carregando...';
	$('div#ajaxLoading SPAN').text(mensagem);
	$('div#ajaxLoadingFundo').hide();
	$('div#ajaxLoading').hide();
	return false;
}