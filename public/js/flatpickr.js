document.addEventListener("DOMContentLoaded", function() {
    let date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
    let defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
    document.getElementById("datetimepicker-dashboard").flatpickr({
        inline: true,
        prevArrow: "<span title=\"Previous month\">&laquo;</span>",
        nextArrow: "<span title=\"Next month\">&raquo;</span>",
        defaultDate: defaultDate
    });
});
