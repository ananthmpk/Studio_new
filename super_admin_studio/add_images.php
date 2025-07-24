<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Images - Admin Panel</title>
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
        <!-- Add Images Page -->
        <section>
          <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
                        <div>
              <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-1 flex items-center gap-3">
                <i class="ph ph-plus-circle"></i> Add New Images
              </h1>
              <div class="text-gray-400 text-sm">Upload new photos and videos to your gallery</div>
                        </div>
            <div class="flex items-center gap-2">
              <a href="manage_gallery.html" class="flex items-center gap-2 text-gray-400 hover:text-white text-sm font-medium px-3 py-2 rounded-lg transition">
                <i class="ph ph-arrow-left"></i> Back to Gallery
              </a>
            </div>
    </div>

          <!-- Upload Form -->
          <div class="bg-gray-950/50 backdrop-blur-sm rounded-2xl border border-gray-800 shadow-2xl overflow-hidden">
            <div class="p-6 md:p-8 space-y-6">
              <form class="space-y-6">
                <div>
                  <label for="title" class="block text-sm font-medium text-gray-300 mb-2">Title</label>
                  <input type="text" id="title" class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="e.g., Summer Vacation Photos">
                </div>
                <div>
                  <label for="description" class="block text-sm font-medium text-gray-300 mb-2">Description</label>
                  <textarea id="description" rows="3" class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="A short description of the media..."></textarea>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                    <label for="category" class="block text-sm font-medium text-gray-300 mb-2">Category</label>
                    <select id="category" class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                            <option>People</option>
                            <option>Cars</option>
                            <option>Cities</option>
                            <option>Animals</option>
                            <option selected>Uncategorized</option>
                        </select>
                    </div>
                    <div>
                    <label for="tags" class="block text-sm font-medium text-gray-300 mb-2">Tags</label>
                    <input type="text" id="tags" class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="e.g., travel, sunset, beach">
                    </div>
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-300 mb-2">Upload Files</label>
                  <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-700 border-dashed rounded-xl">
                    <div class="space-y-2 text-center">
                      <i class="ph ph-images text-5xl text-gray-500 mx-auto"></i>
                      <div class="flex flex-col items-center text-sm text-gray-400">
                        <label for="file-upload" class="relative cursor-pointer bg-gray-800 rounded-md font-medium text-cyan-400 hover:text-cyan-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-900 focus-within:ring-cyan-500 px-4 py-2 my-2">
                          <span>Select files</span>
                                    <input id="file-upload" name="file-upload" type="file" class="sr-only" multiple>
                                </label>
                        <p class="text-gray-400">or drag and drop</p>
                        <p class="text-xs text-gray-500 mt-2">PNG, JPG, GIF up to 10MB</p>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="pt-4 flex justify-end">
                  <button type="button" onclick="window.location.href='manage_gallery.html'" class="bg-gray-800 hover:bg-gray-700 text-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3">
                    Cancel
                  </button>
                  <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Upload Files
                  </button>
                </div>
            </form>
            </div>
        </div>
        </section>
      </main>
    </div>
    <script src="assets/js/common.js" defer></script>
</body>
</html> 
