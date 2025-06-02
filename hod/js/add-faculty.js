document.getElementById('facultyForm').addEventListener('submit', function (e) {
    const name = document.getElementById('faculty_name').value.trim();
    const email = document.getElementById('email').value.trim();
    const dept = document.getElementById('department_id').value;

    if (!name || !email || !dept) {
        e.preventDefault();
        document.getElementById('formError').style.display = 'block';
    }
});