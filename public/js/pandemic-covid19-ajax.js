(function( $ ) {
	'use strict';
	$ = jQuery.noConflict();
	$(window).on('load', function () {
		console.log('API in Live');
		getAllResult();
	});


	/** DOM Handler */
	function byAll(data) {
		$("#zn-country-cases").append(Number(data.cases).toLocaleString());
		$("#zn-country-affected-countries").append(Number(data.affectedCountries).toLocaleString());
		$("#zn-country-updates").text(timestampToTime(data.updated, 1));
		$("#zn-country-active").append(Number(data.active).toLocaleString());
		$("#zn-country-activePerM").append(Number(data.activePerOneMillion).toLocaleString());
		$("#zn-country-recovered").append(Number(data.recovered).toLocaleString());
		$("#zn-country-recoveredPerM").append(Number(data.recoveredPerOneMillion).toLocaleString());
		$("#zn-country-critical").append(Number(data.critical).toLocaleString());
		$("#zn-country-criticalPerM").append(Number(data.criticalPerOneMillion).toLocaleString());
		$("#zn-country-deaths").append(Number(data.deaths).toLocaleString());
		$("#zn-country-deathsPerM").append(Number(data.deathsPerOneMillion).toLocaleString());
	};

	function byContinent(data) {
		$("#zn-continent-cases").append(eNum(data[0]["cases"] ? data[0]["cases"]: 'n/a'));
		$("#zn-continent-recoverd").append(eNum(data[0]["recovered"] ? data[0]["recovered"]: 'n/a'));
		$("#zn-continent-dead").append(eNum(data[0]["deaths"] ? data[0]["deaths"]: 'n/a'));
		$("#zn-continent-active").append(eNum(data[0]["active"] ? data[0]["active"]: 'n/a'));
		$("#zn-continent-today-case").append(eNum(data[0]["todayCases"] ? data[0]["todayCases"]: 'n/a'));
		$("#zn-continent-today-deaths").append(eNum(data[0]["todayDeaths"] ? data[0]["todayDeaths"]: 'n/a'));
		$("#zn-continent-critical").append(eNum(data[0]["critical"] ? data[0]["critical"]: 'n/a'));
		$("#zn-continent-case-million").append(eNum(data[0]["casesPerOneMillion"] ? data[0]["casesPerOneMillion"]: 'n/a'));
		$("#zn-continent-updates").text(timestampToTime(data[0].updated, 1));
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
			byAll(result)
			console.log(result);
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
