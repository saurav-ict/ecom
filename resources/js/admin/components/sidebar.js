const sidebar  = document.getElementById('sidebar');
const overlay  = document.getElementById('sidebar-overlay');
const toggle   = document.getElementById('sidebarToggle');

if (toggle) {
    toggle.addEventListener('click', () => {
        sidebar.classList.toggle('open');
        overlay.classList.toggle('show');
    });

    overlay.addEventListener('click', () => {
        sidebar.classList.remove('open');
        overlay.classList.remove('show');
    });
}
