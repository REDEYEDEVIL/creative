<?php
// if($_SESSION['role'] == 2){

// }else {
//   echo '<script type="text/javascript">window.location.href="index.php";</script>';
// }
?>

<aside class="left-sidebar" data-sidebarbg="skin6">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav">
      <li class="list-divider"></li>
      <li class="sidebar-item">
          <a class="sidebar-link" href="task_master_user.php" aria-expanded="false">
            <i data-feather="list" class="feather-icon"></i>
            <span class="text-black">Task</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="project_master_user.php" aria-expanded="false">
            <i data-feather="list" class="feather-icon"></i>
            <span class="text-black">Project</span>
          </a>
        </li>


        <li class="sidebar-item">
          <a class="sidebar-link sidebar-link" href="index.php" aria-expanded="false">
            <i data-feather="log-out" class="feather-icon"></i>
            <span class="text-black">Logout</span>
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
