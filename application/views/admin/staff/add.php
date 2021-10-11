<?php
$staff_id = isset($staff_id) ? $staff_id : 'ADD';
$display = ($staff_id == 'ADD') ? 'Add' : 'Edit';
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

                                    <input type="hidden" name="staff_id" id="staff_id">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Staff Name</label>
                                            <input type="text" name="staff_username" id="staff_username" class="form-control" placeholder="Staff Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Staff Email iD</label>
                                            <input type="text" name="staff_email_id" id="staff_email_id" class="form-control" placeholder="Staff Email">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Staff Phone no.</label>
                                            <input type="text" name="staff_phone" id="staff_phone" class="form-control" placeholder="Staff Phone no.">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Staff Password</label>
                                            <input type="text" name="staff_password" id="staff_password" class="form-control" placeholder="Staff Password">
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
    if ('<?= $staff_id ?>' != 'ADD') {
        $("#staff_id").val('<?= $show->staff_id ?>');
        $("#staff_username").val('<?= $show->staff_username ?>');
        $("#staff_email_id ").val('<?= $show->staff_email_id ?>');
        $("#staff_phone ").val('<?= $show->staff_phone ?>');
        $("#staff_password ").val('<?= $show->staff_password ?>');
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

        var urlStaffPhoneCheck = '<?= base_url('admin/staff/staff_phone_check') ?>';
        var urlStaffEmailCheck = '<?= base_url('admin/staff/staff_email_check') ?>';

        $('#quickForm').validate({
            rules: {
                staff_username: {
                    required: true,
                    maxlength: 200
                },
                staff_email_id: {
                    required: true,
                    email: true,
                    maxlength: 250,
                    remote: {
                        url: urlStaffEmailCheck,
                        type: "POST",
                        cache: false,
                        dataType: "json",
                        dataFilter: function(data) {
                            var json = $.parseJSON(data);
                            if (json.status) {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    }
                },
                staff_phone: {
                    required: true,
                    number: true,
                    maxlength: 10,
                    minlength: 10,
                    remote: {
                        url: urlStaffPhoneCheck,
                        type: "POST",
                        cache: false,
                        dataType: "json",
                        dataFilter: function(data) {
                            var json = $.parseJSON(data);
                            if (json.status) {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    }
                },

                staff_password: {
                    required: true,
                    minlength: 5

                }
            },
            messages: {
                staff_phone: {
                    remote: "Already used this Phone Number."
                },
                staff_email_id: {
                    remote: "Already used this Email id."
                },
                staff_password: {
                    remote: "Enter atleast 5 characters Password"
                }
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