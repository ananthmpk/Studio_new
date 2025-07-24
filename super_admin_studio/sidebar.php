<!-- Logo -->
<div class="flex items-center gap-2 mb-8 px-2 flex-shrink-0">
  <span class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-gradient-to-tr from-cyan-400 to-blue-500 shadow-lg"><i class="ph ph-camera-plus text-white text-2xl"></i></span>
  <span class="hidden md:inline text-xl font-bold text-white tracking-tight ml-2">PhotoFolio</span>
</div>
<!-- Menu -->
<nav class="sidebar-nav flex-1 flex flex-col gap-2 overflow-y-auto">
  <div class="mb-2">
    <!-- Dashboard -->
    <a href="index.php" class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-400 hover:bg-cyan-700 hover:text-white transition font-medium focus:outline-none focus:ring-2 focus:ring-cyan-400">
      <i class="ph ph-chart-pie text-lg"></i>
      <span class="hidden md:inline">Dashboard</span>
    </a>
    <!-- Banner -->
    <details class="group">
      <summary class="flex items-center gap-3 px-3 py-2 rounded-lg cursor-pointer text-gray-400 hover:bg-cyan-700 hover:text-white transition font-medium focus:outline-none focus:ring-2 focus:ring-cyan-400">
        <i class="ph ph-house text-lg"></i>
        <span class="hidden md:inline">Home</span>
        <i class="ph ph-caret-right submenu-arrow ml-auto transition-transform"></i>
      </summary>
      <div class="ml-10 flex flex-col gap-1 mt-1">
        <a href="manage_banner.php" class="flex items-center gap-2 px-2 py-1 rounded text-gray-300 hover:bg-gray-800 hover:text-white text-sm transition"><i class="ph ph-flag-banner text-xs"></i> Banner</a>
      </div>
    </details> 
    <!-- About -->
    <details class="group">
      <summary class="flex items-center gap-3 px-3 py-2 rounded-lg cursor-pointer text-gray-400 hover:bg-cyan-700 hover:text-white transition font-medium focus:outline-none focus:ring-2 focus:ring-cyan-400">
        <i class="ph ph-info text-lg"></i>
        <span class="hidden md:inline">About</span>
        <i class="ph ph-caret-right submenu-arrow ml-auto transition-transform"></i>
      </summary>
      <div class="ml-10 flex flex-col gap-1 mt-1">
        <a href="manage_team.php" class="flex items-center gap-2 px-2 py-1 rounded text-gray-300 hover:bg-gray-800 hover:text-white text-sm transition"><i class="ph ph-users-three text-xs"></i> Team Manage</a>
      </div>
    </details>
    <!-- Gallery -->
    <details class="group">
      <summary class="flex items-center gap-3 px-3 py-2 rounded-lg cursor-pointer text-gray-400 hover:bg-cyan-700 hover:text-white transition font-medium focus:outline-none focus:ring-2 focus:ring-cyan-400">
        <i class="ph ph-image-square text-lg"></i>
        <span class="hidden md:inline">Gallery</span>
        <i class="ph ph-caret-right submenu-arrow ml-auto transition-transform"></i>
      </summary>
      <div class="ml-10 flex flex-col gap-1 mt-1">
        <a href="manage_category.php" class="flex items-center gap-2 px-2 py-1 rounded text-gray-300 hover:bg-gray-800 hover:text-white text-sm transition"><i class="ph ph-folders text-xs"></i> Category</a>
        <a href="manage_gallery.php" class="flex items-center gap-2 px-2 py-1 rounded text-gray-300 hover:bg-gray-800 hover:text-white text-sm transition"><i class="ph ph-images text-xs"></i> Images</a>
      </div>
    </details>
    <!-- Footer --> 
    <details class="group">
      <summary class="flex items-center gap-3 px-3 py-2 rounded-lg cursor-pointer text-gray-400 hover:bg-cyan-700 hover:text-white transition font-medium focus:outline-none focus:ring-2 focus:ring-cyan-400">
        <i class="ph ph-article text-lg"></i>
        <span class="hidden md:inline">Footer</span>
        <i class="ph ph-caret-right submenu-arrow ml-auto transition-transform"></i>
      </summary>
      <div class="ml-10 flex flex-col gap-1 mt-1">
        <a href="manage_insta_img.php" class="flex items-center gap-2 px-2 py-1 rounded text-gray-300 hover:bg-gray-800 hover:text-white text-sm transition"><i class="ph ph-instagram-logo text-xs"></i> Images</a>
      </div>
    </details>
  </div>
</nav>
<!-- User profile -->
<div class="mt-auto flex-shrink-0 flex items-center gap-3 px-3 py-3 rounded-lg bg-gray-800/60 shadow-lg">
  <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User" class="w-10 h-10 rounded-full border-2 border-cyan-400 shadow" />
  <div class="hidden md:block">
    <div class="text-white font-semibold">Alex Green</div>
    <div class="text-xs text-gray-400">Photographer</div>
  </div>
</div> 
