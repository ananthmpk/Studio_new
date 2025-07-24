<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit About Content - Admin Panel</title>
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
        <!-- Edit About Content Page -->
        <section>
          <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div>
              <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-1 flex items-center gap-3">
                <i class="ph ph-pencil-simple"></i> Edit About Content
              </h1>
              <div class="text-gray-400 text-sm">Update your about page content</div>
            </div>
            <div class="flex items-center gap-2">
              <a href="manage_about.html" class="flex items-center gap-2 text-gray-400 hover:text-white text-sm font-medium px-3 py-2 rounded-lg transition">
                <i class="ph ph-arrow-left"></i> Back to About
              </a>
            </div>
          </div>
          
          <!-- Edit About Form -->
          <div class="bg-gray-800 rounded-xl p-6 shadow-lg">
            <form id="editAboutForm" class="space-y-6">
              <div>
                <label for="contentTitle" class="block text-sm font-medium text-gray-300 mb-1">Title</label>
                <input type="text" id="contentTitle" name="contentTitle" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="About Our Studio" required>
              </div>
              
              <div>
                <label for="contentDescription" class="block text-sm font-medium text-gray-300 mb-1">Description</label>
                <textarea id="contentDescription" name="contentDescription" rows="5" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>We are a professional photography studio specializing in portrait, wedding, and commercial photography. With over 10 years of experience, our team of skilled photographers and editors deliver stunning, high-quality images that capture your special moments perfectly. Our studio is equipped with the latest technology and lighting equipment to ensure the best results for every shoot.</textarea>
              </div>
              
              <div>
                <label for="videoUrl" class="block text-sm font-medium text-gray-300 mb-1">Video URL (YouTube or Vimeo)</label>
                <input type="url" id="videoUrl" name="videoUrl" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="https://www.youtube.com/watch?v=example123">
                
                <!-- Video Preview -->
                <div class="mt-3 bg-gray-900 rounded-lg overflow-hidden">
                  <div class="aspect-w-16 aspect-h-9 relative">
                    <div class="absolute inset-0 flex items-center justify-center">
                      <img src="https://i.ytimg.com/vi/example123/maxresdefault.jpg" alt="Video thumbnail" class="w-full h-full object-cover">
                      <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
                        <i class="ph ph-play text-white text-6xl"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Icon</label>
                <div class="grid grid-cols-6 gap-3">
                  <button type="button" class="flex flex-col items-center justify-center p-3 bg-blue-600 rounded-lg transition">
                    <i class="ph ph-info text-white text-xl"></i>
                    <span class="text-xs text-white mt-1">Info</span>
                  </button>
                  <button type="button" class="flex flex-col items-center justify-center p-3 bg-gray-700 hover:bg-gray-600 rounded-lg transition">
                    <i class="ph ph-users text-white text-xl"></i>
                    <span class="text-xs text-gray-300 mt-1">Team</span>
                  </button>
                  <button type="button" class="flex flex-col items-center justify-center p-3 bg-gray-700 hover:bg-gray-600 rounded-lg transition">
                    <i class="ph ph-medal text-white text-xl"></i>
                    <span class="text-xs text-gray-300 mt-1">Awards</span>
                  </button>
                  <button type="button" class="flex flex-col items-center justify-center p-3 bg-gray-700 hover:bg-gray-600 rounded-lg transition">
                    <i class="ph ph-video-camera text-white text-xl"></i>
                    <span class="text-xs text-gray-300 mt-1">Video</span>
                  </button>
                  <button type="button" class="flex flex-col items-center justify-center p-3 bg-gray-700 hover:bg-gray-600 rounded-lg transition">
                    <i class="ph ph-buildings text-white text-xl"></i>
                    <span class="text-xs text-gray-300 mt-1">Studio</span>
                  </button>
                  <button type="button" class="flex flex-col items-center justify-center p-3 bg-gray-700 hover:bg-gray-600 rounded-lg transition">
                    <i class="ph ph-camera text-white text-xl"></i>
                    <span class="text-xs text-gray-300 mt-1">Camera</span>
                  </button>
                </div>
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Status</label>
                <div class="flex gap-4">
                  <div class="flex items-center">
                    <input type="radio" id="statusActive" name="status" value="active" class="h-4 w-4 text-blue-600 bg-gray-700 border-gray-500 focus:ring-blue-500" checked>
                    <label for="statusActive" class="ml-2 text-sm text-gray-300">Active</label>
                  </div>
                  <div class="flex items-center">
                    <input type="radio" id="statusDraft" name="status" value="draft" class="h-4 w-4 text-yellow-600 bg-gray-700 border-gray-500 focus:ring-yellow-500">
                    <label for="statusDraft" class="ml-2 text-sm text-gray-300">Draft</label>
                  </div>
                  <div class="flex items-center">
                    <input type="radio" id="statusInactive" name="status" value="inactive" class="h-4 w-4 text-gray-600 bg-gray-700 border-gray-500 focus:ring-gray-500">
                    <label for="statusInactive" class="ml-2 text-sm text-gray-300">Inactive</label>
                  </div>
                </div>
              </div>
              
              <div class="flex justify-end gap-3">
                <button type="button" onclick="window.location.href='manage_about.html'" class="px-5 py-2.5 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition">
                  Cancel
                </button>
                <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-500 text-white rounded-lg transition flex items-center gap-2">
                  <i class="ph ph-check"></i> Update Content
                </button>
              </div>
            </form>
          </div>
        </section>
      </main>
    </div>
    
    <script>
      document.getElementById('editAboutForm').addEventListener('submit', function(e) {
        e.preventDefault();
        // Here you would typically handle the form submission with AJAX
        alert('About content updated successfully!');
        window.location.href = 'manage_about.html';
      });
    </script>
    
    <script src="assets/js/common.js" defer></script>
</body>
</html>
