$(function () {

  //-------------
  //- Bar CHART -
  //-------------
  let pieChartInit;

  // update/init pie chart
  function loadData(data)
  {
    // pie chart

    if(pieChartInit){

      pieChartInit.data = data;
      pieChartInit.update();

    } else {

      pieChartInit = new Chart(document.getElementById("nationalityChart"), {
        type: 'pie',
				data: {
					labels: data.labels,
					datasets: data.datasets,
				},
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
								precision: 0,
							},
						},
					},
					animation: {
						onComplete: function () {
							let image = pieChartInit.toBase64Image();
							$("#chart-image").val(image);
							$('#printNationality').removeAttr('disabled');

						},
					},
        },
      });

    }

  }

	function getData(year) {
		$.getJSON('/analytics/nationalities/chart', {
			selectedYear: year
		}, function (data) {
			loadData(data);
		});
	}

  // first load of pie chart
	getData($('#yearFilter').val());

	$("#yearFilter").on("change", function () {

		getData($(this).val());

	});

});
