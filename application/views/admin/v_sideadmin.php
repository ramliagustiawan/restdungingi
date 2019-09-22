<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->


    <!-- query menu -->
    <?php
    $pengguna_level = $this->session->userdata('akses');

    $queryMenu = " SELECT `user_menu`.`id`,`menu`
                          FROM   `user_menu` JOIN `user_access_menu`
                          ON     `user_menu`.`id` = `user_access_menu`.`menu_id`
                          WHERE `user_access_menu`.`pengguna_id` = $pengguna_level
                          ORDER BY `user_access_menu`.`menu_id` ASC
                        ";

    $menu = $this->db->query($queryMenu)->result_array();

    ?>


    <!-- looping -->
    <!-- menu management -->

    <?php foreach ($menu as $m) : ?>
      <ul class="sidebar-menu">

        <li class="header"> <?= $m['menu']; ?></li>


          <!-- submenu -->
          <?php
          $menuId = $m['id'];
          $querySubMenu = " SELECT *
                            FROM   `user_sub_menu` JOIN `user_menu`
                            ON     `user_sub_menu`.`menu_id` = `user_menu`.`id`
                            WHERE `user_sub_menu`.`menu_id` = $menuId
                            AND `user_sub_menu`.`pengguna_status` = 1
                            
                        ";
          $subMenu = $this->db->query($querySubMenu)->result_array();
          ?>
            <?php foreach ($subMenu as $sm) : ?>

                <li>
                  <a href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title']; ?></span>
                    <span class="pull-right-container">
                      <small class="label pull-right"></small>
                    </span>
                  </a>
                </li>
            <?php endforeach; ?>
            <!-- treemenu -->
            <?php
            $menuId = $m['id'];
            $treeMenu = " SELECT *
                              FROM   `user_ss_menu` JOIN `user_menu`
                              ON     `user_ss_menu`.`menu_id` = `user_menu`.`id`
                              WHERE `user_ss_menu`.`menu_id` = $menuId
                              AND `user_ss_menu`.`pengguna_status` = 1
                              
                          ";

            $treev = $this->db->query($treeMenu)->result_array();
            ?>

            <?php foreach ($treev as $tr) : ?>

              <li class="treeview">

                <a href="<?= base_url($tr['url']); ?>">
                  <i class="<?= $tr['icon']; ?>"></i>
                  <span><?= $tr['title']; ?></span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>

                  <!-- subtreemenu -->
                  <?php
                  $menuIdt = $tr['menu_ss'];
                  $ultreeMenu = " SELECT *
                                FROM   `user_tree_menu` 
                                WHERE `user_tree_menu`.`menu_tree` = $menuIdt
                                AND `user_tree_menu`.`pengguna_status` = 1
                                
                            ";
                  $ultreev = $this->db->query($ultreeMenu)->result_array();           
                  ?>

                <ul class="treeview-menu">

                  <?php foreach ($ultreev as $ul) : ?>
                    <li><a href="<?= base_url($ul['url']); ?>"><i class="<?= $ul['icon']; ?>"></i> <?= $ul['title']; ?></a></li>
                  <?php endforeach; ?>

                </ul>

              </li>


            <?php endforeach; ?>

      <?php endforeach; ?>

        <li>
          <a href="<?php echo base_url() . 'superadmin/login/logout' ?>">
            <i class="fa fa-sign-out"></i> <span>Sign Out</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>