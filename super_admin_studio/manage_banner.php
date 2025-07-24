<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Banners - Admin Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="assets/css/common.css">
    <link rel="stylesheet" href="assets/css/banner.css">
</head>
<body class="h-full">
    <div class="flex h-screen bg-gray-900">
      <!-- Sidebar -->
      <aside id="sidebar-container" class="w-20 md:w-72 flex-shrink-0 flex flex-col bg-gray-950 border-r border-gray-800 py-6 px-2 md:px-4 relative z-20 shadow-2xl rounded-r-3xl"></aside>
      <!-- Main Content -->
      <main class="flex-1 p-6 md:p-10 overflow-y-auto">
        <!-- Banner Management Page -->
        <section>
          <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div>
              <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-1 flex items-center gap-3">
                <i class="ph ph-image"></i> Banners
              </h1>
              <div class="text-gray-400 text-sm">Manage your website banners</div>
            </div>
            <div class="flex items-center gap-2 md:gap-4 mt-2 md:mt-0">
              <a href="add_banner.html" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg shadow transition flex items-center gap-2">
                <i class="ph ph-plus"></i> Add Banner
              </a>
            </div>
          </div>
          
          <!-- Search and Filter -->
          <div class="mb-6">
            <div class="search-container w-full max-w-md">
              <i class="ph ph-magnifying-glass search-icon"></i>
              <input type="text" class="search-input" placeholder="Search banners..." />
            </div>
          </div>
          
          <!-- Banners Table -->
          <div class="overflow-hidden rounded-xl shadow-lg mb-6">
            <table class="data-table w-full">
              <thead>
                <tr>
                  <th>Banner</th>
                  <th class="hidden md:table-cell">Description</th>
                  <th class="hidden md:table-cell">Status</th>
                  <th class="hidden lg:table-cell">Created Date</th>
                  <th class="w-24 text-right">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="flex items-center gap-3">
                      <div class="banner-thumbnail">
                        <img src="https://via.placeholder.com/300x150?text=Banner+1" alt="Banner" class="w-full h-full object-cover">
                      </div>
                      <div class="font-medium text-white">Welcome Banner</div>
                    </div>
                  </td>
                  <td class="hidden md:table-cell">
                    <div class="line-clamp-2 text-sm">Welcome to our website! Check out our latest products and services.</div>
                  </td>
                  <td class="hidden md:table-cell">
                    <label class="toggle-switch">
                      <input type="checkbox" checked>
                      <span class="toggle-slider"></span>
                    </label>
                  </td>
                  <td class="hidden lg:table-cell">Jan 15, 2024</td>
                  <td class="text-right">
                    <a href="edit_banner.html" class="text-gray-400 hover:text-white p-2">
                      <i class="ph ph-pencil-simple"></i>
                    </a>
                    <a href="delete_banner.html" class="text-gray-400 hover:text-red-400 p-2">
                      <i class="ph ph-trash"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="flex items-center gap-3">
                      <div class="banner-thumbnail">
                        <img src="https://via.placeholder.com/300x150?text=Banner+2" alt="Banner" class="w-full h-full object-cover">
                      </div>
                      <div class="font-medium text-white">Special Offer</div>
                    </div>
                  </td>
                  <td class="hidden md:table-cell">
                    <div class="line-clamp-2 text-sm">Limited time offer! Get 20% off on all products this week.</div>
                  </td>
                  <td class="hidden md:table-cell">
                    <label class="toggle-switch">
                      <input type="checkbox" checked>
                      <span class="toggle-slider"></span>
                    </label>
                  </td>
                  <td class="hidden lg:table-cell">Feb 3, 2024</td>
                  <td class="text-right">
                    <a href="edit_banner.html" class="text-gray-400 hover:text-white p-2">
                      <i class="ph ph-pencil-simple"></i>
                    </a>
                    <a href="delete_banner.html" class="text-gray-400 hover:text-red-400 p-2">
                      <i class="ph ph-trash"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="flex items-center gap-3">
                      <div class="banner-thumbnail">
                        <img src="https://via.placeholder.com/300x150?text=Banner+3" alt="Banner" class="w-full h-full object-cover">
                      </div>
                      <div class="font-medium text-white">New Collection</div>
                    </div>
                  </td>
                  <td class="hidden md:table-cell">
                    <div class="line-clamp-2 text-sm">Discover our new summer collection. Fresh designs for the season.</div>
                  </td>
                  <td class="hidden md:table-cell">
                    <label class="toggle-switch">
                      <input type="checkbox">
                      <span class="toggle-slider"></span>
                    </label>
                  </td>
                  <td class="hidden lg:table-cell">Mar 10, 2024</td>
                  <td class="text-right">
                    <a href="edit_banner.html" class="text-gray-400 hover:text-white p-2">
                      <i class="ph ph-pencil-simple"></i>
                    </a>
                    <a href="delete_banner.html" class="text-gray-400 hover:text-red-400 p-2">
                      <i class="ph ph-trash"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="flex items-center gap-3">
                      <div class="banner-thumbnail">
                        <img src="https://via.placeholder.com/300x150?text=Banner+4" alt="Banner" class="w-full h-full object-cover">
                      </div>
                      <div class="font-medium text-white">Holiday Sale</div>
                    </div>
                  </td>
                  <td class="hidden md:table-cell">
                    <div class="line-clamp-2 text-sm">Holiday season sale! Great discounts on all products.</div>
                  </td>
                  <td class="hidden md:table-cell">
                    <label class="toggle-switch">
                      <input type="checkbox" checked>
                      <span class="toggle-slider"></span>
                    </label>
                  </td>
                  <td class="hidden lg:table-cell">Apr 5, 2024</td>
                  <td class="text-right">
                    <a href="edit_banner.html" class="text-gray-400 hover:text-white p-2">
                      <i class="ph ph-pencil-simple"></i>
                    </a>
                    <a href="delete_banner.html" class="text-gray-400 hover:text-red-400 p-2">
                      <i class="ph ph-trash"></i>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          
          <!-- No Results Message -->
          <div class="no-results" style="display: none;">
            <div class="text-center py-10">
              <i class="ph ph-magnifying-glass-minus text-gray-500 text-4xl mb-4"></i>
              <p class="text-gray-300 text-lg">No banners found matching your search</p>
            </div>
          </div>
          
          <!-- Pagination -->
          <div class="pagination" data-items-per-page="4" data-current-page="1"></div>
        </section>
      </main>
    </div>

    <script src="assets/js/common.js"></script>
    <script src="assets/js/banner.js"></script>
</body>
</html> 
