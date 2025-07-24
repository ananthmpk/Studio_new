document.addEventListener('DOMContentLoaded', () => {
    const sidebarContainer = document.getElementById('sidebar-container');

    // --- Modal Handling ---
    const initModal = () => {
        console.log("Initializing modal...");
        const uploadModal = document.getElementById('uploadModal');
        const addNewButton = document.getElementById('addNewButton');
        const closeModalButton = document.getElementById('closeModal');
        const cancelUploadButton = document.getElementById('cancelUpload');

        if (uploadModal && addNewButton && closeModalButton && cancelUploadButton) {
            console.log("All modal elements found, adding event listeners");
            addNewButton.addEventListener('click', () => {
                console.log("Add New button clicked");
                uploadModal.classList.remove('hidden');
                document.body.classList.add('overflow-hidden'); // Prevent scrolling when modal is open
            });

            const closeModal = () => {
                uploadModal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden'); // Re-enable scrolling when modal is closed
            };

            closeModalButton.addEventListener('click', closeModal);
            cancelUploadButton.addEventListener('click', closeModal);
        } else {
            console.error("Modal elements not found:", {
                uploadModal: !!uploadModal,
                addNewButton: !!addNewButton,
                closeModalButton: !!closeModalButton,
                cancelUploadButton: !!cancelUploadButton
            });
        }
    };

    // Load sidebar
    fetch('sidebar.html')
        .then(response => {
            if (!response.ok) throw new Error('Sidebar not found');
            return response.text();
        })
        .then(html => {
            sidebarContainer.innerHTML = html;
            setActiveLink(sidebarContainer);
        })
        .catch(error => {
            console.error('Error fetching sidebar:', error);
            sidebarContainer.innerHTML = '<p class="text-red-400 p-4">Error loading sidebar.</p>';
        });
    
    // Initialize modal for pages that have it
    setTimeout(() => {
        if (document.getElementById('addNewButton')) {
            console.log("Initial page load - found addNewButton");
            initModal();
        }
    }, 500);

    // Handle dropdown menus
    document.addEventListener('click', function(e) {
        // Close all dropdowns when clicking outside
        if (!e.target.closest('.dropdown')) {
            document.querySelectorAll('.dropdown-content.show').forEach(dropdown => {
                dropdown.classList.remove('show');
            });
        }
    });

    // Initialize search functionality
    initSearch();

    // Initialize pagination
    initPagination();

    // Initialize gallery filters if they exist
    initGalleryFilters();
});

function setActiveLink(container) {
    const currentPath = window.location.pathname;
    const currentPage = (currentPath.split("/").pop() || 'index.html').trim();

    // Reset all links and summaries to their default state
    container.querySelectorAll('a, summary').forEach(el => {
        el.classList.remove('bg-cyan-600', 'text-white', 'font-semibold', 'shadow', 'bg-gray-700');
        
        if (el.tagName === 'SUMMARY' || (el.tagName === 'A' && !el.closest('details'))) {
            el.classList.add('text-gray-400');
        } else if (el.tagName === 'A') {
            el.classList.add('text-gray-300');
        }
    });
    
    const activeLink = container.querySelector(`a[href$="${currentPage}"]`);

    if (activeLink) {
        const parentDetails = activeLink.closest('details');

        if (parentDetails) {
            // It's a sub-menu link
            const summary = parentDetails.querySelector('summary');
            if (summary) {
                summary.classList.add('bg-cyan-600', 'text-white', 'font-semibold', 'shadow');
                summary.classList.remove('text-gray-400');
            }
            activeLink.classList.add('bg-gray-700', 'text-white', 'font-semibold');
            activeLink.classList.remove('text-gray-300');
        } else {
            // It's a top-level link
            activeLink.classList.add('bg-cyan-600', 'text-white', 'font-semibold', 'shadow');
            activeLink.classList.remove('text-gray-400');
        }
    }
}

/**
 * Search functionality for tables and galleries
 */
function initSearch() {
    const searchInput = document.querySelector('.search-input');
    if (!searchInput) return;

    searchInput.addEventListener('input', debounce(function() {
        const searchTerm = this.value.toLowerCase().trim();
        
        // Check if we're on a page with a table
        const table = document.querySelector('.data-table');
        if (table) {
            searchTable(table, searchTerm);
        }
        
        // Check if we're on a page with a gallery
        const gallery = document.querySelector('.gallery-grid');
        if (gallery) {
            searchGallery(gallery, searchTerm);
        }
    }, 300));
}

/**
 * Search functionality for tables
 */
function searchTable(table, searchTerm) {
    const rows = table.querySelectorAll('tbody tr');
    let hasResults = false;
    
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        if (text.includes(searchTerm)) {
            row.style.display = '';
            hasResults = true;
        } else {
            row.style.display = 'none';
        }
    });
    
    // Show or hide no results message
    let noResultsMsg = document.querySelector('.no-results');
    if (!hasResults) {
        if (!noResultsMsg) {
            noResultsMsg = document.createElement('div');
            noResultsMsg.className = 'no-results';
            noResultsMsg.innerHTML = '<i class="ph ph-magnifying-glass"></i><p>No results found</p>';
            table.parentNode.appendChild(noResultsMsg);
        }
        noResultsMsg.style.display = 'block';
    } else if (noResultsMsg) {
        noResultsMsg.style.display = 'none';
    }
    
    // Reset pagination after search
    updatePagination();
}

/**
 * Search functionality for galleries
 */
function searchGallery(gallery, searchTerm) {
    const items = gallery.querySelectorAll('.gallery-item');
    let hasResults = false;
    
    items.forEach(item => {
        const text = item.textContent.toLowerCase();
        if (text.includes(searchTerm)) {
            item.style.display = '';
            hasResults = true;
        } else {
            item.style.display = 'none';
        }
    });
    
    // Show or hide no results message
    let noResultsMsg = document.querySelector('.no-results');
    if (!hasResults) {
        if (!noResultsMsg) {
            noResultsMsg = document.createElement('div');
            noResultsMsg.className = 'no-results';
            noResultsMsg.innerHTML = '<i class="ph ph-magnifying-glass"></i><p>No results found</p>';
            gallery.parentNode.appendChild(noResultsMsg);
        }
        noResultsMsg.style.display = 'block';
    } else if (noResultsMsg) {
        noResultsMsg.style.display = 'none';
    }
    
    // Reset pagination after search
    updatePagination();
}

/**
 * Pagination functionality
 */
function initPagination() {
    // Check if we have pagination container
    const paginationContainer = document.querySelector('.pagination');
    if (!paginationContainer) return;
    
    // Initialize pagination
    updatePagination();
    
    // Add event listeners to pagination buttons
    paginationContainer.addEventListener('click', function(e) {
        if (e.target.classList.contains('pagination-item') && !e.target.classList.contains('disabled')) {
            const page = parseInt(e.target.dataset.page);
            goToPage(page);
        }
    });
}

/**
 * Update pagination based on visible items
 */
function updatePagination() {
    const paginationContainer = document.querySelector('.pagination');
    if (!paginationContainer) return;
    
    const itemsPerPage = parseInt(paginationContainer.dataset.itemsPerPage) || 10;
    let visibleItems;
    
    // Check if we're on a page with a table
    const table = document.querySelector('.data-table');
    if (table) {
        visibleItems = Array.from(table.querySelectorAll('tbody tr')).filter(row => row.style.display !== 'none');
    }
    
    // Check if we're on a page with a gallery
    const gallery = document.querySelector('.gallery-grid');
    if (gallery) {
        visibleItems = Array.from(gallery.querySelectorAll('.gallery-item')).filter(item => item.style.display !== 'none');
    }
    
    if (!visibleItems || visibleItems.length === 0) {
        paginationContainer.innerHTML = '';
        return;
    }
    
    const totalPages = Math.ceil(visibleItems.length / itemsPerPage);
    const currentPage = parseInt(paginationContainer.dataset.currentPage) || 1;
    
    // Generate pagination HTML
    let paginationHTML = '';
    
    // Previous button
    paginationHTML += `<button class="pagination-item ${currentPage === 1 ? 'disabled' : ''}" data-page="${currentPage - 1}"><i class="ph ph-caret-left"></i></button>`;
    
    // Page numbers
    const maxVisiblePages = 5;
    let startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
    let endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);
    
    if (endPage - startPage + 1 < maxVisiblePages) {
        startPage = Math.max(1, endPage - maxVisiblePages + 1);
    }
    
    if (startPage > 1) {
        paginationHTML += `<button class="pagination-item" data-page="1">1</button>`;
        if (startPage > 2) {
            paginationHTML += `<span class="pagination-item disabled">...</span>`;
        }
    }
    
    for (let i = startPage; i <= endPage; i++) {
        paginationHTML += `<button class="pagination-item ${i === currentPage ? 'active' : ''}" data-page="${i}">${i}</button>`;
    }
    
    if (endPage < totalPages) {
        if (endPage < totalPages - 1) {
            paginationHTML += `<span class="pagination-item disabled">...</span>`;
        }
        paginationHTML += `<button class="pagination-item" data-page="${totalPages}">${totalPages}</button>`;
    }
    
    // Next button
    paginationHTML += `<button class="pagination-item ${currentPage === totalPages ? 'disabled' : ''}" data-page="${currentPage + 1}"><i class="ph ph-caret-right"></i></button>`;
    
    paginationContainer.innerHTML = paginationHTML;
    
    // Show items for current page
    showItemsForPage(currentPage, itemsPerPage, visibleItems);
}

/**
 * Show items for the specified page
 */
function showItemsForPage(page, itemsPerPage, visibleItems) {
    const startIndex = (page - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    
    visibleItems.forEach((item, index) => {
        if (index >= startIndex && index < endIndex) {
            item.style.display = '';
        } else {
            item.style.display = 'none';
        }
    });
}

/**
 * Go to specified page
 */
function goToPage(page) {
    const paginationContainer = document.querySelector('.pagination');
    if (!paginationContainer) return;
    
    paginationContainer.dataset.currentPage = page;
    updatePagination();
    
    // Scroll to top of content
    const contentContainer = document.querySelector('main');
    if (contentContainer) {
        contentContainer.scrollTop = 0;
    }
}

/**
 * Initialize gallery filters
 */
function initGalleryFilters() {
    const filterContainer = document.querySelector('.filter-container');
    if (!filterContainer) return;
    
    const filterButtons = filterContainer.querySelectorAll('.filter-btn');
    const gallery = document.querySelector('.gallery-grid');
    
    if (!gallery) return;
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');
            
            const filter = this.dataset.filter;
            const items = gallery.querySelectorAll('.gallery-item');
            
            items.forEach(item => {
                if (filter === 'all') {
                    item.style.display = '';
                } else if (item.dataset.category === filter) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
            
            // Reset pagination after filtering
            updatePagination();
        });
    });
}

/**
 * Toggle dropdown menu
 */
function toggleDropdown(button) {
    // Close all other open dropdowns first
    document.querySelectorAll('.dropdown-menu').forEach(menu => {
        if (menu !== button.nextElementSibling) {
            menu.classList.add('hidden');
        }
    });
    
    // Toggle the clicked dropdown
    const dropdown = button.nextElementSibling;
    dropdown.classList.toggle('hidden');
    
    // Close dropdown when clicking outside
    document.addEventListener('click', function closeDropdown(e) {
        if (!button.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.add('hidden');
            document.removeEventListener('click', closeDropdown);
        }
    });
    
    // Prevent the click from bubbling up
    event.stopPropagation();
}

/**
 * Debounce function to limit how often a function is called
 */
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func.apply(this, args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
} 