// logout function
function logout() {
  window.location.href = "../login.php";
}

// search function
document.querySelector(".search_input").addEventListener("input", function () {
  const filter = this.value.toLowerCase();
  const cards = document.querySelectorAll(".card");

  cards.forEach((card) => {
    const paragraphs = card.querySelectorAll("p");
    const remarks = paragraphs[2]?.textContent.toLowerCase() || "";
    card.style.display = remarks.includes(filter) ? "" : "none";
  });
});

// add popup function
const addPopup = document.getElementById("addPopup");
const openPopupBtn = document.getElementById("addBtn");
const closePopupBtn = document.getElementById("closePopupBtn");
const cancelBtn = document.getElementById("cancelBtn");

openPopupBtn.onclick = () => (addPopup.style.display = "block");
closePopupBtn.onclick = () => (addPopup.style.display = "none");
cancelBtn.onclick = () => (addPopup.style.display = "none");

window.onclick = (e) => {
  if (e.target === addPopup) addPopup.style.display = "none";
};

// edit popup function
const editPopup = document.getElementById("editPopup");
const closeEditPopupBtn = document.getElementById("closeEditPopupBtn");
const cancelEditBtn = document.getElementById("cancelEditBtn");

document.querySelectorAll(".editBtn").forEach((btn) => {
  btn.addEventListener("click", () => {
    document.getElementById("editId").value = btn.dataset.id;
    document.getElementById("editRemarks").value = btn.dataset.remarks;
    document.getElementById("editCode").value = btn.dataset.code;
    document.getElementById("editQuantity").value = btn.dataset.quantity;
    editPopup.style.display = "block";
  });
});

closeEditPopupBtn.onclick = () => (editPopup.style.display = "none");
cancelEditBtn.onclick = () => (editPopup.style.display = "none");

window.onclick = (e) => {
  if (e.target === addPopup) addPopup.style.display = "none";
  if (e.target === editPopup) editPopup.style.display = "none";
};
