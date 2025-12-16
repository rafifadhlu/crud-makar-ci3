    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="welcome">
        <p>Assign karyawan to new dept</p>
    </div>
    <div class="form-add" style="display:flex; justify-content:center;">


        <form style="display:flex; flex-direction:column;" action="<?php echo site_url('karyawan/insert'); ?>" method="post">
            <label for="name_mhs">Nama</label>
            <input type="text" name="name_mhs" id="name_mhs">

            <label for="nik">NIK</label>
            <input type="text" name="nik" id="nik">

            <label for="address">Alamat</label>
            <input type="text" name="address" id="address">

            <button type="submit">
                submit
            </button>
        </form>
        </tbody>
        </table>
    </div>
    <a href="<?php echo site_url(''); ?>">Back to List</a>