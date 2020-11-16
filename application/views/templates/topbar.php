        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <div class="container">
            <a class="navbar-brand mr-5 text-center" href="<?= base_url('');?>">
              <img src="<?= base_url('assets/img');?>" width="70" alt="Logo">
              <div class="sidebar-brand-text mx-3 text-dark small"><small style="font-size: 70%">ONLINE CRITICAL PAPER</small></div>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">

              <ul class="navbar-nav">
                <li class="nav-item <?php if ($page == 'index') echo 'active'?>">
                  <a class="nav-link text-dark" href="#" onclick="page_load('index')">Dashboard</a>
                </li>

                <?php if ($user['id_posisi'] <= 3):?>
                  <li class="nav-item <?php if ($page == 'input') echo 'active'?>">
                    <a class="nav-link text-dark" href="#" onclick="page_load('input')">Input IKS</a>
                  </li>
                <?php endif;?>

                <?php if ($user['id_posisi'] > 4):?>
                  <li class="nav-item <?php if ($page == 'proses') echo 'active'?>">
                    <a class="nav-link text-dark" href="#" onclick="page_load('proses')">Konsep PIAP</a>
                  </li>
                <?php endif;?>

                <li class="nav-item <?php if ($page == 'data') echo 'active'?>">
                  <a class="nav-link text-dark" href="#" onclick="page_load('data')">Daftar IKS</a>
                </li>

                <?php if ($user['id_posisi'] >= 4):?>
                  <li class="nav-item <?php if ($page == 'piap') echo 'active'?>">
                    <a class="nav-link text-dark" href="#" onclick="page_load('piap')">Daftar PIAP</a>
                  </li>
                <?php endif;?>
              </ul>

              <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600"><?= $user['fullName'] ?></span>
                    <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profil/default.png')?>">
                  </a>
                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                      Sign Out
                    </a>
                  </div>
                </li>
              </ul>

            </div>

          </div>

        </nav>

        <div class="subbody">