/**
 * Gallery page specific JavaScript
 */

document.addEventListener('DOMContentLoaded', function() {
    // Initialize gallery filters
    initializeFilters();
    
    // Initialize gallery pagination
    initializePagination();
    
    // Initialize gallery search
    const searchInput = document.querySelector('.search-input');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            const galleryItems = document.querySelectorAll('.gallery-item');
            
            // Step 1: Tag items as filtered/not filtered instead of changing display
            galleryItems.forEach(item => {
                const itemTitle = item.querySelector('.text-lg').textContent.toLowerCase();
                if (itemTitle.includes(searchTerm) || searchTerm === '') {
                    item.classList.remove('filtered-out');
                } else {
                    item.classList.add('filtered-out');
                }
            });
            
            // Step 2: Reset pagination to page 1
            const paginationContainer = document.querySelector('.pagination');
            if (paginationContainer) {
                paginationContainer.setAttribute('data-current-page', '1');
            }
            
            // Step 3: Re-apply pagination with the search filter
            reapplyPagination();
        });
    }
    
    // Set up dropdown menus for gallery items
    const dropdownButtons = document.querySelectorAll('.gallery-item .dropdown-button');
    dropdownButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.stopPropagation();
            toggleDropdown(this);
        });
    });
    
    // Helper function to reapply pagination considering filtered items
    function reapplyPagination() {
        const paginationContainer = document.querySelector('.pagination');
        if (!paginationContainer) return;
        
        const itemsPerPage = parseInt(paginationContainer.getAttribute('data-items-per-page')) || 8;
        const currentPage = parseInt(paginationContainer.getAttribute('data-current-page')) || 1;
        
        // Get visible (non-filtered) items
        const allItems = document.querySelectorAll('.gallery-item');
        const visibleItems = Array.from(allItems).filter(item => !item.classList.contains('filtered-out'));
        
        // Show "No results" message if needed
        const noResultsEl = document.querySelector('.no-results');
        if (noResultsEl) {
            if (visibleItems.length === 0 && document.querySelector('.search-input')?.value.trim() !== '') {
                noResultsEl.style.display = 'block';
            } else {
                noResultsEl.style.display = 'none';
            }
        }
        
        // Update pagination UI
        const totalPages = Math.ceil(visibleItems.length / itemsPerPage);
        
        let paginationHTML = '';
        
        if (totalPages > 1) {
            // Previous button
            paginationHTML += `<div class="page-item ${currentPage === 1 ? 'disabled' : ''}" data-page="${Math.max(1, currentPage - 1)}">
                <i class="ph ph-caret-left"></i>
            </div>`;
            
            // Page numbers
            for (let i = 1; i <= totalPages; i++) {
                paginationHTML += `<div class="page-item ${i === currentPage ? 'active' : ''}" data-page="${i}">${i}</div>`;
            }
            
            // Next button
            paginationHTML += `<div class="page-item ${currentPage === totalPages ? 'disabled' : ''}" data-page="${Math.min(totalPages, currentPage + 1)}">
                <i class="ph ph-caret-right"></i>
            </div>`;
            
            // Update the container
            paginationContainer.innerHTML = paginationHTML;
            
            // Add click listeners to pagination items
            document.querySelectorAll('.page-item').forEach(item => {
                item.addEventListener('click', function() {
                    if (this.classList.contains('disabled')) return;
                    
                    // Update current page
                    const newPage = parseInt(this.getAttribute('data-page'));
                    paginationContainer.setAttribute('data-current-page', newPage);
                    
                    // Re-apply pagination
                    reapplyPagination();
                });
            });
        } else {
            paginationContainer.innerHTML = '';
        }
        
        // Apply pagination to visible items
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;
        
        // First hide all items
        allItems.forEach(item => {
            item.style.display = 'none';
        });
        
        // Then show only the visible items for current page
        visibleItems.forEach((item, index) => {
            if (index >= startIndex && index < endIndex) {
                item.style.display = '';
            }
        });
    }
}); 