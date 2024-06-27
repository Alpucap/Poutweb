document.addEventListener('DOMContentLoaded', function() {

    // Window Focus
    window.addEventListener("blur", () => {
        document.title = "Is Something Wrong?";
    });

    window.addEventListener("focus", () => {
        document.title = "POUT";
    });

    // Birthday Filtering
    document.getElementById('jurusan-select').addEventListener('change', function() {
        var selectedJurusan = this.value;
        var birthdayItems = document.querySelectorAll('.happy-item');

        birthdayItems.forEach(function(item) {
            if (selectedJurusan === 'all' || item.getAttribute('data-jurusan') === selectedJurusan) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });

    // Loader
    window.addEventListener('load', function() {
        document.getElementById('loader').style.display = 'none';
    });
});
