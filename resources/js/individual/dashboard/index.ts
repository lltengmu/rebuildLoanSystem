import $ from 'jquery'
import DashboardCards from './cards';
import DashboardChart from './charts';
import { ajax, url } from '../../utils';


const initChart = async () =>{
    const lineChartResponse =  await ajax({
        url: url("/individual/home/LineChart"),
        method: "get"
    }) as lineChartResponse[]
    //处理树状图的数据
    const lineChartConfig = {
        data:lineChartResponse.map(item => item.data).reverse(),
        labels:lineChartResponse[0].labels,
        ykeys:lineChartResponse[0].ykeys
    }
    const pieChartResponse =  await ajax({
        url: url("/individual/home/pieChart"),
        method: "get"
    }) as pieChartResponse
    //处理扇形图表的数据
    const pieChartConfig = {
        data:pieChartResponse.data,
        labels:pieChartResponse.labels
    }
    //绘制图表
    new DashboardChart(lineChartConfig,pieChartConfig);
    new DashboardCards("#cards")
}
initChart();


