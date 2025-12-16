<title>Add new Karyawan</title>
</head>

<body class="px-5 pt-3">
    <a class="navbar-brand">Add new User</a>


    <?php flash_alert() ?>

    <div class="wrapper d-flex flex-column align-items-center" style="display: flex; margin-top:170px;">
        <p class="text-decoration-none" style="margin-right: 380px;"><?php echo anchor('', '&larr; home!', ['class' => 'text-secondary text-decoration-none fw-semibold']); ?></p>

        <div class="wrapperForm w-100 d-flex justify-content-center">
            <form action="<?php echo site_url('register/submit') ?>" method="post" style="display:flex; flex-direction:column; width: 25%; margin-bottom:20px;">
                <label for="username">Username</label>
                <input style="margin-bottom:20px;" type="text" id="username" name="username">

                <label for="password">Password</label>
                <input style="margin-bottom:20px;" type="password" id="password" name="password">


                <label for="name">name</label>
                <input style="margin-bottom:20px;" type="text" id="name" name="name">


                <label for="nik">nik</label>
                <input style="margin-bottom:20px;" type="number" id="nik" name="nik">


                <label for="address">address</label>
                <input style="margin-bottom:20px;" type="text" id="address" name="address">


                <button class="btn btn-primary" type="submit">Register</button>
            </form>
        </div>


    </div>