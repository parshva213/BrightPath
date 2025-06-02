function visible(){
    const pass_fild = document.getElementById('password');
    const toggleicon =document.getElementById('toggle-icon');
    
    if(pass_fild.type === 'password'){
        pass_fild.type = 'text';
        toggleicon.src = '../img/eye-slash.png';
        toggleicon.title = 'Hide';
    }

    else{
        pass_fild.type = 'password';
        toggleicon.src = '../img/eye.png';
        toggleicon.title = 'Show';
    }
}

function visible1(){
    const pass_fild = document.getElementById('confirm_password');
    const toggleicon =document.getElementById('toggle-icon');
    
    if(pass_fild.type === 'password'){
        pass_fild.type = 'text';
        toggleicon.src = '../img/eye-slash.png';
        toggleicon.title = 'Hide';
    }

    else{
        pass_fild.type = 'password';
        toggleicon.src = '../img/eye.png';
        toggleicon.title = 'Show';
    }
}