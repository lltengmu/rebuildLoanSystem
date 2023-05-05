import $ from "jquery";
import { loading, url } from "../../utils";
import 'datatables.net';


export default class LoanApplicationDataTable {
    private tableInstance;
    constructor() {
        this.registerDataTable();
    }
    private registerDataTable() {
        this.tableInstance = $("#caseTable").DataTable({
            autoWidth: true,
            order: [0, "desc"],
            ajax: {
                url: url("/client/home/cases"),
                method: "get",
                headers: {
                    "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                },
                dataSrc: (myJson) => myJson,
            },
            columns: [
                {
                    "data": "num"
                },
                {
                    "data": "first_name"
                },
                {
                    "data": "last_name"
                },
                {
                    "data": "loan_amount"
                },
                {
                    "data": "company"
                },
                {
                    "data": "repayment_period"
                },
                {
                    "data": "disbursement_date"
                },
                {
                    "data": "case_status"
                },
            ],
        })
    }
}