<ul class="sidebar-menu">
  <li class="header">MAIN NAVIGATION</li>
  <li>
    <a href="<?php print $root; ?>admin">
      <i class="ion ion-speedometer"></i> <span>DASHBOARD</span>
      <span class="pull-right-container"></span>
    </a>
  </li>

  <li>
    <a href="<?php print $root; ?>admin/student">
      <i class="ion ion-person-stalker"></i> <span>DATA SISWA</span>
      <span class="pull-right-container"></span>
    </a>
  </li>

  <li>
    <a href="<?php print $root; ?>admin/teacher">
      <i class="ion ion-person"></i> <span>DATA GURU</span>
      <span class="pull-right-container"></span>
    </a>
  </li>

  <li class="treeview">
    <a href="#">
      <i class="ion ion-wrench"></i>
      <span>SETTING</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="<?php print $root; ?>admin/rombel"><i class="fa fa-circle-o"></i> Setting Rombel</a></li>
      <li><a href="<?php print $root; ?>admin/mapel"><i class="fa fa-circle-o"></i> Setting Mata Pelajaran</a></li>
      <li><a href="<?php print $root; ?>admin/ekstra"><i class="fa fa-circle-o"></i> Setting Ekstrakurikuler</a></li>
      <li><a href="<?php print $root; ?>admin/sikap"><i class="fa fa-circle-o"></i> Setting Sikap</a></li>
      <li><a href="<?php print $root; ?>admin/data-sekolah"><i class="fa fa-circle-o"></i> Setting Data Sekolah</a></li>
      <li><a href="<?php print $root; ?>admin/kalender-akademik"><i class="fa fa-circle-o"></i> Setting Kalender Akademik</a></li>
    </ul>
  </li>

  <li>
    <a href="<?php print $root; ?>admin/users">
      <i class="ion ion-android-contacts"></i> <span>DATA USER</span>
      <span class="pull-right-container"></span>
    </a>
  </li>

  <li>
    <a href="<?php print $root; ?>admin/data-rapor">
      <i class="ion ion-printer"></i> <span>CETAK RAPOR</span>
      <span class="pull-right-container"></span>
    </a>
  </li>

  <li>
    <a href="<?php print $root;?>logout.php">
      <i class="fa fa-sign-out"></i> <span>LOGOUT</span>
      <span class="pull-right-container"></span>
    </a>
  </li>
</ul>
