/* Toggle class active */
const navbarNav = document.querySelector(".navbar-nav");

// Ketika hamburger menu diklik
document.querySelector("#hamburger-menu").onclick = () => {
  navbarNav.classList.toggle("active");
};

// kliik di luar side bar
const hamburger = document.querySelector("#hamburger-menu");

document.addEventListener("click", function (e) {
  if (!hamburger.contains(e.target) && !navbarNav.contains(e.target))
    navbarNav.classList.remove("active");
});

function HitungTotal() {
  var selectedMenuElements = document.querySelectorAll('select[name="ID_Menu[]"]');
  var totalHarga = 0;

  selectedMenuElements.forEach(function (selectElement) {
      var selectedOptions = selectElement.selectedOptions;
      for (var i = 0; i < selectedOptions.length; i++) {
          var harga = selectedOptions[i].value.split(',')[1];
          totalHarga += parseFloat(harga);
      }
  });

  document.getElementById('Total_Harga').value = totalHarga.toFixed(2);
}
