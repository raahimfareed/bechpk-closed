$(document).ready(function(){
    var popularCategories = $('#popularCategories');
    Chart.defaults.global.defaultFontColor = '#666';
    // Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 12;
    var popularCatGraph = new Chart(popularCategories, {
        type: 'polarArea',
        data: {
            labels: ['Mobiles', 'Cars', 'Property', 'Jobs', 'Pets'],
            datasets: [{
                label: '',
                data: [
                    1827, 918, 517, 3018 ,201
                ],
                backgroundColor: [
                    '#fd54',
                    '#5cc4',
                    '#f684',
                    '#3af4',
                    '#5a54'
                ],
                borderColor: [
                    '#fd5',
                    '#5cc',
                    '#f68',
                    '#3af',
                    '#5a5'
                ]
            }],
        },
        options: {
            
        }
    });
});