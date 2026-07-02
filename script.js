// Mobile menu functionality
const mobileMenuBtn = document.querySelector(".mobile-menu-btn")
const mobileMenu = document.querySelector(".mobile-menu")
const mobileMenuOverlay = document.querySelector(".mobile-menu-overlay")
const mobileMenuIcon = mobileMenuBtn.querySelector("i")
 
function closeMobileMenu() {
  mobileMenu.classList.remove("active")
  mobileMenuOverlay.classList.remove("active")
  mobileMenuIcon.classList.remove("fa-times")
  mobileMenuIcon.classList.add("fa-bars")
  mobileMenuBtn.setAttribute("aria-expanded", "false")
}
 
mobileMenuBtn.addEventListener("click", () => {
  const isOpen = mobileMenu.classList.toggle("active")
  mobileMenuOverlay.classList.toggle("active", isOpen)
  mobileMenuIcon.classList.toggle("fa-bars", !isOpen)
  mobileMenuIcon.classList.toggle("fa-times", isOpen)
  mobileMenuBtn.setAttribute("aria-expanded", String(isOpen))
})
 
mobileMenuOverlay.addEventListener("click", closeMobileMenu)
 
const mobileMenuLinks = document.querySelectorAll(".mobile-menu a")
mobileMenuLinks.forEach((link) => {
  link.addEventListener("click", closeMobileMenu)
})
 
// Smooth scrolling for any in-page anchor, including the CTA button
function scrollToTarget(targetId) {
  const targetSection = document.querySelector(targetId)
  if (!targetSection) return
  const offsetTop = targetSection.offsetTop - 80 // Account for fixed navbar
  window.scrollTo({ top: offsetTop, behavior: "smooth" })
}
 
document.querySelectorAll('a[href^="#"]').forEach((link) => {
  link.addEventListener("click", (e) => {
    e.preventDefault()
    scrollToTarget(link.getAttribute("href"))
  })
})
 
const ctaButton = document.querySelector(".cta-button[data-scroll-to]")
if (ctaButton) {
  ctaButton.addEventListener("click", () => {
    scrollToTarget(ctaButton.dataset.scrollTo)
  })
}
 
// Navbar background + active-link tracking on scroll
const navbar = document.querySelector(".navbar")
const navLinkEls = document.querySelectorAll(".nav-link")
const sections = Array.from(navLinkEls)
  .map((link) => document.querySelector(link.getAttribute("href")))
  .filter(Boolean)
 
function updateNavOnScroll() {
  navbar.classList.toggle("scrolled", window.scrollY > 100)
 
  let currentId = sections[0]?.id
  for (const section of sections) {
    if (window.scrollY >= section.offsetTop - 120) {
      currentId = section.id
    }
  }
  navLinkEls.forEach((link) => {
    link.classList.toggle("active", link.dataset.section === currentId)
  })
}
 
window.addEventListener("scroll", updateNavOnScroll)
updateNavOnScroll()
 
// Reveal-on-scroll for cards
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
 
const animateElements = document.querySelectorAll(".project-card, .social-card")
animateElements.forEach((el) => {
  el.style.opacity = "0"
  el.style.transform = "translateY(30px)"
  el.style.transition = "opacity 0.6s ease, transform 0.6s ease"
  observer.observe(el)
})
 
// Note: the previous version had a typing effect that rewrote the profile
// title's innerHTML character-by-character. That flattened the two <span>
// lines into plain text and permanently destroyed the gradient styling on
// "Timotius" after every load. The name's entrance animation now lives in
// CSS (see .profile-title / .profile-subtitle "rise" keyframes) so the
// markup — and the gradient — stays intact.
