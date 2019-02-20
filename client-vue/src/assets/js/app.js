require('./dependencies');

// Datepicker
document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.datepicker');

    M.Datepicker.init(elems, {
        format: 'dd/mm/yyyy',
        onSelect: function(value) {

        }
    });
});