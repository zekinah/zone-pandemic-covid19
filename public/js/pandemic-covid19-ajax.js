(function( $ ) {
	'use strict';
	$ = jQuery.noConflict();
	$(window).on('load', function () {
		console.log('API in Live');
		if (zn_global !== null || zn_global !== '') {
			getAllResult();
		}
		if (zn_country !== null || zn_country !== '') {
			getByCountryResult(zn_country);
		}
	});


	/** DOM Handler */
	function byAll(data) {
		$("#zn-global-cases").append(Number(data.cases).toLocaleString());
		$("#zn-global-affected-countries").append(Number(data.affectedCountries).toLocaleString());
		$("#zn-global-updates").text(timestampToTime(data.updated, 1));
		$("#zn-global-active").append(Number(data.active).toLocaleString());
		$("#zn-global-activePerM").append(Number(data.activePerOneMillion).toLocaleString());
		$("#zn-global-recovered").append(Number(data.recovered).toLocaleString());
		$("#zn-global-recoveredPerM").append(Number(data.recoveredPerOneMillion).toLocaleString());
		$("#zn-global-critical").append(Number(data.critical).toLocaleString());
		$("#zn-global-criticalPerM").append(Number(data.criticalPerOneMillion).toLocaleString());
		$("#zn-global-deaths").append(Number(data.deaths).toLocaleString());
		$("#zn-global-deathsPerM").append(Number(data.deathsPerOneMillion).toLocaleString());
		$(".zn-loading").fadeOut();
		$(".zn-covid19__content").fadeIn();
	};

	// function byContinent(data) {
	// 	$("#zn-continent-cases").append(Number(data.cases).toLocaleString());
	// 	$("#zn-continent-affected-countries").append(Number(data.affectedCountries).toLocaleString());
	// 	$("#zn-continent-updates").text(timestampToTime(data.updated, 1));
	// 	$("#zn-continent-active").append(Number(data.active).toLocaleString());
	// 	$("#zn-continent-activePerM").append(Number(data.activePerOneMillion).toLocaleString());
	// 	$("#zn-continent-recovered").append(Number(data.recovered).toLocaleString());
	// 	$("#zn-continent-recoveredPerM").append(Number(data.recoveredPerOneMillion).toLocaleString());
	// 	$("#zn-continent-critical").append(Number(data.critical).toLocaleString());
	// 	$("#zn-continent-criticalPerM").append(Number(data.criticalPerOneMillion).toLocaleString());
	// 	$("#zn-continent-deaths").append(Number(data.deaths).toLocaleString());
	// 	$("#zn-continent-deathsPerM").append(Number(data.deathsPerOneMillion).toLocaleString());
	// 	$(".zn-loading").fadeOut();
	// 	$(".zn-covid19__content").fadeIn();
	// };

	function byCountry(data) {
		$('.flag img').attr('src', data.countryInfo.flag);
		$("#zn-country-name").append(data.country);
		$("#zn-country-population").append(Number(data.population).toLocaleString());
		$("#zn-country-cases").append(Number(data.cases).toLocaleString());
		$("#zn-country-updates").text(timestampToTime(data.updated, 1));
		$("#zn-country-active").append(Number(data.active).toLocaleString());
		$("#zn-country-activePerM").append(Number(data.activePerOneMillion).toLocaleString());
		$("#zn-country-recovered").append(Number(data.recovered).toLocaleString());
		$("#zn-country-recoveredPerM").append(Number(data.recoveredPerOneMillion).toLocaleString());
		$("#zn-country-critical").append(Number(data.critical).toLocaleString());
		$("#zn-country-criticalPerM").append(Number(data.criticalPerOneMillion).toLocaleString());
		$("#zn-country-deaths").append(Number(data.deaths).toLocaleString());
		$("#zn-country-deathsPerM").append(Number(data.deathsPerOneMillion).toLocaleString());
		$(".zn-loading").fadeOut();
		$(".zn-covid19__content").fadeIn();
	};


	/** Fetching Values from API */
	async function getAllResult() {
		let api_url = "https://disease.sh/v3/covid-19/all?yesterday=true&allowNull=true";
		try {
			const result = await $.ajax({
				url: api_url,
				contentType: "application/json",
				dataType: 'json',
			});
			byAll(result);
		} catch (error) {
			console.error(error);
		}
	}

	async function getByCountryResult(country) {
		let api_url = "https://disease.sh/v3/covid-19/countries/"+country;
		try {
			const result = await $.ajax({
				url: api_url,
				contentType: "application/json",
				dataType: 'json',
			});
			byCountry(result);
		} catch (error) {
			console.error(error);
		}
	}


	function timestampToTime(timestamp, s, time = false) {
		var date = new Date(timestamp * s);
		var Y = date.getFullYear() + '-';
		var M = (date.getMonth() + 1 < 10 ? '0' + (date.getMonth() + 1) : date.getMonth() + 1) + '-';
		var D = date.getDate() + ' ';
		var h = date.getHours();
		var m = ':' + (date.getMinutes() < 10 ? '0' + (date.getMinutes()) : date.getMinutes());
		var s = ':' + (date.getSeconds() < 10 ? '0' + (date.getSeconds()) : date.getSeconds());
		if (time) return h + m;
		else return Y + M + D + h + m + s;
	}


})( jQuery );
