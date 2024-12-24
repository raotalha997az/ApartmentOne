console.log('run');

let counters = document.querySelectorAll(".count");

// Convert NodeList to Array and iterate
Array.from(counters).forEach(function (counter) {
  let startNumber = 0;
  let targetNumber = parseInt(counter.dataset.number, 10); // Convert to number

  // Skip if targetNumber is 0 or invalid
  if (isNaN(targetNumber) || targetNumber <= 0) {
    counter.textContent = '0'; // Default to 0
    return;
  }

  // Function to increment the counter
  function counterUp() {
    startNumber++;
    counter.textContent = startNumber;

    if (startNumber >= targetNumber) {
      clearInterval(interval); // Stop the interval
    }
  }

  // Set the interval for the counter
  let interval = setInterval(counterUp, 10); // Adjust speed as necessary
});


// Automatically toggle the plus/minus icon when the accordion is opened or closed
document.querySelectorAll('.accordion-button').forEach(button => {
  button.addEventListener('click', () => {
    const icon = button.querySelector('.icon');
    if (button.classList.contains('collapsed')) {
      icon.textContent = '+';
    } else {
      icon.textContent = '−';
    }
  });
});

  // Select all anchor elements with the class 'heart-link'
  const heartLinks = document.querySelectorAll('.heart-link');

  // Loop through each anchor and add a click event listener
  heartLinks.forEach(function(heartLink) {
    heartLink.addEventListener('click', function(event) {
      event.preventDefault(); // Prevent default anchor behavior
      this.classList.toggle('heart-active'); // Toggle the class 'heart-active' for the clicked anchor
    });
  });

  // Fancybox Config
// $('[data-fancybox="gallery"]').fancybox({
//     buttons: [
//       "slideShow",
//       "thumbs",
//       "zoom",
//       "fullScreen",
//       "share",
//       "close"
//     ],
//     loop: false,
//     protect: true
//   });


// add new property categrory upload box


const uploadBox = document.getElementById('uploadBox');
  var fileInput2 = document.getElementById('fileInput');
  const uploadText = document.getElementById('uploadText');
  const previewImage = document.getElementById('previewImage');
  const cancelButton = document.getElementById('cancelButton');

  uploadBox.addEventListener('click', () => {
    fileInput.click();
  });

  fileInput2.addEventListener('change', (event) => {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = (e) => {
        previewImage.src = e.target.result;
        previewImage.style.display = 'block';
        uploadText.style.display = 'none';
        cancelButton.style.display = 'flex';
      };
      reader.readAsDataURL(file);
    }
  });

  cancelButton.addEventListener('click', (event) => {
    event.stopPropagation(); // Prevent triggering uploadBox click
    previewImage.src = '';
    previewImage.style.display = 'none';
    uploadText.style.display = 'flex';
    cancelButton.style.display = 'none';
    fileInput.value = ''; // Reset file input
  });

// update property categrory upload box


const newUploadBox = document.getElementById('newUploadBox');
const newFileInput = document.getElementById('newFileInput');
const newUploadText = document.getElementById('newUploadText');
const newPreviewImage = document.getElementById('newPreviewImage');
const newCancelButton = document.getElementById('newCancelButton');

newUploadBox.addEventListener('click', () => {
  newFileInput.click();
});

newFileInput.addEventListener('change', (event) => {
  const newFile = event.target.files[0];
  if (newFile) {
    const newReader = new FileReader();
    newReader.onload = (e) => {
      newPreviewImage.src = e.target.result;
      newPreviewImage.style.display = 'block';
      newUploadText.style.display = 'none';
      newCancelButton.style.display = 'flex';
    };
    newReader.readAsDataURL(newFile);
  }
});

newCancelButton.addEventListener('click', (event) => {
  event.stopPropagation(); // Prevent triggering newUploadBox click
  newPreviewImage.src = '';
  newPreviewImage.style.display = 'none';
  newUploadText.style.display = 'flex';
  newCancelButton.style.display = 'none';
  newFileInput.value = ''; // Reset file input
});






