<!-- Tag close because the header is not closed -->
<!-- need to be added  : title -->
<!-- optional other meta such as : localCSS and view port-->
<title><?php echo $titlepage ?></title>
</head>

<body class="px-2 container-fluid">
    <nav class="navbar navbar-expand-lg bg-body-tertiary px-5 mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">MaKar</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Profile
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item"
                               href="<?= site_url('profile/changepfp/' . $this->session->userdata('user_id')) ?>">
                                <?php if (!is_null($user['profile'])): ?>
                                    <img class="me-2"
                                         src="<?= base_url('storages/' . $user['profile']); ?>"
                                         style="width:40px;height:40px;border-radius:50%;object-fit:cover;">
                                <?php else: ?>
                                    <img class="me-2"
                                         src="https://ui-avatars.com/api/?background=0D8ABC&color=fff"
                                         style="width:40px;height:40px;border-radius:50%;object-fit:cover;">
                                <?php endif; ?>
                                Profile
                            </a>
                        </li>

                        <li><hr class="dropdown-divider"></li>

                        <li>
                            <a class="dropdown-item" href="<?= site_url('logout') ?>">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
