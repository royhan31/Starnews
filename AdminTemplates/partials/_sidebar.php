<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="">Starnews</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="">Sn</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">General</li>
      <li class="<?php if($current_page=='dashboard'){echo 'active';} ?>">
        <a href="?page=dashboard" class="nav-link"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
      </li>
      <li class="<?php if($current_page=='news' || $current_page=='create_news' || $current_page=='update_news' ){echo 'active';} ?>">
        <a class="nav-link" href="?page=news"><i class="far fa-newspaper"></i> <span>News</span></a>
      </li>
      <li class="<?php if($current_page=='category'){echo 'active';} ?>">
        <a class="nav-link" href="?page=category"><i class="far fa-list-alt"></i> <span>Category</span></a>
      </li>
      <li>
        <a class="nav-link" href=""><i class="far fa-comments"></i> <span>Comment</span></a>
      </li>
    </ul>
  </aside>
</div>
