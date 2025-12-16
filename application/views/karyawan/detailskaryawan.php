    <title>Detail Karyawan</title>
</head>

<body style="font-family: Arial, sans-serif; background: #f5f6fa; margin:0; padding:20px;">

    <h2 style="text-align:center; margin-bottom:30px; color:#333;">
        Detail Karyawan
    </h2>

    <div>
        <?php flash_alert() ?>
    </div>


    <div style="
    width: 400px;
    margin: auto;
    background: white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
">
        <button class="btn btn-primary" onclick="turnOnEdit()">Edit</button>

        <p class="status">Status : </p>

        <div class="viewMode">
            <div style="margin-bottom: 15px;">
                <span style="font-weight: bold; color:#555;">ID:</span><br>
                <span style="color:#333;"><?php echo $karyawan['id']; ?></span>
            </div>

            <div style="margin-bottom: 15px;">
                <span style="font-weight: bold; color:#555;">Nama:</span><br>
                <span style="color:#333;"><?php echo $karyawan['name_mhs']; ?></span>
            </div>

            <div style="margin-bottom: 15px;">
                <span style="font-weight: bold; color:#555;">NIK:</span><br>
                <span style="color:#333;"><?php echo $karyawan['nik']; ?></span>
            </div>

            <div style="margin-bottom: 15px;">
                <span style="font-weight: bold; color:#555;">Alamat:</span><br>
                <span style="color:#333;"><?php echo $karyawan['address']; ?></span>
            </div>

            <div style="margin-bottom: 15px;">
                <span style="font-weight: bold; color:#555;">department:</span><br>
                <span style="color:#333;">

                <?php if(isset($userDept['name_dprtmn'])):?>
                    <?php echo $userDept['name_dprtmn']; ?>
                    <?php else:?>
                        unassigned
                <?php endif; ?>
            </span>
            </div>

        </div>

        <div class="editMode">
            <form action="<?php echo site_url('karyawan/edit/' . $karyawan['id']); ?>" method="post">
                <div class="wrapperTextbox" style="display: flex; flex-direction: column;">

                    <div class="wrapper" style="display: flex; flex-direction:column; margin-bottom: 15px; ">
                        <label style="font-weight: bold; color:#555;" for="name_mhs">Nama</label>
                        <input type="text" name="name_mhs" id="name_mhs" value="<?php echo $karyawan['name_mhs'] ?>">
                    </div>

                    <div class="wrapper" style="display: flex; flex-direction:column; margin-bottom: 15px; ">
                        <label style="font-weight: bold; color:#555;" for="nik">NIK</label>
                        <input type="text" name="nik" id="nik" value="<?php echo $karyawan['nik'] ?>">

                    </div>

                    <div class="wrapper" style="display: flex; flex-direction:column; margin-bottom: 15px; ">
                        <label style="font-weight: bold; color:#555;" for="address">Alamat</label>
                        <input type="text" name="address" id="address" value="<?php echo $karyawan['address'] ?>">
                    </div>

                    <div class="wrapper" style="display: flex; flex-direction:column; margin-bottom: 15px; ">
                        <label style="font-weight: bold; color:#555;" for="department">department</label>
                        <select name="department" id="department" onchange="this.value">
                                <option value="" >Select Department</option>
                            <?php foreach ($department as $dept):?>
                                <option <?php echo (isset($userDept['id_dprtmn']) && $userDept['id_dprtmn'] == $dept['id_dprtmn']   )?'selected':'' ?> value="<?php echo $dept['id_dprtmn'] ?>"><?php echo $dept['name_dprtmn'] ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <button class="btn btn-success" type="submit">
                    submit
                </button> 
            </form>

        </div>

        <div style="text-align:center; margin-top:20px;">
            <a
                href="<?php echo site_url(''); ?>"
                style="
                padding: 10px 20px;
                background: #3498db;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                font-size: 14px;
            ">
                Back to List
            </a>
        </div>

    </div>



    <script>
        let is_edit = false;

        function turnOnEdit() {

            // toggle mode
            is_edit = !is_edit;

            const status = document.getElementsByClassName('status')[0];
            const editMode = document.getElementsByClassName('editMode')[0];
            const viewMode = document.getElementsByClassName('viewMode')[0];

            if (is_edit) {
                status.innerText = 'Status : Edit Mode';
                editMode.style.display = 'block';
                viewMode.style.display = 'none';
            } else {
                status.innerText = 'Status : View Mode';
                editMode.style.display = 'none';
                viewMode.style.display = 'block';
            }
        }

        document.addEventListener("DOMContentLoaded", () => {
            document.getElementsByClassName('editMode')[0].style.display = 'none';
            document.getElementsByClassName('viewMode')[0].style.display = 'block';
            document.getElementsByClassName('status')[0].innerText = 'Status : View Mode';
        });
    </script>