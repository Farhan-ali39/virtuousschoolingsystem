<style>
    @media screen and (max-width: 767px)
    {
        .table-responsive{
            overflow-y: scroll;
        }
    }
</style>
<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-map-o"></i> <?php echo $this->lang->line('examinations'); ?> <small><?php echo $this->lang->line('student_fee1'); ?></small>  </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                 <?php if ($this->session->flashdata('msg')) { ?>  <?php echo $this->session->flashdata('msg') ?> <?php } ?>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search"></i> <?php echo $this->lang->line('select_criteria'); ?></h3>
                    </div>
                    <form action="<?php echo site_url('admin/mark/subjects') ?>"  method="post" accept-charset="utf-8" id="schedule-form">
                        <div class="box-body">
                            <?php if ($this->session->flashdata('msg')) { ?>
                                <?php echo $this->session->flashdata('msg') ?>
                            <?php } ?>
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
                                </div><!-- /.col -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('exam_name'); ?></label>
                                        <select autofocus="" id="exam_id" name="exam_id" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php
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
                            <?php
                            if(!empty($schedule_subjects))
                            {?>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Select Subject</label>
                                        <select autofocus=""  id="exam_schedule_id" name="exam_schedule_id" class="form-control" >
                                            <option value="">Select</option>
                                            <?php

                                                foreach ($schedule_subjects as $schedule_subject)
                                                {
                                             ?>
                                                    <option value="<?=$schedule_subject['id']?>" <?php if($exam_schedule_id == $schedule_subject['id'])echo "selected"?> ><?=$schedule_subject['name']?></option>
                                                    <?php
                                                }

                                            ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('exam_schedule_id'); ?></span>
                                    </div>
                                </div><!-- /.col -->
                                <?php
                                }
                                ?>
                            </div>
                        </div><!-- /.box-body -->
                    </form>
                
                <?php
                if (isset($examSchedule)) {
                    ?>


                    <div class="box box-info">
                      <div class="box-header ptbnull"></div>  
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-users"></i> <?php echo $this->lang->line('fill_mark'); ?></h3>
                        </div>
                        <div class="box-body">
                            <?php
                            if (!empty($examSchedule)) {
                                ?>
                                <form role="form"    class="addmarks-form"   method="post" action="<?php echo site_url('admin/mark/create') ?>">
                                    <?php echo $this->customlib->getCSRF(); ?>
                                    <input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
                                    <input type="hidden" name="section_id" value="<?php echo $section_id; ?>">
                                    <input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>">
                                    <input type="hidden" name="school_id" value="<?php echo $school_id; ?>">
                                    <input type="hidden" name="save_exam_btn" value="save_exam">
                                    <div class="table-responsive" style="max-height: 500px">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th><?php echo $this->lang->line('roll_no'); ?></th>
                                                    <th>
                                                        <?php echo $this->lang->line('student'); ?>
                                                    </th>
                                                    <?php
                                                    $s = 0;
                                                    foreach ($examSchedule as $key => $student) {
                                                        if (!empty($student['exam_array'])) {
                                                            $exam_schedule = $student['exam_array'];
                                                             if ($s == 0) {
                                                                    ?>
                                                                    <th>
                                                                        <?php
                                                                        echo $exam_schedule['exam_name'] . " (" . substr($exam_schedule['exam_type'], 0, 2) . ": " . $exam_schedule['passing_marks'] . "/" . $exam_schedule['full_marks'] . ") ";
                                                                        ?>
                                                                    </th>
                                                                <?php
                                                            }
                                                        }
                                                        $s++;
                                                    }
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $s = 0;
                                                foreach ($examSchedule as $key => $student) {?>
                                                <input type="hidden" name="student[]" value="<?php echo $student['student_id'] ?>">
                                                    <?php
                                                    if (!empty($student['exam_array'])) {
                                                        if ($s == 0) {
                                                            $exam_schedule = $student['exam_array']
                                                                ?>
                                                                <input type="hidden" name="exam_schedule[]" value="<?php echo $exam_schedule['exam_schedule_id'] ?>">
                                                                <?php
                                                        }
                                                    }
                                                    $s++;
                                                }
                                                ?>

                                            <?php
                                            $sarr  = array();
                                            if(!empty($teacher_subjects)){
                                                foreach ($teacher_subjects as $tckey => $tcvalue) {
                                                    $sarr[] = $tcvalue['subject_id'];
                                                 }
                                            }
                                            $ci =& get_instance();
                                            $ci->load->model('Examresult_model');
                                            foreach ($examSchedule as $key => $student) {
                                                 if (!empty($student['exam_array'])) {
                                                     $n = 0;
                                                     $class = "";
                                                     $check = "";
                                                     $select_class='';
                                                     $extra_count=1;
                                                     $exam_schedule = $student['exam_array'];
                                                     if(!empty($sarr)){
                                                         if(in_array($exam_schedule['subject_id'], $sarr)){
                                                             $class = "";
                                                             $check = "";
                                                             $select_class="";
                                                         }else{
                                                             $class = "readonly";
                                                             $check = "disabled";
                                                             $select_class='disabled="true"';
                                                         }
                                                     }
                                                ?>

                                                <tr>
                                                    <td><?php echo $student['roll_no'] ?></td>
                                                    <td><?php echo $student['firstname'] . " " . $student['lastname']; ?> </td>
                                                         <td>
                                                            <div class="form-group">
                                                                <div class="checkbox">
                                                                    <label><input type="checkbox" <?php echo $check; ?> name="student_absent<?php echo $student['student_id'] . "_" . $exam_schedule['exam_schedule_id']; ?>" value="ABS" <?php if ($exam_schedule['attendence'] == "ABS") echo "checked"; ?>>Abs</label>

                                                                <input type="hidden" name="subject_id" value="<?php echo $exam_schedule["subject_id"] ?>">
                                                                <?php
                                                                if(empty($exam_schedule['get_marks']))
                                                                {
                                                                    $exam_schedule['get_marks']="0.00";
                                                                }
                                                                if($school_id==1)
                                                                {
                                                                    ?>
                                                                    <label for="CW">Select Grade</label>
                                                                    <select  <?=$select_class?> class="form-control" name="student_number<?php echo $student['student_id'] . "_" . $exam_schedule['exam_schedule_id']; ?>" id="subject_<?php echo $student['student_id'] . "_" . $exam_schedule['exam_schedule_id']; ?>" >
                                                                        <option value="A" <?php if($exam_schedule['get_marks'] == "A"){echo "selected";} ?> >A</option>
                                                                        <option value="B" <?php if($exam_schedule['get_marks'] == "B"){echo "selected";} ?> >B</option>
                                                                        <option value="C" <?php if($exam_schedule['get_marks'] == "C"){echo "selected";} ?>>C</option>
                                                                        <option value="D" <?php if($exam_schedule['get_marks'] == "D"){echo "selected";} ?>>D</option>

                                                                    </select>
                                                                    <?php
                                                                }elseif($school_id==2)
                                                                {
                                                                    ?>
                                                                    <input type="text" <?php echo $class; ?> name="student_number<?php echo $student['student_id'] . "_" . $exam_schedule['exam_schedule_id']; ?>" class="form-control input-sm" id="subject_<?php echo $student['student_id'] . "_" . $exam_schedule['exam_schedule_id']; ?>" value="<?php echo $exam_schedule['get_marks'] ?>" placeholder="Enter Marks">
                                                                    <?php
                                                                }else
                                                                {
                                                                    ?>
                                                                    <input type="text" <?php echo $class; ?> name="student_number<?php echo $student['student_id'] . "_" . $exam_schedule['exam_schedule_id']; ?>" class="form-control input-sm" id="subject_<?php echo $student['student_id'] . "_" . $exam_schedule['exam_schedule_id']; ?>" value="<?php echo $exam_schedule['get_marks'] ?>" placeholder="Enter Marks">
                                                                    <?php
                                                                }
                                                                ?>
                                                                <?php
                                                                $exam_type=$ci->Examresult_model->getExamType($exam_id);
                                                                if($school_id==2)
                                                                {
                                                                    ?>
                                                                    <?php
                                                                }
                                                                if($exam_type->exam_type==2 && $school_id==1)
                                                                {
                                                                    ?>
                                                                    <button style="margin: 5px" type="button" class="btn btn-primary " name="extra_grade_<?=$extra_count?>" data-toggle="modal" onclick="get_subject_extras(<?=$exam_schedule["subject_id"]?>,<?=$student['student_id']?>)" data-target="#extra_grade">Add Extra Grade</button>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </td>
                                                        <?php
                                                        $extra_count++;
                                                     ?>
                                                    </tr>
                                                     <?php
                                                     if($school_id == 2)
                                                     {
                                                          ?>
                                                         <tr>
                                                             <td colspan="3">
                                                                 <div class="col-md-12">
                                                                     <?php
                                                                     $core_areas_subjects = primary_extra_grades('core');
                                                                     foreach ($core_areas_subjects as $core_areas_subject)
                                                                     {
                                                                         $subject_key = $core_areas_subject['key'];
                                                                         $subject_name = $core_areas_subject['name'];
                                                                         $subject_grade = "";
                                                                         if(!empty($student['core_grades']))
                                                                         {
                                                                             if(!empty($student['core_grades']->$subject_key))
                                                                             {
                                                                                 $subject_grade = $student['core_grades']->$subject_key;
                                                                             }
                                                                         }
                                                                         ?>
                                                                         <div class="col-md-2">
                                                                             <label for="<?=$subject_key?>"><?=ucfirst($subject_name)?></label>
                                                                             <select id="<?=$subject_key?>" class="form-control" name="<?=$subject_key?>_<?php echo $student['student_id'] . "_" . $exam_schedule['exam_schedule_id']; ?>" >
                                                                                 <option value="">Select</option>
                                                                                 <option value="Ex" <?php   if( $subject_grade == "Ex")   {echo "selected";} ?> >Ex</option>
                                                                                 <option value="G"  <?php   if( $subject_grade == "G")    {echo "selected";} ?> >G</option>
                                                                                 <option value="S"  <?php   if( $subject_grade == "S")    {echo "selected";}?>>S</option>
                                                                                 <option value="NI" <?php   if( $subject_grade == "NI")   {echo "selected";}?>>N.I</option>

                                                                             </select>
                                                                         </div>
                                                                         <?php
                                                                     }
                                                                     ?>
                                                                 </div>
                                                             </td>
                                                         </tr>
                                                         <tr>
                                                                 <td colspan="3">
                                                                     <div class="col-md-12">
                                                                         <?php
                                                                         $general_progress_subjects = primary_extra_grades('progress');
                                                                         foreach ($general_progress_subjects as $progress_subject)
                                                                             {
                                                                                 $subject_key = $progress_subject['key'];
                                                                                 $subject_name = $progress_subject['name'];
                                                                                 $subject_grade = "";
                                                                                 if(!empty($student['progress_grades']))
                                                                                 {
                                                                                     if(!empty($student['progress_grades']->$subject_key))
                                                                                     {
                                                                                         $subject_grade = $student['progress_grades']->$subject_key;
                                                                                     }
                                                                                 }
                                                                                 ?>
                                                                                 <div class="col-md-2">
                                                                                     <label for="<?=$subject_key?>"><?=ucfirst($subject_name)?></label>
                                                                                     <select id="<?=$subject_key?>" class="form-control" name="<?=$subject_key?>_<?php echo $student['student_id'] . "_" . $exam_schedule['exam_schedule_id']; ?>" >
                                                                                         <option value="">Select</option>
                                                                                         <option value="Ex" <?php if( $subject_grade == "Ex"){echo "selected";} ?> >Ex</option>
                                                                                         <option value="G"  <?php if( $subject_grade == "G"){echo "selected";} ?> >G</option>
                                                                                         <option value="S"  <?php if( $subject_grade == "S"){echo "selected";}?>>S</option>
                                                                                         <option value="NI" <?php if( $subject_grade == "NI"){echo "selected";}?>>N.I</option>

                                                                                     </select>
                                                                                 </div>
                                                                                 <?php
                                                                             }
                                                                         ?>
                                                                     </div>


                                                                 </td>
                                                             </tr>
                                                         <?php
                                                     }
                                                     ?>
                                                     <tr>
                                                         <?php
                                                         $get_remarks=$ci->Examresult_model->getRemarks($student['student_id'],$exam_id);
                                                         ?>
                                                         <td colspan="3">
                                                             <textarea <?php echo $class; ?> name="remarks_<?=$student['student_id']?>"
                                                                    placeholder="Enter Remarks" class="form-control input-sm"
                                                                    id="remarks_<?=$student['student_id']?>" ><?php if(!empty($get_remarks)){echo $get_remarks->remarks;} ?></textarea>
                                                         </td>
                                                     </tr>
                                                <?php
                                                 }
                                                $exam_type=$ci->Examresult_model->getExamType($exam_id);
                                                if($exam_type->exam_type==2 && $school_id==2)
                                                {
                                                    $get_mid_term_extra_grades=$ci->Examresult_model->getMidTermExtrsGrades($student['student_id']);
                                                    ?>

                                                    <tr >
                                                        <td></td>
                                                        <td>
                                                            <label for="">PUNCTUALITY</label>
                                                            <select class="form-control" style="width: 95px;" name="PUNCTUALITY<?php echo $student['student_id']; ?>" >
                                                                <option value="EX" <?php if($get_mid_term_extra_grades->PUNCTUALITY == "EX"){echo "selected";} ?> >EX</option>
                                                                <option value="G"  <?php if($get_mid_term_extra_grades->PUNCTUALITY == "G"){echo "selected";} ?> >G</option>
                                                                <option value="S"  <?php if($get_mid_term_extra_grades->PUNCTUALITY == "S"){echo "selected";} ?> >S</option>
                                                                <option value="N.I"  <?php if($get_mid_term_extra_grades->PUNCTUALITY == "N.I"){echo "selected";} ?>>N.I</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <label for="">ART</label>
                                                            <select class="form-control " style="width: 95px;" name="Art<?php echo $student['student_id']; ?>" >
                                                                <option value="EX" <?php if($get_mid_term_extra_grades->Art == "EX"){echo "selected";} ?> >EX</option>
                                                                <option value="G"  <?php if($get_mid_term_extra_grades->Art == "G"){echo "selected";} ?> >G</option>
                                                                <option value="S"  <?php if($get_mid_term_extra_grades->Art == "S"){echo "selected";} ?> >S</option>
                                                                <option value="N.I"  <?php if($get_mid_term_extra_grades->Art == "N.I"){echo "selected";} ?>>N.I</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <label for="">ATTENDANCE</label>
                                                            <select class="form-control " style="width: 95px;" name="ATTENDANCE<?php echo $student['student_id']; ?>" >
                                                                <option value="EX" <?php if($get_mid_term_extra_grades->ATTENDANCE == "EX"){echo "selected";} ?> >EX</option>
                                                                <option value="G"  <?php if($get_mid_term_extra_grades->ATTENDANCE == "G"){echo "selected";} ?> >G</option>
                                                                <option value="S"  <?php if($get_mid_term_extra_grades->ATTENDANCE == "S"){echo "selected";} ?> >S</option>
                                                                <option value="N.I"  <?php if($get_mid_term_extra_grades->ATTENDANCE == "N.I"){echo "selected";} ?>>N.I</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <label for="">CLASS WORK</label>
                                                            <select class="form-control " style="width: 95px;" name="CLASS_WORK<?php echo $student['student_id']; ?>" >
                                                                <option value="EX" <?php if($get_mid_term_extra_grades->CLASS_WORK == "EX"){echo "selected";} ?> >EX</option>
                                                                <option value="G"  <?php if($get_mid_term_extra_grades->CLASS_WORK == "G"){echo "selected";} ?> >G</option>
                                                                <option value="S"  <?php if($get_mid_term_extra_grades->CLASS_WORK == "S"){echo "selected";} ?> >S</option>
                                                                <option value="N.I"  <?php if($get_mid_term_extra_grades->CLASS_WORK == "N.I"){echo "selected";} ?>>N.I</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <label for="">HOME WORK</label>
                                                            <select class="form-control " style="width: 95px;" name="Home_work<?php echo $student['student_id']; ?>" >
                                                                <option value="EX" <?php if($get_mid_term_extra_grades->Home_work == "EX"){echo "selected";} ?> >EX</option>
                                                                <option value="G"  <?php if($get_mid_term_extra_grades->Home_work == "G"){echo "selected";} ?> >G</option>
                                                                <option value="S"  <?php if($get_mid_term_extra_grades->Home_work == "S"){echo "selected";} ?> >S</option>
                                                                <option value="N.I"  <?php if($get_mid_term_extra_grades->Home_work == "N.I"){echo "selected";} ?>>N.I</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <label for="">P.E & GAME</label>
                                                            <select class="form-control " style="width: 95px;" name="GAME<?php echo $student['student_id']; ?>" >
                                                                <option value="EX" <?php if($get_mid_term_extra_grades->GAME == "EX"){echo "selected";} ?> >EX</option>
                                                                <option value="G"  <?php if($get_mid_term_extra_grades->GAME == "G"){echo "selected";} ?> >G</option>
                                                                <option value="S"  <?php if($get_mid_term_extra_grades->GAME == "S"){echo "selected";} ?> >S</option>
                                                                <option value="N.I"  <?php if($get_mid_term_extra_grades->GAME == "N.I"){echo "selected";} ?>>N.I</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <label for="">CONDUCT</label>
                                                            <select class="form-control " style="width: 95px;" name="CONDUCT<?php echo $student['student_id']; ?>" >
                                                                <option value="EX" <?php if($get_mid_term_extra_grades->CONDUCT == "EX"){echo "selected";} ?> >EX</option>
                                                                <option value="G"  <?php if($get_mid_term_extra_grades->CONDUCT == "G"){echo "selected";} ?> >G</option>
                                                                <option value="S"  <?php if($get_mid_term_extra_grades->CONDUCT == "S"){echo "selected";} ?> >S</option>
                                                                <option value="N.I"  <?php if($get_mid_term_extra_grades->CONDUCT == "N.I"){echo "selected";} ?>>N.I</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <label for="">PRESENTATION</label>
                                                            <select class="form-control " style="width: 95px;" name="PRESENTATION<?php echo $student['student_id']; ?>" >
                                                                <option value="EX" <?php if($get_mid_term_extra_grades->PRESENTATION == "EX"){echo "selected";} ?> >EX</option>
                                                                <option value="G"  <?php if($get_mid_term_extra_grades->PRESENTATION == "G"){echo "selected";} ?> >G</option>
                                                                <option value="S"  <?php if($get_mid_term_extra_grades->PRESENTATION == "S"){echo "selected";} ?> >S</option>
                                                                <option value="N.I"  <?php if($get_mid_term_extra_grades->PRESENTATION == "N.I"){echo "selected";} ?>>N.I</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="submit"   class="btn btn-primary pull-right" name="save_exam" value="save_exam"><?php echo $this->lang->line('save'); ?></button>
                                </form>
                                <?php
                            } else {
                                ?>

                                <div class="alert alert-info">
                                    <?php echo $this->lang->line('no_record_found'); ?>
                                </div>


                                <?php
                            }
                            ?>
                        </div><!---./end box-body--->
                    </div>
                  </div>  
                </div>            

            </div>   <!-- /.row -->
            <?php
        } else {
            
        }
        ?>

    </section><!-- /.content -->
</div>
<!--Extra Grade Model-->
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="save_extra_grade" class="btn btn-primary" >Save</button>

                </div>
            </form>
        </div>

    </div>
</div>
<!--End of Extra Grade Model-->

<script type="text/javascript">
    function inputForm() {
       
        $.post("<?=base_url('admin/mark/createtest')?>", $("#formInputs").serialize());

    }

    $(document).ready(function () {
        $(document).on('change', '#class_id', function (e) {
            $('#section_id').html("");
            var class_id = $(this).val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
            var url = "<?php
        $userdata = $this->customlib->getUserData();
        if (($userdata["role_id"] == 2)) {
            echo "getClassTeacherSection";
        } else {
            echo "getByClass";
        }
        ?>";
            $.ajax({
                type: "GET",
                url: base_url + "sections/" + url,
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
        var section_id = $(this).val();
        if(section_id != "")
        {
            $("form#schedule-form").submit();
        }
     });
    $(document).on('change', '#exam_schedule_id', function (e) {
        var exam_schedule_id = $(this).val();
        if(exam_schedule_id != "")
        {
             $("form#schedule-form").submit();
        }
    });
</script>
<script src="<?php echo base_url(); ?>backend/custom/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/custom/bootstrap-datepicker.js"></script>
<script>
    $('.sandbox-container').datepicker({
        autoclose: true,
        format: "dd-mm-yyyy"
    });
    $(function () {
        $('.addmarks-form').validate({

            submitHandler: function (form) {
                form.submit();
            }
        });

        $('input[id^="subject_"]').each(function () {
            $(this).rules('add', {
                required: true,
                messages: {
                    required: "Required"
                }
            });
        });
    });
    var class_id = $('#class_id').val();
    var section_id = '<?php echo set_value('section_id') ?>';
    getSectionByClass(class_id, section_id);
    function getSectionByClass(class_id, section_id) {
        if (class_id != "" && section_id != "") {
            $('#section_id').html("");
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
            var url = "<?php
        $userdata = $this->customlib->getUserData();
        if (($userdata["role_id"] == 2)) {
            echo "getClassTeacherSection";
        } else {
            echo "getByClass";
        }
        ?>";
            $.ajax({
                type: "GET",
                url: base_url + "sections/" + url,
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

            }
        });
    }
    $("#save_extra_grade").click(function(){
        $.post("<?=base_url('admin/Mark/addSubjectExtras')?>", $("#extra_grade_form").serialize());
        $('#extra_grade').modal('toggle');
    });

</script>