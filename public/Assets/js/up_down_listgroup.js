document.querySelectorAll('.collapse').forEach((collapse) => {
    collapse.addEventListener('show.bs.collapse', (event) => {
        event.target.previousElementSibling.querySelector('.bi-chevron-down').classList.replace('bi-chevron-down', 'bi-chevron-up');
    });
    collapse.addEventListener('hide.bs.collapse', (event) => {
        event.target.previousElementSibling.querySelector('.bi-chevron-up').classList.replace('bi-chevron-up', 'bi-chevron-down');
    });
});
