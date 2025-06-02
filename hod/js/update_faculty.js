// update_faculty.js
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("updateFacultyForm");

    form.addEventListener("submit", function (e) {
        const name = form.name.value.trim();
        const email = form.email.value.trim();

        if (name === "" || email === "") {
            alert("Name and Email fields cannot be empty.");
            e.preventDefault(); // prevent form submission
        }

        // Optionally validate email format
        const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        if (!emailPattern.test(email)) {
            alert("Please enter a valid email address.");
            e.preventDefault();
        }
    });
});
