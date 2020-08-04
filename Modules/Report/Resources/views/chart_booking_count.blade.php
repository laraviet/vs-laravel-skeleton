<script>
    var options = {
        chart: {
            height: 320,
            type: 'pie'
        },
        series: [{{ $report->order_count }}],
        labels: ["{{ _t('order') }}"],
        colors: ["#34c38f"],
        legend: {
            show: true,
            position: 'bottom',
            horizontalAlign: 'center',
            verticalAlign: 'middle',
            floating: false,
            fontSize: '14px',
            offsetX: 0,
            offsetY: -10
        },
        responsive: [{
            breakpoint: 600,
            options: {
                chart: {
                    height: 240
                },
                legend: {
                    show: false
                }
            }
        }]
    };
    var chart = new ApexCharts(document.querySelector("#booking_count"), options);
    chart.render(); // Donut chart
</script>
