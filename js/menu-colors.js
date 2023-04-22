var url = window.location.href;
if (url.indexOf("tickets_dashboard.php") !== -1) {
    document.querySelector(".tickets-menu").style.color = "#ffffff";
    document.querySelector(".faq-menu").style.color = "#808080";
    document.querySelector(".notifications-menu").style.color = "#808080";
} 
else if (url.indexOf("faq.php") !== -1) {
    document.querySelector(".tickets-menu").style.color = "#808080";
    document.querySelector(".faq-menu").style.color = "#ffffff";
    document.querySelector(".notifications-menu").style.color = "#808080";
} 
else if (url.indexOf("notifications.php") !== -1) {
    document.querySelector(".notifications-menu").style.color = "#ffffff";
    document.querySelector(".tickets-menu").style.color = "#808080";
    document.querySelector(".faq-menu").style.color = "#808080";
} 
else {
    document.querySelector(".tickets-menu").style.color = "#808080";
    document.querySelector(".faq-menu").style.color = "#808080";
    document.querySelector(".notifications-menu").style.color = "#808080";
}