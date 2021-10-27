<template>
    <canvas id="order" style="" class=""></canvas>
</template>
<script>
import Chart from 'chart.js/auto';
export default{
    data()
    {
        return{
            xValues : [50,60,70,80,90,100,110],
            yValues : [20,34,50,22,20,4,26],

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
        var ctx = document.getElementById('order'); // node
        ctx.height = 120;
        var myChart = new Chart(ctx, {
                        id:   "sales",
                        type: "line",
                        data: {
                            labels: this.xValues,
                            datasets: [{
                                label: 'Sales Chart',
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
                            layout: {
                                padding: 15
                            },
                            legend: {
                                display: false,
                            },
                            scales: {
                                x: {
                                    grid:{
                                        opacity:0.5,
                                        color:"rgba(158, 105, 100, 0.5)",
                                    }, 
                                },
                                y: {
                                   grid:{
                                        display:false,
                                        
                                    },
                                }
                                    
                            },

                        }
        });
    },
}

</script>

