require('./dependencies');

// Dropdown
document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems, {
        alignment: 'right',
        constrainWidth: false,
        coverTrigger: false,
    });
});

$('.telephone').mask('(00)0000-0000', { clearIfNotMatch: true });