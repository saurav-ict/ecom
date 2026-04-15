/* ============================================================
   Admin Panel — app.js
   ============================================================ */

/* ── Sidebar ── */
(function () {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    const toggle  = document.getElementById('sidebarToggle');

    if (!toggle) return;

    toggle.addEventListener('click', () => {
        sidebar.classList.toggle('open');
        overlay.classList.toggle('show');
    });

    overlay.addEventListener('click', () => {
        sidebar.classList.remove('open');
        overlay.classList.remove('show');
    });
})();

/* ── Auto-dismiss alerts ── */
(function () {
    document.querySelectorAll('.alert').forEach(alert => {
        setTimeout(() => {
            alert.style.transition = 'opacity .4s';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 400);
        }, 4000);
    });
})();

/* ── Delete confirm ── */
/* Usage: <form data-confirm="Are you sure?"> */
(function () {
    document.querySelectorAll('form[data-confirm]').forEach(form => {
        form.addEventListener('submit', e => {
            if (!confirm(form.dataset.confirm)) {
                e.preventDefault();
            }
        });
    });
})();

/* ── Image preview ── */
/* Usage: <input type="file" data-preview="#previewId"> */
(function () {
    document.querySelectorAll('input[type="file"][data-preview]').forEach(input => {
        input.addEventListener('change', () => {
            const preview = document.querySelector(input.dataset.preview);
            if (!preview || !input.files[0]) return;
            preview.src = URL.createObjectURL(input.files[0]);
            preview.style.display = 'block';
        });
    });
})();

/* ── Property options (add/remove rows) ── */
(function () {
    const addBtn = document.getElementById('add-option');
    const list   = document.getElementById('options-list');
    if (!addBtn || !list) return;

    let index = parseInt(addBtn.dataset.index || 0);

    addBtn.addEventListener('click', () => {
        const row = document.createElement('div');
        row.className = 'option-row d-flex align-items-center gap-2';
        row.innerHTML = `
            <input type="hidden" name="options[${index}][id]" value="">
            <input type="text" name="options[${index}][name]"
                   class="form-control" placeholder="Option name">
            <div class="form-check mb-0 ms-1" style="white-space:nowrap">
                <input type="checkbox" class="form-check-input"
                       name="options[${index}][is_active]" value="1" checked>
                <label class="form-check-label" style="font-size:12px">Active</label>
            </div>
            <button type="button" class="btn btn-sm btn-outline-danger remove-option">
                <i class="bi bi-x"></i>
            </button>`;
        list.appendChild(row);
        index++;
        row.querySelector('input[type="text"]').focus();
    });

    list.addEventListener('click', e => {
        if (e.target.closest('.remove-option')) {
            e.target.closest('.option-row').remove();
        }
    });
})();

/* ── Property option badge toggle ── */
function toggleRadioBadge(input) {
    document.querySelectorAll(`input[name="${input.name}"]`).forEach(r => {
        r.closest('label').classList.remove('prop-badge--active');
    });
    input.closest('label').classList.add('prop-badge--active');
}
