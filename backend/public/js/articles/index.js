const logoutBtn = document.querySelector(".logout-btn");

if(logoutBtn) {
    logoutBtn.addEventListener("click", function(event) {
        const logout = document.querySelector("#logout-form");
        event.preventDefault();
        logout.submit();
    });
}
