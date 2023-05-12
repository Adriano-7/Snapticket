function confirmAction(url) {
    if (confirm("You're about to perform an irreversible action. Are you sure you want to continue?")) {
        window.location.href = url;
    }
}