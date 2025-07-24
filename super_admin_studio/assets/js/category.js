/**
 * Category management specific JavaScript
 */

document.addEventListener('DOMContentLoaded', function() {
    // Initialize pagination
    initializePagination();
    
    // Initialize search functionality
    initializeSearch();
    
    // Setup dropdown toggles
    const dropdownButtons = document.querySelectorAll('[onclick="toggleDropdown(this)"]');
    dropdownButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            // Replace the inline onclick with our function
            toggleDropdown(this, e);
        });
        
        // Remove the inline onclick to prevent double execution
        button.removeAttribute('onclick');
    });
}); 