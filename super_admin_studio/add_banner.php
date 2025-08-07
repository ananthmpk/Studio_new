<?php

include("includes.php");

if (isset($_POST['submit'])) {

  $title = $_POST['title'];

  $description = $_POST['description'];

  $file = $_FILES['bannerImage']['name'];

  $file_tmp = $_FILES['bannerImage']['tmp_name'];

  $file_size = $_FILES['bannerImage']['size'];

  $allowed_exts = ['jpg', 'jpeg', 'png'];

  $max_size = 10 * 1024 * 1024; // 10MB

  // Validate file extension
  $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

  if (in_array($ext, $allowed_exts)) {

    if ($file_size > $max_size) {

      echo "<script>window.alert('File too large: $file');</script>";
    } else {

      // Upload directory
      $image = uniqid() . '_' . basename($file);

      $upload_path = 'assets/images/banner/' . $image;

      // Move file
      // move_uploaded_file($file_tmp, $upload_path);

      if (move_uploaded_file($file_tmp, $upload_path)) {
        // DB insert
        $qry = "INSERT INTO studio_banner (title, description, file_path) VALUES ('$title', '$description', '$image')";
        $run = mysqli_query($conn, $qry);

        if ($run) {

          echo "<script>window.alert('Upload completed!');</script>";

          echo "<script>window.location.assign('manage_gallery.php');</script>";

        } else {

          echo "<script>window.alert('DB insert failed: " . mysqli_error($conn) . "');</script>";

        }
      } else {

        echo "<script>window.alert('Failed to upload: $file');</script>";
      }
    }
    
  } else {

    echo "<script>window.alert('Invalid file type: $file');</script>";

  }
}

?>


<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Banner - Admin Panel</title>
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
      <!-- Add Banner Page -->
      <section>
        <div class="flex items-center justify-between mb-8">
          <div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-1 flex items-center gap-3">
              <i class="ph ph-image-plus"></i> Add Banner
            </h1>
            <div class="text-gray-400 text-sm">Create a new website banner</div>
          </div>
          <div>
            <a href="manage_banner.php" class="text-gray-400 hover:text-white flex items-center gap-2">
              <i class="ph ph-arrow-left"></i> Back to Banners
            </a>
          </div>
        </div>

        <!-- Add Banner Form -->
        <div class="bg-gray-950/50 backdrop-blur-sm rounded-2xl border border-gray-800 shadow-2xl p-6 md:p-8">
          <form method="post" enctype="multipart/form-data" id="addBannerForm" class="space-y-6">
            <!-- Banner Information -->
            <div class="space-y-4">
              <h2 class="text-xl font-semibold text-white border-b border-gray-800 pb-2">Banner Information</h2>

              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Title -->
                <div class="md:col-span-2">
                  <label for="title" class="block text-sm font-medium text-gray-300 mb-1">Banner Title <span class="text-red-500">*</span></label>
                  <input type="text" id="title" name="title" class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="e.g., Welcome Banner" required>
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                  <label for="description" class="block text-sm font-medium text-gray-300 mb-1">Description <span class="text-red-500">*</span></label>
                  <textarea id="description" name="description" rows="3" class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="Enter banner description..." required></textarea>
                </div>

                <!-- Banner Image -->
                <div class="md:col-span-2">
                  <label class="block text-sm font-medium text-gray-300 mb-3">Banner Image <span class="text-red-500">*</span></label>
                  <div class="flex flex-col items-center justify-center border-2 border-dashed border-gray-700 rounded-lg p-6 bg-gray-800/50">
                    <div id="previewContainer" class="hidden mb-4 w-full max-w-md">
                      <img id="imagePreview" src="#" alt="Banner Preview" class="w-full h-auto rounded-lg">
                    </div>
                    <div class="flex flex-col items-center text-center">
                      <i class="ph ph-image-square text-gray-400 text-4xl mb-2"></i>
                      <p class="text-sm text-gray-400 mb-2">Drag and drop your image here, or click to browse</p>
                      <p class="text-xs text-gray-500 mb-3">Recommended size: 1200 x 400 pixels (JPG, PNG, WebP)</p>
                      <label class="cursor-pointer bg-gray-700 hover:bg-gray-600 text-gray-200 px-4 py-2 rounded-lg text-sm">
                        <span>Select Image</span>
                        <input type="file" id="bannerImage" name="bannerImage" accept="image/*" class="hidden" onchange="previewImage(this)" required>
                      </label>
                    </div>
                  </div>
                </div>

                <!-- Link URL -->
                <!-- <div class="md:col-span-2">
                    <label for="linkUrl" class="block text-sm font-medium text-gray-300 mb-1">Link URL</label>
                    <input type="url" id="linkUrl" name="linkUrl" class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="https://example.com/page">
                    <p class="text-xs text-gray-500 mt-1">Where users will go when they click on the banner</p>
                  </div> -->

                <!-- Status -->
                <!-- <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Status</label>
                    <div class="flex items-center gap-3">
                      <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" id="status" name="status" value="active" class="sr-only peer" checked>
                        <div class="w-11 h-6 bg-gray-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        <span class="ml-3 text-sm font-medium text-gray-300">Active</span>
                      </label>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Toggle to enable or disable this banner</p>
                  </div> -->

                <!-- Display Order -->
                <!-- <div>
                    <label for="displayOrder" class="block text-sm font-medium text-gray-300 mb-1">Display Order</label>
                    <input type="number" id="displayOrder" name="displayOrder" min="1" value="1" class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                    <p class="text-xs text-gray-500 mt-1">Lower numbers appear first</p>
                  </div> -->
              </div>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end pt-4 border-t border-gray-800">
              <button type="button" onclick="window.location.href='manage_banner.php'" class="text-gray-300 bg-gray-800 hover:bg-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3">Cancel</button>
              <button type="submit" name="submit" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add Banner</button>
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
      const previewContainer = document.getElementById('previewContainer');
      const imagePreview = document.getElementById('imagePreview');

      if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
          imagePreview.src = e.target.result;
          previewContainer.classList.remove('hidden');
        }

        reader.readAsDataURL(input.files[0]);
      } else {
        imagePreview.src = '';
        previewContainer.classList.add('hidden');
      }
    }

    // Toggle status label
    document.getElementById('status').addEventListener('change', function() {
      const label = this.nextElementSibling.nextElementSibling;
      label.textContent = this.checked ? 'Active' : 'Inactive';
    });

    // Form submission
    document.getElementById('addBannerForm').addEventListener('submit', function(e) {
      e.preventDefault();

      // Validate form
      const title = document.getElementById('title').value;
      const description = document.getElementById('description').value;
      const bannerImage = document.getElementById('bannerImage').files[0];

      if (!title || !description || !bannerImage) {
        alert('Please fill in all required fields and upload a banner image.');
        return;
      }

      // Here you would normally send the data to the server
      // For demo purposes, we'll just redirect back to the banner list
      alert('Banner added successfully!');
      window.location.href = 'manage_banner.php';
    });
  </script>
</body>

</html>