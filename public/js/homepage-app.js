//Alerts
function showalerts() {
    alert("Profile clicked!");
}

// Window Focus
window.addEventListener("blur", () => {
    document.title = "Is Something Wrong?";
});
window.addEventListener("focus", () => {
    document.title = "CALDET WEB";
});