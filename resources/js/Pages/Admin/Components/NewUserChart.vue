<template>
    <canvas id="newuser" style="" class=""></canvas>
</template>
<script>
import Chart from 'chart.js/auto';
export default{
    data()
    {
        return{
            yValues : [50,60,70,80,90,100,110],
            xValues : ['JAN','FEB','MAR','APR','MAY','JUN','JUL'],

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
        var ctx = document.getElementById('newuser'); // node
        ctx.height = 120;
        var myChart = new Chart(ctx, {
                        id:   "sales",
                        type: "bar",
                        data: {
                            labels: this.xValues,
                            datasets: [{
                                label: 'Sales Chart',
                                lineTension: 1,
                                borderWidth: 2,
                                pointRadius: 4,
                                pointBackgroundColor: "rgba(58, 5, 255, 0.5)",
                                pointBorderColor: 'rgba(58, 5, 255, 0.5)',
                                backgroundColor: "rgba(36,50,64,0.5)",
                                borderColor: "rgba(58, 5, 255, 0.5)",
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
                                        display:false,
                                        
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

