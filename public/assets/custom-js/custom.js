console.log('run');

let count = document.querySelectorAll(".count")
let arr = Array.from(count)



arr.map(function(item){
  let startnumber = 0

  function counterup(){
  startnumber++
  item.innerHTML= startnumber

  if(startnumber == item.dataset.number){
      clearInterval(stop)
  }
}

let stop =setInterval(function(){
  counterup()
},0.1)

})

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








