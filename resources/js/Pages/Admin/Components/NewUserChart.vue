<template>
    <canvas id="newuser" style="" class=""></canvas>
</template>
<script>
import Chart from 'chart.js/auto';
export default{
    data()
    {
        return{
            response: [],
            yValues : [],
            xValues : [],

        }
    },
    methods:
    {
       
    },
    mounted()
    {
        axios.get('/admin/chart/users')
        .then(res => this.response = res.data);
    },
    watch:{
        response()
        {
            this.yValues = this.response.y;
            this.xValues = this.response.x;
            this.$emit('newuser', this.yValues[this.yValues.length-1]);
            var ctx = document.getElementById('newuser');
            var myChart = new Chart(ctx, {
                            id:   "New Users",
                            type: "bar",
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
                                plugins:{
                                    legend: {
                                        display: false,
                                    }
                                },
                                scales: {
                                    x: {
                                        grid:{
                                            display:false,
                                            drawBorder:false,
                                        },

                                        ticks: {
                                            display:false,
                                        
                                        },
                                    },
                                    y: {
                                        grid:{
                                            display:false,
                                            drawBorder:false,
                                        },

                                         ticks: {
                                            display:false,
                                        
                                        },
                                    }
                                        
                                },

                            }
            });
        }
    }
}

</script>

