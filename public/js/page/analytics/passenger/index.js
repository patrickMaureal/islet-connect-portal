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

      lineChartInit = new Chart(document.getElementById("passengerChart"), {
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
					animation: {
						onComplete: function () {
							let image = lineChartInit.toBase64Image();
							$("#chart-image").val(image);
							$('#printPassengers').removeAttr('disabled');
						},
					},
					scales: {
            y: {
              ticks: {
								callback: function(value, index, values) {
                  // Return only whole values
                  if (Number.isInteger(value)) {
                    return value;
                  }
                }
              }
            }
          },
        },
      });

    }

  }

	function getData(year) {
		$.getJSON('/analytics/passengers/chart', {
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
