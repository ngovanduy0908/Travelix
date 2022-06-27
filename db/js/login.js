const see = document.querySelector('.see')
const noSee = document.querySelector('.no-see')
const password = document.querySelector('#pwd')
const btn = document.querySelector('#btn-login')
const username = document.querySelector('#username')

see.onclick = function(){
    noSee.style.display = 'block';
    see.style.display = 'none';
    password.type = 'text';
}

noSee.onclick = function(){
    see.style.display = 'block';
    noSee.style.display = 'none';
    password.type = 'password';
}

password.oninput = function(){
    if(password.value.length > 0 && username.value.length > 0){
        btn.disabled = false;
    }
    else{
        btn.disabled = true;
    }
}
