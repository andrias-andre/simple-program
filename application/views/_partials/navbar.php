<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="<?= base_url('admn/page/dashboard'); ?>">SIMPLE PROGRAM</a>
    
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>

    
    <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <li class="nav-item dropdown ">
            <a class="nav-link" id="userDropdown" data-bs-toggle="modal" data-bs-target="#confirmLogout" role="button"  aria-haspopup="true" aria-expanded="false"><i class="fas fa-sign-out-alt"></i></a>
        </li>
        
    </ul>
</nav>


<!-- ConfirmLogout -->
<div class="modal fade" id="confirmLogout" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ready to Leave ?</h5>
      </div>
      <div class="modal-body">
        <p>Select "Logout" below if you are ready to end your current session.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a class="btn btn-danger" href="<?= site_url('../'); ?>">Logout</a>
      </div>
    </div>
  </div>
</div>