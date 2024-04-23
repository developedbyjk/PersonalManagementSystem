
// Function to open the popup
function openPopup(x) {
    console.log(x.id)
    document.body.style.backgroundColor = "rgba(0,0,0,0.5)";
    document.getElementById(x.id).style.display = "block";
}

// Function to close the popup
function closePopup(y) {
    document.getElementById(y.id).style.display = "none";
}
