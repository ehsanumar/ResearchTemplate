// Get the select element
var roleSelect = document.getElementById("roleSelect");

// Add an event listener to detect when an option is selected
roleSelect.addEventListener("change", function () {
    // Get the selected value (which is the route URL)
    var selectedRoute = roleSelect.value;

    // Redirect to the selected route
    if (selectedRoute) {
        window.location.href = selectedRoute;
    }
});
// enable devTools
// Disable right-click
// document.addEventListener('contextmenu', (e) => e.preventDefault());
// function ctrlShiftKey(e, keyCode) {
//   return e.ctrlKey && e.shiftKey && e.keyCode === keyCode.charCodeAt(0);
// }

// document.onkeydown = (e) => {
//   // Disable F12, Ctrl + Shift + I, Ctrl + Shift + J, Ctrl + U
//   if (
//     event.keyCode === 123 ||
//     ctrlShiftKey(e, 'I') ||
//     ctrlShiftKey(e, 'J') ||
//     ctrlShiftKey(e, 'C') ||
//     (e.ctrlKey && e.keyCode === 'U'.charCodeAt(0))
//   )
//     return false;
// };
