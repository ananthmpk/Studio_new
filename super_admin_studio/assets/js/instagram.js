/**
 * Instagram Gallery specific JavaScript
 */

document.addEventListener('DOMContentLoaded', function() {
    // Initialize gallery filters
    initializeFilters();
    
    // Initialize gallery pagination
    initializePagination();
    
    // Initialize search functionality
    initializeSearch();
    
    // Set up dropdown toggle buttons
    document.querySelectorAll('.dropdown-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            toggleDropdown(this, e);
        });
    });
    
    // Set up delete modal
    const deleteModal = document.getElementById('deleteModal');
    const cancelBtn = document.getElementById('cancelDelete');
    
    if (cancelBtn) {
        cancelBtn.addEventListener('click', function() {
            closeModal();
        });
    }
    
    // Close modal function
    window.closeModal = function() {
        if (deleteModal) {
            deleteModal.classList.add('hidden');
            deleteModal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        }
    };
    
    // Confirm delete function
    window.confirmDelete = function(photoName) {
        if (deleteModal) {
            const confirmBtn = document.getElementById('confirmDeleteBtn');
            
            deleteModal.classList.remove('hidden');
            deleteModal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
            
            if (confirmBtn) {
                confirmBtn.onclick = function() {
                    // Here you would normally send an AJAX request to delete the photo
                    console.log(`Deleting photo: ${photoName}`);
                    closeModal();
                    // For demo purposes, show a notification
                    alert(`Photo "${photoName}" deleted successfully!`);
                };
            }
        }
    };
}); 