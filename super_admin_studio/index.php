<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard - Admin Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="assets/css/common.css">
    <style>
      .category-card {
        transition: all 0.3s ease;
        border: 1px solid rgba(75, 85, 99, 0.3);
        background: linear-gradient(135deg, rgba(31, 41, 55, 0.8) 0%, rgba(17, 24, 39, 0.95) 100%);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
      }
      
      .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.2), 0 10px 10px -5px rgba(0, 0, 0, 0.1);
        border-color: rgba(79, 209, 197, 0.3);
      }
      
      .category-card:hover .category-name {
        color: rgba(79, 209, 197, 1);
      }
      
      .category-card:hover .view-link {
        transform: translateX(4px);
      }
      
      .active-badge {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.2) 0%, rgba(5, 150, 105, 0.2) 100%);
      }
      
      .inactive-badge {
        background: linear-gradient(135deg, rgba(107, 114, 128, 0.2) 0%, rgba(75, 85, 99, 0.2) 100%);
      }
      
      .stat-card {
        transition: all 0.3s ease;
        border: 1px solid rgba(75, 85, 99, 0.3);
        background: linear-gradient(135deg, rgba(31, 41, 55, 0.8) 0%, rgba(17, 24, 39, 0.95) 100%);
      }
      
      .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.2), 0 4px 6px -2px rgba(0, 0, 0, 0.1);
      }
      
      .stat-icon {
        border-radius: 12px;
        padding: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      
      .cyan-icon {
        background: linear-gradient(135deg, rgba(6, 182, 212, 0.2) 0%, rgba(8, 145, 178, 0.2) 100%);
        color: rgba(6, 182, 212, 1);
      }
      
      .indigo-icon {
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.2) 0%, rgba(79, 70, 229, 0.2) 100%);
        color: rgba(99, 102, 241, 1);
      }
      
      .emerald-icon {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.2) 0%, rgba(5, 150, 105, 0.2) 100%);
        color: rgba(16, 185, 129, 1);
      }
      
      .amber-icon {
        background: linear-gradient(135deg, rgba(245, 158, 11, 0.2) 0%, rgba(217, 119, 6, 0.2) 100%);
        color: rgba(245, 158, 11, 1);
      }
    </style>
</head>
<body class="h-full">
    <div class="flex h-screen bg-gray-900">
      <!-- Sidebar -->
      <aside id="sidebar-container" class="w-20 md:w-72 flex-shrink-0 flex flex-col bg-gray-950 border-r border-gray-800 py-6 px-2 md:px-4 relative z-20 shadow-2xl rounded-r-3xl"></aside>
      <!-- Main Content -->
      <main class="flex-1 p-6 md:p-10 overflow-y-auto">
        <!-- Dashboard Page -->
        <section>
          <div class="mb-10">
            <h1 class="text-3xl font-bold text-white mb-2">Dashboard</h1>
            <p class="text-gray-400">Overview of your photo categories and uploads</p>
          </div>
          
          <!-- Stats Overview -->
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <div class="stat-card rounded-2xl p-6 shadow-lg">
              <div class="flex items-center justify-between mb-4">
                <h3 class="text-gray-400 font-medium">Total Categories</h3>
                <span class="stat-icon cyan-icon">
                  <i class="ph ph-folders text-xl"></i>
                </span>
              </div>
              <p class="text-3xl font-bold text-white">5</p>
              <p class="text-sm text-gray-400 mt-2">All active and inactive categories</p>
            </div>
            
            <div class="stat-card rounded-2xl p-6 shadow-lg">
              <div class="flex items-center justify-between mb-4">
                <h3 class="text-gray-400 font-medium">Total Photos</h3>
                <span class="stat-icon indigo-icon">
                  <i class="ph ph-image text-xl"></i>
                </span>
              </div>
              <p class="text-3xl font-bold text-white">124</p>
              <p class="text-sm text-gray-400 mt-2">Across all categories</p>
            </div>
            
            <div class="stat-card rounded-2xl p-6 shadow-lg">
              <div class="flex items-center justify-between mb-4">
                <h3 class="text-gray-400 font-medium">Active Categories</h3>
                <span class="stat-icon emerald-icon">
                  <i class="ph ph-check-circle text-xl"></i>
                </span>
              </div>
              <p class="text-3xl font-bold text-white">4</p>
              <p class="text-sm text-gray-400 mt-2">Currently visible on site</p>
            </div>
            
            <div class="stat-card rounded-2xl p-6 shadow-lg">
              <div class="flex items-center justify-between mb-4">
                <h3 class="text-gray-400 font-medium">Recent Uploads</h3>
                <span class="stat-icon amber-icon">
                  <i class="ph ph-upload text-xl"></i>
                </span>
              </div>
              <p class="text-3xl font-bold text-white">12</p>
              <p class="text-sm text-gray-400 mt-2">In the last 7 days</p>
            </div>
          </div>
          
          <!-- Category Boxes -->
          <div class="mb-8">
            <div class="flex justify-between items-center mb-8">
              <h2 class="text-2xl font-bold text-white">Categories & Photos</h2>
              <a href="manage_category.html" class="text-sm text-cyan-400 hover:text-cyan-300 flex items-center gap-1 transition-all duration-300 hover:gap-2">
                <span>View All</span>
                <i class="ph ph-arrow-right"></i>
              </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
              <!-- Nature Category -->
              <div class="category-card rounded-2xl overflow-hidden">
                <div class="p-6">
                  <div class="flex justify-between items-center mb-5">
                    <h3 class="text-xl font-semibold text-white category-name">Nature</h3>
                    <span class="active-badge text-emerald-400 text-xs px-3 py-1.5 rounded-full font-medium">Active</span>
                  </div>
                  <div class="flex items-center gap-3 text-gray-400 mb-6">
                    <div class="flex items-center gap-2 bg-gray-800/50 px-3 py-1.5 rounded-full">
                      <i class="ph ph-image"></i>
                      <span>42 Photos</span>
                    </div>
                  </div>
                  <a href="#" class="view-link text-sm text-cyan-400 hover:text-cyan-300 flex items-center gap-1 transition-all duration-300">
                    <span>View Gallery</span>
                    <i class="ph ph-arrow-right"></i>
                  </a>
                </div>
              </div>
              
              <!-- Architecture Category -->
              <div class="category-card rounded-2xl overflow-hidden">
                <div class="p-6">
                  <div class="flex justify-between items-center mb-5">
                    <h3 class="text-xl font-semibold text-white category-name">Architecture</h3>
                    <span class="active-badge text-emerald-400 text-xs px-3 py-1.5 rounded-full font-medium">Active</span>
                  </div>
                  <div class="flex items-center gap-3 text-gray-400 mb-6">
                    <div class="flex items-center gap-2 bg-gray-800/50 px-3 py-1.5 rounded-full">
                      <i class="ph ph-image"></i>
                      <span>36 Photos</span>
                    </div>
                  </div>
                  <a href="#" class="view-link text-sm text-cyan-400 hover:text-cyan-300 flex items-center gap-1 transition-all duration-300">
                    <span>View Gallery</span>
                    <i class="ph ph-arrow-right"></i>
                  </a>
                </div>
              </div>
              
              <!-- Travel Category -->
              <div class="category-card rounded-2xl overflow-hidden">
                <div class="p-6">
                  <div class="flex justify-between items-center mb-5">
                    <h3 class="text-xl font-semibold text-white category-name">Travel</h3>
                    <span class="active-badge text-emerald-400 text-xs px-3 py-1.5 rounded-full font-medium">Active</span>
                  </div>
                  <div class="flex items-center gap-3 text-gray-400 mb-6">
                    <div class="flex items-center gap-2 bg-gray-800/50 px-3 py-1.5 rounded-full">
                      <i class="ph ph-image"></i>
                      <span>28 Photos</span>
                    </div>
                  </div>
                  <a href="#" class="view-link text-sm text-cyan-400 hover:text-cyan-300 flex items-center gap-1 transition-all duration-300">
                    <span>View Gallery</span>
                    <i class="ph ph-arrow-right"></i>
                  </a>
                </div>
              </div>
              
              <!-- People Category -->
              <div class="category-card rounded-2xl overflow-hidden">
                <div class="p-6">
                  <div class="flex justify-between items-center mb-5">
                    <h3 class="text-xl font-semibold text-white category-name">People</h3>
                    <span class="active-badge text-emerald-400 text-xs px-3 py-1.5 rounded-full font-medium">Active</span>
                  </div>
                  <div class="flex items-center gap-3 text-gray-400 mb-6">
                    <div class="flex items-center gap-2 bg-gray-800/50 px-3 py-1.5 rounded-full">
                      <i class="ph ph-image"></i>
                      <span>18 Photos</span>
                    </div>
                  </div>
                  <a href="#" class="view-link text-sm text-cyan-400 hover:text-cyan-300 flex items-center gap-1 transition-all duration-300">
                    <span>View Gallery</span>
                    <i class="ph ph-arrow-right"></i>
                  </a>
                </div>
              </div>
              
              <!-- Animals Category -->
              <div class="category-card rounded-2xl overflow-hidden">
                <div class="p-6">
                  <div class="flex justify-between items-center mb-5">
                    <h3 class="text-xl font-semibold text-white category-name">Animals</h3>
                    <span class="inactive-badge text-gray-400 text-xs px-3 py-1.5 rounded-full font-medium">Inactive</span>
                  </div>
                  <div class="flex items-center gap-3 text-gray-400 mb-6">
                    <div class="flex items-center gap-2 bg-gray-800/50 px-3 py-1.5 rounded-full">
                      <i class="ph ph-image"></i>
                      <span>0 Photos</span>
                    </div>
                  </div>
                  <a href="#" class="view-link text-sm text-cyan-400 hover:text-cyan-300 flex items-center gap-1 transition-all duration-300">
                    <span>View Gallery</span>
                    <i class="ph ph-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
    </div>

    <script src="assets/js/common.js" defer></script>
</body>
</html> 
