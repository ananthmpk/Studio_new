<?php

include("includes.php");

$id = $_GET['id'];

$arr = getCatDetailsByid($id);


if(isset($_POST['submit'])){

  $title = $_POST['category'];
  $status = $_POST['status'];

  $qry = "UPDATE studio_category SET title='$title', status='$status' WHERE cat_id ='$id'";
  $run = mysqli_query($GLOBALS['conn'],$qry);

  if($run){
    
    echo"<script>window.location.assign('manage_category.php')</script>";

  }else{
    
    echo"<script>window.alert('Please Try Again Later')</script>";
  }

}

?>
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Category - Admin Panel</title>
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
        <!-- Edit Category Page -->
        <section>
          <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div>
              <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-1 flex items-center gap-3">
                <i class="ph ph-pencil-simple"></i> Edit Category
              </h1>
              <div class="text-gray-400 text-sm">Update category information</div>
            </div>
            <div class="flex items-center gap-2">
              <a href="manage_category.php" class="flex items-center gap-2 text-gray-400 hover:text-white text-sm font-medium px-3 py-2 rounded-lg transition">
                <i class="ph ph-arrow-left"></i> Back to Categories
              </a>
            </div>
          </div>
          
          <!-- Edit Form -->
          <div class="bg-gray-950/50 backdrop-blur-sm rounded-2xl border border-gray-800 shadow-2xl overflow-hidden">
            <div class="p-6 md:p-8 space-y-6">
              <div class="flex items-center gap-4 mb-6">
                <div class="w-16 h-16 rounded-lg bg-gradient-to-br from-blue-500 to-cyan-400 flex items-center justify-center">
                  <i class="ph ph-mountains text-white text-3xl"></i>
                </div>
                <div>
                  <h2 class="text-2xl font-bold text-white"><?php echo $arr['title']; ?></h2>
                  <p class="text-gray-400">Created <?php echo $arr['created_at']; ?></p>
                </div>
              </div>
              
              <form class="space-y-6" method="post">
                <div>
                  <label for="category-name" class="block text-sm font-medium text-gray-300 mb-2">Category Name</label>
                  <input type="text" name="category" id="category-name" value="<?php echo $arr['title']; ?>" class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">     
                  <div>
                    <label for="category-status" class="block text-sm font-medium text-gray-300 mb-2">Status</label>
                    <div class="flex items-center gap-4 mt-3">
                      <label class="inline-flex items-center">
                        <input type="radio" name="status" value="1" class="text-blue-600 focus:ring-blue-500" <?php if($arr['status'] == 1) echo "checked" ?>>
                        <span class="ml-2 text-gray-300">Active</span>
                      </label>
                      <label class="inline-flex items-center">
                        <input type="radio" name="status" value="0" class="text-gray-600 focus:ring-gray-500" <?php if($arr['status'] == 0) echo "checked" ?>>
                        <span class="ml-2 text-gray-300">Inactive</span>
                      </label>
                    </div>
                  </div>
                </div>
                
                
                <div class="pt-4 flex justify-end">
                  <button type="button" onclick="window.location.href='manage_category.php'" class="bg-gray-800 hover:bg-gray-700 text-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3">
                    Cancel
                  </button>
                  <button type="submit" name="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Save Changes
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
