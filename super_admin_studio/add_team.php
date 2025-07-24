<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Team Member - Admin Panel</title>
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
        <!-- Add Team Member Page -->
        <section>
          <div class="flex items-center justify-between mb-8">
            <div>
              <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-1 flex items-center gap-3">
                <i class="ph ph-user-plus"></i> Add Team Member
              </h1>
              <div class="text-gray-400 text-sm">Create a new team member profile</div>
            </div>
            <div>
              <a href="manage_team.html" class="text-gray-400 hover:text-white flex items-center gap-2">
                <i class="ph ph-arrow-left"></i> Back to Team
              </a>
            </div>
          </div>
          
          <!-- Add Team Member Form -->
          <div class="bg-gray-950/50 backdrop-blur-sm rounded-2xl border border-gray-800 shadow-2xl p-6 md:p-8">
            <form id="addTeamForm" class="space-y-6">
              <!-- Personal Information Section -->
              <div class="space-y-4">
                <h2 class="text-xl font-semibold text-white border-b border-gray-800 pb-2">Personal Information</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <!-- Profile Image -->
                  <div class="md:col-span-2 flex flex-col items-center">
                    <div class="w-24 h-24 rounded-full bg-gray-800 border-2 border-gray-700 flex items-center justify-center overflow-hidden mb-2">
                      <img id="profilePreview" src="https://via.placeholder.com/150?text=Profile" alt="Profile Preview" class="w-full h-full object-cover">
                    </div>
                    <label class="cursor-pointer bg-gray-800 hover:bg-gray-700 text-gray-300 px-4 py-2 rounded-lg text-sm">
                      <span>Upload Photo</span>
                      <input type="file" id="profileImage" accept="image/*" class="hidden" onchange="previewImage(this)">
                    </label>
                  </div>
                  
                  <!-- Name -->
                  <div>
                    <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Full Name <span class="text-red-500">*</span></label>
                    <input type="text" id="name" name="name" class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="John Smith" required>
                  </div>
                  
                  <!-- Email -->
                  <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email <span class="text-red-500">*</span></label>
                    <input type="email" id="email" name="email" class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="john@example.com" required>
                  </div>
                  
                  <!-- Role -->
                  <div>
                    <label for="role" class="block text-sm font-medium text-gray-300 mb-1">Role <span class="text-red-500">*</span></label>
                    <input type="text" id="role" name="role" class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="CEO & Founder" required>
                  </div>
                  
                  <!-- Status -->
                  <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Status</label>
                    <div class="flex items-center gap-4">
                      <label class="inline-flex items-center">
                        <input type="radio" name="status" value="active" class="text-blue-600 focus:ring-blue-500" checked>
                        <span class="ml-2 text-gray-300">Active</span>
                      </label>
                      <label class="inline-flex items-center">
                        <input type="radio" name="status" value="inactive" class="text-gray-600 focus:ring-gray-500">
                        <span class="ml-2 text-gray-300">Inactive</span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Social Media Section -->
              <div class="space-y-4">
                <h2 class="text-xl font-semibold text-white border-b border-gray-800 pb-2">Social Media Links</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <!-- Facebook -->
                  <div>
                    <label for="facebook" class="block text-sm font-medium text-gray-300 mb-1 flex items-center gap-2">
                      <i class="ph ph-facebook-logo text-blue-400"></i> Facebook
                    </label>
                    <input type="url" id="facebook" name="facebook" class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="https://facebook.com/username">
                  </div>
                  
                  <!-- Instagram -->
                  <div>
                    <label for="instagram" class="block text-sm font-medium text-gray-300 mb-1 flex items-center gap-2">
                      <i class="ph ph-instagram-logo text-pink-400"></i> Instagram
                    </label>
                    <input type="url" id="instagram" name="instagram" class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="https://instagram.com/username">
                  </div>
                  
                  <!-- WhatsApp -->
                  <div>
                    <label for="whatsapp" class="block text-sm font-medium text-gray-300 mb-1 flex items-center gap-2">
                      <i class="ph ph-whatsapp-logo text-green-400"></i> WhatsApp
                    </label>
                    <input type="tel" id="whatsapp" name="whatsapp" class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="+1234567890">
                  </div>
                  
                  <!-- LinkedIn -->
                  <div>
                    <label for="linkedin" class="block text-sm font-medium text-gray-300 mb-1 flex items-center gap-2">
                      <i class="ph ph-linkedin-logo text-blue-500"></i> LinkedIn
                    </label>
                    <input type="url" id="linkedin" name="linkedin" class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="https://linkedin.com/in/username">
                  </div>
                </div>
              </div>
              
              <!-- Additional Information Section -->
              <div class="space-y-4">
                <h2 class="text-xl font-semibold text-white border-b border-gray-800 pb-2">Additional Information</h2>
                
                <div>
                  <label for="bio" class="block text-sm font-medium text-gray-300 mb-1">Bio</label>
                  <textarea id="bio" name="bio" rows="4" class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="Write a short bio..."></textarea>
                </div>
              </div>
              
              <!-- Form Actions -->
              <div class="flex items-center justify-end pt-4 border-t border-gray-800">
                <button type="button" onclick="window.location.href='manage_team.html'" class="text-gray-300 bg-gray-800 hover:bg-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3">Cancel</button>
                <button type="submit" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add Team Member</button>
              </div>
            </form>
          </div>
        </section>
      </main>
    </div>

    <script src="assets/js/common.js" defer></script>
    <script>
      // Preview uploaded image
      function previewImage(input) {
        if (input.files && input.files[0]) {
          const reader = new FileReader();
          
          reader.onload = function(e) {
            document.getElementById('profilePreview').src = e.target.result;
          }
          
          reader.readAsDataURL(input.files[0]);
        }
      }
      
      // Form submission
      document.getElementById('addTeamForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validate form
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const role = document.getElementById('role').value;
        
        if (!name || !email || !role) {
          alert('Please fill in all required fields.');
          return;
        }
        
        // Here you would normally send the data to the server
        // For demo purposes, we'll just redirect back to the team list
        alert('Team member added successfully!');
        window.location.href = 'manage_team.html';
      });
    </script>
</body>
</html>
