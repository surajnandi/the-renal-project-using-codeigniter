<?php
$doctor_id = isset($doctor_id) ? $doctor_id : 'ADD';
$display = ($doctor_id == 'ADD') ? 'Add' : 'Edit';
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

                                    <input type="hidden" name="doctor_id" id="doctor_id">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Doctor Name</label>
                                            <input type="text" name="doctor_username" id="doctor_username" class="form-control" placeholder="Doctor Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Doctor Email iD</label>
                                            <input type="text" name="doctor_email_id" id="doctor_email_id" class="form-control" placeholder="Doctor Email">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Doctor Phone no.</label>
                                            <input type="text" name="doctor_phone" id="doctor_phone" class="form-control" placeholder="Doctor Phone no.">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Doctor Password</label>
                                            <input type="text" name="doctor_password" id="doctor_password" class="form-control" placeholder="Doctor Password">
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
    if ('<?= $doctor_id ?>' != 'ADD') {
        $("#doctor_id").val('<?= $show->doctor_id ?>');
        $("#doctor_username").val('<?= $show->doctor_username ?>');
        $("#doctor_email_id ").val('<?= $show->doctor_email_id ?>');
        $("#doctor_phone ").val('<?= $show->doctor_phone ?>');
        $("#doctor_password ").val('<?= $show->doctor_password ?>');
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

        var urlDoctorPhoneCheck = '<?= base_url('admin/doctor/doctor_phone_check') ?>';
        var urlDoctorEmailCheck = '<?= base_url('admin/doctor/doctor_email_check') ?>';

        $('#quickForm').validate({
            rules: {
                doctor_username: {
                    required: true,
                    maxlength: 200
                },
                doctor_email_id: {
                    required: true,
                    email: true,
                    maxlength: 250,
                    remote: {
                        url: urlDoctorEmailCheck,
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
                doctor_phone: {
                    required: true,
                    number: true,
                    maxlength: 10,
                    minlength: 10,
                    remote: {
                        url: urlDoctorPhoneCheck,
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

                doctor_password: {
                    required: true,
                    minlength: 5

                }
            },
            messages: {
                doctor_phone: {
                    remote: "Already used this Phone Number."
                },
                doctor_email_id: {
                    remote: "Already used this Email id."
                },
                doctor_password: {
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