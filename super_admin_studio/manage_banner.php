<?php
include("includes.php");
?>

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
              <a href="add_banner.php" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg shadow transition flex items-center gap-2">
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
                <?php
                  $banner = getAllBannerDetails();

                  foreach($banner as $ban){
                      $ban_id = $ban['ban_id'];
                      $title = $ban['title'];
                      $descrip = $ban['description'];
                      $file = $ban['file_path'];
                      $status = $ban['status'];
                      $date = $ban['created_at'];
                ?>
                <tr>
                  <td>
                    <div class="flex items-center gap-3">
                      <div class="banner-thumbnail">
                        <img src="assets/images/banner/<?php echo $file ?>" alt="Banner" class="w-full h-full object-cover">
                      </div>
                      <div class="font-medium text-white"><?php echo $title ?></div>
                    </div>
                  </td>
                  <td class="hidden md:table-cell">
                    <div class="line-clamp-2 text-sm"><?php echo $descrip; ?></div>
                  </td>
                  <td class="hidden md:table-cell">
                    <label class="toggle-switch">
                      <input type="checkbox" 
                             data-banner-id="<?php echo $ban_id; ?>" 
                             class="status-toggle"
                             <?php echo ($status == 1) ? 'checked' : ''; ?>>
                      <span class="toggle-slider"></span>
                    </label>
                  </td>
                  <td class="hidden lg:table-cell"><?php echo $date ?></td>
                  <td class="text-right">
                    <a href="edit_banner.php?id=<?php echo $ban_id; ?>" class="text-gray-400 hover:text-white p-2">
                      <i class="ph ph-pencil-simple"></i>
                    </a>
                    <a href="delete_banner.php?id=<?php echo $ban_id; ?>" class="text-gray-400 hover:text-red-400 p-2">
                      <i class="ph ph-trash"></i>
                    </a>
                  </td>
                </tr>
                <?php
                  }
                ?>
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
    
    <!-- Toggle Status Script -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM loaded, initializing toggles...');
        
        // All toggle switches select pannalam
        const toggles = document.querySelectorAll('.status-toggle');
        console.log('Found toggles:', toggles.length);
        
        toggles.forEach(toggle => {
            console.log('Adding listener to toggle:', toggle);
            
            toggle.addEventListener('change', function(e) {
                console.log('Toggle clicked!');
                
                const bannerId = this.getAttribute('data-banner-id');
                // Explicitly convert pannalam
                const newStatus = this.checked ? 1 : 0;
                
                console.log('Banner ID:', bannerId, 'New Status:', newStatus, 'Checked:', this.checked);
                
                // Loading state show pannalam
                this.disabled = true;
                
                // Form data properly format pannalam
                const formData = new FormData();
                formData.append('banner_id', bannerId);
                formData.append('status', newStatus);
                
                // AJAX call panni status update pannalam
                fetch('update_banner_status.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    console.log('Response received:', response);
                    return response.json();
                })
                .then(data => {
                    console.log('Response data:', data);
                    
                    this.disabled = false; // Enable back pannalam
                    
                    if (data.success) {
                        console.log('Status updated successfully');
                        // Optional: Success notification
                        showNotification('Status updated successfully!', 'success');
                    } else {
                        console.error('Failed to update status:', data.message);
                        // Toggle-ah original position-ku return pannalam if error
                        this.checked = !this.checked;
                        showNotification('Failed to update status: ' + data.message, 'error');
                    }
                })
                .catch(error => {
                    console.error('AJAX Error:', error);
                    this.disabled = false; // Enable back pannalam
                    // Toggle-ah original position-ku return pannalam if error
                    this.checked = !this.checked;
                    showNotification('Connection error occurred', 'error');
                });
            });
        });
        
        // Simple notification function
        function showNotification(message, type) {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 p-4 rounded-lg text-white z-50 ${type === 'success' ? 'bg-green-600' : 'bg-red-600'}`;
            notification.textContent = message;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }
    });
    </script>
</body>
</html>