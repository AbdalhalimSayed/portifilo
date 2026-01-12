const togglePassword = document.querySelector('#togglePassword');
const passwordInput = document.querySelector('#password');
const eyeIcon = document.querySelector('#eyeIcon');

togglePassword.addEventListener('click', function() {
    // تبديل نوع الحقل
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);

    // تبديل الأيقونة
    if (type === 'text') {
        eyeIcon.classList.remove('ri-eye-off-line');
        eyeIcon.classList.add('ri-eye-line');
    } else {
        eyeIcon.classList.remove('ri-eye-line');
        eyeIcon.classList.add('ri-eye-off-line');
    }
});
