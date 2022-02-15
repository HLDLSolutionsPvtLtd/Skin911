<template>
    <canvas id="order" style="" class=""></canvas>
</template>
<script>
import Chart from 'chart.js/auto';
export default{
    data()
    {
        return{
            response: [],
            xValues : [],
            yValues : [],

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
        axios.get("/admin/chart/orders")
        .then(res => this.response = res.data);
    },

    watch:{
        response()
        {
            this.yValues = this.response.y;
            this.xValues = this.response.x;
            var ctx = document.getElementById('order'); // node
            var myChart = new Chart(ctx, {
                            id:   "sales",
                            type: "line",
                            data: {
                                labels: this.xValues,
                                datasets: [{
                                    label: 'Sales Chart',
                                    lineTension: 0.4,
                                    borderWidth: 2,
                                    pointRadius: 0,
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
                                        display: false,
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
        }
    }
}

</script>

