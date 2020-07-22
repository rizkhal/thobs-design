(function(window) {
    "use strict";

    function Stats() {
        var _Stats = {};
        _Stats.line = (id, data) => {
            var ctx = document.getElementById(id).getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Clicks'],
                    datasets: data
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        };
        return _Stats;
    }
    if (typeof(window.Stats) === 'undefined') {
        window.Stats = Stats();
    }
})(window);

// [{
//     label: "Prime and Fibonacci",
//     fillColor: "rgba(220,220,220,0.2)",
//     strokeColor: "rgba(220,220,220,1)",
//     pointColor: "rgba(220,220,220,1)",
//     pointStrokeColor: "#fff",
//     pointHighlightFill: "#fff",
//     pointHighlightStroke: "rgba(220,220,220,1)",
//     data: [3, 16, 11, 2, 29, 5, 3, 13, 21, 20]
// }, {
//     label: "My Second dataset",
//     fillColor: "rgba(151,187,205,0.2)",
//     strokeColor: "rgba(151,187,205,1)",
//     pointColor: "rgba(151,187,205,1)",
//     pointStrokeColor: "#fff",
//     pointHighlightFill: "#fff",
//     pointHighlightStroke: "rgba(151,187,205,1)",
//     data: [0, 1, 1, 2, 3, 5, 8, 13, 21, 34]
// }]
