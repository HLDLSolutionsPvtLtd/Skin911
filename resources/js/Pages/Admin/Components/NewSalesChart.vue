<template>
    <canvas id="myChart" style="width:100%;" class=""></canvas>
</template>
<script>
import Chart from 'chart.js/auto';
export default{
    data()
    {
        return{
            xValues : ['JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEP','OCT','NOV','DEC'],
            yValues : [7,8,8,43,56,78,10,11,36,40,45,58],

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
        Chart.defaults.plugins.legend = false;
        var ctx = document.getElementById('myChart'); // node
        ctx.height = 320;
        var myChart = new Chart(ctx, {
                        id:   "sales",
                        type: "line",
                        data: {
                            labels: this.xValues,
                            datasets: [{
                                label: 'Sales Chart',
                                fill: true,
                                lineTension: 0.4,
                                borderWidth: 2,
                                pointRadius: 4,
                                pointHoverRadius: 4,
                                pointBackgroundColor: "rgba( 246, 49, 131 ,0.5)",
                                pointBorderColor: 'rgba( 246, 49, 131 ,0.5)',
                                backgroundColor: "rgba(160,150,150,0 )",
                                borderColor: "rgba( 246, 49, 131 ,0.5)",
                                data: this.yValues,
                            }]
                        },
                        options: {
                            layout: {
                               
                            },
                            plugins: {
                            },
                            legend: {
                                display: false,
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    grid:{
                                        display:false,
                                        
                                    },
                                    title: {
                                            font: {
                                                size: 14,
                                            },
                                            color: 'black'
                                        },

                                        ticks: {
                                            min: Math.min.apply(this, this.yValues) - 5,
                                            max: Math.max.apply(this, this.yValues) + 5,
                                            font: {
                                                size: 12,
                                            },
                                           
                                        },
                                },
                                x:{
                                     grid:{
                                        opacity:0.5,
                                        color:"rgba(158, 105, 100, 0.5)",
                                    },
                                    ticks: {
                                            font: {
                                                size: 12,
                                            },
                                           
                                        },
                                }
                            },

                        }
        });
    },
}

</script>
