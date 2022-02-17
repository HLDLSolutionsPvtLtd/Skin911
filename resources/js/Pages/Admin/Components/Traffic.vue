<template>
    <canvas id="myChart4" style="width:100%;" class=""></canvas>
</template>
<script>
import Chart from 'chart.js/auto';
export default{
    data()
    {
        return{
            chart: [],
            no: 0,
            response: [],
            active: 0,
            chartCheck: true,
            response :[],
            xValues : [0],
            yValues : [0],
            pointBackgroundColor: "#b45547",
            pointBorderColor: '#b45547',
            backgroundColor: "#b45547",
            borderColor: "#b45547",
        }
    },
    watch:
    {
        response(){
            this.response.forEach(element => {
                this.xValues.push(element.date);
                this.yValues.push(element.visitors);
                this.no = this.no + element.visitors;
            });
            this.$emit('traffic', this.yValues[this.yValues.length-1]);
            this.chartCheck = false;
            var ctx = document.getElementById('myChart4');
            this.chart = new Chart(ctx, {
                        id:   "Traffic",
                        type: "line",
                        data: {
                            labels: this.xValues,
                            datasets: [{
                                label: 'Booking',
                                lineTension: 0.4,
                                borderWidth: 1,
                                pointRadius: 0,
                                pointHoverRadius: 4,
                                pointBackgroundColor: this.pointBackgroundColor,
                                pointBorderColor: this.pointBorderColor,
                                backgroundColor: this.backgroundColor,
                                borderColor: this.borderColor,
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
        filter()
        {
            //  axios.get('/chart/data/'+this.filter)
            // .then(res => this.response = res.data);
            //  console.log(this.response);
        }
    },
    mounted()
    {
        
        axios.get('/admin/chart/traffic')
        .then(res => this.response = res.data);
       
        // .then(res => this.response = res.data);
        // if (localStorage.theme === 'light' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: light)').matches))
        // {
        //     this.pointBackgroundColor = "rgba(145, 250, 240,1)";
        //     this.pointBorderColor = 'rgba(178, 182, 181,1)';
        //     this.backgroundColor =  "rgba( 228, 229, 231,0.5)";
        //     this.borderColor = "rgba(178, 182, 181,1)";
        // }
            
        
    },
}

</script>
