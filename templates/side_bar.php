 <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Diagram
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#support" aria-expanded="false" aria-controls="support">
                                        Support
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="support" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="support_chart.php">Diagram Batang</a>
                                            <a class="nav-link" href="support_initiation.php" style="display:none;">Initiaiton</a>
                                            <a class="nav-link" href="support_coding.php" style="display:none;">Coding</a>
                                            <a class="nav-link" href="support_testing.php" style="display:none;">Testing</a>
                                            <a class="nav-link" href="support_uat.php" style="display:none;">UAT</a>
                                            <a class="nav-link" href="support_complete.php" style="display:none;">Complete</a>
                                            <a class="nav-link" href="support_onhold.php" style="display:none;">Onhold</a>
                                            <a class="nav-link" href="support_returned.php" style="display:none;">Returned</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#jaskug" aria-expanded="false" aria-controls="jaskug">
                                        Jaskug
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="jaskug" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="jaskug_chart.php">Diagram Batang</a>
                                            <a class="nav-link" href="jaskug_initiation.php" style="display:none;">Initiaiton</a>
                                            <a class="nav-link" href="jaskug_coding.php" style="display:none;">Coding</a>
                                            <a class="nav-link" href="jaskug_testing.php" style="display:none;">Testing</a>
                                            <a class="nav-link" href="jaskug_uas.php" style="display:none;">UAT</a>
                                            <a class="nav-link" href="jaskug_complete.php" style="display:none;">Complete</a>
                                            <a class="nav-link" href="jaskug_onhold.php" style="display:none;">Onhold</a>
                                            <a class="nav-link" href="jaskug_returned.php" style="display:none;">Returned</a>
                                        </nav> 
                                    </div>
                                    <!--  -->
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#kurlog" aria-expanded="false" aria-controls="kurlog">
                                        Kurlog
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="kurlog" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="kurlog_chart.php">Diagram Batang</a>
                                            <a class="nav-link" href="kurlog_initiation.php" style="display:none;">Initiaiton</a>
                                            <a class="nav-link" href="kurlog_coding.php" style="display:none;">Coding</a>
                                            <a class="nav-link" href="kurlog_testing.php" style="display:none;">Testing</a>
                                            <a class="nav-link" href="kurlog_uas.php" style="display:none;">UAT</a>
                                            <a class="nav-link" href="kurlog_complete.php" style="display:none;">Complete</a>
                                            <a class="nav-link" href="kurlog_onhold.php" style="display:none;">Onhold</a>
                                            <a class="nav-link" href="kurlog_returned.php" style="display:none;">Returned</a>
                                        </nav>
                                    </div>
                                    <!--  -->
                                </nav>
                            </div>
                            <!-- Data Manajemen -->
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#manajemen" aria-expanded="false" aria-controls="manajemen">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                 Data Management
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="manajemen" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="support_tabel.php">Support</a>
                                    <a class="nav-link" href="jaskug_tabel.php">Jaskug</a>
                                    <a class="nav-link" href="kurlog_tabel.php">Kurlog</a>
                                </nav>
                            </div>
                            <!-- Data Manajemen -->
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php if (empty($_SESSION['level'])){ ?>
                        Pegawai
                      <?php } else { ?>
                      <?php if ($_SESSION['level'] == 'admin'){ ?>
                        <?= $_SESSION['username'];?>
                                              <?php } } ?>
                    </div>
                </nav>
            </div>