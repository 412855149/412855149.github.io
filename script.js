// Mobile menu functionality
const mobileMenuBtn = document.querySelector(".mobile-menu-btn")
const mobileMenu = document.querySelector(".mobile-menu")
const mobileMenuIcon = mobileMenuBtn.querySelector("i")

mobileMenuBtn.addEventListener("click", () => {
  mobileMenu.classList.toggle("active")

  if (mobileMenu.classList.contains("active")) {
    mobileMenuIcon.classList.remove("fa-bars")
    mobileMenuIcon.classList.add("fa-times")
  } else {
    mobileMenuIcon.classList.remove("fa-times")
    mobileMenuIcon.classList.add("fa-bars")
  }
})

// Close mobile menu
const mobileMenuLinks = document.querySelectorAll(".mobile-menu a")
mobileMenuLinks.forEach((link) => {
  link.addEventListener("click", () => {
    mobileMenu.classList.remove("active")
    mobileMenuIcon.classList.remove("fa-times")
    mobileMenuIcon.classList.add("fa-bars")
  })
})

// Smooth scrolling
const navLinks = document.querySelectorAll('a[href^="#"]')
navLinks.forEach((link) => {
  link.addEventListener("click", (e) => {
    e.preventDefault()
    const targetId = link.getAttribute("href")
    const targetSection = document.querySelector(targetId)

    if (targetSection) {
      const offsetTop = targetSection.offsetTop - 80 // Account for fixed navbar
      window.scrollTo({
        top: offsetTop,
        behavior: "smooth",
      })
    }
  })
})

// Scroll effect
window.addEventListener("scroll", () => {
  const navbar = document.querySelector(".navbar")
  if (window.scrollY > 100) {
    navbar.style.background = "rgba(0, 0, 0, 0.95)"
  } else {
    navbar.style.background = "rgba(0, 0, 0, 0.9)"
  }
})

// Intersection Observer
const observerOptions = {
  threshold: 0.1,
  rootMargin: "0px 0px -50px 0px",
}

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.style.opacity = "1"
      entry.target.style.transform = "translateY(0)"
    }
  })
}, observerOptions)

// Elements animation
const animateElements = document.querySelectorAll(".project-card, .social-card")
animateElements.forEach((el) => {
  el.style.opacity = "0"
  el.style.transform = "translateY(30px)"
  el.style.transition = "opacity 0.6s ease, transform 0.6s ease"
  observer.observe(el)
})

function typeWriter(element, text, speed = 100) {
  let i = 0
  element.innerHTML = ""

  function type() {
    if (i < text.length) {
      element.innerHTML += text.charAt(i)
      i++
      setTimeout(type, speed)
    }
  }

  type()
}

// Typing effect on page load
window.addEventListener('load', () => {
    const profileTitle = document.querySelector('.profile-title');
    const originalText = profileTitle.textContent;
    typeWriter(profileTitle, originalText, 50);
});
