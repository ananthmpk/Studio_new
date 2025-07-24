<?php

include("includes.php");

?>

<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Categories - Admin Panel</title>
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
        <!-- Categories Page -->
        <section>
          <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div>
              <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-1">Categories</h1>
              <div class="text-gray-400 text-sm">Manage your gallery categories</div>
            </div>
            <div class="flex items-center gap-2 md:gap-4 mt-2 md:mt-0">
              <a href="add_category.php" id="addNewButton" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg shadow transition flex items-center gap-2">
                <i class="ph ph-plus"></i> Add new
              </a>
            </div>
          </div>
          
          <!-- Search Bar -->
          <div class="mb-6">
            <div class="search-container w-full max-w-md">
              <i class="ph ph-magnifying-glass search-icon"></i>
              <input type="text" class="search-input" placeholder="Search categories..." />
            </div>
          </div>
          
          <!-- Categories Table -->
          <div class="overflow-hidden rounded-xl shadow-lg mb-6">
            <table class="data-table w-full">
              <thead>
                <tr>
                  <th class="w-16">#</th>
                  <th>Category Name</th>
                  <!-- <th>Description</th> -->
                  <th>Status</th>
                  <th class="w-32">Images</th>
                  <th class="w-24 text-right">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php

                  $category = getAllCategoryDetails();
                  $x=1;
                  foreach($category as $cat){
                    $title = $cat['title'];
                    $status = $cat['status'];
                    $cat_id = $cat['cat_id'];


                  ?>
                <tr>   
                  <td><?php echo $x; ?></td>
                  <td class="font-medium text-white"><?php echo $title; ?></td>
                  <!-- <td class="max-w-xs truncate">Beautiful landscapes and natural scenery from around the world</td> -->
                    <?php
                    if($status == 1){
                    ?>
                   <td><span class="status-badge active">Active</span></td>
                    <?php
                    }else if($status == 0){
                    ?>
                    <td><span class="status-badge inactive">Inactive</span></td>
                    <?php
                    }
                    ?>
                  <td>42</td>
                  <td>
                    <div class="flex justify-end">
                      <div class="relative">
                        <!-- <button class="dropdown-btn" onclick="toggleDropdown(this)">
                          <i class="ph ph-dots-three-outline"></i>
                        </button> -->
                        <div class="mt-1 w-36 flex">
                          <a href="edit_category.php?id=<?php echo $cat_id; ?>" class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-700 flex items-center gap-2">
                            <i class="ph ph-pencil"></i>
                          </a>
                          <a href="delete_category.php?id=<?php echo $cat_id; ?>" class="block px-4 py-2 text-sm text-red-400 hover:bg-gray-700 flex items-center gap-2">
                            <i class="ph ph-trash"></i> 
                          </a>
                        </div>
                      </div>
                    </div>
                  </td>
                  </tr> 

                  <?php

                  $x = $x + 1;
                  }
                  
                  ?>
                   
              </tbody>
            </table>
          </div>
          
          <!-- No Results Message -->
          <div class="no-results" style="display: none;">
            <div class="text-center py-10">
              <i class="ph ph-magnifying-glass-minus text-gray-500 text-4xl mb-4"></i>
              <p class="text-gray-300 text-lg">No categories found matching your search</p>
            </div>
          </div>
          
          <!-- Pagination -->
          <div class="pagination" data-items-per-page="5" data-current-page="1"></div>
        </section>
      </main>
    </div>

    <script src="assets/js/common.js"></script>
    <script src="assets/js/category.js"></script>
</body>
</html> 
