import LoanApplicationDataTable from "./dataTable";
import AddLoanApplication from "./addLoanApplication";
window.onload = () => {
    const dataTable = new LoanApplicationDataTable();
    new AddLoanApplication(dataTable);
};
