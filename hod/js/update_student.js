function vefy() {
    const udept = document.getElementById('dept').value;
    const ddept = document.getElementById('cdept').value;
    if (udept !== ddept) {
        return confirm('Are you sure you want to change the Department?');
    }
    return true;
}