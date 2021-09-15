<template>
    <canvas id="myChart" class="w-full"></canvas>
</template>
<script>
import Chart from 'chart.js/auto';    
    export default{
        data()
        {
            return{
                chart: '',
            }
        },
        mounted()
        {
            const ctx = document.getElementById('myChart');
            this.chart = new Chart(ctx, {
                type: 'line',
                data: {
                    
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        tension: 1,
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
            
                options: {
                    plugins:
                    {
                        legend: {
                            display: false
                        },
                        tooltips: {
                            enabled: false
                        },
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        },
    }
</script>