import $ from 'jquery';
import Chart from 'chart.js/auto';


export default class DashboardChart {
    private pieChartElement = document.querySelector("#sold-product") as HTMLCanvasElement
    private lineChartConfig;
    private pieChartConfig;
    private pieChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        }
    }
    constructor(lineChartConfig, pieChartConfig) {
        this.lineChartConfig = lineChartConfig;
        this.pieChartConfig = pieChartConfig
        this.lineChart();
        this.pieChart()
    }
    private lineChart() {
        Morris.Bar({
            element: 'morris-bar-chart',
            data: this.lineChartConfig.data,
            xkey: 'y',
            ykeys: this.lineChartConfig.ykeys,
            labels: this.lineChartConfig.labels,
            barColors: ['#343957', '#5873FE'],
            hideHover: 'auto',
            gridLineColor: '#eef0f2',
            resize: true
        });
    }
    private pieChart() {
        new Chart(this.pieChartElement, {
            type: 'pie',
            data: {
                datasets: [{
                    data: this.pieChartConfig.data,
                    borderWidth: 0,
                    backgroundColor: [
                        "rgba(89, 59, 219, .9)",
                        "rgba(89, 59, 219, .7)",
                        "rgba(89, 59, 219, .5)",
                        "rgba(89, 59, 219, .07)"
                    ],
                    hoverBackgroundColor: [
                        "rgba(89, 59, 219, .9)",
                        "rgba(89, 59, 219, .7)",
                        "rgba(89, 59, 219, .5)",
                        "rgba(89, 59, 219, .07)"
                    ]
                }],
                labels: this.pieChartConfig.labels
            },
            options: this.pieChartOptions
        });
    }
}
