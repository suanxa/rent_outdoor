const sections = document.querySelectorAll(".hero, .section");
const navLinks = document.querySelectorAll(".nav-link");

window.addEventListener("scroll", () => {
    let current = "";

    sections.forEach((section) => {
        const sectionTop = section.offsetTop - 120;
        if (pageYOffset >= sectionTop) {
            current = section.getAttribute("id");
        }
    });

    // Kalau udah mentok bawah, paksa highlight menu Kontak
    if ((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight - 2) {
        current = "kontak";
    }

    navLinks.forEach((link) => {
        link.classList.remove("active");
        if (link.getAttribute("href") === "#" + current) {
            link.classList.add("active");
        }
    });
});
