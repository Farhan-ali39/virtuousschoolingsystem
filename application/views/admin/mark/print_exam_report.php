<?php
if($school_id == 1)
{
    if(!empty($examSchedule) and $examSchedule['status'] == 'yes' and !empty($examSchedule['result']))
    {
        foreach ($examSchedule['result'] as $student)
        {
            ?>
            <!DOCTYPE html>
            <html>
            <head>
                <title>Virtuous Schooling System</title>
                <style type="text/css">
                    #customers {
                        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                        border-collapse: collapse;
                        width: 100%;
                    }

                    #customers td, #customers th {
                        border: 1px solid black;
                        padding: 3px;
                    }

                    #customers tr:nth-child(even) {
                    }

                    #customers tr:hover {
                    }
                    .table_td_content{
                        font-size: 12px;
                        font-weight: bold;
                    }

                    #customers th {
                        padding-top: 3px;
                        padding-bottom: 3px;
                        text-align: left;
                        background-color: black;
                        color: white;
                    }

                    body {
                        width: 8.3in;
                        height: 10.2in;
                        margin: auto;
                        font-size: 12px;
                    }

                    .wrapper{
                        position: relative;
                        /*margin: .5in;*/
                        border: 1px solid black;
                        border-style: dashed;
                        padding: 15px;
                        height: 10.85in;
                        /*font-size: 14px;*/
                    }
                    @wrapper {
                        size: A4;
                        margin: 0;
                    }

                    @media print {
                        .wrapper {
                            margin: 0;
                            /*border: initial;*/
                            border-radius: initial;
                            width: initial;
                            min-height: initial;
                            /*box-shadow: initial;*/
                            /*background: initial;*/
                            page-break-after: always;
                        }
                    }


                </style>
            </head>
            <body>
            <div class="wrapper">
                <table style="margin-top: .3in; width: 100%">
                    <tr style="text-align: left;">
                        <th style="width: 100px;"><img src="<?= base_url('uploads/') ?>logo.jpg"></th>
                        <!--                                        <th style="padding-left: 155px;line-height: 5px;"><h2>Leadership School</h2>-->
                        <!--                                            <p>PECHS Campus</p>-->
                        <th style="padding-left: 155px;line-height: 5px;"><h2>Student 's Monthly Progress Report</h2>
                    </tr>
                </table>
                <div style=" height: 65px; float: left; width: 350px; border: 2px solid;">
                    <div style=" text-align: right;width: 30%; float: left;">
                        <b><p>Student Name:<br>
                                Class:<br>
                                Roll Number:</p></b>
                    </div>
                    <div style="text-align: left;width: 67%; float: right;">
                        <!--                    . " " . $student_exam_result[0]->lastname-->
                        <p><?= $student['firstname']." ".$student['lastname']  ?><br>
                            <?= $student['class_info'] ?><br>
                            <?= $student['roll_no'] ?></p>
                    </div>
                </div>
                <div style="float: right; width: 250px; border: 2px solid; height: 65px ;margin-bottom: 10px">
                    <div style="text-align: right;width: 30%; float: left;">
                        <b><p>
                                Session:<br>
                                Assessment :<br>
                                Month :<br>
                            </p></b>
                    </div>
                    <div style="text-align: left;width: 67%; float: right;">
                        <p>
                            <?=$student['current_session']?><br>
                            <?=$student['exam_info']?><br>
                            <?=date('F').'-'.date('Y')?><br>
                        </p>
                    </div>
                </div>
                <?php
                if(!empty($student['subjects_names_to_be_compare']))
                {
                    echo '<table id="customers" style="width:100%"><tr><th></th>';
                    foreach ($student['subjects_names_to_be_compare'] as $subject)
                    {
                        echo '<th>'.$subject['name'].'</th>';
                    }
                    echo '</tr>';
                    if(!empty($student['assessment_subject_groups']))
                    {
                        foreach ($student['assessment_subject_groups'] as $assessment_subject)
                        {
                            echo "<tr>";
                            echo "<td class='table_td_content'>".$assessment_subject['name']."</td>";
                            foreach ($student['subjects_names_to_be_compare'] as $subject)
                            {
                                if(!empty($assessment_subject['subject_'.$subject['id']]))
                                {
                                    echo "<td align='center' class='table_td_content'> ".$assessment_subject['subject_'.$subject['id']]."</td>";

                                }else{
                                    echo "<td align='center'>-</td>";

                                }
                            }
                            echo "</tr>";
                        }

                    }
                    echo '</table>';
                }
                if(!empty($student['exam_array']))
                {

                    foreach ($student['exam_array'] as $subject)if(!empty($subject['assessment_subjects']) and $subject['compare'] == 0)
                    {
                        $numberOfRows= ceil(count($subject['assessment_subjects'])/3);
                        if($numberOfRows != 0)
                        {
                        ?>
                            <table id="customers" style="margin-top: 2%">
                            <tr>
                                <th colspan="6" style="text-align: center"><?=$subject['exam_name']?></th>
                            </tr>
                            <?php
                            $outer_index=0;
                            $upto=3;
                            for ($i=0;$i<$numberOfRows;$i++)
                            {
                                echo "<tr>";
                                for ($j=$outer_index;$j<$upto;$j++)
                                {
                                    if(empty($subject['assessment_subjects'][$j]))
                                    {
                                        echo "<td align='center'></td>";
                                        echo "<td align='center'></td>";
                                        continue;
                                    }
                                     echo "<td class='table_td_content'>".$subject['assessment_subjects'][$j]['name']."</td>";
                                    if(!empty($subject['assessment_subjects'][$j]['grade']))
                                    {
                                        echo "<td class='table_td_content' align='center'>".$subject['assessment_subjects'][$j]['grade']."</td>";
                                    }else
                                    {
                                        echo "<td align='center'>-</td>";
                                    }
                                 }
                                echo "</tr>";
                                $outer_index=$j;
                                $upto+=3;
                            }
                             echo '</table>';
                        }
                    }

                }
                ?>
                 <table id="customers" style="margin-top: 2%">
                     <tr>
                         <th style="text-align: center">ACHIEVEMENT RATINGS</th>
                     </tr>
                    <tr>
                        <td class='table_td_content'>
                            <span style="margin-left: 30px; margin-right: 30px">A = Excellent</span>
                            <span style="margin-left: 30px; margin-right: 30px">B = Good</span>
                            <span style="margin-left: 30px; margin-right: 30px">C = Satisfactory</span>
                            <span style="margin-left: 30px; margin-right: 30px">D = Average</span>
                            <span style="margin-left: 30px; margin-right: 30px">N.I = Needs Improvement</span>
                        </td>
                    </tr>
                </table>
                 <table id="customers" style="margin-top: 30px;">
                    <tr>
                        <th style="text-align;">Class Teacher's Remarks:</th>
                    </tr>
                    <tr>
                        <td>
                            <?php
                            $remarks=$student['student_remarks'];

                            if (empty($remarks)) {
                                echo "No Remarks";
                            } else {
                                echo $remarks;
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%;position: absolute;
        bottom: 0px;">
                    <tr>
                        <th><p>-------------------<br>Class Teacher</p></th>
                        <th><p>-------------------<br>Principal</p></th>
                        <th><p>-------------------<br>Parent's Signature</p></th>
                    </tr>
                </table>

            </div>
            </body>
            </html>
            <?php
        }
    }
}
elseif($school_id == 2)
{
    if(!empty($examSchedule) and $examSchedule['status'] == 'yes' and !empty($examSchedule['result']))
    {
        foreach ($examSchedule['result'] as $student)
        {

    ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Virtuous Schooling System</title>
            <style type="text/css">
                #customers {
                    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                    border-collapse: collapse;
                    width: 100%;
                }

                #customers td, #customers th {
                    border: 1px solid black;
                    padding: 3px;
                }

                #customers tr:nth-child(even) {
                }

                #customers tr:hover {
                }

                #customers th {
                    padding-top: 3px;
                    padding-bottom: 3px;
                    text-align: left;
                    background-color: black;
                    color: white;
                }

                body {
                    width: 8.3in;
                    height: 10.2in;
                    margin: auto;
                    font-size: 12px;
                }

                .wrapper{
                    position: relative;
                    /*margin: .5in;*/
                    border: 1px solid black;
                    border-style: dashed;
                    padding: 15px;
                    height: 10.85in;
                    /*font-size: 14px;*/
                }
                @wrapper {
                    size: A4;
                    margin: 0;
                }

                @media print {
                    .wrapper {
                        margin: 0;
                        /*border: initial;*/
                        border-radius: initial;
                        width: initial;
                        min-height: initial;
                        /*box-shadow: initial;*/
                        /*background: initial;*/
                        page-break-after: always;
                    }
                }


            </style>
        </head>
        <body>
        <div class="wrapper">
             <table style="margin-top: .3in; width: 100%">
                <tr style="text-align: left;">
                    <th style="width: 100px;"><img src="<?= base_url('uploads/') ?>logo.jpg"></th>
<!--                                        <th style="padding-left: 155px;line-height: 5px;"><h2>Leadership School</h2>-->
<!--                                            <p>PECHS Campus</p>-->
                    <th style="padding-left: 155px;line-height: 5px;"><h2>Student 's Monthly Progress Report</h2>
                </tr>
            </table>
            <div style=" height: 65px; float: left; width: 350px; border: 2px solid;">
                <div style=" text-align: right;width: 30%; float: left;">
                    <b><p>Student Name:<br>
                            Class:<br>
                            Roll Number:</p></b>
                </div>
                <div style="text-align: left;width: 67%; float: right;">
                    <!--                    . " " . $student_exam_result[0]->lastname-->
                    <p><?= $student['firstname']." ".$student['lastname']  ?><br>
                        <?= $student['class_info'] ?><br>
                        <?= $student['roll_no'] ?></p>
                </div>
            </div>
            <div style="float: right; width: 250px; border: 2px solid; height: 65px ;margin-bottom: 10px">
                <div style="text-align: right;width: 30%; float: left;">
                    <b><p>
                            Session:<br>
                            Assessment :<br>
                            Month :<br>
                        </p></b>
                </div>
                <div style="text-align: left;width: 67%; float: right;">
                    <p>
                        <?=$student['current_session']?><br>
                        <?=$student['exam_info']?><br>
                        <?=date('F').'-'.date('Y')?><br>
                    </p>
                </div>
            </div>
            <div class="col-md-12">
                <center><h2 style="margin-left: 30%; display: -webkit-inline-box; display: inline-block;">ACADEMIC PERFORMANCE</h2></center>
            </div>
            <table id="customers" style="width:100%">
                <tr>
                    <th>Sr#</th>
                    <th>Subject</th>
                    <th>Total Marks</th>
                    <th>Obtained Marks</th>
                    <th>Total %</th>
                    <th>Grade</th>
                </tr>
                <?php
                $sr = 1;
                $total_obtain_marks = 0;
                $total_marks = 0;
                $ci =& get_instance();
                $ci->load->model('Examresult_model');
                foreach ($student['exam_array'] as $value) {
                    $total_obtain_marks = $total_obtain_marks + $value['get_marks'];
                    $total_marks = $total_marks + $value['full_marks'];
                    ?>
                    <tr>
                        <td><?= $sr ?></td>
                        <td><?= $value['exam_name'] ?></td>
                        <td style="text-align: center"><?= $value['full_marks'] ?></td>
                        <?php
                        if($value['attendence']=="ABS")
                        {
                            $get_marks="ABS";
                        }else
                        {
                            $get_marks=$value['get_marks'];
                        }
                        ?>
                        <td style="text-align: center"><?=$get_marks?></td>
                        <td style="text-align: center"><?=$get_marks?></td>
                        <td style="text-align: center"><?=$get_marks?></td>
                     </tr>

                    <?php
                    $sr++;
                }
                ?>
            </table>
            <table id="customers" style="width:100%;border: 1px solid black;margin-top:10px ">
                <tbody>
                <tr>
                    <td colspan="2">Overall percentage</td>
                    <td><?= $total_marks ?></td>
                    <td >Overall grade </td>
                    <td  ><?= round($total_obtain_marks / $total_marks * 100,2) ?>
                        %
                    </td>
                </tr>
                </tbody>
            </table>
            <table id="customers" style="width:100%;margin-top: 10px">
                <tr>
                     <th colspan="2">NON – CORE AREAS</th>
                     <th colspan="2">GENERAL PROGRESS</th>
                 </tr>
                <tbody>
                <?php
                $core_grades = (array)$student['core_grades'];
                $progress_grades = (array)$student['progress_grades'];
                for($i = 1; $i<=5;$i++)
                {
                    $core_subject_name = "";
                    $core_subject_grade = "";
                    $progress_subject_name = "";
                    $progress_subject_grade  = "";
                    if(!empty($core_grades))
                    {
                        $core_subject_name = get_subject_name(array_keys($core_grades)[0]);
                    }
                    if(!empty($progress_grades))
                    {
                        $progress_subject_name = get_subject_name(array_keys($progress_grades)[0]);
                    }

                    ?>
                    <tr style="width: 100%">
                        <td  style="width: 30%"><?=ucfirst($core_subject_name)?></td>
                        <td align="center" style="width: 20%"><?=reset($core_grades)?></td>
                        <td style="width: 30%"><?=ucfirst($progress_subject_name)?></td>
                        <td align="center" style="width: 20%"><?=reset($progress_grades)?></td>
                     </tr>
                    <?php
                    if(!empty($core_grades))
                        unset($core_grades[array_keys($core_grades)[0]]);
                    if(!empty($core_grades))
                        unset($progress_grades[array_keys($progress_grades)[0]]);
                }
                ?>
                </tbody>
            </table>
                <table id="customers" style="margin-top: 2%">
                 <tr>
                    <td>
                        <span style="margin-left: 50px; margin-right: 50px">Ex = Excellent</span>
                        <span style="margin-left: 50px; margin-right: 50px">G = Good</span>
                        <span style="margin-left: 50px; margin-right: 50px">S = Satisfactory</span>
                        <span style="margin-left: 50px; margin-right: 50px">N.I = Needs Improvement</span>
                    </td>
                </tr>
            </table>
            <table id="customers" style="width:250px; border: 1px solid; float: left; margin-top: 30px;">
                <tr>
                    <th colspan="5">Grades</th>
                </tr>
                <tr>
                    <td style="border: none;">A+</td>
                    <td style="border: none;">=</td>
                    <td style="border: none;">89.50</td>
                    <td style="border: none;">-</td>
                    <td style="border: none;">100</td>
                </tr>
                <tr>
                    <td style="border: none;">A</td>
                    <td style="border: none;">=</td>
                    <td style="border: none;">79.50</td>
                    <td style="border: none;">-</td>
                    <td style="border: none;">89.00</td>
                </tr>
                <tr>
                    <td style="border: none;">B</td>
                    <td style="border: none;">=</td>
                    <td style="border: none;">69.50</td>
                    <td style="border: none;">-</td>
                    <td style="border: none;">79.00</td>
                </tr>
                <tr>
                    <td style="border: none;">C</td>
                    <td style="border: none;">=</td>
                    <td style="border: none;">59.50</td>
                    <td style="border: none;">-</td>
                    <td style="border: none;">69.00</td>
                </tr>
                <tr>
                    <td style="border: none;">D</td>
                    <td style="border: none;">=</td>
                    <td style="border: none;">0.00</td>
                    <td style="border: none;">-</td>
                    <td style="border: none;">59.00</td>
                </tr>

            </table>
            <table id="customers" style="width:500px; float: right; margin-top: 30px;">
                <tr>
                    <th style="text-align;">Class Teacher's Remarks:</th>
                </tr>
                <tr>
                    <td>
                        <?php
                        $remarks=$student['student_remarks'];

                        if (empty($remarks)) {
                            echo "No Remarks";
                        } else {
                            echo $remarks;
                        }
                        ?>
                    </td>
                </tr>
            </table>
            <table style="width: 100%;position: absolute;
        bottom: 0px;">
                <tr>
                    <th><p>-------------------<br>Class Teacher</p></th>
                    <th><p>-------------------<br>Principal</p></th>
                    <th><p>-------------------<br>Parent's Signature</p></th>
                </tr>
            </table>

        </div>
        </body>
        </html>
    <?php
        }
    }
}
