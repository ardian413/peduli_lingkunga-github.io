

document.addEventListener("DOMContentLoaded", function() {
    // Ambil elemen form dan notifikasi
    const form = document.getElementById("contact-form");
    const successMessage = document.getElementById("success-message");

    // Event listener untuk pengiriman formulir
    form.addEventListener("submit", function(event) {
        event.preventDefault(); // Mencegah reload halaman

        // Ambil data input
        const name = document.getElementById("name").value.trim();
        const email = document.getElementById("email").value.trim();
        const message = document.getElementById("message").value.trim();

        // Validasi input
        if (name === "" || email === "" || message === "") {
            alert("Harap isi semua kolom formulir!");
            return;
        }

        // Simulasi pengiriman data (bisa diganti dengan AJAX/fetch)
        setTimeout(() => {
            successMessage.classList.remove("hidden"); // Tampilkan notifikasi sukses
            form.reset(); // Reset form setelah pengiriman
        }, 1000);
    });

    // Efek hover untuk tombol
    const button = document.querySelector(".btn");
    button.addEventListener("mouseenter", function() {
        this.style.backgroundColor = "#45a049";
    });
    button.addEventListener("mouseleave", function() {
        this.style.backgroundColor = "#4caf50";
    });
});

