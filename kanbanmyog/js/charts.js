
    // Function to generate a pie chart
// Function to generate a pie chart
function generatePieChart(canvasId, labels, data ,project_title) {
    const chartData = {
        labels: labels,
        datasets: [{
            label: 'Task Count',
            data: data,
            backgroundColor: [
                '#59498c',
                '#aa96d7',
                '#e296bd',
                '#fda5df'
            ]
        }]
    };

    const config = {
        type: 'pie',
        data: chartData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                     position: 'top',
                    
                },
                title: {
                    display: true,
                    text: project_title
                }
            }
        },
    };

    const myChart = new Chart(
        document.getElementById(canvasId),
        config
    );
}

// function generateLineChart(canvasId, labels, data ,project_title) {
//     const chartData = {
//         labels: labels,
//         datasets: [{
//             label: 'Project',
//             data: data,
//             backgroundColor: [
//                 '#59498c',
//                 '#aa96d7',
//                 '#e296bd',
//                 '#fda5df'
//             ]
//         }]
//     };

//     const config = {
//         type: 'line',
//         data: chartData,
//         options: {
//             responsive: true,
//             plugins: {
//                 legend: {
//                      position: 'top',
                    
//                 },
//                 title: {
//                     display: true,
//                     text: project_title
//                 }
//             }
//         },

//         scales: {
//             y: {
//                 ticks: {
//                     callback: function(value) {
//                         return value + '%';
//                     }
//                 }
//             }
//         }

        
//     };

//     const myChart = new Chart(
//         document.getElementById(canvasId),
//         config
//     );
// }



function generateLineChart(canvasId, labels, data, project_title) {
    const chartData = {
        labels: labels,
        datasets: [{
            label: 'Done %',
            data: data,
            backgroundColor: [
                '#59498c',
                '#aa96d7',
                '#e296bd',
                '#fda5df'
            ],
            fill: false,
            borderColor: '#9d94b8',
            tension: 0.1
        }]
    };

    const config = {
        type: 'line',
        data: chartData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: project_title
                }
            },
            scales: {
                y: {
                    ticks: {
                        stepSize: 10,
                        // callback: function(value, index, values) {
                        //     const percentage = 10 + index * 10;
                        //     return percentage + '%';
                        // }
                        callback: function(value, index, values) {
                            return value + '%';
                        }
                    }
                }
            }
        },
    };

    const myChart = new Chart(
        document.getElementById(canvasId),
        config
    );
}

