function openPopup(img) {
  var popup = document.getElementById("popup");
  var popupImg = document.getElementById("popup-image");
  popup.style.display = "block";
  popupImg.src = img.src;
}

function closePopup() {
  var popup = document.getElementById("popup");
  popup.style.display = "none";
}

 function downloadImage(img) {
  var link = document.createElement("a");
  link.href = img.src;
  link.download = img.alt;
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
}