<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gallery - Admin Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="assets/css/common.css">
</head>
<body class="h-full">
    <div class="flex h-screen bg-gray-900">
      <!-- Sidebar -->
      <aside id="sidebar-container" class="w-20 md:w-72 flex-shrink-0 flex flex-col bg-gray-950 border-r border-gray-800 py-6 px-2 md:px-4 relative z-20 shadow-2xl rounded-r-3xl"></aside>
      <!-- Main Content -->
      <main class="flex-1 p-6 md:p-10 overflow-y-auto">
        <!-- Media Library Page -->
        <section>
          <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div>
              <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-1">Gallery</h1>
              <div class="text-gray-400 text-sm">24 photos</div>
            </div>
            <div class="flex items-center gap-2 md:gap-4 mt-2 md:mt-0">
              <a href="add_images.html" id="addNewButton" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg shadow transition flex items-center gap-2">
                <i class="ph ph-plus"></i> Add new
              </a>
            </div>
          </div>
          
          <!-- Search and Filter Bar -->
          <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <!-- Search Container -->
            <div class="search-container">
              <i class="ph ph-magnifying-glass search-icon"></i>
              <input type="text" class="search-input" placeholder="Search images..." />
            </div>
            
            <!-- Filter Buttons -->
            <div class="filter-container">
              <button class="filter-btn active" data-filter="all">All</button>
              <button class="filter-btn" data-filter="people">People</button>
              <button class="filter-btn" data-filter="cars">Cars</button>
              <button class="filter-btn" data-filter="cities">Cities</button>
              <button class="filter-btn" data-filter="animals">Animals</button>
            </div>
          </div>
          
          <!-- Gallery Grid -->
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 gallery-grid">
            <div class="relative rounded-2xl overflow-hidden shadow-lg bg-gray-800 group gallery-item" data-category="nature">
              <img src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=400&q=80" alt="Coastal landscape" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" />
              <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
              <div class="absolute top-3 left-3 bg-gray-900/80 text-white text-xs px-2 py-0.5 rounded-full">Photo • 20 Jan 2024</div>
              <div class="absolute top-3 right-3">
                <div class="relative">
                  <button class="bg-gray-900/70 hover:bg-gray-800 text-white p-1.5 rounded-full" onclick="toggleDropdown(this)"><i class="ph ph-dots-three-outline"></i></button>
                  <div class="dropdown-menu hidden absolute right-0 mt-1 w-32 bg-gray-800 rounded-lg shadow-lg overflow-hidden z-10">
                    <a href="edit_gallery.html" class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-700 flex items-center gap-2">
                      <i class="ph ph-pencil"></i> Edit
                    </a>
                    <a href="delete_gallery.html" class="block px-4 py-2 text-sm text-red-400 hover:bg-gray-700 flex items-center gap-2">
                      <i class="ph ph-trash"></i> Delete
                    </a>
                  </div>
                </div>
              </div>
              <div class="absolute bottom-3 left-3 right-3"><div class="text-lg font-bold text-white drop-shadow">Coastal Mist</div></div>
            </div>
            <div class="relative rounded-2xl overflow-hidden shadow-lg bg-gray-800 group gallery-item" data-category="nature">
                <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?auto=format&fit=crop&w=400&q=80" alt="Forest path" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                <div class="absolute top-3 left-3 bg-gray-900/80 text-white text-xs px-2 py-0.5 rounded-full">Photo • 15 Feb 2024</div>
                <div class="absolute top-3 right-3">
                  <div class="relative">
                    <button class="bg-gray-900/70 hover:bg-gray-800 text-white p-1.5 rounded-full" onclick="toggleDropdown(this)"><i class="ph ph-dots-three-outline"></i></button>
                    <div class="dropdown-menu hidden absolute right-0 mt-1 w-32 bg-gray-800 rounded-lg shadow-lg overflow-hidden z-10">
                      <a href="edit_gallery.html" class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-700 flex items-center gap-2">
                        <i class="ph ph-pencil"></i> Edit
                      </a>
                      <a href="delete_gallery.html" class="block px-4 py-2 text-sm text-red-400 hover:bg-gray-700 flex items-center gap-2">
                        <i class="ph ph-trash"></i> Delete
                      </a>
                    </div>
                  </div>
                </div>
                <div class="absolute bottom-3 left-3 right-3"><div class="text-lg font-bold text-white drop-shadow">Enchanted Forest</div></div>
            </div>
            <div class="relative rounded-2xl overflow-hidden shadow-lg bg-gray-800 group gallery-item" data-category="people">
                <img src="https://images.unsplash.com/photo-1503023345310-bd7c1de61c7d?auto=format&fit=crop&w=400&q=80" alt="Person standing on a cliff" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                <div class="absolute top-3 left-3 bg-gray-900/80 text-white text-xs px-2 py-0.5 rounded-full">Photo • 03 Mar 2024</div>
                <div class="absolute top-3 right-3">
                  <div class="relative">
                    <button class="bg-gray-900/70 hover:bg-gray-800 text-white p-1.5 rounded-full" onclick="toggleDropdown(this)"><i class="ph ph-dots-three-outline"></i></button>
                    <div class="dropdown-menu hidden absolute right-0 mt-1 w-32 bg-gray-800 rounded-lg shadow-lg overflow-hidden z-10">
                      <a href="edit_gallery.html" class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-700 flex items-center gap-2">
                        <i class="ph ph-pencil"></i> Edit
                      </a>
                      <a href="delete_gallery.html" class="block px-4 py-2 text-sm text-red-400 hover:bg-gray-700 flex items-center gap-2">
                        <i class="ph ph-trash"></i> Delete
                      </a>
                    </div>
                  </div>
                </div>
                <div class="absolute bottom-3 left-3 right-3"><div class="text-lg font-bold text-white drop-shadow">Moment of Freedom</div></div>
            </div>
            <div class="relative rounded-2xl overflow-hidden shadow-lg bg-gray-800 group gallery-item" data-category="nature">
                <img src="https://images.unsplash.com/photo-1472214103451-9374bd1c798e?auto=format&fit=crop&w=400&q=80" alt="Green hills" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                <div class="absolute top-3 left-3 bg-gray-900/80 text-white text-xs px-2 py-0.5 rounded-full">Video • 21 Mar 2024</div>
                <div class="absolute top-3 right-3">
                  <div class="relative">
                    <button class="bg-gray-900/70 hover:bg-gray-800 text-white p-1.5 rounded-full" onclick="toggleDropdown(this)"><i class="ph ph-dots-three-outline"></i></button>
                    <div class="dropdown-menu hidden absolute right-0 mt-1 w-32 bg-gray-800 rounded-lg shadow-lg overflow-hidden z-10">
                      <a href="edit_gallery.html" class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-700 flex items-center gap-2">
                        <i class="ph ph-pencil"></i> Edit
                      </a>
                      <a href="delete_gallery.html" class="block px-4 py-2 text-sm text-red-400 hover:bg-gray-700 flex items-center gap-2">
                        <i class="ph ph-trash"></i> Delete
                      </a>
                    </div>
                  </div>
                </div>
                <div class="absolute bottom-3 left-3 right-3"><div class="text-lg font-bold text-white drop-shadow">Rolling Hills</div></div>
                 <div class="absolute inset-0 flex items-center justify-center bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity">
                    <i class="ph ph-play-circle text-white text-5xl"></i>
                </div>
            </div>
            <div class="relative rounded-2xl overflow-hidden shadow-lg bg-gray-800 group gallery-item" data-category="nature">
                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80" alt="Mountain landscape" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                <div class="absolute top-3 left-3 bg-gray-900/80 text-white text-xs px-2 py-0.5 rounded-full">Photo • 09 Apr 2024</div>
                <div class="absolute top-3 right-3">
                  <div class="relative">
                    <button class="bg-gray-900/70 hover:bg-gray-800 text-white p-1.5 rounded-full" onclick="toggleDropdown(this)"><i class="ph ph-dots-three-outline"></i></button>
                    <div class="dropdown-menu hidden absolute right-0 mt-1 w-32 bg-gray-800 rounded-lg shadow-lg overflow-hidden z-10">
                      <a href="edit_gallery.html" class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-700 flex items-center gap-2">
                        <i class="ph ph-pencil"></i> Edit
                      </a>
                      <a href="delete_gallery.html" class="block px-4 py-2 text-sm text-red-400 hover:bg-gray-700 flex items-center gap-2">
                        <i class="ph ph-trash"></i> Delete
                      </a>
                    </div>
                  </div>
                </div>
                <div class="absolute bottom-3 left-3 right-3"><div class="text-lg font-bold text-white drop-shadow">Serene Lake</div></div>
            </div>
             <div class="relative rounded-2xl overflow-hidden shadow-lg bg-gray-800 group gallery-item" data-category="cities">
                <img src="https://images.unsplash.com/photo-1532274402911-5a369e4c4bb5?auto=format&fit=crop&w=400&q=80" alt="Wooden dock on a lake" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                <div class="absolute top-3 left-3 bg-gray-900/80 text-white text-xs px-2 py-0.5 rounded-full">Video • 18 Apr 2024</div>
                <div class="absolute top-3 right-3">
                  <div class="relative">
                    <button class="bg-gray-900/70 hover:bg-gray-800 text-white p-1.5 rounded-full" onclick="toggleDropdown(this)"><i class="ph ph-dots-three-outline"></i></button>
                    <div class="dropdown-menu hidden absolute right-0 mt-1 w-32 bg-gray-800 rounded-lg shadow-lg overflow-hidden z-10">
                      <a href="edit_gallery.html" class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-700 flex items-center gap-2">
                        <i class="ph ph-pencil"></i> Edit
                      </a>
                      <a href="delete_gallery.html" class="block px-4 py-2 text-sm text-red-400 hover:bg-gray-700 flex items-center gap-2">
                        <i class="ph ph-trash"></i> Delete
                      </a>
                    </div>
                  </div>
                </div>
                <div class="absolute bottom-3 left-3 right-3"><div class="text-lg font-bold text-white drop-shadow">Peaceful Dock</div></div>
                 <div class="absolute inset-0 flex items-center justify-center bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity">
                    <i class="ph ph-play-circle text-white text-5xl"></i>
                </div>
            </div>
            <div class="relative rounded-2xl overflow-hidden shadow-lg bg-gray-800 group gallery-item" data-category="nature">
                <img src="https://images.unsplash.com/photo-1470770841072-f978cf4d019e?auto=format&fit=crop&w=400&q=80" alt="House by a lake" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                <div class="absolute top-3 left-3 bg-gray-900/80 text-white text-xs px-2 py-0.5 rounded-full">Photo • 01 May 2024</div>
                <div class="absolute top-3 right-3">
                  <div class="relative">
                    <button class="bg-gray-900/70 hover:bg-gray-800 text-white p-1.5 rounded-full" onclick="toggleDropdown(this)"><i class="ph ph-dots-three-outline"></i></button>
                    <div class="dropdown-menu hidden absolute right-0 mt-1 w-32 bg-gray-800 rounded-lg shadow-lg overflow-hidden z-10">
                      <a href="edit_gallery.html" class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-700 flex items-center gap-2">
                        <i class="ph ph-pencil"></i> Edit
                      </a>
                      <a href="delete_gallery.html" class="block px-4 py-2 text-sm text-red-400 hover:bg-gray-700 flex items-center gap-2">
                        <i class="ph ph-trash"></i> Delete
                      </a>
                    </div>
                  </div>
                </div>
                <div class="absolute bottom-3 left-3 right-3"><div class="text-lg font-bold text-white drop-shadow">Lakeside Retreat</div></div>
            </div>
            <div class="relative rounded-2xl overflow-hidden shadow-lg bg-gray-800 group gallery-item" data-category="nature">
                <img src="https://images.unsplash.com/photo-1586348943529-beaae6c28db9?auto=format&fit=crop&w=400&q=80" alt="Path through a lavender field" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                <div class="absolute top-3 left-3 bg-gray-900/80 text-white text-xs px-2 py-0.5 rounded-full">Photo • 22 May 2024</div>
                <div class="absolute top-3 right-3">
                  <div class="relative">
                    <button class="bg-gray-900/70 hover:bg-gray-800 text-white p-1.5 rounded-full" onclick="toggleDropdown(this)"><i class="ph ph-dots-three-outline"></i></button>
                    <div class="dropdown-menu hidden absolute right-0 mt-1 w-32 bg-gray-800 rounded-lg shadow-lg overflow-hidden z-10">
                      <a href="edit_gallery.html" class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-700 flex items-center gap-2">
                        <i class="ph ph-pencil"></i> Edit
                      </a>
                      <a href="delete_gallery.html" class="block px-4 py-2 text-sm text-red-400 hover:bg-gray-700 flex items-center gap-2">
                        <i class="ph ph-trash"></i> Delete
                      </a>
                    </div>
                  </div>
                </div>
                <div class="absolute bottom-3 left-3 right-3"><div class="text-lg font-bold text-white drop-shadow">Lavender Dreams</div></div>
            </div>
            <!-- Add more items for pagination demo -->
            <div class="relative rounded-2xl overflow-hidden shadow-lg bg-gray-800 group gallery-item" data-category="animals">
                <img src="https://images.unsplash.com/photo-1564349683136-77e08dba1ef7?auto=format&fit=crop&w=400&q=80" alt="A colorful macaw" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                <div class="absolute top-3 left-3 bg-gray-900/80 text-white text-xs px-2 py-0.5 rounded-full">Photo • 12 Jun 2024</div>
                <div class="absolute top-3 right-3">
                  <div class="relative">
                    <button class="bg-gray-900/70 hover:bg-gray-800 text-white p-1.5 rounded-full" onclick="toggleDropdown(this)"><i class="ph ph-dots-three-outline"></i></button>
                    <div class="dropdown-menu hidden absolute right-0 mt-1 w-32 bg-gray-800 rounded-lg shadow-lg overflow-hidden z-10">
                      <a href="edit_gallery.html" class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-700 flex items-center gap-2">
                        <i class="ph ph-pencil"></i> Edit
                      </a>
                      <a href="delete_gallery.html" class="block px-4 py-2 text-sm text-red-400 hover:bg-gray-700 flex items-center gap-2">
                        <i class="ph ph-trash"></i> Delete
                      </a>
                    </div>
                  </div>
                </div>
                <div class="absolute bottom-3 left-3 right-3"><div class="text-lg font-bold text-white drop-shadow">Colorful Macaw</div></div>
            </div>
            <div class="relative rounded-2xl overflow-hidden shadow-lg bg-gray-800 group gallery-item" data-category="animals">
                <img src="https://images.unsplash.com/photo-1484406566174-9da000fda645?auto=format&fit=crop&w=400&q=80" alt="A majestic tiger" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                <div class="absolute top-3 left-3 bg-gray-900/80 text-white text-xs px-2 py-0.5 rounded-full">Photo • 18 Jun 2024</div>
                <div class="absolute top-3 right-3">
                  <div class="relative">
                    <button class="bg-gray-900/70 hover:bg-gray-800 text-white p-1.5 rounded-full" onclick="toggleDropdown(this)"><i class="ph ph-dots-three-outline"></i></button>
                    <div class="dropdown-menu hidden absolute right-0 mt-1 w-32 bg-gray-800 rounded-lg shadow-lg overflow-hidden z-10">
                      <a href="edit_gallery.html" class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-700 flex items-center gap-2">
                        <i class="ph ph-pencil"></i> Edit
                      </a>
                      <a href="delete_gallery.html" class="block px-4 py-2 text-sm text-red-400 hover:bg-gray-700 flex items-center gap-2">
                        <i class="ph ph-trash"></i> Delete
                      </a>
                    </div>
                  </div>
                </div>
                <div class="absolute bottom-3 left-3 right-3"><div class="text-lg font-bold text-white drop-shadow">Majestic Tiger</div></div>
            </div>
            <div class="relative rounded-2xl overflow-hidden shadow-lg bg-gray-800 group gallery-item" data-category="cars">
                <img src="https://images.unsplash.com/photo-1542362567-b07e54358753?auto=format&fit=crop&w=400&q=80" alt="A vintage car" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                <div class="absolute top-3 left-3 bg-gray-900/80 text-white text-xs px-2 py-0.5 rounded-full">Photo • 25 Jun 2024</div>
                <div class="absolute top-3 right-3">
                  <div class="relative">
                    <button class="bg-gray-900/70 hover:bg-gray-800 text-white p-1.5 rounded-full" onclick="toggleDropdown(this)"><i class="ph ph-dots-three-outline"></i></button>
                    <div class="dropdown-menu hidden absolute right-0 mt-1 w-32 bg-gray-800 rounded-lg shadow-lg overflow-hidden z-10">
                      <a href="edit_gallery.html" class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-700 flex items-center gap-2">
                        <i class="ph ph-pencil"></i> Edit
                      </a>
                      <a href="delete_gallery.html" class="block px-4 py-2 text-sm text-red-400 hover:bg-gray-700 flex items-center gap-2">
                        <i class="ph ph-trash"></i> Delete
                      </a>
                    </div>
                  </div>
                </div>
                <div class="absolute bottom-3 left-3 right-3"><div class="text-lg font-bold text-white drop-shadow">Vintage Classic</div></div>
            </div>
          </div>
          
          <!-- No Results Message - will only show when needed -->
          <div class="no-results" style="display: none">
            <div class="text-center py-10">
              <i class="ph ph-magnifying-glass-minus text-gray-500 text-4xl mb-4"></i>
              <p class="text-gray-300 text-lg">No images found matching your search</p>
            </div>
          </div>
          
          <!-- Pagination -->
          <div class="pagination mt-8" data-items-per-page="8" data-current-page="1"></div>
        </section>
      </main>
    </div>

    <script src="assets/js/common.js"></script>
    <script src="assets/js/gallery.js"></script>
</body>
</html> 
