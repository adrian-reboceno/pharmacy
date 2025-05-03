function initializeTables() {
    new DataTable("#datatables", {
        "fixedHeader": true,
       /*  "scrollX": true,
        "scrollY": "210px",
        "scrollCollapse": true, */
        
    })
}
document.addEventListener("DOMContentLoaded", function() {
    initializeTables()
});