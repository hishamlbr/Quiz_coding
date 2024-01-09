const wrapper = document.querySelector('.wrapper');
const registerLink = document.querySelector('.register-link');
const loginlink = document.querySelector('.login-link');

registerLink.onclick = () => {
wrapper.classList.add('active');    
}

loginlink.onclick = () => {
    wrapper.classList.remove('active');    
}