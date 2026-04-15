document.querySelectorAll('input[type="file"][data-preview]').forEach(input => {
    input.addEventListener('change', () => {
        const preview = document.querySelector(input.dataset.preview);
        if (!preview || !input.files[0]) return;
        preview.src = URL.createObjectURL(input.files[0]);
        preview.style.display = 'block';
    });
});
