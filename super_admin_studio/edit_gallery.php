<?php 

include("includes.php");

$id = $_GET['id'];

$gallery = getGalleryDetailsByid($id);

$cat_id = $gallery['cat_id'];

$gal_id = $gallery['gal_id'];

$file_path = $gallery['file_path'];

$title = $gallery['title'];



if(isset($_POST['submit'])){

   $title = $_POST['title'];

   $category = $_POST['category'];

   $newimg =  $_FILES['newimg']['name'];

  //  $upload_success = true; // Flag to track upload success

  //  $image = $_POST['oldimg'];


   if($newimg != ''){
       
    $file_tmp = $_FILES['newimg'] ['tmp_name'];
        
    $file_size = $_FILES['newimg'] ['size'];

    // Validate file extension
        $ext = strtolower(pathinfo($newimg, PATHINFO_EXTENSION));

        $allowed_exts = ['jpg', 'jpeg', 'png'];

        $max_size = 10 * 1024 * 1024; // 10MB

        if (in_array($ext, $allowed_exts)) {

            // Validate file size
           if ($file_size > $max_size) {

            echo "<script>window.alert('File too large: $newimg');</script>";

            // $upload_success = false;
           
           }else{

             // Upload directory
             $image = uniqid() . '_' . basename($newimg);

             $upload_path = 'assets/images/gallery/' . $image;

             // Move file
            move_uploaded_file($file_tmp, $upload_path);

            

           }


        }else{

            echo "<script>window.alert('Invalid file type: $newimg');</script>";

            // $upload_success = false;

          
        }
   }else{

            $image =  $_POST['oldimg'];
            
   }

               // DB insert
               $qry = "UPDATE studio_gallery SET title = '$title', cat_id = '$category', file_path = '$image' WHERE gal_id = '$id'";
               $run = mysqli_query($conn, $qry);

               if ($run) {

                  echo "<script>window.alert('Update Successfully');</script>";

                  echo "<script>window.location.assign('manage_gallery.php');</script>";

               }else{

                echo "<script>window.alert('DB insert failed: " . mysqli_error($conn) . "');</script>";

                echo "<script>window.location.assign('manage_gallery.php');</script>";

               }

}

 ?>
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Gallery Item - Admin Panel</title>
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
        <!-- Edit Gallery Page -->
        <section>
          <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div>
              <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-1 flex items-center gap-3">
                <i class="ph ph-pencil-simple"></i> Edit Gallery Item
              </h1>
              <div class="text-gray-400 text-sm">Update image information</div>
            </div>
            <div class="flex items-center gap-2">
              <a href="manage_gallery.html" class="flex items-center gap-2 text-gray-400 hover:text-white text-sm font-medium px-3 py-2 rounded-lg transition">
                <i class="ph ph-arrow-left"></i> Back to Gallery
              </a>
            </div>
          </div>
          
          <!-- Edit Form -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Image Preview -->
            <div class="bg-gray-950/50 backdrop-blur-sm rounded-2xl border border-gray-800 shadow-2xl overflow-hidden">
              <div class="p-4">
                <h2 class="text-lg font-semibold text-white mb-4">Image Preview</h2>
                <div class="relative rounded-xl overflow-hidden mb-4">
                  <img id="preview-image" src="assets/images/gallery/<?php echo $file_path ?>" alt="Image preview" class="w-full aspect-square object-cover">
                </div>
                <!-- <div class="flex justify-center">
                  <label for="replace-image" class="cursor-pointer bg-gray-800 hover:bg-gray-700 text-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center flex items-center gap-2">
                    <i class="ph ph-image"></i> Replace Image
                    <input type="file" name="newimg" id="replace-image" class="hidden" accept="image/*">
                  </label>
                </div> -->
              </div>
            </div>
            
            <!-- Edit Form -->
            <div class="bg-gray-950/50 backdrop-blur-sm rounded-2xl border border-gray-800 shadow-2xl overflow-hidden md:col-span-2">
              <div class="p-6 md:p-8 space-y-6">
                <form class="space-y-6" method="post" enctype="multipart/form-data">
                  <div>
                    <label for="title" class="block text-sm font-medium text-gray-300 mb-2">Image Title</label>
                    <input type="text" id="title" name="title" value="<?php echo $title ?>" class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                  </div>
                  <div>
                  <label for="replace-image" class="cursor-pointer bg-gray-800 hover:bg-gray-700 text-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center flex items-center gap-2">
                    <i class="ph ph-image"></i> Replace Image
                    <input type="file" name="newimg" id="replace-image" class="hidden" accept="image/*">
                  </label>
                  </div>
                  <!-- <div>
                    <label for="description" class="block text-sm font-medium text-gray-300 mb-2">Description</label>
                    <textarea id="description" rows="3" class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-500">Beautiful coastal landscape with morning mist over the water.</textarea>
                  </div> -->
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                      <label for="category" class="block text-sm font-medium text-gray-300 mb-2">Category</label>
                      <select id="category" name="category" class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-500" required>
                      <option value="">--Select Category--</option>
                      <?php
                      $cat = getAllCategoryDetails();

                      foreach($cat as $c){
                      ?>
                            <option <?php if($cat_id == $c['cat_id']) { echo "selected"; } ?> value="<?php echo $c['cat_id']; ?>"><?php echo  $c['title']; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                    </div>
                    <!-- <div>
                      <label for="tags" class="block text-sm font-medium text-gray-300 mb-2">Tags</label>
                      <input type="text" id="tags" value="coast, water, nature, mist" class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                    </div> -->
                    <div>
                    </div>
                  </div>

                  <input name='oldimg' type="hidden" value="<?php echo $file_path ?>">

                  <!-- <div>
                    <label for="date" class="block text-sm font-medium text-gray-300 mb-2">Date Taken</label>
                    <input type="date" id="date" value="2024-01-20" class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                  </div> -->
                  <div class="pt-4 flex justify-end">
                    <button type="button" onclick="window.location.href='manage_gallery.html'" class="bg-gray-800 hover:bg-gray-700 text-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3">
                      Cancel
                    </button>
                    <button type="submit" name = "submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                      Save Changes
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      </main>
    </div>
    <script src="assets/js/common.js" defer></script>
    <script>
      // Preview image replacement
      document.getElementById('replace-image').addEventListener('change', function(e) {
        if (e.target.files && e.target.files[0]) {
          const reader = new FileReader();
          reader.onload = function(e) {
            document.getElementById('preview-image').src = e.target.result;
          }
          reader.readAsDataURL(e.target.files[0]);
        }
      });
    </script>
</body>
</html>
