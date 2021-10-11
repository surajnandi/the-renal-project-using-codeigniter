<?php
$patient_id = isset($patient_id) ? $patient_id : 'ADD';
$display = ($patient_id == 'ADD') ? 'Add' : 'Edit';
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

                                    <input type="hidden" name="patient_id" id="patient_id">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="patient_name" id="patient_name" class="form-control" placeholder="Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" name="patient_phone" id="patient_phone" class="form-control" placeholder="Phone">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Age</label>
                                            <input type="text" name="patient_age" id="patient_age" class="form-control" placeholder="Age">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input type="text" name="patient_dob" id="patient_dob" class="form-control" placeholder="Date of Birth">
                                        </div>
                                    </div>

                                    <!-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" name="patient_dob" id="patient_dob" class="form-control datetimepicker-input" data-target="#reservationdate">
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->


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
    if ('<?= $patient_id ?>' != 'ADD') {
        $("#patient_id").val('<?= $show->patient_id ?>');
        $("#patient_name").val('<?= $show->patient_name ?>');
        $("#patient_phone ").val('<?= $show->patient_phone ?>');
        $("#patient_age ").val('<?= $show->patient_age ?>');
        $("#patient_dob ").val('<?= $show->patient_dob ?>');
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

        var urlPatientPhoneCheck = '<?= base_url('staff/patient/patient_phone_check') ?>';
        $('#quickForm').validate({
            rules: {
                patient_name: {
                    required: true,
                    maxlength: 200
                },
                patient_phone: {
                    required: true,
                    number: true,
                    maxlength: 10,
                    minlength: 10,
                    remote: {
                        url: urlPatientPhoneCheck,
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
                patient_age: {
                    required: true,
                    maxlength: 500
                },
                patient_dob: {
                    required: true,
                    maxlength: 500
                }
            },
            messages: {
                patient_phone: {
                    remote: "Already used this Phone Number."
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



<!-- <script>
    $('#patient_dob').datepicker({
        uiLibrary: 'bootstrap'
    });
</script> -->



</body>

</html>