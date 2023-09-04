document.addEventListener("DOMContentLoaded", function () {
    const locationRows = document.querySelectorAll(".location-row");

    locationRows.forEach(function (row) {
        const detailsRow = row.nextElementSibling;
        const arrowIcon = row.querySelector("i");

        row.addEventListener("click", function () {
            detailsRow.classList.toggle("show");
            arrowIcon.classList.toggle("fa-caret-down");
            arrowIcon.classList.toggle("fa-caret-up");
        });
    });
});


