<div class="content-wrapper" style="min-height: 946px;">
    <section class="content-header">
        <h1>
            <i class="fa fa-map-o"></i> <?php echo $this->lang->line('examinations'); ?> <small><?php echo $this->lang->line('student_fee1'); ?></small> </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php if ($this->session->flashdata('msg')) { ?>
                                <?php echo $this->session->flashdata('msg') ?>
                            <?php } ?>
        <?php $this->load->view('reports/_examinations');?>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                 
                <!-- general form elements -->
                <div class="box removeboxmius">
                    <div class="box-header ptbnull"></div>
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search"></i> <?php echo $this->lang->line('select_criteria'); ?></h3>
                        <div class="box-tools pull-right">
                            <?php if ($this->rbac->hasPrivilege('design_marksheet', 'can_add')) { ?>
                                <a href="<?php echo base_url(); ?>admin/mark/subjects" class="btn btn-primary btn-sm"  data-toggle="tooltip" title="<?php echo $this->lang->line('add'); ?>" >
                                    <i class="fa fa-plus"></i> <?php echo $this->lang->line('add'); ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <form action="<?php echo site_url('admin/mark') ?>"  method="post" accept-charset="utf-8" id="schedule-form">
                        <div class="box-body">
                            <div class="row">
                                <input type="hidden" name="save_exam" value="search" >                               
                                <?php echo $this->customlib->getCSRF(); ?>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">School</label>
                                        <select autofocus=""  id="school_id" name="school_id" class="form-control" onchange="get_school_classes()" >
                                            <option value="1" <?php if($school_id=="1")echo "selected"?> >Pre-Primary</option>
                                            <option value="2"  <?php if($school_id=="2")echo "selected"?> >Primary and Secondary</option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('exam_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('exam_name'); ?></label>

                                        <select autofocus="" id="exam_id" name="exam_id" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php
                                            $count=0;
                                            foreach ($examlist as $exam) {
                                                ?>
                                                <option value="<?php echo $exam['id'] ?>" <?php
                                                if ($exam_id == $exam['id']) {
                                                    echo "selected =selected";
                                                }
                                                ?>><?php echo $exam['name'] ?></option>
                                                        <?php
                                                        $count++;
                                                    }
                                                    ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('exam_id'); ?></span>
                                    </div>
                                </div><!-- /.col -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('class'); ?></label>
                                        <select  id="class_id" name="class_id" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php
                                            foreach ($classlist as $class) {
                                                ?>
                                                <option value="<?php echo $class['id'] ?>" <?php
                                                if ($class_id == $class['id']) {
                                                    echo "selected =selected";
                                                }
                                                ?>><?php echo $class['class'] ?></option>

                                                <?php
                                                $count++;
                                            }
                                            ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                    </div>
                                </div><!-- /.col -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('section'); ?></label>
                                        <select  id="section_id" name="section_id" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                    </div>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.box-body -->
                    </form>
                     
                
                <?php
                if (isset($examSchedule['status'])) {
                    ?>
                    <div class="box-header ptbnull"></div>
                    <div class="">
                        <div class="box-header with-border">
                            <h3 class="box-title">
                                <i class="fa fa-list"></i> <?php echo $this->lang->line('marks_register'); ?></h3>
                        </div>
                        <div class="box-body">
                            <?php
                            if ($examSchedule['status'] == "yes") {
                                $ci =& get_instance();
                                $ci->load->model('Examresult_model');
                                ?>

                                <form role="form" id="" class="" method="post" action="<?php echo site_url('admin/mark/create') ?>">
                                    <?php echo $this->customlib->getCSRF(); ?>
                                    <input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
                                    <input type="hidden" name="section_id" value="<?php echo $section_id; ?>">
                                    <input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>">
                                    <div class="table-responsive">
                                        <div class="download_label"><?php echo $this->lang->line('marks_register'); ?></div>
                                        <table class="table table-striped table-bordered table-hover example">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <?php echo $this->lang->line('roll_no'); ?>
                                                    </th>
                                                    <th>
                                                        <?php echo $this->lang->line('student'); ?>
                                                    </th>
                                                    <th>
                                                        <?php echo $this->lang->line('father_name'); ?>
                                                    </th>
                                                    <?php
                                                    $s = 0;
                                                    if ($examSchedule['status'] == "yes") {
                                                        foreach ($examSchedule['result'] as $key => $st) {
                                                            if ($s == 0) {
                                                                foreach ($st['exam_array'] as $key => $exam_schedule) {
                                                                    ?>
                                                                    <th>
                                                                        <?php
                                                                        echo $exam_schedule['exam_name'] . "<br/> (" . substr($exam_schedule['exam_type'], 0, 2) . ": " . $exam_schedule['passing_marks'] . "/" . $exam_schedule['full_marks'] . ") ";
                                                                        ?>
                                                                    </th>
                                                                    <?php
                                                                }
                                                            }
                                                            $s++;
                                                        }
                                                    } else {
                                                        ?>

                                                        <?php
                                                    }
                                                    ?>
                                                    <th><?php echo $this->lang->line('grand_total'); ?></th>
                                                    <th><?php echo $this->lang->line('percent') . ' (%)'; ?></th>
                                                    <th><?php echo $this->lang->line('result'); ?></th>
                                                    <th>Remarks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach ($examSchedule['result'] as $key => $student) {
                                                $total_marks = 0;
                                                $obtain_marks = "0";
                                                $result = "Pass";
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $student['roll_no'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $student['firstname'] . " " . $student['lastname']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $student['father_name'] ?>
                                                    </td>
                                                    <?php
                                                    if (!empty($student['exam_array'])) {
                                                        $s = 0;
                                                        foreach ($student['exam_array'] as $key => $exam_schedule) {
                                                            $total_marks = (int) $total_marks + (int) $exam_schedule['full_marks'];
                                                            ?>
                                                            <td align="center">
                                                                <?php
                                                                if (!isset($exam_schedule['attendence'])) {
                                                                    echo "N/A";
                                                                    $result = "N/A";
                                                                } else {
                                                                    if ($exam_schedule['attendence'] == "pre") {
                                                                        echo $get_marks_student = $exam_schedule['get_marks'];
                                                                        $passing_marks_student = $exam_schedule['passing_marks'];
                                                                        if ($result == "Pass") {
                                                                            if ($get_marks_student < $passing_marks_student) {
                                                                                $result = "Fail";
                                                                            }
                                                                        }
                                                                        if($school_id==1)
                                                                        {
                                                                            $obtain_marks=$exam_schedule['get_marks'];
                                                                        }else{
                                                                            $obtain_marks = $obtain_marks + $exam_schedule['get_marks'];

                                                                        }
                                                                    } else {
                                                                        $result = "Fail";
                                                                        $s++;
                                                                        echo ($exam_schedule['attendence']);
                                                                    }
                                                                }
                                                                ?>
                                                            </td>
                                                            <?php
                                                        }
                                                        if ($s == count($student['exam_array'])) {
                                                            $obtain_marks = 0;
                                                        }
                                                        ?>
                                                        <td> <?php echo $obtain_marks . " /" . $total_marks; ?> </td>
                                                        <td> <?php
                                                            if($school_id==1)
                                                            {
                                                                echo $obtain_marks;
                                                            }else{
                                                                $per = $obtain_marks * 100 / $total_marks;
                                                                echo number_format($per, 2, '.', '');
                                                            }
                                                            ?>

                                                        </td>
                                                        <th><?php
                                                            if ($result == "Pass") {

                                                                echo "<label class='label label-success'>";
                                                            } else {

                                                                echo "<label class='label label-danger'>";
                                                            }
                                                            echo $result;
                                                            echo "<label/>";
                                                            ?></th>
                                                        <th>
                                                            <?php

                                                            $remarks_data = $this->Examresult_model->getRemarks($student['student_id'],$exam_id);
                                                            $remarks = "";
                                                            if(!empty($remarks_data))
                                                            {
                                                                $remarks =  $remarks_data->remarks;
                                                            }
                                                             ?>
                                                            <i class="fa fa-info-circle" data-toggle="tooltip"   title="<?=$remarks?>" ></i>
                                                        </th>
                                                        <?php
                                                    }
                                                    ?>
                                                </tr>
                                                 <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                                <?php
                            } else {
                                ?>
                                <div class="alert alert-info"><?php echo $this->lang->line('no_record_found'); ?></div>
                                <?php
                            }
                            ?>

                        </div><!---./end box-body--->
                    </div>
                  </div><!--./box box-primary-->  
                </div><!--./col-md-12-->
            </div>   <!-- /.row -->
            <?php
        } else {
            
        }
        ?>
    </section><!-- /.content -->
</div>
<!-- Modal -->
<div class="modal fade" id="extra_grade" role="dialog">
    <div class="modal-dialog" style="margin-right: 40%;">

        <!-- Modal content-->
        <div class="modal-content" style="width: 150%;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Select Grades</h4>
            </div>
            <form method="post"  id="extra_grade_form" role="form" >

                <div class="modal-body">
                    <div id="extra_grade_data">
                    </div>

                </div>
                <div class="modal-footer" style="margin-top: 50px">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <!--                    <button type="button" id="save_extra_grade" class="btn btn-primary" >Save</button>-->

                </div>
            </form>
        </div>

    </div>
</div>
<!--End of Extra Grade Model-->


<script type="text/javascript">
    function getSectionByClass(class_id, section_id) {
        if (class_id != "" && section_id != "") {
            $('#section_id').html("");
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
            $.ajax({
                type: "GET",
                url: base_url + "sections/getByClass",
                data: {'class_id': class_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        var sel = "";
                        if (section_id == obj.section_id) {
                            sel = "selected";
                        }
                        div_data += "<option value=" + obj.section_id + " " + sel + ">" + obj.section + "</option>";
                    });
                    $('#section_id').append(div_data);
                }
            });
        }
    }

    $(document).ready(function () {
        $(document).on('change', '#class_id', function (e) {
            $('#section_id').html("");
            var class_id = $(this).val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
            $.ajax({
                type: "GET",
                url: base_url + "sections/getByClass",
                data: {'class_id': class_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.section_id + ">" + obj.section + "</option>";
                    });
                    $('#section_id').append(div_data);
                }
            });
        });
        var class_id = $('#class_id').val();
        var section_id = '<?php echo set_value('section_id') ?>';
        getSectionByClass(class_id, section_id);
        $(document).on('change', '#feecategory_id', function (e) {
            $('#feetype_id').html("");
            var feecategory_id = $(this).val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
            $.ajax({
                type: "GET",
                url: base_url + "feemaster/getByFeecategory",
                data: {'feecategory_id': feecategory_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.id + ">" + obj.type + "</option>";
                    });
                    $('#feetype_id').append(div_data);
                }
            });
        });
    });
    $(document).on('change', '#section_id', function (e) {
        if($(this).val() != "")
        {
            $("form#schedule-form").submit();
        }
    });
    function get_school_classes() {
        var school_id=  $('#school_id').val();
        $.ajax({
            url:"<?=base_url('admin/Mark/get_school_classes')?>",
            method:"POST",
            data:{
                school_id: school_id
            },
//            dataType: "json",
            success:function (response) {
                $('#class_id').html(" ");
                $('#class_id').html(response);

            }
        });

    }
    function get_subject_extras(subject_id,student_id) {
        $.ajax({
            url:"<?=base_url('admin/Mark/getSubjectExtras')?>",
            method:"POST",
            data:{
                subject_id: subject_id,
                student_id:student_id
            },
//            dataType: "json",
            success:function (response) {
                $('#extra_grade_data').html(" ");
                $('#extra_grade_data').html(response);
                $('.extra_grade_disable').attr("disabled",true);

            }
        });
    }
</script>