(function( $ ) {
	'use strict';
	$ = jQuery.noConflict();
	$(window).on('load', function () {
		let api_url = "https://disease.sh/v3/covid-19/all?yesterday=true&allowNull=true";
		if(api_url){
			$('#zone-api').append('Live');
			$('#zone-api__status').addClass('zone-up-status');
		} else {
			$('#zone-api').append('Down');
			$('#zone-api__status').addClass('blinking zone-down-status');
		}
        fetchApiData(api_url, "global");
	});

	/** DOM Handler */
	function byAll(data) {
        var template_html = '<div class="column"> <div class="card by-global"> <div class="card-content"> <div class="zn-title"> <p class="zn-global-cases title is-3">'+Number(data.cases).toLocaleString()+'</p><p class="zn-global-name title is-4">🌎 Global Total Cases</p></div><div class="global-info"> <p id="zn-global-population" class="subtitle is-6 mb-3">👨‍👩‍👦‍👦 Population: '+Number(data.population).toLocaleString()+'</p><p id="zn-global-update" class="subtitle is-6 mb-3">🕒 As of: '+timestampToTime(data.updated, 1)+'</p></div><div class="zn-statistics"> <div class="columns is-desktop"> <div class="column"> <div class="global-stats"> <div class="mr-1"><span class="emoji">🤧</span></div><div class="global-stats__values"> <span class="title is-6">Active</span> <p id="zn-global-active" class="title is-5">'+Number(data.active).toLocaleString()+'</p><p class="subtitle is-6">(+<span id="zn-global-activePerM">'+Number(data.activePerOneMillion).toLocaleString()+'</span>)</p></div></div><div class="global-stats"> <div class="mr-1"><span class="emoji">😄</span></div><div class="global-stats__values"> <span class="title is-6">Recovered</span> <p id="zn-global-recovered" class="title is-5">'+Number(data.recovered).toLocaleString()+'</p><p class="subtitle is-6">(+<span id="zn-global-recoveredPerM">'+Number(data.recoveredPerOneMillion).toLocaleString()+'</span>)</p></div></div></div><div class="column"> <div class="global-stats"> <div class="mr-1"><span class="emoji">😷</span></div><div class="global-stats__values"> <span class="title is-6">Critical</span> <p id="zn-global-critical" class="title is-5">'+Number(data.critical).toLocaleString()+'</p><p class="subtitle is-6">(+<span id="zn-global-criticalPerM">'+Number(data.criticalPerOneMillion).toLocaleString()+'</span>)</p></div></div><div class="global-stats"> <div class="mr-1"><span class="emoji">💀</span></div><div class="global-stats__values"> <span class="title is-6">Deaths</span> <p id="zn-global-deaths" class="title is-5">'+Number(data.deaths).toLocaleString()+'</p><p class="subtitle is-6">(+<span id="zn-global-deathsPerM">'+Number(data.deathsPerOneMillion).toLocaleString()+'</span>)</p></div></div></div></div></div></div></div></div>';
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
