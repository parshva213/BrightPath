document.addEventListener("DOMContentLoaded", () => {
    const confirmBtn = document.querySelector(".confirm-btn");
    const backBtn = document.querySelector(".back-btn");

    confirmBtn.addEventListener("click", () => {
        const confirmAction = confirm("Are you sure you want to confirm and insert this student?");
        if (!confirmAction) {
            event.preventDefault(); // Stop form submission if canceled
        }
    });

    backBtn.addEventListener("click", () => {
        window.history.back(); // Go to the previous page (add_student.php)
    });
});
