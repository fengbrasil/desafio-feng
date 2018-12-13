

import Vue from 'vue';

Vue.filter('dateNormalize', (value:string) => {
	var date = new Date(value);
	var addzero = (num:number)=> (num < 10)? `0${num}`: `${num}`;
	let dia = addzero(date.getDate()), mes =addzero( date.getMonth()+1), ano = addzero(date.getFullYear());
	let hora = addzero(date.getHours()), minuto = addzero(date.getMinutes());

	return `${dia}/${mes}/${ano} ${hora}:${minuto}`;
});


Vue.filter('priceNormalize', (value:string) => `R$ ${parseFloat(value).toFixed(2).replace('.', ',')}`);

Vue.filter('idNormalize', (value:string) => {while (value.length < 3) value = '0'+value; return '#'+value;});
