/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';

console.log("hello from webpack encore");

function goToHome() {
    window.location.href = '/'; // Replace 'home' with the name of your homepage route
}


// document.addEventListener("DOMContentLoaded", function () {
//     "use strict";
   
//     var button = document.querySelector("button.cancel");
//     button.addEventListener("click", function (event) {
//         goToHome();
//     });
//   });