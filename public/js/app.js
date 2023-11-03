const hour = document.getElementById("hour");
const minute = document.getElementById("minute");
const seconds = document.getElementById("seconds");

const clock = setInterval(function time() {
    const dateNow = new Date();
    let hr = dateNow.getHours();
    let min = dateNow.getMinutes();
    let sec = dateNow.getSeconds();

    hr = hr.toString().padStart(2, "0");
    min = min.toString().padStart(2, "0");
    sec = sec.toString().padStart(2, "0");

    const timeString = `${hr}:${min}:${sec}`;
    hour.textContent = hr;
    minute.textContent = min;
    seconds.textContent = sec;
}, 1000);

function updateTanggal() {
    const tanggalElement = document.getElementById('tanggal');
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    const tanggalSekarang = new Date().toLocaleDateString('id-ID', options);
    tanggalElement.textContent = tanggalSekarang;
  }

 
  updateTanggal();


  setInterval(updateTanggal, 1000);
  
  var counter = 1;
setInterval(function(){
  document.getElementById('radio' + counter).checked = true;
  counter++;
  if(counter > 3){
    counter = 1;
  }
}, 5000);

const slides = document.querySelector(".slides");
      const slideItems = document.querySelectorAll(".slide");
      let currentIndex = 0;

      function nextSlide() {
        currentIndex = (currentIndex + 1) % slideItems.length;
        updateSlider();
      }

      function updateSlider() {
        slides.style.transform = `translateX(-${currentIndex * 100}%)`;
      }

      setInterval(nextSlide, 3000); // Ganti slide setiap 3 detik

      const slides2 = document.querySelector(".slides-2");
      const slideItems2 = document.querySelectorAll(".slide-2");
      let currentIndex2 = 0;

      function nextSlide2() {
        currentIndex2 = (currentIndex2 + 1) % slideItems2.length;
        updateSlider2();
      }

      function updateSlider2() {
        slides2.style.transform = `translateX(-${currentIndex2 * 100}%)`;
      }

      setInterval(nextSlide2, 3000); // Ganti slide setiap 3 detik