
const backToTopBtn = document.querySelector(".backto-top");

window.addEventListener("scroll", () => {
  if (window.scrollY > 750) {
    backToTopBtn.classList.add("show");
  } else {
    backToTopBtn.classList.remove("show");
  }
});

function backToTop() {
  window.scrollTo({
    top: 0,
    behavior: "smooth"
  });
}

$('.image-brand').slick({
  // dots: true,
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  variableWidth: true
});
$('.product-slider').slick({
  // dots: true,
  infinite: true,
  slidesToShow: 5,
  slidesToScroll: 1,
  autoplay: true,
  // autoplaySpeed: 000,
  variableWidth: true
});
