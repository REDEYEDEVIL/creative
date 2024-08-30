
<aside class="left-sidebar" data-sidebarbg="skin6">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav">




        <li class="sidebar-item">
          <a class="sidebar-link" href="task_master_customer.php" aria-expanded="false">
            <i data-feather="list" class="feather-icon"></i>
            <span class="text-black">Task</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="project_master_customer.php" aria-expanded="false">
            <i data-feather="list" class="feather-icon"></i>
            <span class="text-black">Project</span>
          </a>
        </li>


        <li class="sidebar-item">
          <a class="sidebar-link sidebar-link" href="modal/logout/customer_logout.php" aria-expanded="false">
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

  // Add event listener to sidebar links
  document.querySelectorAll('.sidebar-link').forEach(link => {
    link.addEventListener('click', event => {
      // Toggle active state on click
      link.classList.toggle('active');
    });
  });
</script>
