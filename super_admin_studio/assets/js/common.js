/**
 * Common JavaScript functions for PhotoFolio Admin
 */

// Global variables for pagination
let allItems = [];
let currentPage = 1;
let itemsPerPage = 10;

// Toggle password visibility
function togglePasswordVisibility(passwordField, toggleButton) {
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);
    
    // Toggle eye icon
    const eyeIcon = toggleButton.querySelector('i');
    if (type === 'password') {
        eyeIcon.classList.remove('ph-eye-slash');
        eyeIcon.classList.add('ph-eye');
    } else {
        eyeIcon.classList.remove('ph-eye');
        eyeIcon.classList.add('ph-eye-slash');
    }
}

// Form validation
function validateForm(form, fields) {
    let isValid = true;
    
    fields.forEach(field => {
        const input = form.querySelector(`#${field}`);
        const errorElement = form.querySelector(`#${field}-error`);
        
        if (!input || !errorElement) return;
        
        if (input.value.trim() === '') {
            input.classList.add('input-error');
            errorElement.style.display = 'block';
            isValid = false;
        } else {
            input.classList.remove('input-error');
            errorElement.style.display = 'none';
        }
        
        // Add input event listener to clear error when typing
        input.addEventListener('input', function() {
            if (input.value.trim() !== '') {
                input.classList.remove('input-error');
                errorElement.style.display = 'none';
            }
        });
    });
    
    return isValid;
}

// Toggle dropdown menu - handles different dropdown types
function toggleDropdown(button, event) {
    if (event) {
        event.stopPropagation();
    }
    
    // Close all dropdowns first
    document.querySelectorAll('.dropdown-menu, .dropdown-content').forEach(menu => {
        if (menu.classList.contains('dropdown-menu')) {
            menu.classList.add('hidden');
        }
        if (menu.classList.contains('dropdown-content')) {
            menu.classList.remove('show');
        }
    });
    
    // Toggle the dropdown based on its class
    let dropdown = button.nextElementSibling;
    
    // If dropdown is menu type
    if (dropdown.classList.contains('dropdown-menu')) {
        dropdown.classList.toggle('hidden');
    } 
    // If dropdown is content type 
    else if (dropdown.classList.contains('dropdown-content')) {
        dropdown.classList.toggle('show');
    }
    
    // Close when clicking outside
    document.addEventListener('click', function closeDropdown(e) {
        if (!button.contains(e.target) && !dropdown.contains(e.target)) {
            if (dropdown.classList.contains('dropdown-menu')) {
                dropdown.classList.add('hidden');
            } else if (dropdown.classList.contains('dropdown-content')) {
                dropdown.classList.remove('show');
            }
            document.removeEventListener('click', closeDropdown);
        }
    });
}

// Initialize filter buttons
function initializeFilters() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    
    if (!filterButtons.length || !galleryItems.length) return;
    
    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            
            // Add active class to clicked button
            button.classList.add('active');
            
            const filter = button.getAttribute('data-filter');
            
            // Filter gallery items
            filterItems(galleryItems, item => 
                filter === 'all' || item.getAttribute('data-category') === filter
            );
        });
    });
}

// Filter items by a predicate function
function filterItems(items, predicate) {
    let visibleCount = 0;
    
    items.forEach(item => {
        if (predicate(item)) {
            item.dataset.filtered = "false";
            visibleCount++;
        } else {
            item.dataset.filtered = "true";
            item.style.display = 'none';
        }
    });
    
    // If we have pagination, update it and apply
    updatePaginationUI();
    applyPagination();
    
    return visibleCount;
}

// Initialize search functionality
function initializeSearch() {
    const searchInput = document.querySelector('.search-input');
    if (!searchInput) return;
    
    searchInput.addEventListener('input', function() {
        const searchValue = this.value.toLowerCase().trim();
        
        // Try to find searchable items - either table rows or gallery items
        let items = document.querySelectorAll('tbody tr');
        
        // If no table rows, try gallery items
        if (items.length === 0) {
            items = document.querySelectorAll('.gallery-item');
        }
        
        if (items.length === 0) return;
        
        // Store the current items
        allItems = Array.from(items);
        
        // Filter items
        let visibleCount = filterItems(items, item => {
            const searchableText = item.textContent.toLowerCase();
            return searchableText.includes(searchValue) || searchValue === '';
        });
        
        // Always go back to first page when searching
        currentPage = 1;
        
        // Update "no results" message if needed
        const noResultsEl = document.querySelector('.no-results');
        if (noResultsEl) {
            if (visibleCount === 0 && searchValue !== '') {
                noResultsEl.style.display = 'block';
            } else {
                noResultsEl.style.display = 'none';
            }
        }
    });
}

// Initialize pagination
function initializePagination() {
    const paginationContainer = document.querySelector('.pagination');
    if (!paginationContainer) return;
    
    // Set initial pagination values
    itemsPerPage = parseInt(paginationContainer.getAttribute('data-items-per-page') || 10);
    currentPage = parseInt(paginationContainer.getAttribute('data-current-page') || 1);
    
    // Try to find items to paginate - either table rows or gallery items
    let items = document.querySelectorAll('tbody tr');
    
    // If no table rows, try gallery items
    if (items.length === 0) {
        items = document.querySelectorAll('.gallery-item');
    }
    
    if (items.length === 0) return;
    
    // Store all items for future reference
    allItems = Array.from(items);
    
    // Initial pagination setup
    updatePaginationUI();
    applyPagination();
}

// Update pagination UI based on current items and page
function updatePaginationUI() {
    const paginationContainer = document.querySelector('.pagination');
    if (!paginationContainer) return;
    
    // Calculate visible items (not filtered out)
    const visibleItems = allItems.filter(item => item.dataset.filtered !== "true");
    const totalPages = Math.max(1, Math.ceil(visibleItems.length / itemsPerPage));
    
    // Adjust current page if beyond range
    if (currentPage > totalPages) {
        currentPage = totalPages;
    }
    
    // Create pagination HTML
    let paginationHTML = '';
    
    // Only show pagination if we have more than one page
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
    }
    
    paginationContainer.innerHTML = paginationHTML;
    
    // Add event listeners to page items
    document.querySelectorAll('.page-item').forEach(item => {
        item.addEventListener('click', function() {
            if (this.classList.contains('disabled')) return;
            
            currentPage = parseInt(this.getAttribute('data-page'));
            paginationContainer.setAttribute('data-current-page', currentPage);
            
            // Update UI and apply pagination
            updatePaginationUI();
            applyPagination();
        });
    });
}

// Apply pagination to visible items
function applyPagination() {
    // No items to paginate
    if (allItems.length === 0) return;
    
    // Get visible items (not filtered)
    const visibleItems = allItems.filter(item => item.dataset.filtered !== "true");
    
    // Calculate start and end indices
    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    
    // Apply pagination to visible items
    visibleItems.forEach((item, index) => {
        if (index >= startIndex && index < endIndex) {
            item.style.display = '';
        } else {
            item.style.display = 'none';
        }
    });
}

// Initialize sidebar loading
function loadSidebar() {
    const sidebarContainer = document.getElementById('sidebar-container');
    if (!sidebarContainer) return;
    
    // Load sidebar content from sidebar.html
    fetch('sidebar.php')
        .then(response => response.text())
        .then(php => {
            sidebarContainer.innerHTML = php;
            
            // Add active class to current page in sidebar
            const currentPath = window.location.pathname;
            const currentPage = currentPath.substring(currentPath.lastIndexOf('/') + 1);
            
            const sidebarLinks = document.querySelectorAll('#sidebar-container a');
            sidebarLinks.forEach(link => {
                const linkHref = link.getAttribute('href');
                if (linkHref === currentPage) {
                    link.classList.add('active');
                    // Expand parent if in dropdown
                    const parentDropdown = link.closest('.sidebar-dropdown');
                    if (parentDropdown) {
                        parentDropdown.classList.add('expanded');
                    }
                }
            });
            
            // Initialize sidebar dropdowns
            initializeSidebarDropdowns();
        })
        .catch(error => console.error('Error loading sidebar:', error));
}

// Initialize sidebar dropdowns
function initializeSidebarDropdowns() {
    const dropdownToggles = document.querySelectorAll('.sidebar-dropdown-toggle');
    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const dropdown = this.nextElementSibling;
            const parentLi = this.parentElement;
            
            // Toggle expanded class
            parentLi.classList.toggle('expanded');
            
            // Toggle dropdown visibility
            if (dropdown.style.maxHeight) {
                dropdown.style.maxHeight = null;
            } else {
                dropdown.style.maxHeight = dropdown.scrollHeight + 'px';
            }
            
            // Rotate chevron
            const chevron = this.querySelector('.chevron-icon');
            chevron.style.transform = parentLi.classList.contains('expanded') ? 'rotate(180deg)' : 'rotate(0)';
        });
    });
}

// Document ready function
document.addEventListener('DOMContentLoaded', function() {
    // Load sidebar if exists
    loadSidebar();
    
    // Initialize features
    initializeSearch();
    initializeFilters();
    initializePagination();
    
    // Find and fix any dropdown buttons with inline onclick
    document.querySelectorAll('[onclick^="toggleDropdown"]').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            toggleDropdown(this, e);
        });
        button.removeAttribute('onclick');
    });
}); 