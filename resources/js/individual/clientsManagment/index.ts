import DataTableManagement  from "./dataTable";
import FormSubmit from "./formSubmit";
window.onload = () =>{
    const dataTableMana = new DataTableManagement()
    new FormSubmit(dataTableMana.tableInstance);
};