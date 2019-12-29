<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <?php
    $array =[
      "Dashboard" => [
        "icon" => "fas fa-tachometer-alt",
        "link" => "Dashboard",
        "sub" => [],
      ],
      "Sumber Data" => [
        "icon" => "fa fa-database",
        "link" => "Sumber_data",
        "sub" => [
          "Data Pengguna" => [
            "icon" => "far fa-circle",
            "link" => "pengguna",
          ],
          "Data Mahasiswa " => [
            "icon" => "far fa-circle",
            "link" => "mahasiswa",
          ],
        ],
      ],
      "Pengaturan Tampilan" => [
        "icon" => "fa fa-tv",
        "link" => "Tampilan",
        "sub" => [
          "Slide Show" => [
            "icon" => "far fa-circle",
            "link" => "slide_show",
          ],
          "Video " => [
            "icon" => "far fa-circle",
            "link" => "video",
          ],
          "Testimoni " => [
            "icon" => "far fa-circle",
            "link" => "testimoni",
          ],
          "Kerja Sama " => [
            "icon" => "far fa-circle",
            "link" => "kerjasama",
          ],
          "Career News " => [
            "icon" => "far fa-circle",
            "link" => "career_news",
          ],
        ],
      ],
      "Lowongan" => [
        "icon" => "fa fa-suitcase",
        "link" => "",
        "sub" => [
          "Lowongan Pekerjaan" => [
            "icon" => "far fa-circle",
            "link" => "Lowongan",
          ],
          "Lowongan Request" => [
            "icon" => "far fa-circle",
            "link" => "LowonganRequest",
          ],
        ],
      ],
      "Event" => [
        "icon" => "fa fa-sticky-note",
        "link" => "Event",
        "sub" => [
          "List Event" => [
            "icon" => "far fa-circle",
            "link" => "",
          ],
          "Daftar Hadir " => [
            "icon" => "far fa-circle",
            "link" => "daftar_hadir",
          ],
        ],
      ],
      "Company" => [
        "icon" => "fa fa-building",
        "link" => "Perusahaan",
        "sub" => [
          "Data Perusahaan" => [
            "icon" => "far fa-circle",
            "link" => "perusahaan",
          ],
          "List Pelamar" => [
            "icon" => "far fa-circle",
            "link" => "pelamar",
          ],
          "Campus Recruitment" => [
            "icon" => "far fa-circle",
            "link" => "campus_recruitment",
          ],
        ],
      ],
      "Job Seeker" => [
        "icon" => "fa fa-building",
        "link" => "JobSekeer",
        "sub" => []
      ],
      "Logout" => [
        "icon" => "fas fa-power-off",
        "link" => "Auth/Logout",
        "sub" => [],
      ],
    ];
    $menu = '';
      foreach ($array as $key => $value) {
        $menu .= '<li class="nav-item has-treeview">
          <a href="'.base_url($value['link']).'" class="nav-link">
            <i class="nav-icon '.$value['icon'].'"></i>
            <p>
              '.$key.'';
            if(count($value['sub']) > 0){
              $menu .= '              <i class="right fas fa-angle-left"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview">';
                foreach ($value['sub'] as $key2 => $value2) {
                  $menu .= '        <li class="nav-item">
                            <a href="'.base_url($value['link'].'/'.$value2['link']).'" class="nav-link">
                              <i class="'.$value2['icon'].' nav-icon"></i>
                              <p>'.$key2.'</p>
                            </a>
                          </li>';
                }
              $menu .= '</ul>';
            }else{
              $menu .= '            </p>
                        </a>';
            }
        $menu .= '</li>';
      }
      echo $menu;
    ?>
    <!-- <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="<?= base_url();?>assets/index.html" class="nav-link active">
            <i class="far fa-circle nav-icon"></i>
            <p>Dashboard v1</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url();?>assets/index2.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Dashboard v2</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url();?>assets/index3.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Dashboard v3</p>
          </a>
        </li>
      </ul>
    </li> -->


    <!-- <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="<?= base_url();?>assets/index.html" class="nav-link active">
            <i class="far fa-circle nav-icon"></i>
            <p>Dashboard v1</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url();?>assets/index2.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Dashboard v2</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url();?>assets/index3.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Dashboard v3</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-edit"></i>
        <p>
          Forms
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="../forms/general.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>General Elements</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../forms/advanced.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Advanced Elements</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../forms/editors.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Editors</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-table"></i>
        <p>
          Tables
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="../tables/simple.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Simple Tables</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../tables/data.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>DataTables</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../tables/jsgrid.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>jsGrid</p>
          </a>
        </li>
      </ul>
    </li> -->


  </ul>
</nav>
