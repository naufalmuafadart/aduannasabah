const checkNotLogin = () => {
    if (!localStorage.getItem('token')) {
        window.location.href = '/admin/auth';
    }
};


const logout = () => {
    localStorage.setItem('token', '');
    window.location.href = '/admin/auth';
};

checkNotLogin();
