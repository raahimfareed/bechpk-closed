$(document).ready(function(){
    var newUsersCanvas = $('#newUsers');
    Chart.defaults.global.defaultFontColor = '#666';
    // Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 12;
    var newUsersChart = new Chart(newUsersCanvas, {
        type: 'line',
        data: {
            labels: ['6D', '5D', '4D', '3D', '2D', '1D', 'Today'],
            datasets: [{
                label: '',
                data: [
                    3, 6, 8, 1, 2, 19, 7
                ],
                backgroundColor: [
                    '#9994'
                ],
                borderColor: [
                    '#999'
                ]
            }],
        },
        options: {
            
        }
    });
});