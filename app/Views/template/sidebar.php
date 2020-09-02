
<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="/html/ltr/vertical-menu-template/index.html">
                <div class="brand-logo"><img class="logo" src="/app-assets/images/logo/logo.png" /></div>
                <h2 class="brand-text mb-0">Menu</h2>
            </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                <i class="bx bx-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                <i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary" data-ticon="bx-disc"></i></a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
            <?php foreach ($menu as $key => $valueFirst): ?>

                <?php if (!isset($valueFirst->child)): ?>
                        
                    <?php  
                    $searchModules = $valueFirst->modules;
                    $_search = current(array_filter($notif, function($e) use($searchModules) { return $e['modules']==$searchModules; })); 
                    $_foundNotif = is_array($_search) ? $_search['count'] : ''; 
                    ?>

                    <li class="nav-item <?php echo $valueFirst->modules == $modules ? 'active' : '' ?>">
                        <a href="<?php echo base_url($valueFirst->url) ?>"><i class="menu-livicon" data-icon="desktop"></i>
                            <span class="menu-title" data-i18n=""><?php echo $valueFirst->label ?></span>
                            <span class="badge badge-light-danger badge-pill badge-round float-right"><?php echo $_foundNotif  ?></span>
                        </a>
                    </li>

                <?php else: ?>
                    <!-- class="menu-livicon" -->
                    <li class=" nav-item">
                        <a href="#"><i class="menu-livicon" data-icon="unlink"></i>
                            <span class="menu-title" data-i18n=""><?php echo $valueFirst->label ?></span>
                        </a>
                        <ul class="menu-content">

                                <?php foreach ($valueFirst->child as $key => $valueSecond): ?>

                                    <?php if (!isset($valueSecond->child)): ?>

                                        <?php  
                                        $searchModules = $valueSecond->modules;
                                        $_search = current(array_filter($notif, function($e) use($searchModules) { return $e['modules']==$searchModules; })); 
                                        $_foundNotif = is_array($_search) ? $_search['count'] : ''; 
                                        ?>
                                        
                                        <li class="<?php echo $valueSecond->modules == $modules ? 'active' : '' ?>">
                                            <a href="<?php echo base_url($valueSecond->url) ?>"><i class="bx bx-right-arrow-alt"></i>
                                                <span class="menu-item" data-i18n="nav.sk_starter_kit.1_column"><?php echo $valueSecond->label ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <span class="badge badge-light-danger badge-pill badge-round float-right"><?php echo $_foundNotif  ?></span>
                                            </a>
                                        </li>

                                    <?php else: ?>

                                            <li class=" nav-item">
                                                <a href="#">
                                                    <i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Second Level"><?php echo $valueSecond->label ?></span>
                                                </a>
                                                <ul class="menu-content">

                                                    <?php foreach ($valueSecond->child as $key => $valueThird): ?>

                                                         <?php  
                                                        $searchModules = $valueThird->modules;
                                                        $_search = current(array_filter($notif, function($e) use($searchModules) { return $e['modules']==$searchModules; })); 
                                                        $_foundNotif = is_array($_search) ? $_search['count'] : ''; 
                                                        ?>

                                                        <li class="<?php echo $valueThird->modules == $modules ? 'active' : '' ?>">
                                                            <a href="<?php echo base_url($valueThird->url) ?>"><i class="bx bx-right-arrow-alt"></i>
                                                                <span class="menu-item" data-i18n="Third Level"><?php echo $valueThird->label ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
                                                                 <span class="badge badge-light-danger badge-pill badge-round float-right"><?php echo $_foundNotif  ?></span>
                                                            </a>
                                                        </li>

                                                    <?php endforeach ?>

                                                </ul>
                                            </li>

                                    <?php endif ?>

                                <?php endforeach ?>

                        </ul>
                    </li>


                <?php endif ?>

            <?php endforeach ?>

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
