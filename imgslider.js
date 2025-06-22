let slides = document.querySelectorAll(".slide");
let currentSlide = 0;

function showSlide() {
  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = 'none';
  }
  slides[currentSlide].style.display = 'block';
}

function nextSlide() {
  currentSlide += 1;


  if (currentSlide >= slides.length) {

    currentSlide = 0;
  }


  showSlide();
}



showSlide(); 
setInterval(nextSlide, 3000); 
