document.getElementById('filter-status').addEventListener('change', function () {
    const selectedStatus = this.value;
    document.querySelectorAll('.parking-spot').forEach(spot => {
        const status = spot.getAttribute('data-status');
        if (selectedStatus === 'all' || status === selectedStatus) {
            spot.style.display = ''; // Zobrazenie
        } else {
            spot.style.display = 'none'; // Skrytie
        }
    });
});