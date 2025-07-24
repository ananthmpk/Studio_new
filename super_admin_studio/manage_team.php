<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage Team - Admin Panel</title>
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
        <!-- Team Management Page -->
        <section>
          <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div>
              <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-1 flex items-center gap-3">
                <i class="ph ph-users-three"></i> Team Members
              </h1>
              <div class="text-gray-400 text-sm">Manage your team members</div>
            </div>
            <div class="flex items-center gap-2 md:gap-4 mt-2 md:mt-0">
              <a href="add_team.html" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg shadow transition flex items-center gap-2">
                <i class="ph ph-plus"></i> Add Team Member
              </a>
            </div>
          </div>
          
          <!-- Search and Filter -->
          <div class="mb-6">
            <div class="search-container w-full max-w-md">
              <i class="ph ph-magnifying-glass search-icon"></i>
              <input type="text" class="search-input" placeholder="Search team members..." />
            </div>
          </div>
          
          <!-- Team Members Table -->
          <div class="overflow-hidden rounded-xl shadow-lg mb-6">
            <table class="data-table w-full">
              <thead>
                <tr>
                  <th class="w-64">Member</th>
                  <th class="hidden md:table-cell">Role</th>
                  <th class="hidden md:table-cell">Social Media</th>
                  <th class="hidden lg:table-cell">Status</th>
                  <th class="w-24 text-right">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="flex items-center gap-3">
                      <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-500 to-cyan-400 flex items-center justify-center overflow-hidden">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Team Member" class="w-full h-full object-cover">
                      </div>
                      <div>
                        <div class="font-medium text-white">John Smith</div>
                        <div class="text-sm text-gray-400">john@example.com</div>
                      </div>
                    </div>
                  </td>
                  <td class="hidden md:table-cell">CEO & Founder</td>
                  <td class="hidden md:table-cell">
                    <div class="flex space-x-2">
                      <a href="#" class="text-blue-400 hover:text-blue-300"><i class="ph ph-facebook-logo"></i></a>
                      <a href="#" class="text-pink-400 hover:text-pink-300"><i class="ph ph-instagram-logo"></i></a>
                      <a href="#" class="text-green-400 hover:text-green-300"><i class="ph ph-whatsapp-logo"></i></a>
                      <a href="#" class="text-blue-500 hover:text-blue-400"><i class="ph ph-linkedin-logo"></i></a>
                    </div>
                  </td>
                  <td class="hidden lg:table-cell">
                    <span class="status-badge active">Active</span>
                  </td>
                  <td class="text-right">
                    <a href="edit_team.html" class="text-gray-400 hover:text-white p-2" >
                      <i class="ph ph-pencil-simple"></i>
                    </a>
                    <a href="delete_team.html" class="text-gray-400 hover:text-red-400 p-2">
                      <i class="ph ph-trash"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="flex items-center gap-3">
                      <div class="w-12 h-12 rounded-full bg-gradient-to-br from-purple-500 to-pink-400 flex items-center justify-center overflow-hidden">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Team Member" class="w-full h-full object-cover">
                      </div>
                      <div>
                        <div class="font-medium text-white">Sarah Johnson</div>
                        <div class="text-sm text-gray-400">sarah@example.com</div>
                      </div>
                    </div>
                  </td>
                  <td class="hidden md:table-cell">Marketing Director</td>
                  <td class="hidden md:table-cell">
                    <div class="flex space-x-2">
                      <a href="#" class="text-blue-400 hover:text-blue-300"><i class="ph ph-facebook-logo"></i></a>
                      <a href="#" class="text-pink-400 hover:text-pink-300"><i class="ph ph-instagram-logo"></i></a>
                      <a href="#" class="text-blue-500 hover:text-blue-400"><i class="ph ph-linkedin-logo"></i></a>
                    </div>
                  </td>
                  <td class="hidden lg:table-cell">
                    <span class="status-badge active">Active</span>
                  </td>
                  <td class="text-right">
                    <a href="edit_team.html" class="text-gray-400 hover:text-white p-2">
                      <i class="ph ph-pencil-simple"></i>
                    </a>
                    <a href="delete_team.html" class="text-gray-400 hover:text-red-400 p-2">
                      <i class="ph ph-trash"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="flex items-center gap-3">
                      <div class="w-12 h-12 rounded-full bg-gradient-to-br from-amber-500 to-orange-400 flex items-center justify-center overflow-hidden">
                        <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Team Member" class="w-full h-full object-cover">
                      </div>
                      <div>
                        <div class="font-medium text-white">Michael Brown</div>
                        <div class="text-sm text-gray-400">michael@example.com</div>
                      </div>
                    </div>
                  </td>
                  <td class="hidden md:table-cell">Lead Developer</td>
                  <td class="hidden md:table-cell">
                    <div class="flex space-x-2">
                      <a href="#" class="text-pink-400 hover:text-pink-300"><i class="ph ph-instagram-logo"></i></a>
                      <a href="#" class="text-green-400 hover:text-green-300"><i class="ph ph-whatsapp-logo"></i></a>
                      <a href="#" class="text-blue-500 hover:text-blue-400"><i class="ph ph-linkedin-logo"></i></a>
                    </div>
                  </td>
                  <td class="hidden lg:table-cell">
                    <span class="status-badge active">Active</span>
                  </td>
                  <td class="text-right">
                    <a href="edit_team.html" class="text-gray-400 hover:text-white p-2">
                      <i class="ph ph-pencil-simple"></i>
                    </a>
                    <a href="delete_team.html" class="text-gray-400 hover:text-red-400 p-2">
                      <i class="ph ph-trash"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="flex items-center gap-3">
                      <div class="w-12 h-12 rounded-full bg-gradient-to-br from-emerald-500 to-green-400 flex items-center justify-center overflow-hidden">
                        <img src="https://randomuser.me/api/portraits/women/28.jpg" alt="Team Member" class="w-full h-full object-cover">
                      </div>
                      <div>
                        <div class="font-medium text-white">Emily Davis</div>
                        <div class="text-sm text-gray-400">emily@example.com</div>
                      </div>
                    </div>
                  </td>
                  <td class="hidden md:table-cell">UX Designer</td>
                  <td class="hidden md:table-cell">
                    <div class="flex space-x-2">
                      <a href="#" class="text-blue-400 hover:text-blue-300"><i class="ph ph-facebook-logo"></i></a>
                      <a href="#" class="text-pink-400 hover:text-pink-300"><i class="ph ph-instagram-logo"></i></a>
                    </div>
                  </td>
                  <td class="hidden lg:table-cell">
                    <span class="status-badge inactive">Inactive</span>
                  </td>
                  <td class="text-right">
                    <a href="edit_team.html" class="text-gray-400 hover:text-white p-2">
                      <i class="ph ph-pencil-simple"></i>
                    </a>
                    <a href="delete_team.html" class="text-gray-400 hover:text-red-400 p-2">
                      <i class="ph ph-trash"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="flex items-center gap-3">
                      <div class="w-12 h-12 rounded-full bg-gradient-to-br from-cyan-500 to-blue-400 flex items-center justify-center overflow-hidden">
                        <img src="https://randomuser.me/api/portraits/men/54.jpg" alt="Team Member" class="w-full h-full object-cover">
                      </div>
                      <div>
                        <div class="font-medium text-white">David Wilson</div>
                        <div class="text-sm text-gray-400">david@example.com</div>
                      </div>
                    </div>
                  </td>
                  <td class="hidden md:table-cell">Content Manager</td>
                  <td class="hidden md:table-cell">
                    <div class="flex space-x-2">
                      <a href="#" class="text-blue-400 hover:text-blue-300"><i class="ph ph-facebook-logo"></i></a>
                      <a href="#" class="text-green-400 hover:text-green-300"><i class="ph ph-whatsapp-logo"></i></a>
                      <a href="#" class="text-blue-500 hover:text-blue-400"><i class="ph ph-linkedin-logo"></i></a>
                    </div>
                  </td>
                  <td class="hidden lg:table-cell">
                    <span class="status-badge active">Active</span>
                  </td>
                  <td class="text-right">
                    <a href="edit_team.html" class="text-gray-400 hover:text-white p-2">
                      <i class="ph ph-pencil-simple"></i>
                    </a>
                    <a href="delete_team.html" class="text-gray-400 hover:text-red-400 p-2">
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
              <p class="text-gray-300 text-lg">No team members found matching your search</p>
            </div>
          </div>
          
          <!-- Pagination -->
          <div class="pagination" data-items-per-page="5" data-current-page="1"></div>
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
          <h3 class="text-xl font-bold text-white mb-4">Delete Team Member</h3>
          <p class="text-gray-300 mb-6">Are you sure you want to delete this team member? This action cannot be undone.</p>
          <div class="flex justify-center gap-3">
            <button id="cancelDelete" class="px-4 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-gray-700 transition">Cancel</button>
            <button id="confirmDelete" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">Yes, Delete</button>
          </div>
        </div>
      </div>
    </div>

    <script src="assets/js/common.js"></script>
    <script src="assets/js/team.js"></script>
</body>
</html> 
