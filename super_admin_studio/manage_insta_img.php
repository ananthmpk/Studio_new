<?php
include("includes.php");
?>

<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Instagram Gallery - Admin Panel</title>
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
        <!-- Instagram Gallery Page -->
        <section>
          <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div>
              <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-1 flex items-center gap-3">
                <i class="ph ph-instagram-logo"></i> Instagram Gallery
              </h1>
              <div class="text-gray-400 text-sm">Manage your Instagram photos</div>
            </div>
            <div class="flex items-center gap-2 md:gap-4 mt-2 md:mt-0">
              <a href="add_insta_img.php" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg shadow transition flex items-center gap-2">
                <i class="ph ph-plus"></i> Add Photo
              </a>
            </div>
          </div>
          
          <!-- Filter and Sort Options -->
          <div class="mb-6">
            <div class="search-container w-full max-w-md">
              <i class="ph ph-magnifying-glass search-icon"></i>
              <input type="text" class="search-input" placeholder="Search photos..." />
            </div>
          </div>
          
          <!-- Instagram Gallery Grid -->
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-8 gallery-grid">
            <!-- Photo Item 1 -->
             <?php 
              $arr = getAllInstaImages();

              foreach($arr as $ar){
             ?>
            <div class="bg-gray-800 rounded-xl overflow-hidden group relative gallery-item" data-category="people">
              <!-- Action Menu -->
              <div class="action-menu">
                <div class="dropdown">
                  <button onclick="toggleDropdown(this, event)" class="dropdown-btn">
                    <i class="ph ph-dots-three-vertical"></i>
                  </button>
                  <div class="dropdown-content">
                    <a href="edit_insta_img.php?id=<?php echo $ar['id'] ?>" class="hover:bg-gray-700">
                      <i class="ph ph-pencil-simple"></i> Edit
                    </a>
                    <a href="delete_insta_img.php?id=<?php echo $ar['id'] ?>"  onclick="return confirm('Are you sure you want to delete this item?')" class="hover:bg-red-700">
                      <i class="ph ph-trash"></i> Delete
                    </a>
                  </div>
                </div>
              </div>
              <div class="aspect-square overflow-hidden">
                <img src="assets/images/instagram/<?php echo $ar['file_path'] ?>" alt="Instagram Photo" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
              </div>
              <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                <div class="flex items-center justify-between">
                  <div class="text-white font-medium truncate"><?php echo $ar['title'] ?></div>
                </div>
              </div>
            </div>
            <?php
              }
            ?>
            
          </div>
          
          <!-- No Results Message -->
          <div class="no-results" style="display: none;">
            <div class="text-center py-10">
              <i class="ph ph-magnifying-glass-minus text-gray-500 text-4xl mb-4"></i>
              <p class="text-gray-300 text-lg">No images found matching your search</p>
            </div>
          </div>
          
          <!-- Pagination -->
          <div class="pagination" data-items-per-page="6" data-current-page="1"></div>
        </section>
      </main>
    </div>
    
    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black/70 backdrop-blur-sm items-center justify-center hidden z-50">
      <div class="bg-gray-900 border border-gray-700 rounded-2xl shadow-2xl w-full max-w-md m-4">
        <div class="p-6 text-center">
          <div class="w-16 h-16 rounded-full bg-red-900/30 flex items-center justify-center mx-auto mb-4">
            <i class="ph ph-warning text-red-500 text-3xl"></i>
          </div>
          <h3 class="text-xl font-bold text-white mb-4">Delete Photo</h3>
          <p class="text-gray-300 mb-6">Are you sure you want to delete this photo? This action cannot be undone.</p>
          <div class="flex justify-center gap-3">
            <button id="cancelDelete" class="px-4 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-gray-700 transition">Cancel</button>
            <button id="confirmDeleteBtn" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">Yes, Delete</button>
          </div>
        </div>
      </div>
    </div>

    <script src="assets/js/common.js"></script>
    <script src="assets/js/instagram.js"></script>
</body>
</html> 
