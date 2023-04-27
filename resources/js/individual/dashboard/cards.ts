import $ from 'jquery';
import 'daterangepicker';
import moment from "moment";
import { url,ajax } from '../../utils/index';
import NumberScroll from '../../plugins/Animation/numberScroll';

export default class DashboardCards {
    private options = {
        startDate: moment().startOf('month').format("YYYY-MM-DD"),
        endDate: moment().endOf('month').format("YYYY-MM-DD"),
        locale: {
            format: 'YYYY-MM-DD',
            separator: ' -- ',
            applyLabel: '确认',
            cancelLabel: '取消',
            fromLabel: '起始时间',
            toLabel: '结束时间',
            customRangeLabel: '自定义',
            weekLabel: 'W',
            daysOfWeek: ['日', '一', '二', '三', '四', '五', '六'],
            monthNames: [
                '一月', '二月', '三月', '四月', '五月', '六月',
                '七月', '八月', '九月', '十月', '十一月', '十二月'
            ],
            firstDay: 1
        }
    };;
    private form
    constructor(form: string) {
        this.form = form;
        this.main();
    }
    private main() {
        this.registerTimePicker();
        this.registerFormSubmitEvent();
    }
    private registerTimePicker() {
        $('.input-daterange-datepicker').daterangepicker(this.options, function (start, end, label) {
            console.log(start.format("YYY-MM-DD"), end.format("YYYY-MM-DD"));
        })
    }
    private registerFormSubmitEvent() {
        document.querySelector(this.form).addEventListener("submit", async (event: Event) => {
            event.preventDefault();
            //获取表单字段
            const form = $("#cards").serializeArray();
            //处理表单字段为需要的数据结构
            const data = {
                _token:form.filter(item=>item["name"] == "_token")[0].value,
                daterange:{
                    start:form.filter(item =>item["name"] == "daterange")[0].value.split("--")[0].trim() + " 00:00:00",
                    end:form.filter(item =>item["name"] == "daterange")[0].value.split("--")[1].trim() + " 23:59:59",
                },
                //获取用户选择了哪些机构,数组存储
                companies:form.filter(item=>item["name"] == "companies").map(item=>Number(item.value))
            }
            const res = await ajax({
                url:url("/individual/home/filterCards"),
                method:"post",
                data
            }) as filterCardsResponse
            //处理响应,设置数字滚动效果
            if(res){
                Object.entries(res).forEach(([key,value]) =>{
                    switch(key){
                        case "cases":
                            NumberScroll(".showCaseCount",value);
                            break;
                        case "clients":
                            NumberScroll(".showClientsCount",value);
                            break;
                        case "serviceProvider":
                            NumberScroll(".showServiceProviderCount",value);
                            break;
                        case "successCases":
                            NumberScroll(".showSuccessCase",value);
                            break;
                        case "rejectCases":
                            NumberScroll(".showRejectCase",value);
                            break;
                    }
                })
            }
        })
    }
}
