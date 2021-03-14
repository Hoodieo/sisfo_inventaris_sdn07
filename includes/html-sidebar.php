<aside class="left-sidebar pt-0" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="navbar-brand" href="index">
                        <h4 class="logo-text text-dark text-center ml-3">
                        SDN 07 Sejagan
                        </h4>
                    </a>
                </li>
                <hr>
                <li class="sidebar-item">
                    <h6 class="ml-3"><?= ucwords($_SESSION['username']).' ('.$_SESSION['status'].')' ?></h6>
                    <a class="btn btn-outline-danger btn-sm ml-3" href="../logout">Logout</a>
                </li>
                <hr>
                <!-- User Profile-->
                <li class="sidebar-item"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index" aria-expanded="false">
                    <i class="mr-3 fa fa-globe" aria-hidden="true"></i>
                    <span class="hide-menu">Halaman Utama</span></a>
                </li>
                
                <?php if ($_SESSION['status'] != 'Kepala Sekolah' && $_SESSION['status'] != 'Tata Usaha'): ?>
                    <li class="sidebar-item"> 
                        <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="index?m=aset" aria-expanded="false">
                        <i class="mr-3 fa fa-table"
                            aria-hidden="true"></i>
                        <span class="hide-menu">Data Sarpras</span></a>
                    </li>

                    <li class="sidebar-item"> 
                        <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="index?m=penggunaan" aria-expanded="false">
                        <i class="mr-3 fa fa-table"
                            aria-hidden="true"></i>
                        <span class="hide-menu">Data Penggunaan</span></a>
                    </li>
                    <?php if ($_SESSION['status'] != 'Guru'): ?>
                    <li class="sidebar-item"> 
                        <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="index?m=pengajuan_aset" aria-expanded="false">
                        <i class="mr-3 fa fa-table"
                            aria-hidden="true"></i>
                        <span class="hide-menu">Pengajuan Sarpras Baru</span></a>
                    </li>
                    <?php endif ?>
                <?php endif ?>

                <?php if ($_SESSION['status'] != 'Guru'): ?>
                <li class="sidebar-item"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index?m=laporan_penggunaan" aria-expanded="false">
                    <i class="mr-3 fa fa-columns" aria-hidden="true"></i>
                    <span class="hide-menu">Laporan</span></a>
                </li>
                <?php endif ?>

                <?php if ($_SESSION['status'] != 'Kepala Sekolah' && $_SESSION['status'] != 'Tata Usaha' && $_SESSION['status'] != 'Guru'): ?>
                <li class="sidebar-item"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="index?m=pengguna" aria-expanded="false">
                        <i class="mr-3 fa fa-user " aria-hidden="true"></i>
                    <span class="hide-menu">Data Pengguna</span>
                    </a>
                </li>
                <?php endif ?>

                <li class="sidebar-item"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="index?m=ganti_password" aria-expanded="false">
                        <i class="mr-3 fa fa-key" aria-hidden="true"></i>
                    <span class="hide-menu">Ganti Password</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
