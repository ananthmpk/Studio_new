/**
 * Team management specific JavaScript
 */

document.addEventListener('DOMContentLoaded', function() {
    // Initialize pagination
    initializePagination();
    
    // Initialize search functionality
    initializeSearch();
    
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
    window.confirmDelete = function(id) {
        if (deleteModal) {
            const confirmBtn = document.getElementById('confirmDelete');
            
            deleteModal.classList.remove('hidden');
            deleteModal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
            
            if (confirmBtn) {
                confirmBtn.onclick = function() {
                    // Here you would normally send an AJAX request to delete the team member
                    console.log(`Deleting team member with ID: ${id}`);
                    closeModal();
                    // For demo purposes, show a notification
                    alert('Team member deleted successfully!');
                };
            }
            
            // Close when clicking outside
            deleteModal.addEventListener('click', function(e) {
                if (e.target === deleteModal) {
                    closeModal();
                }
            });
        }
    };
}); 