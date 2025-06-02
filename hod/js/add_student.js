// Optional basic validation (redundant with PHP but helpful UX)
document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");

    form.addEventListener("submit", (e) => {
        const name = form.querySelector("input[name='name']").value.trim();
        const email = form.querySelector("input[name='email']").value.trim();
        const dept = form.querySelector("select[name='department_id']").value;

        if (!name || !email || !dept) {
            e.preventDefault();
            alert("All fields are required!");
        }
    });
});
