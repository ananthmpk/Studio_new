<?php
include("includes.php");

$id = $_GET['id'];

$arr = getAllInstaImagesById($id);

$title = $arr['title'];

$status = $arr['status'];

$file = $arr['file_path'];



if(isset($_POST['submit'])){

   $title = $_POST['title'];

   $newimg =  $_FILES['newimg']['name'];

   if($newimg != ''){
       
    $file_tmp = $_FILES['newimg'] ['tmp_name'];
        
    $file_size = $_FILES['newimg'] ['size'];

    // Validate file extension
        $ext = strtolower(pathinfo($newimg, PATHINFO_EXTENSION));

        $allowed_exts = ['jpg', 'jpeg', 'png'];

        $max_size = 5 * 1024 * 1024; // 10MB

        if (in_array($ext, $allowed_exts)) {

            // Validate file size
           if ($file_size > $max_size) {

            echo "<script>window.alert('File too large: $newimg');</script>";

           
           }else{

             // Upload directory
             $image = uniqid() . '_' . basename($newimg);

             $upload_path = 'assets/images/instagram/' . $image;

             // Move file
            move_uploaded_file($file_tmp, $upload_path);

           }


        }else{

            echo "<script>window.alert('Invalid file type: $newimg');</script>";
          
        }
   }else{

            $image =  $_POST['oldimg'];
            
   }

               // DB insert
               $qry = "UPDATE studio_insta_img SET title = '$title', status = '$status', file_path = '$image' WHERE id = '$id'";
               $run = mysqli_query($conn, $qry);

               if ($run) {

                  echo "<script>window.alert('Update Successfully');</script>";

                  echo "<script>window.location.assign('manage_insta_img.php');</script>";

               }else{

                echo "<script>window.alert('DB insert failed: " . mysqli_error($conn) . "');</script>";

                echo "<script>window.location.assign('manage_insta_img.php');</script>";

               }

}



?>


<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Instagram Photo - Admin Panel</title>
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
        <!-- Edit Instagram Photo Page -->
        <section>
          <div class="flex items-center justify-between mb-8">
            <div>
              <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-1 flex items-center gap-3">
                <i class="ph ph-pencil-simple"></i> Edit Instagram Photo
              </h1>
              <div class="text-gray-400 text-sm">Update your Instagram photo details</div>
            </div>
            <div>
              <a href="manage_insta_img.php" class="text-gray-400 hover:text-white flex items-center gap-2">
                <i class="ph ph-arrow-left"></i> Back to Gallery
              </a>
            </div>
          </div>
          
          <!-- Edit Photo Form -->
          <div class="bg-gray-950/50 backdrop-blur-sm rounded-2xl border border-gray-800 shadow-2xl p-6 md:p-8">
            <form method="post" enctype="multipart/form-data" id="editPhotoForm" class="space-y-6">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Left Column: Photo Upload -->
                <div class="space-y-6">
                  <h2 class="text-xl font-semibold text-white border-b border-gray-800 pb-2">Current Photo</h2>
                  
                  <!-- Photo Upload Area -->
                  <div>
                    <div class="flex flex-col items-center justify-center border-2 border-dashed border-gray-700 rounded-xl p-6 bg-gray-800/50 min-h-[300px]">
                      <div id="previewContainer" class="mb-4 w-full">
                        <img id="imagePreview" src="assets/images/instagram/<?php echo $file ?>" alt="Photo Preview" class="w-full h-auto rounded-lg max-h-[300px] object-contain mx-auto">
                      </div>
                      <div class="mt-4 w-full">
                        <label class="cursor-pointer bg-gray-700 hover:bg-gray-600 text-gray-200 px-4 py-2 rounded-lg text-sm inline-block">
                          <span>Change Photo</span>
                          <input type="file" id="photoUpload" name="newimg" accept="image/*" class="hidden" onchange="previewImage(this)">
                        </label>
                      </div>
                    </div>
                    <p class="text-xs text-gray-500 mt-2">Maximum file size: 5MB. Supported formats: JPG, PNG, WebP</p>
                  </div>

                </div>

                <input name='oldimg' type="hidden" value="<?php echo $file ?>">
                
                <!-- Right Column: Photo Details -->
                <div class="space-y-6">
                  <h2 class="text-xl font-semibold text-white border-b border-gray-800 pb-2">Photo Details</h2>
                  
                  <!-- Title -->
                  <div>
                    <label for="title" class="block text-sm font-medium text-gray-300 mb-1">Title <span class="text-red-500">*</span></label>
                    <input type="text" id="title" name="title" value="<?php echo $title ?>" class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500" required>
                  </div>
                  
                 <!-- Status -->
                <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Status</label>
                <div class="flex gap-4">
                  <div class="flex items-center">
                    <input type="radio" id="statusActive" name="status" value="1" class="h-4 w-4 text-blue-600 bg-gray-700 border-gray-500 focus:ring-blue-500" <?php if($status == 1) echo "checked" ?>>
                    <label for="statusActive" class="ml-2 text-sm text-gray-300">Active</label>
                  </div>
                  <div class="flex items-center">
                    <input type="radio" id="statusInactive" name="status" value="0" class="h-4 w-4 text-blue-600 bg-gray-700 border-gray-500 focus:ring-blue-500" <?php if($status == 0) echo "checked" ?>>
                    <label for="statusInactive" class="ml-2 text-sm text-gray-300">Inactive</label>
                  </div>
                </div>
              </div>
                </div>
              </div>
              
              <!-- Form Actions -->
              <div class="flex items-center justify-end pt-4 border-t border-gray-800">
                <button type="button" onclick="window.location.href='manage_insta_img.php'" class="text-gray-300 bg-gray-800 hover:bg-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3">Cancel</button>
                <button type="submit" name="submit" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Save Changes</button>
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
        const imagePreview = document.getElementById('imagePreview');
        
        if (input.files && input.files[0]) {
          const reader = new FileReader();
          
          reader.onload = function(e) {
            imagePreview.src = e.target.result;
            
            // Update filter previews
            document.getElementById('filter-normal').src = e.target.result;
            document.getElementById('filter-clarendon').src = e.target.result;
            document.getElementById('filter-gingham').src = e.target.result;
            document.getElementById('filter-moon').src = e.target.result;
          }
          
          reader.readAsDataURL(input.files[0]);
        }
      }
      
      // Toggle status label
      document.getElementById('status').addEventListener('change', function() {
        const label = this.nextElementSibling.nextElementSibling;
        label.textContent = this.checked ? 'Active' : 'Inactive';
      });
      
      // Filter selection
      document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
          // Remove active class from all filter buttons
          document.querySelectorAll('.filter-btn').forEach(el => {
            el.classList.remove('border-blue-500');
          });
          
          // Add active class to clicked button
          this.classList.add('border-blue-500');
          
          // Apply filter to main preview (in a real app, you would apply CSS filters)
          const filter = this.getAttribute('data-filter');
          console.log(`Selected filter: ${filter}`);
        });
      });
      
      // Form submission
      document.getElementById('editPhotoForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validate form
        const title = document.getElementById('title').value;
        
        if (!title) {
          alert('Please add a title for the photo.');
          return;
        }
        
        // Here you would normally send the data to the server
        // For demo purposes, we'll just redirect back to the gallery
        alert('Photo updated successfully!');
        window.location.href = 'manage_insta_img.php';
      });

      // Load photo data from URL parameter
      document.addEventListener('DOMContentLoaded', () => {
        // Get photo ID from URL parameter
        const urlParams = new URLSearchParams(window.location.search);
        const photoId = urlParams.get('id');
        
        if (photoId) {
          document.querySelector('h1').innerHTML += ` <span class="text-gray-400 text-xl font-normal">#${photoId}</span>`;
          // In a real app, you would fetch photo data from the server based on the ID
        }
      });
    </script>
    
    <style>
      /* Instagram-like filters (simplified versions) */
      .filter-clarendon {
        filter: contrast(1.2) saturate(1.35);
      }
      .filter-gingham {
        filter: brightness(1.05) sepia(0.2);
      }
      .filter-moon {
        filter: grayscale(1) brightness(1.1) contrast(1.1);
      }
    </style>
</body>
</html>
