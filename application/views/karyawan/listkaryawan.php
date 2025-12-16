

<!-- ADD BUTTON -->

    <div class="wrapperlistcontent px-5">

        <div class="addmaster" style="display: flex;">
            <a href="<?php
                        echo site_url('register'); ?>" class="btn btn-primary mb-3">
                Add Karyawan
            </a>

            <a href="<?php echo site_url('department'); ?>" class="btn btn-primary mb-3 mx-3">
                Add Department
            </a>

        </div>

        <div class="table-responsive-xxl">
            <!-- TABLE -->
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name Mhs</th>
                        <th>NIK</th>
                        <th>Department</th>
                        <th>Address</th>
                        <th width="160">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (!empty($karyawan)): ?>
                        <?php foreach ($karyawan as $key => $item): ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $item['name_mhs']; ?></td>
                                <td><?php echo $item['nik']; ?></td>
                                <td><?php echo empty($item['name_dprtmn']) ? "unassigned" : $item['name_dprtmn']; ?></td>
                                <td><?php echo $item['address']; ?></td>
                                <td>
                                    <!-- UPDATE -->
                                    <a href="<?php echo site_url('karyawan/detail/' . $item['id_krywn']); ?>"
                                        class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <!-- DELETE -->
                                    <a href="<?php echo site_url('karyawan/delete/' . $item['id_krywn']); ?>"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure to delete this data?');">
                                        Delete
                                    </a>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>

                        <tr>
                            <td colspan="5" class="text-center">No data available.</td>
                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>
        </div>

    </div>