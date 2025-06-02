<!-- loading.php -->
<div class="loader-wrapper" id="loader">
    <div class="logo">BrightPath</div>
    <div class="spinner"></div>
    <p class="text">Please wait while we process your request...</p>
</div>

<link rel="stylesheet" href="../css/loading.css">

<script>
    setTimeout(() => {
        const loader = document.getElementById('loader');
        if (loader) {
            loader.style.opacity = '0';
            setTimeout(() => loader.remove(), 500); // Remove from DOM after fade-out
        }
    }, 1000); // 10 seconds
</script>
