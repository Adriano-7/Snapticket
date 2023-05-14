function confirmAction(event) {
  event.stopPropagation();
  return confirm("You're about to perform an irreversible action. Are you sure you want to continue?");
}