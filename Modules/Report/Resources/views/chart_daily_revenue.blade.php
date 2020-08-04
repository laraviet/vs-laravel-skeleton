<script>
    var options = {
        chart: {
            height: 380,
            type: 'line',
            zoom: {
                enabled: false
            },
            toolbar: {
                show: false
            }
        },
        colors: ['#34c38f'],
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: [2],
            curve: 'straight',
            dashArray: [4]
        },
        series: [{
            name: "{{ _t('order_revenue') }}",
            data: [
                {{ @implode(",", $dayRevenues->map(function ($item) {
                    return $item->order_revenue / 1000000;
                    })->toArray()) }}
            ]
        }],
        title: {
            text: '{{ _t("daily_revenue") }}',
            align: 'center'
        },
        markers: {
            size: 0,
            hover: {
                sizeOffset: 6
            }
        },
        xaxis: {
            categories: [
                {{ @implode(",", $dayRevenues->map(function ($item) {
                    return \Carbon\Carbon::parse($item->day)->day;
                    })->toArray()) }}
            ]
        },
        tooltip: {
            y: [{
                title: {
                    formatter: function formatter(val) {
                        return val + " (triệu vnd)";
                    }
                }
            }, {
                title: {
                    formatter: function formatter(val) {
                        return val + " (triệu vnd)";
                    }
                }
            }, {
                title: {
                    formatter: function formatter(val) {
                        return val;
                    }
                }
            }]
        },
        grid: {
            borderColor: '#f1f1f1'
        }
    };
    var chart = new ApexCharts(document.querySelector("#daily_revenue"), options);
    chart.render();
</script>
