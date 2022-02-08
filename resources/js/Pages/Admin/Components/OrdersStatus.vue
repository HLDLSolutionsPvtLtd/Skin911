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
        ctx.height = 70;
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
                                backgroundColor: "rgba(160,150,150,0 )",
                                borderColor: "rgba( 246, 49, 131 ,0.5)",
                                data: this.yValues,
                            }]
                        },
                        options: {
                            maintainAspectRatio: true,
                            layout: {
                            
                            },
                            plugins: {
                                legend: {
                                    position: 'bottom',
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

