(function( $ ) {
	'use strict';
	$ = jQuery.noConflict();
	$(window).on('load', function () {
        let api_url = "https://disease.sh/v3/covid-19/all?yesterday=true&allowNull=true";
        fetchApiData(api_url, "global");
	});

	/** DOM Handler */
	function byAll(data) {
        var logo = '🌏';
        var globe = 'Global Status';
        var template_html = '<div class="column"><div class="card by-continent"> <div class="card-content"><span>🕒 As of: '+timestampToTime(data.updated, 1)+'</span> <div class="zn-title"> <div id="zn-continent-globe" class="continent mr-3">'+logo+'</div><div class="zn-subtitle"> <p id="zn-continent-name" class="title is-4">'+globe+'</p><p id="zn-continent-population" class="subtitle is-6 mb-3">Population: '+Number(data.population).toLocaleString()+'</p></div></div><div class="zn-statistics"> <div class="continent-stats"> <span class="emoji mr-1">📊</span> <p class="title is-6"> Cases: <span id="zn-continent-cases" class="title is-4">'+Number(data.cases).toLocaleString()+'</span></p></div><div class="columns is-desktop"> <div class="column"> <div class="continent-stats"> <div class="mr-1"><span class="emoji">🤧</span></div><div class="continent-stats__values"> <span class="title is-6">Active</span> <p id="zn-continent-active" class="title is-5">'+Number(data.active).toLocaleString()+'</p><p class="subtitle is-6">(+<span id="zn-continent-activePerM">'+Number(data.activePerOneMillion).toLocaleString()+'</span>)</p></div></div><div class="continent-stats"> <div class="mr-1"><span class="emoji">😄</span></div><div class="continent-stats__values"> <span class="title is-6">Recovered</span> <p id="zn-continent-recovered" class="title is-5">'+Number(data.recovered).toLocaleString()+'</p><p class="subtitle is-6">(+<span id="zn-continent-recoveredPerM">'+Number(data.recoveredPerOneMillion).toLocaleString()+'</span>)</p></div></div></div><div class="column"> <div class="continent-stats"> <div class="mr-1"><span class="emoji">😷</span></div><div class="continent-stats__values"> <span class="title is-6">Critical</span> <p id="zn-continent-critical" class="title is-5">'+Number(data.critical).toLocaleString()+'</p><p class="subtitle is-6">(+<span id="zn-continent-criticalPerM">'+Number(data.criticalPerOneMillion).toLocaleString()+'</span>)</p></div></div><div class="continent-stats"> <div class="mr-1"><span class="emoji">💀</span></div><div class="continent-stats__values"> <span class="title is-6">Deaths</span> <p id="zn-continent-deaths" class="title is-5">'+Number(data.deaths).toLocaleString()+'</p><p class="subtitle is-6">(+<span id="zn-continent-deathsPerM">'+Number(data.deathsPerOneMillion).toLocaleString()+'</span>)</p></div></div></div></div></div></div></div></div>';
        $('#zn-covid19-global').append(template_html);
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
            }
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
