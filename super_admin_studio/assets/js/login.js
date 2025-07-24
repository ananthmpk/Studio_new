/**
 * Login page specific JavaScript
 */

document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');
    const togglePasswordBtn = document.getElementById('togglePassword');
    
    // Set up password toggle
    if (togglePasswordBtn) {
        togglePasswordBtn.addEventListener('click', function() {
            togglePasswordVisibility(passwordInput, togglePasswordBtn);
        });
    }
    
    // Set up form validation
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate form fields
            const isValid = validateForm(loginForm, ['username', 'password']);
            
            // If form is valid, submit it
            if (isValid) {
                // For demo purposes, redirect to index.html
                window.location.href = 'index.html';
            }
        });
    }
}); 