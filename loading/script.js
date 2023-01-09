var el = document.getElementById('toast');
console.log(el);

el.addEventListener('click', function(e) {
  console.log(e, 'made it');
});

// el.addEventListener('transitionend', function(e) {
//   console.log(e, 'made it');
// });

el.addEventListener("animationend", function(e) {
  console.log(e, 'made it');
});