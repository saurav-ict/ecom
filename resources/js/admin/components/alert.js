document.querySelectorAll('.alert-dismissible').forEach(alert => {
    setTimeout(() => {
        alert.classList.remove('show');
        alert.classList.add('fade');
        setTimeout(() => alert.remove(), 300);
    }, 4000);
});
