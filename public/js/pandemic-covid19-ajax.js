(function( $ ) {
	'use strict';
	$ = jQuery.noConflict();
	$(window).on('load', function () {
		console.log('API in Live');
		/** Cards */
		if (zn_global !== null || zn_global !== '') {
			let api_url = "https://disease.sh/v3/covid-19/all?yesterday=true&allowNull=true";
			fetchApiData(api_url, "global");
		}
		if (zn_continent !== null || zn_continent !== "") {
			let api_url = "https://disease.sh/v3/covid-19/continents/" + zn_continent;
			fetchApiData(api_url, "continent");
		}
		if (zn_country !== null || zn_country !== "") {
			let api_url = "https://disease.sh/v3/covid-19/countries/" + zn_country;
			fetchApiData(api_url, "country");
		}
		/** Table */
		if (zn_globaltable !== null || zn_globaltable !== '') {
			let api_url = "https://disease.sh/v3/covid-19/countries";
			fetchApiDataTable(api_url);
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

	function byContinent(data) {
		$.each(data, function (c) {
			var logo = '';
			if(data[c].continent === 'North America' || data[c].continent === 'South America') {
				logo = '🌎';
			} else if(data[c].continent === 'Europe' || data[c].continent === 'Africa') {
				logo = '🌍';
			} else if(data[c].continent === 'Asia' || data[c].continent === 'Australia/Oceania') {
				logo = '🌏';
			}
			var template_html = '<div class="column is-6"> <div class="card by-continent"> <div class="card-content"> <div class="zn-title"> <div id="zn-continent-globe" class="continent mr-3">'+logo+'</div><div class="zn-subtitle"> <p id="zn-continent-name" class="title is-4">'+data[c].continent+' <a class="asof__time">🕒 <span class="asof__timetooltip">As of: '+timestampToTime(data[c].updated, 1)+'</span></a></p><p id="zn-continent-population" class="subtitle is-6 mb-3">Population: '+Number(data[c].population).toLocaleString()+'</p></div></div><div class="zn-statistics"> <div class="continent-stats"> <span class="emoji mr-1">📊</span> <p class="title is-6"> Cases: <span id="zn-continent-cases" class="title is-4">'+Number(data[c].cases).toLocaleString()+'</span></p></div><div class="columns is-desktop"> <div class="column"> <div class="continent-stats"> <div class="mr-1"><span class="emoji">🤧</span></div><div class="continent-stats__values"> <span class="title is-6">Active</span> <p id="zn-continent-active" class="title is-5">'+Number(data[c].active).toLocaleString()+'</p><p class="subtitle is-6">(+<span id="zn-continent-activePerM">'+Number(data[c].activePerOneMillion).toLocaleString()+'</span>)</p></div></div><div class="continent-stats"> <div class="mr-1"><span class="emoji">😄</span></div><div class="continent-stats__values"> <span class="title is-6">Recovered</span> <p id="zn-continent-recovered" class="title is-5">'+Number(data[c].recovered).toLocaleString()+'</p><p class="subtitle is-6">(+<span id="zn-continent-recoveredPerM">'+Number(data[c].recoveredPerOneMillion).toLocaleString()+'</span>)</p></div></div></div><div class="column"> <div class="continent-stats"> <div class="mr-1"><span class="emoji">😷</span></div><div class="continent-stats__values"> <span class="title is-6">Critical</span> <p id="zn-continent-critical" class="title is-5">'+Number(data[c].critical).toLocaleString()+'</p><p class="subtitle is-6">(+<span id="zn-continent-criticalPerM">'+Number(data[c].criticalPerOneMillion).toLocaleString()+'</span>)</p></div></div><div class="continent-stats"> <div class="mr-1"><span class="emoji">💀</span></div><div class="continent-stats__values"> <span class="title is-6">Deaths</span> <p id="zn-continent-deaths" class="title is-5">'+Number(data[c].deaths).toLocaleString()+'</p><p class="subtitle is-6">(+<span id="zn-continent-deathsPerM">'+Number(data[c].deathsPerOneMillion).toLocaleString()+'</span>)</p></div></div></div></div></div></div></div></div>';
			$('#zn-covid19-continent').append(template_html);
		});
		$(".zn-loading").fadeOut();
		$(".zn-covid19__content").fadeIn();
	};

	function byCountry(data) {
		$.each(data, function (z) {
			var template_html = '<div class="column is-6"> <div class="card by-country"> <div class="card-content"> <div class="zn-title"> <div class="flag mr-3"><img src="'+data[z].countryInfo.flag+'" alt="'+data[z].countryInfo.iso2+'"></div><div class="zn-subtitle"> <p id="zn-country-name" class="title is-4">'+data[z].country+' <a class="asof__time">🕒 <span class="asof__timetooltip">As of: '+timestampToTime(data[z].updated, 1)+'</span></a></p><p id="zn-country-population" class="subtitle is-6 mb-3">Population: '+Number(data[z].population).toLocaleString()+'</p></div></div><div class="zn-statistics"> <div class="country-stats"> <span class="emoji mr-1">📊</span> <p class="title is-6">Cases:<span id="zn-country-cases" class="title is-4">'+Number(data[z].cases).toLocaleString()+'</span></p></div><div class="columns is-desktop"> <div class="column"> <div class="country-stats"> <div class="mr-1"><span class="emoji">🤧</span></div><div class="country-stats__values"> <span class="title is-6">Active</span> <p id="zn-country-active" class="title is-5">'+Number(data[z].active).toLocaleString()+'</p><p class="subtitle is-6">(+<span id="zn-country-activePerM">'+Number(data[z].activePerOneMillion).toLocaleString()+'</span>)</p></div></div><div class="country-stats"> <div class="mr-1"><span class="emoji">😄</span></div><div class="country-stats__values"> <span class="title is-6">Recovered</span> <p id="zn-country-recovered" class="title is-5">'+Number(data[z].recovered).toLocaleString()+'</p><p class="subtitle is-6">(+<span id="zn-country-recoveredPerM">'+Number(data[z].recoveredPerOneMillion).toLocaleString()+'</span>)</p></div></div></div><div class="column"> <div class="country-stats"> <div class="mr-1"><span class="emoji">😷</span></div><div class="country-stats__values"> <span class="title is-6">Critical</span> <p id="zn-country-critical" class="title is-5">'+Number(data[z].critical).toLocaleString()+'</p><p class="subtitle is-6">(+<span id="zn-country-criticalPerM">'+Number(data[z].criticalPerOneMillion).toLocaleString()+'</span>)</p></div></div><div class="country-stats"> <div class="mr-1"><span class="emoji">💀</span></div><div class="country-stats__values"> <span class="title is-6">Deaths</span> <p id="zn-country-deaths" class="title is-5">'+Number(data[z].deaths).toLocaleString()+'</p><p class="subtitle is-6">(+<span id="zn-country-deathsPerM">'+Number(data[z].deathsPerOneMillion).toLocaleString()+'</span>)</p></div></div></div></div></div></div></div></div>';
			$('#zn-covid19-country').append(template_html);
		});
		$(".zn-loading").fadeOut();
		$(".zn-covid19__content").fadeIn();
	};


	/** Fetching Values from API */
	async function fetchApiData(api_url, type) {
		try {
			const result = await $.ajax({
				url: api_url,
				contentType: "application/json",
				dataType: 'json',
			});
			if (type === 'global') {
				byAll(result);
			} else if (type === 'continent') {
				byContinent(result);
			} else if (type === 'country') {
				byCountry(result);
			}
			
		} catch (error) {
			console.error(error);
		}
	}

	/** Generate Data Table from API */
	async function fetchApiDataTable(api_url) {
		try {
			await $.ajax({
				url: api_url,
				dataType: 'json',	
				success: function(json){
					$('#tbl-covid19data').DataTable({
						processing: true,
						lengthMenu: [20, 50, 100, 200],
						data: json,
						columns: [
							{
								"render": function (data, type, json, meta) {
									return '<img src="'+json.countryInfo.flag+'" alt="'+json.countryInfo.iso2+'">';
								}
							},
							{ 
								"render": function (data, type, json, meta) {
									return '<strong>'+json.country+'</strong>';
								}
							},
							{ 
								"render": function (data, type, json, meta) {
									return Number(json.active).toLocaleString();
								}
							},
							{ 
								"render": function (data, type, json, meta) {
									return Number(json.cases).toLocaleString();
								}
							},
							{ 
								"render": function (data, type, json, meta) {
									return Number(json.tests).toLocaleString();
								}
							},
							{ 
								"render": function (data, type, json, meta) {
									return Number(json.recovered).toLocaleString();
								}
							},
							{ 
								"render": function (data, type, json, meta) {
									return Number(json.deaths).toLocaleString();
								}
							},
						]
					});
					$(".zn-loading").fadeOut();
					$(".zn-covid19__content").fadeIn();
				}
			});
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
