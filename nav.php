    <nav class="collapse">
        <ul class="nav nav-pills" id="mainNav">
            <!-- <li class="dropdown-full-color dropdown-secondary">
                <a class="nav-link <?php if ($menusn == 0) echo "active"; ?>" href="demo-medical.html">
                    <?php
                    //     $languages =  explode(",", $set_sitelanguages);
                    //     $key = array_search($sitelanguage, $languages);
                    //     $languages_home = explode(",", $set_sitelanguages_home);
                    //     echo $languages_home[$key];
                    // ?>
                </a>
            </li>

            

            <li class="dropdown dropdown-full-color dropdown-secondary">
                <a class="nav-link dropdown-toggle" class="dropdown-toggle" href="demo-medical-departments.html">
                    About Us
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="demo-medical-departments-detail.html">Cardiology</a></li>
                </ul>
            </li> -->

            <?php
                $q1 = mysqli_query($dbc, "select * from menu where language='$sitelanguage' and submenu_of=0 and menu='Main' order by display_order");
                while ($r1 = mysqli_fetch_array($q1)) {
                    $menuid = $r1['sn'];
                    $menutitle = $r1['title'];
                    $menulink = $r1['link'];

                    $activeclass = "";
                    if ($menusn == $menuid) $activeclass = "active";
                    $ifChild = mysqli_query($dbc, "select sn from menu where submenu_of = $menuid and menu='Main'");
                    $nChild = mysqli_num_rows($ifChild);
                    $dropdownToggle = "";
                    if ($nChild > 0) $dropdownToggle = "dropdown-toggle";
                ?>
                    <li class="dropdown dropdown-full-color dropdown-secondary ">
                        <a class="nav-link <?php echo $activeclass; ?> <?php echo $dropdownToggle; ?>" href="<?php echo $menulink; ?>" >
                            <?php echo $menutitle; ?></a>
                    <?php
                    if ($nChild > 0) { // if sub menu for main manu exists
                        echo "<ul class=\"dropdown-menu\">";
                        $q2 = mysqli_query($dbc, "select * from menu where language='$sitelanguage' and submenu_of=$menuid and menu='Main' order by display_order");
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $menuid2 = $r2['sn'];
                            $menutitle2 = $r2['title'];
                            $menulink2 = $r2['link'];

                            $ifChild2 = mysqli_query($dbc, "select sn from menu where submenu_of = $menuid2 and menu = 'Main'");
                            $nChild2 = mysqli_num_rows($ifChild2);
                            $raq = "";
                            if ($nChild2 > 0) $raq = " &raquo;";
                            echo "<li><a class=\"dropdown-item\" href=\"$menulink2\">$menutitle2 $raq</a></li>";
                        } 
                        echo "</ul></li>";
                    } //if sub menu for main manu exists
                    else {
                        echo "</li>";
                    }
                } // q1while
                    ?>

        </ul>
    </nav>


    <!-- <ul class="nav navbar-nav navbar-right">
                <li><a href="https://www.facebook.com" style="margin-top:0; padding:10px;">
                        <img src="<?php echo $set_sitename; ?>/images/f.png" style="outline:none" height="24px" />
                    </a></li>
                <li><a href="<?php echo $set_sitename; ?>/index.php?lang=English" style="padding-left:3px; padding-right:5px; color: #FFFF00">EN</a></li>
                <li><a href="<?php echo $set_sitename; ?>/index.php?lang=Nepali" style="padding-left:3px; padding-right:15px; color:#FFFF00">NP</a></li>

            </ul> -->