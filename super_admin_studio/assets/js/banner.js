/**
 * Banner management specific JavaScript
 */

document.addEventListener('DOMContentLoaded', function() {
    // Initialize pagination
    initializePagination();
    
    // Initialize search functionality
    initializeSearch();
    
    // Toggle switch functionality
    const toggleSwitches = document.querySelectorAll('input[type="checkbox"]');
    
    toggleSwitches.forEach(toggle => {
        toggle.addEventListener('change', function() {
            const bannerId = this.closest('tr').dataset.id;
            const isActive = this.checked;
            
            // Here you would normally send an AJAX request to update the banner status
            console.log(`Banner ID: ${bannerId || 'unknown'}, Status: ${isActive ? 'active' : 'inactive'}`);
            
            // For demo purposes, show a notification
            const status = isActive ? 'activated' : 'deactivated';
            alert(`Banner ${status} successfully!`);
        });
    });
}); 