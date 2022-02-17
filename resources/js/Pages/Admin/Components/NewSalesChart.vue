<template>
    <canvas id="myChart" style="width:100%;" class=""></canvas>
</template>
<script>
import Chart from 'chart.js/auto';
export default{
    props: ['filter'],
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
            var ctx = document.getElementById('myChart'); // node
            ctx.height = 320;
            var myChart = new Chart(ctx, {
                            id:   "sales",
                            type: "line",
                            data: {
                                labels: this.xValues,
                                datasets: [{
                                    label: 'Sales',
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
                                    legend: {
                                        display: false,
                                    }
                                },
                                
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        grid:{
                                            
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
                                            display:false,
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
        }
    },
    watch:{
        response(){
            this.yValues = this.response.y;
            this.xValues = this.response.x;
            this.$emit('sales', this.yValues[this.yValues.length-1]);

            this.loadchart();
        },
        filter()
        {
             axios.get('/admin/chart/order/'+this.filter)
            .then(res => this.response = res.data);
        }
    },
    mounted()
    {
         axios.get('/admin/chart/order/'+this.filter)
        .then(res => this.response = res.data);
    },
}

</script>
