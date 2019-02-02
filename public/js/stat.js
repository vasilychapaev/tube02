$(document).ready(function() {

    // chart 1
    var ctx1 = document.getElementById('myChart').getContext("2d");
    var gradientStroke = ctx1.createLinearGradient(500, 0, 100, 0);
    gradientStroke.addColorStop(0, '#80b6f4');
    gradientStroke.addColorStop(1, '#f49080');
    var gradientFill = ctx1.createLinearGradient(500, 0, 100, 0);
    gradientFill.addColorStop(0, "rgba(128, 182, 244, 0.6)");
    gradientFill.addColorStop(1, "rgba(244, 144, 128, 0.6)");

    var myChart1 = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: myChartLabels,
            datasets: [
                {
                    label: "Часы просмотра",
                    borderColor: gradientStroke,
                    pointRadius: 0,
                    fill: true,
                    backgroundColor: gradientFill,
                    borderWidth: 1,
                    data: myChartData
                },
            ]
        },
        options: {
            legend: {
                position: "bottom"
            },
            scales: {
                yAxes: [{
                    ticks: {
                        fontColor: "rgba(0,0,0,0.5)",
                        fontStyle: "bold",
                        beginAtZero: true,
                        maxTicksLimit: 5,
                        padding: 20
                    },
                    gridLines: {
                        drawTicks: false,
                        display: false
                    }

                }],
                xAxes: [{
                    gridLines: {
                        zeroLineColor: "transparent"
                    },
                    ticks: {
                        padding: 20,
                        fontColor: "rgba(0,0,0,0.5)",
                        fontStyle: "bold"
                    }
                }]
            }
        }
    });
});