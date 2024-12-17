const carouselItems = document.querySelectorAll('.carousel-item');
const cards = document.querySelectorAll('.card');
function resizeCarousel() {
  if (window.innerWidth < 1200) {
    carouselItems.forEach(item => item.classList.remove('active'));
    cards.forEach(card => card.classList.remove('active'));
    cards[0].classList.add('active');
  } else {
    cards.forEach(card => card.classList.remove('active'));
    carouselItems.forEach(item => item.classList.remove('active'));
    carouselItems[0].classList.add('active');
  }
}
window.addEventListener('resize', resizeCarousel);
resizeCarousel();

