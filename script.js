const menuToggle = document.querySelector(".menu-toggle");
const navLinks = document.querySelector(".nav-links");

if (menuToggle && navLinks) {
  menuToggle.addEventListener("click", () => {
    const isOpen = navLinks.classList.toggle("open");
    menuToggle.setAttribute("aria-expanded", String(isOpen));
    menuToggle.textContent = isOpen ? "✕" : "☰";
  });

  navLinks.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", () => {
      navLinks.classList.remove("open");
      menuToggle.setAttribute("aria-expanded", "false");
      menuToggle.textContent = "☰";
    });
  });
}

const year = document.querySelector("#year");
if (year) year.textContent = new Date().getFullYear();

const params = new URLSearchParams(window.location.search);
if (params.get("sent") === "1") {
  const form = document.querySelector(".contact-form");
  if (form) {
    const note = document.createElement("p");
    note.className = "form-success";
    note.setAttribute("role", "status");
    note.textContent = "Thanks — your enquiry was submitted. We'll be in touch.";
    note.style.cssText = "padding:12px;border:1px solid #3b765e;background:#10271f;color:#b7f2d5;border-radius:6px;font-size:12px;margin:0 0 12px";
    form.prepend(note);
  }
}
