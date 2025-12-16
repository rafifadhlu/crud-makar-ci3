<title>Add Department</title>
</head>

<body>   
    <div class="px-5 pt-2">
        <a class="navbar-brand">Test Dept</a>
    </div>

    <div class="wrapperform" style="display:flex; justify-content:center; ">
        <div class="levelwrapper d-flex flex-column justify-content-center "">

            <form style="display:flex; flex-direction:column;" action="<?php echo site_url('department/add'); ?>" method="post">

                <label class="mt-2" for="name_dept">Nama Department</label>
                <input class="mt-1" type="text" name="name_dept" id="name_dept">

                <button class="mt-3 btn btn-primary" type="submit">
                    submit
                </button>
            </form>

            <div class="wrapperbutton mt-5">
                <a href="<?php echo site_url('') ?>">
                    <button class="btn btn-secondary w-100" >Back to Karyawan</button>
                </a>
            </div>
        </div>
    </div>