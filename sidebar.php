<?php
if($_SESSION['role'] == 1){
}else{
  echo '<script type="text/javascript">window.location.href="index.php";</script>';
}
?>
<aside class="left-sidebar" data-sidebarbg="skin6">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav pt-0">
      <ul id="sidebarnav">
        <li class="list-divider"></li>
        <li class="sidebar-item">
          <a class="sidebar-link sidebar-link" href="dashboard.php" aria-expanded="false">
            <i data-feather="home" class="feather-icon"></i>
            <span class="text-black">Dashboard</span>
          </a>
        </li>
        <li class="list-divider"></li>

        <li class="nav-small-cap"><span class="text-black">Master</span></li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="#HomeSubmenu" aria-expanded="false" data-toggle="collapse">
            <i data-feather="home" class="feather-icon"></i>
            <span class="text-black">Home</span>
          </a>
            <ul id="HomeSubmenu" class="submenu collapse">
              <li class="sidebar-item"><a href="homesec1.php" class="sidebar-link">Section1 </a></li>
              <li class="sidebar-item"><a href="homesec2.php" class="sidebar-link">Section 2</a></li>
              <li class="sidebar-item"><a href="homegallery.php" class="sidebar-link">Photo Gallery</a></li>
            </ul>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="about_us.php" aria-expanded="false">
            <i data-feather="book" class="feather-icon"></i>
            <span class="text-black">About Us</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="#academicsSubmenu" aria-expanded="false" data-toggle="collapse">
            <i data-feather="book" class="feather-icon"></i>
            <span class="text-black">Academics</span>
          </a>
            <ul id="academicsSubmenu" class="submenu collapse">
              <li class="sidebar-item"><a href="preschool.php" class="sidebar-link">Preschool</a></li>
              <li class="sidebar-item"><a href="primary.php" class="sidebar-link">Primary</a></li>
              <li class="sidebar-item"><a href="middleschool.php" class="sidebar-link">Middle School</a></li>
            </ul>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="partners.php" aria-expanded="false">
            <i data-feather="book" class="feather-icon"></i>
            <span class="text-black">Educational Partners</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="#gallerySubmenu" aria-expanded="false" data-toggle="collapse">
            <i data-feather="image" class="feather-icon"></i>
            <span class="text-black">Gallery</span>
          </a>
            <ul id="gallrySubmenu" class="submenu collapse">
              <li class="sidebar-item"><a href="gallerycategory.php" class="sidebar-link">Category</a></li>
              <li class="sidebar-item"><a href="gallerysub-category.php" class="sidebar-link">Sub-category</a></li>
              <li class="sidebar-item"><a href="imageupload.php" class="sidebar-link">image-upload</a></li>
            </ul>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="e_letters.php" aria-expanded="false">
            <i data-feather="mail" class="feather-icon"></i>
            <span class="text-black">E Letters </span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="contactus.php" aria-expanded="false">
            <i data-feather="phone" class="feather-icon"></i>
            <span class="text-black">Contact Us</span>
          </a>
        </li>


        <li class="sidebar-item">
          <a class="sidebar-link" href="role_master.php" aria-expanded="false">
            <i data-feather="users" class="feather-icon"></i>
            <span class="text-black">Role Master</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="user_master.php" aria-expanded="false">
            <i data-feather="user" class="feather-icon"></i>
            <span class="text-black">User Master</span>
          </a>
        </li>
        <li class="list-divider"></li>


      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>

<script>
  // Add event listener to hamburger menu
  document.querySelector('.hamburger').addEventListener('click', event => {
    document.querySelector('.left-sidebar').classList.toggle('open');
  });

  document.querySelectorAll('.sidebar-link').forEach(link => {
  link.addEventListener('click', event => {
    link.classList.toggle('active');
    return false; // Add this line
  });
});
</script>
