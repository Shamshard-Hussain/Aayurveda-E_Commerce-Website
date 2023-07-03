  const imageInput = document.getElementById('image');
  const imageChosen = document.getElementById('image-chosen');

  imageInput.addEventListener('change', () => {
    imageInput.style.display = 'none';
    imageChosen.textContent = 'Image chosen';
  });