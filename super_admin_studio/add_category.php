<?PHP
include("includes.php");


if(isset($_POST['submit'])){

  $category_name = $_POST['categoryName'];
  $status = $_POST['status'];

  // echo $category_name ;
  // die();
  
  $qry = "INSERT INTO studio_category (title,status) VALUES ('$category_name','$status')";
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
    <title>Add Category - Admin Panel</title>
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
        <!-- Add Category Page -->
        <section>
          <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div>
              <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-1 flex items-center gap-3">
                <i class="ph ph-plus-circle"></i> Add New Category
              </h1>
              <div class="text-gray-400 text-sm">Create a new category for your gallery items</div>
            </div>
            <div class="flex items-center gap-2">
              <a href="manage_category.php" class="flex items-center gap-2 text-gray-400 hover:text-white text-sm font-medium px-3 py-2 rounded-lg transition">
                <i class="ph ph-arrow-left"></i> Back to Categories
              </a>
            </div>
          </div>
          
          <!-- Add Category Form -->
          <div class="bg-gray-800 rounded-xl p-6 shadow-lg">
            <form method="post" id="addCategoryForm" class="space-y-6">
              <div>
                <label for="categoryName" class="block text-sm font-medium text-gray-300 mb-1">Category Name</label>
                <input type="text" id="categoryName" name="categoryName" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter category name" required>
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Status</label>
                <div class="flex gap-4">
                  <div class="flex items-center">
                    <input type="radio" id="statusActive" name="status" value="1" class="h-4 w-4 text-blue-600 bg-gray-700 border-gray-500 focus:ring-blue-500" checked>
                    <label for="statusActive" class="ml-2 text-sm text-gray-300">Active</label>
                  </div>
                  <div class="flex items-center">
                    <input type="radio" id="statusInactive" name="status" value="0" class="h-4 w-4 text-blue-600 bg-gray-700 border-gray-500 focus:ring-blue-500">
                    <label for="statusInactive" class="ml-2 text-sm text-gray-300">Inactive</label>
                  </div>
                </div>
              </div>
              
              <div class="flex justify-end gap-3">
                <button type="button" onclick="window.location.href='manage_category.php'" class="px-5 py-2.5 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition">
                  Cancel
                </button>
                <button type="submit" name="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-500 text-white rounded-lg transition flex items-center gap-2">
                  <i class="ph ph-check"></i> Save Category
                </button>
              </div>
            </form>
          </div>
        </section>
      </main>
    </div>
    
    <!-- <script>
      document.getElementById('addCategoryForm').addEventListener('submit', function(e) {
        e.preventDefault();
        // Here you would typically handle the form submission with AJAX
        alert('Category added successfully!');
        window.location.href = 'manage_category.php';
      });
    </script> -->
    
    <script src="assets/js/common.js" defer></script>
</body>
</html> 
