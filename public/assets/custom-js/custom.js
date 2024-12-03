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








