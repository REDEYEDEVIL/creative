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
    <nav class="sidebar-nav">
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
        <li class="sidebar-item">
          <a class="sidebar-link" href="customer_master_list.php" aria-expanded="false">
            <i data-feather="briefcase" class="feather-icon"></i>
            <span class="text-black">Customer Master</span>
          </a>
        </li>
        <!-- <li class="sidebar-item">
          <a class="sidebar-link" href="project_type.php" aria-expanded="false">
            <i data-feather="list" class="feather-icon"></i>
            <span class="text-black">Project Type</span>
          </a>
        </li> -->
        <li class="sidebar-item">
          <a class="sidebar-link" href="creative_type.php" aria-expanded="false">
            <i data-feather="image" class="feather-icon"></i>
            <span class="text-black">Creative Type</span>
          </a>
        </li>
        <li class="list-divider"></li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="project_master_list.php" aria-expanded="false">
            <i data-feather="file-text" class="feather-icon"></i>
            <span class="text-black">Project </span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="review_master.php" aria-expanded="false">
            <i data-feather="file-text" class="feather-icon"></i>
            <span class="text-black">Review</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link sidebar-link" href="creative_search.php" aria-expanded="false">
            <i data-feather="search" class="feather-icon"></i>
            <span class="text-black">Creative Search</span>
          </a>
        </li>

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
