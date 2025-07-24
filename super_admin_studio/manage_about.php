<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage About - Admin Panel</title>
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
        <!-- About Management Page -->
        <section>
          <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div>
              <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-1 flex items-center gap-3">
                <i class="ph ph-info"></i> About Page
              </h1>
              <div class="text-gray-400 text-sm">Manage your about page content</div>
            </div>
            <div class="flex items-center gap-2 md:gap-4 mt-2 md:mt-0">
              <a href="add_about.html" id="addAboutBtn" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg shadow transition flex items-center gap-2">
                <i class="ph ph-plus"></i> Add Content
              </a>
            </div>
          </div>
          
          <!-- Search and Filter -->
          <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <div class="relative">
              <input type="text" placeholder="Search content..." class="w-full md:w-64 bg-gray-800 border border-gray-700 text-white rounded-lg pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500">
              <i class="ph ph-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
            </div>
            <div class="flex items-center gap-2">
              <span class="text-gray-400 text-sm">Show:</span>
              <select class="bg-gray-800 border border-gray-700 text-white rounded-lg px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-cyan-500 text-sm">
                <option>All Content</option>
                <option>Active Only</option>
                <option>Inactive Only</option>
              </select>
            </div>
          </div>
          
          <!-- About Content Table -->
          <div class="bg-gray-950/50 backdrop-blur-sm rounded-2xl border border-gray-800 shadow-2xl overflow-hidden">
            <table class="w-full text-left text-gray-300">
              <thead class="bg-gray-800/50">
                <tr>
                  <th class="p-4 font-semibold">Title</th>
                  <th class="p-4 font-semibold hidden md:table-cell">Description</th>
                  <th class="p-4 font-semibold hidden md:table-cell">Status</th>
                  <th class="p-4 font-semibold hidden lg:table-cell">Last Updated</th>
                  <th class="p-4 font-semibold text-right">Actions</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-800">
                <tr class="hover:bg-gray-800/40 transition-colors">
                  <td class="p-4">
                    <div class="flex items-center gap-3">
                      <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-blue-500 to-cyan-400 flex items-center justify-center">
                        <i class="ph ph-info text-white text-lg"></i>
                      </div>
                      <div class="font-medium text-white">About Our Studio</div>
                    </div>
                  </td>
                  <td class="p-4 hidden md:table-cell">
                    <div class="line-clamp-2 text-sm">We are a professional photography studio specializing in portrait, wedding, and commercial photography...</div>
                  </td>
                  <td class="p-4 hidden md:table-cell">
                    <span class="px-2 py-1 text-xs font-semibold text-green-200 bg-green-900/50 rounded-full">Active</span>
                  </td>
                  <td class="p-4 hidden lg:table-cell">Mar 15, 2024</td>
                  <td class="p-4 text-right">
                    <button class="text-gray-400 hover:text-white p-2" onclick="window.location.href='edit_about.html'">
                      <i class="ph ph-pencil-simple"></i>
                    </button>
                    <button class="text-gray-400 hover:text-red-400 p-2">
                      <i class="ph ph-trash"></i>
                    </button>
                  </td>
                </tr>
               
              </tbody>
            </table>
          </div>
          
          <!-- Pagination -->
          <div class="mt-6 flex items-center justify-between">
            <div class="text-sm text-gray-400">
              Showing <span class="font-medium text-white">1-4</span> of <span class="font-medium text-white">4</span> items
            </div>
            <div class="flex items-center gap-2">
              <button class="px-3 py-1 bg-gray-800 text-gray-400 rounded-lg hover:bg-gray-700 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                <i class="ph ph-caret-left"></i>
              </button>
              <button class="px-3 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-700">1</button>
              <button class="px-3 py-1 bg-gray-800 text-gray-400 rounded-lg hover:bg-gray-700 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                <i class="ph ph-caret-right"></i>
              </button>
            </div>
          </div>
        </section>
      </main>
    </div>

    <script src="assets/js/common.js"></script>
</body>
</html> 
