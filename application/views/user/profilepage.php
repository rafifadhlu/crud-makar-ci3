    <title>Profile</title>
    </head>

    <body class="px-5 pt-3">
        <h2 class="mt-5">
            your profile
        </h2>


        <p class="text-decoration-none"><?php echo anchor('', '&larr; home!',['class' => 'text-secondary text-decoration-none fw-semibold']); ?></p>

        <div class="card">
            <div class="wrapperCardContent d-flex" style="height: 350px;">
                <div class="rightContent" style="width: 250px;">

                    <div class="wrapperimage h-100 p-3">
                        <img class="img-fluid w-100 h-100 object-fit-cover rounded-3 shadow" src="<?php echo base_url('storages/' . $karyawan['profile']); ?>" alt="">
                    </div>
                </div>
                <div class="leftContent w-75 ps-5">
                    <div class="mt-5">
                        <div>
                            <div class="fs-6 fw-bold">NIK :</div>
                            <p><?php echo $karyawan['nik']; ?></p>
                        </div>

                        <div>
                            <div class="fs-6 fw-bold">Name :</div>
                            <p><?php echo $karyawan['name_mhs']; ?></p>
                        </div>

                        <div>
                            <div class="fs-6 fw-bold">Address :</div>
                            <p><?php echo $karyawan['address']; ?></p>
                        </div>

                        <div>
                            <div class="fs-6 fw-bold">Department :</div>
                            <p><?php echo (isset($departmen['name_dprtmn'])) ?$departmen['name_dprtmn'] : "unassigned"?></p>
                        </div>




                    </div>



                </div>
            </div>
        </div>


        <div class="d-flex flex-column mt-3">
            <?php echo form_open_multipart('profile/changepfp/' . $karyawan['id'] . '/edit', ['class' => 'd-flex flex-column']) ?>
            <input type="file" name="filepfp">
            <button class="btn btn-primary mt-3" style="width: 250px;" type="submit">
                Upload
            </button>
            <?php echo form_close(); ?>
        </div>

    </body>

    </html>