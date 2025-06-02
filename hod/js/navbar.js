function manage() {
    const mcontent = document.getElementById("manage-content");
    if (mcontent.style.display == 'block')
        mcontent.style.display = 'none';
    else
        mcontent.style.display = 'block';

    const ccontent = document.getElementById("course-content");
        ccontent.style.display = 'none';

    const ucontent = document.getElementById("user-content");
        ucontent.style.display = 'none';
}

function course() {
    const ccontent = document.getElementById("course-content");
    if (ccontent.style.display == 'block')
        ccontent.style.display = 'none';
    else
        ccontent.style.display = 'block';
    const mcontent = document.getElementById("manage-content");
        mcontent.style.display = 'none';
    const ucontent = document.getElementById("user-content");
        ucontent.style.display = 'none';
}

function useri() {
    const ucontent = document.getElementById("user-content");
    if (ucontent.style.display == 'block')
        ucontent.style.display = 'none';
    else
        ucontent.style.display = 'block';
    const ccontent = document.getElementById("course-content");
        ccontent.style.display = 'none';
    const mcontent = document.getElementById("manage-content");
        mcontent.style.display = 'none';
}
