const wrapper= document.querySelector('.wrapper');
const register_link= document.querySelector('.register-link');
const login_link= document.querySelector('.login-link');
const login_button= document.querySelector('.login-button');
const icon_close= document.querySelector('.icon-close');
const user_link= document.querySelector('.userlink');
const vendor_link= document.querySelector('.vendorlink');


register_link.addEventListener('click',()=>{
    wrapper.classList.add('active');
});
login_link.addEventListener('click',()=>{
    wrapper.classList.remove('active');
});
login_button.addEventListener('click',()=>{
    wrapper.classList.add('active-pop');
});
icon_close.addEventListener('click',()=>{
    wrapper.classList.remove('active-pop');
});
vendor_link.addEventListener('click',()=>{
    wrapper.classList.add('vendor');
});
user_link.addEventListener('click',()=>{
    wrapper.classList.remove('vendor');
});
const book= document.getElementById('book');
book.addEventListener('click',()=>{
    wrapper.classList.add('active-pop');
});

function submitForms(){
    document.getElementById("form1").submit();
    document.getElementById("form").submit();
}
