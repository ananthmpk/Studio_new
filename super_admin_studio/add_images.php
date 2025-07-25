<?php


include('includes.php');

if(isset($_POST['submit'])) {

//  echo "<h1 style='color:white;'>Form submitted</h1>";
// print_r($_FILES);
// exit;

    $category = $_POST['category'];
    $files = $_FILES['files'];

    $allowed_exts = ['jpg', 'jpeg', 'png'];
    $max_size = 10 * 1024 * 1024; // 10MB

    for ($i = 0; $i < count($files['name']); $i++) {

        $file_name = $files['name'][$i];
        $file_tmp = $files['tmp_name'][$i];
        $file_size = $files['size'][$i];

        // Validate file extension
        $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (!in_array($ext, $allowed_exts)) {
            echo "<script>window.alert('Invalid file type: $file_name');</script>";
            continue;
        }

        // Validate file size
        if ($file_size > $max_size) {
            echo "<script>window.alert('File too large: $file_name');</script>";
            continue;
        }

        // Upload directory
        $new_file_name = uniqid() . '_' . basename($file_name);
        $upload_path = 'assets/images/gallery/' . $new_file_name;

        // Move file
        if (move_uploaded_file($file_tmp, $upload_path)) {
            // DB insert
            $qry = "INSERT INTO studio_gallery (cat_id, file_path) VALUES ('$category', '$upload_path')";
            $run = mysqli_query($conn, $qry);

            if (!$run) {
                echo "<script>window.alert('DB insert failed: " . mysqli_error($conn) . "');</script>";
            }

        } else {
            echo "<script>window.alert('Failed to upload: $file_name');</script>";
        }
    }

    echo "<script>window.alert('Upload completed!');</script>";
    echo "<script>window.location.assign('manage_gallery.php');</script>";
}

?>

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
              <a href="manage_gallery.php" class="flex items-center gap-2 text-gray-400 hover:text-white text-sm font-medium px-3 py-2 rounded-lg transition">
                <i class="ph ph-arrow-left"></i> Back to Gallery
              </a>
            </div>
    </div>

          <!-- Upload Form -->
          <div class="bg-gray-950/50 backdrop-blur-sm rounded-2xl border border-gray-800 shadow-2xl overflow-hidden">
            <div class="p-6 md:p-8 space-y-6">
              <form method="post" enctype="multipart/form-data"  class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                    <label for="category" class="block text-sm font-medium text-gray-300 mb-2">Category</label>
                    <select id="category" name="category" class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-500" required>
                      <option value="">--Select Category--</option>
                      <?php
                      $cat = getAllCategoryDetails();
                      foreach($cat as $c){
                      ?>
                            <option value="<?php echo  $c['cat_id']; ?>"><?php echo  $c['title']; ?></option>
                      <?php
                      }
                      ?>
                    </select>
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
                          <input id="file-upload" name="files[]" type="file" class="sr-only" multiple required>
                        </label>
                        <p class="text-xs text-gray-500 mt-2">PNG, JPG up to 10MB</p>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="pt-4 flex justify-end">
                  <button type="button" onclick="window.location.href='manage_gallery.php'" class="bg-gray-800 hover:bg-gray-700 text-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3">
                    Cancel
                  </button>
                  <button type="submit" name="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center">
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
