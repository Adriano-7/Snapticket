var link = document.getElementsByClassName('confirm-action')[0];

link.addEventListener('click', function(event) {
  event.preventDefault();
  event.stopImmediatePropagation();

  var proceed = confirm("You're about to perform an irreversible action. Are you sure you want to continue?");
  if(proceed){
    window.location.href = link.href;
  }
});