<template>
    <canvas id="orderStatus" style="width:100%;height:100%" class=""></canvas>
</template>
<script>
import Chart from 'chart.js/auto';
export default{
    data()
    {
        return{
            xValues : ['delivered', 'denied', 'cancelled', 'returned'],
            yValues : [20,34,50, 20],

        }
    },
    methods:
    {
        loadchart()
        {
            
        }
    },
    mounted()
    {
        var ctx = document.getElementById('orderStatus'); // node
        var myChart = new Chart(ctx, {
                        id:   "Status",
                        type: "doughnut",
                        data: {
                            labels: this.xValues,
                            datasets: [{
                                label: 'Order Status',
                                lineTension: 1,
                                borderWidth: 2,
                                pointRadius: 4,
                                pointBackgroundColor: "rgba( 246, 49, 131 ,0.5)",
                                pointBorderColor: 'rgba( 246, 49, 131 ,0.5)',
                                backgroundColor: ["#f472b6", "#f4743b", "#c4f2b6", "#b4d2b6"],
                                borderColor: "rgba( 246, 49, 131 ,0.5)",
                                data: this.yValues,
                            }]
                        },
                        options: {
                            layout: {
                            
                            },
                            plugins: {
                                legend: {
                                    position: 'bottom',
                                    labels: {
                                            usePointStyle: true,
                                            color: '#000',
                                            padding: 14,
                                        }
                                },
                            },
                            
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    
                                    grid:{
                                        display:false,
                                        drawBorder:false,
                                    },
                                    title: {
                                            font: {
                                                size: 14,
                                            },
                                            color: 'black'
                                        },

                                        ticks: {
                                            display:false,
                                        
                                        },
                                },
                                x:{
                                    grid:{
                                        display:false,
                                        drawBorder:false,
                                    },
                                    ticks: {
                                            display:false
                                        },
                                }
                            },

                        }
        });
    },
}

</script>

