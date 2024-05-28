let modal = document.getElementById('modal');
let overlay = document.querySelector('.overlay');

function openModal() {
  modal.style.display = 'block';
  overlay.style.display = 'block';
}
function closeModal() {
  modal.style.display = 'none';
  overlay.style.display = 'none';
}
