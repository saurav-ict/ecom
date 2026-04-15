/**
 * Usage: <form data-confirm="Are you sure?">
 */
document.querySelectorAll('form[data-confirm]').forEach(form => {
    form.addEventListener('submit', e => {
        if (!confirm(form.dataset.confirm)) {
            e.preventDefault();
        }
    });
});
