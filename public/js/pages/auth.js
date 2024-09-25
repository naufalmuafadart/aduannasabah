console.log('auth');
const inputUsername = document.getElementById('inputUsername');
const inputPassword = document.getElementById('inputPassword');
const inputToken = document.getElementsByName('_token')[0];
const loginForm = document.getElementById('loginForm');

loginForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    if (inputUsername.value === 'admin' && inputPassword.value === 'admin') {
        localStorage.setItem('token', 'token');
        window.location.href = '/admin';
    } else {
        alert('username atau password salah');
    }
});

const checkIsLogin = () => {
    const token = localStorage.getItem('token');
    console.log({ token });
    if (localStorage.getItem('token')) {
        window.location.href = '/admin';
    }
};
checkIsLogin();
