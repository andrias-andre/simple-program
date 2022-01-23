<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <?php $active = strtoupper($this->uri->segment(1)); ?>       
            <div class="sb-sidenav-menu-heading">Menu</div>
            <a class="nav-link <?php if($active == 'DASHBOARD'){ echo 'active'; } ?>" href="<?= base_url('dashboard'); ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-pie"></i></div>
                DASHBOARD
            </a>

            <a class="nav-link collapsed <?php if($active == 'PRODUCT' || $active == 'COMPANY' || $active == 'TRANSACTION'){ ?> active <?php } ?>" href="#collapseLayouts" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                DATA
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse show" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" <?php if($active == 'PRODUCT'){ ?> active <?php } ?> href="<?= base_url('product'); ?>">Product</a>
                    <a class="nav-link  <?php if($active == 'COMPANY'){ ?> active <?php } ?>" href="<?= base_url('company'); ?>">Company</a>
                    <a class="nav-link" <?php if($active == 'TRANSACTION'){ ?> active <?php } ?> href="<?= base_url('transaction'); ?>">Transaction</a>
                </nav>
            </div>


            <a class="nav-link collapsed <?php if($active == 'REPORT_PRODUCT' || $active == 'REPORT_COMPANY' || $active == 'REPORT_TRANSACTION'){ ?> active <?php } ?>" href="#collapseLayoutsReport" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsReport" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon "><i class="fas fa-file-invoice"></i></div>
                REPORT
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse show" id="collapseLayoutsReport" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link <?php if($active == 'REPORT_PRODUCT'){ ?> active <?php } ?>" href="<?= base_url('report_product'); ?>">Product</a>
                    <a class="nav-link <?php if($active == 'REPORT_COMPANY'){ ?> active <?php } ?>" href="<?= base_url('report_company'); ?>">Company</a>
                    <a class="nav-link <?php if($active == 'REPORT_TRANSACTION'){ ?> active <?php } ?>" href="<?= base_url('report_transaction'); ?>">Transaction</a>
                </nav>
            </div>


        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        <?= $user; ?>
    </div>
</nav>