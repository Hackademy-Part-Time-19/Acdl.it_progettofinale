import "./bootstrap";
import "bootstrap";


window.onload = positionFooter; // Chiamata alla funzione al caricamento della pagina
window.addEventListener("resize", positionFooter); // Aggiorna la posizione del footer al ridimensionamento della finestra

function positionFooter() {
    var contentHeight = document.body.scrollHeight;
    var viewportHeight = window.innerHeight;
    var footer = document.getElementById("footer");

    if (contentHeight < viewportHeight) {
        footer.style.position = "absolute";
        footer.style.bottom = "0";
    } else {
        footer.style.position = "static";
    }
}
