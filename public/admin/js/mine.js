$(document).ready(function () {
    var message = document.getElementById("message");
    if (message) {
        message.className += message.className ? ' show' : 'show';
        setTimeout(function () {
            message.className = message.className.replace("show", "");
        }, 3500);
    }
});