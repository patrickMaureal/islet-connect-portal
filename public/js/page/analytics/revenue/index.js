$(function () {

  //-------------
  //- LINE CHART -
  //-------------
  let lineChartInit;

  // update/init line chart
  function loadData(data)
  {
    // line chart

    if(lineChartInit){

      lineChartInit.data = data;
      lineChartInit.update();

    } else {

      lineChartInit = new Chart(document.getElementById("myChart"), {
        type: 'line',
        data: data,
        options: {
					responsive: true,
					maintainAspectRatio: false,
					plugins: {
						legend: {
							position: "top",
						},
					},
					scales: {
						y: {
							ticks: {
								// Include a peso sign in the ticks
								callback: function (value, index, ticks) {
									return "₱" + value;
								},
							},
						},
					},
					animation: {
						onComplete: function () {
							let image = lineChartInit.toBase64Image();
							$("#chart-image").val(image);
							$('#printRevenue').removeAttr('disabled');
						},
					},
        },
      });

    }

  }

	function getData(year) {
		$.getJSON('/analytics/revenues/chart', {
			selectedYear: year
		}, function (data) {
			loadData(data);
		});
	}

  // first load of line chart
	getData($('#yearFilter').val());

	$("#yearFilter").on("change", function () {

		getData($(this).val());

	});

});
