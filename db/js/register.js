function error(inputElement, mes, errorElement) {
    if(inputElement.value == ''){
        document.querySelector(errorElement).innerText = mes
        inputElement.classList.add('form-error')
    }
}

function handlerEventInput(inputElement, errorElement){
    document.querySelector(errorElement).innerText = '';
    inputElement.classList.remove('form-error')
}
// Username
const mes = 'Vui lòng không bỏ trống trường này'
var inputUsername = document.querySelector('#username')
inputUsername.onblur = function (){
    error(inputUsername, mes, '#username-mes')
}

inputUsername.oninput = function (){
    handlerEventInput(inputUsername, '#username-mes')
}
// inputUsername.onblur = function(){
//     if(inputUsername.value == ''){
//         document.querySelector('#username-mes').innerText = 'Trường này không được để trống';
//         inputUsername.classList.add('form-error')
//     }
// }
// inputUsername.oninput = function(){
//     document.querySelector('#username-mes').innerText = '';
//     inputUsername.classList.remove('form-error')
// }


// Fullname
var inputFullname = document.querySelector('#fullname')
inputFullname.onblur = function(){
    error(inputFullname, mes, '#fullname-mes')
}
inputFullname.oninput = function (){
    handlerEventInput(inputFullname, '#fullname-mes')
}

// Phone
var inputPhoneNumber = document.querySelector('#phone_number')
inputPhoneNumber.onblur = function(){
    error(inputPhoneNumber, mes, '#phone_number-mes')
}
inputPhoneNumber.oninput = function (){
    handlerEventInput(inputPhoneNumber, '#phone_number-mes')
}

// Email
var inputEmail = document.querySelector('#email')
inputEmail.onblur = function (){

    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(!inputEmail.value.match(mailformat))
    {
    // alert("Valid email address!");
        document.querySelector('#email-mes').innerText = 'Địa chỉ email không hợp lệ';
        inputEmail.classList.add('form-error')
    }
}
inputEmail.oninput = function (){
    document.querySelector('#email-mes').innerText = '';
    inputEmail.classList.remove('form-error')
}

// Password
var inputPassword = document.querySelector('#pwd')
inputPassword.onblur = function() {
    // console.log(inputPassword)
    if(inputPassword.value.length < 6){
        document.querySelector('#pwd-mes').innerText = 'Vui lòng tạo mật khẩu có 6 kí tự trở lên'
        inputPassword.classList.add('form-error')
    }
}

inputPassword.oninput = function (){
    document.querySelector('#pwd-mes').innerText = ''
    inputPassword.classList.remove('form-error')
}

// Confirm-Password
var confirmPassword = document.querySelector('#confirm-pwd')
confirmPassword.onblur = function (){
    let password = document.querySelector('#pwd').value
    let passwordConfirm = document.querySelector('#confirm-pwd').value
    if(password != passwordConfirm){
        document.querySelector('#confirm-pwd-mes').innerText = 'Mật khẩu nhập lại không chính xác'
        confirmPassword.classList.add('form-error')
    }
}   

confirmPassword.oninput = function(){
    document.querySelector('#confirm-pwd-mes').innerText = ''
    confirmPassword.classList.remove('form-error')
}

var btn = document.querySelector('#btn')
btn.style.cursor = 'default'
function changeBtn(){
    if(inputUsername.value !== '' && inputFullname.value !== '' && inputPhoneNumber !== '' && inputEmail.value !== '' && inputPassword.value !== '' && confirmPassword.value !== '') {
        document.querySelector('#btn').disabled = false;
        document.querySelector('#btn').style.cursor = 'pointer';
    }
    else{
        document.querySelector('#btn').disabled = true;
    }
}

