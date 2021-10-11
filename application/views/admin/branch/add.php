<?php
$branch_id = isset($branch_id) ? $branch_id : 'ADD';
$display = ($branch_id == 'ADD') ? 'Add' : 'Edit';
?>
<link rel="stylesheet" href="<?= base_url('assets/plugins/summernote/summernote-bs4.css') ?>">
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col col-sm-6">
                    <h1><?= $show_title ?> <?= $display ?></h1>
                </div>
                <div class="col col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url($bb_url) ?>"><?= $show_title ?></a></li>
                        <li class="breadcrumb-item active"><?= $display ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><?= $show_title ?> <small>Form</small><?php //print_r($show)
                                                                                            ?></h3>
                        </div>
                        <form role="form" id="quickForm" action="<?= base_url($submit_url) ?>" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">

                                    <input type="hidden" name="branch_id" id="branch_id">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Branch Name</label>
                                            <input type="text" name="branch_name" id="branch_name" class="form-control" placeholder="Branch Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Amount Per Patient</label>
                                            <input type="text" name="branch_amount_per_patient" id="branch_amount_per_patient" class="form-control" placeholder="Amount Per Patient">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" id="btnSubmit" class="btn btn-primary">Submit<span id="refresh_button2">... <i class="fa fa-spinner fa-spin"></i></span></button>
                                <a href="<?= base_url($bb_url) ?>"><button style="float: right;" type="button" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/summernote/summernote-bs4.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>
<script type="text/javascript">
    if ('<?= $branch_id ?>' != 'ADD') {
        $("#branch_id").val('<?= $show->branch_id ?>');
        $("#branch_name").val('<?= $show->branch_name ?>');
        $("#branch_amount_per_patient ").val('<?= $show->branch_amount_per_patient ?>');
    }
</script>
<script type="text/javascript">
    $(function() {
        // Summernote
        $('.textarea').summernote()
    })
    $(document).ready(function() {
        bsCustomFileInput.init();
        $("#refresh_button2").hide();
        $.validator.setDefaults({
            submitHandler: function() {
                // $("#quickForm").submit(function();
                $("#refresh_button2").show();
                $("#btnSubmit").prop('disabled', true);
                document.getElementById("quickForm").submit();
            }
        });

        $('#quickForm').validate({
            rules: {
                branch_name: {
                    required: true,
                    maxlength: 200
                },
                branch_amount_per_patient: {
                    required: true,
                    number: true,
                }
            },
            messages: {
                branch_amount_per_patient: {
                    remote: "Enter only number"
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
</body>

</html>