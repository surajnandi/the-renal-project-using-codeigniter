<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col col-sm-6">
                    <h1><?= $show_title ?></h1>
                </div>
                <div class="col col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?= $show_title ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?= $show_title ?> List</h3>
                            <a href="<?= base_url($bb_url) ?>"><button style="float: right;" type="button" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i><strong> ADD</strong></button></a>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Branch Name</th>
                                        <th>Amount Per Patient</th>
                                        <th style="width: 120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php if (!empty($list)) {
                                        $cl_no = 0;
                                        foreach ($list as $val) {
                                            $cl_no += 1;

                                    ?>
                                            <tr>
                                                <td><?= $cl_no ?></td>
                                                <td><?= $val->branch_name ?></td>
                                                <td>
                                                    <?= $val->branch_amount_per_patient ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-info btn-sm" href="<?= base_url('admin/branch/edit/' . $val->branch_id) ?>" title="Edit"><i class="fas fa-pencil-alt"> </i> Edit</a>

                                                    <a class="btn btn-danger btn-sm" href="#!" title="delete" onclick="myFunctionDelete('<?= base_url('admin/branch/branch_delete/' . $val->branch_id) ?>')"><i class="fas fa-trash"> </i> Delete</a>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });

    function myFunctionDelete(send_url) {
        // alert(send_url);
        $.confirm({
            title: 'Are You Sure?',
            content: "<p style='font-size:0.8em;'>It will delete the item permanently</p>",
            theme: 'modern',
            type: 'red',
            buttons: {
                cancel: function() {},
                somethingElse: {
                    text: 'Delete',
                    btnClass: 'btn-red',
                    keys: ['Y', 'shift'],
                    action: function() {
                        // location.href = this.$target.attr('href');
                        window.location.replace(send_url);
                    }
                }
            }
        });
    }
</script>