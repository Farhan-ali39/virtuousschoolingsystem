


<style>
    .footer {
        overflow: auto;
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: white;
        color: cornflowerblue;
        height: 80px;
    }
    .circle-icon {
        background: #e3e2e2;
        padding:10px;
        border-radius: 50%;
    }

    #mydiv ul li a i:hover, i:active, i:focus
    {
        background-color: #0084B4;
        color: white;
    }

    .hideangle a i:hover, i:active, i:focus
    {
        background-color: transparent !important;
        color: #0084B4 !important;
    }


    .mt5
    {
        margin-left: 5px;
    }
    .mt10
    {
        margin-left: 10px;
    }
    .mt40
    {
        margin-left: 40px;
    }
    .mt30
    {
        margin-left: 30px;
    }
    .mt15
    {
        margin-left: 15px;
    }
    .float{
        z-index: 1;
        position:fixed;
        /*width:60px;*/
        /*height:60px;*/
        bottom: 0px;
        right: 5px;
        /*left: 12%;*/
        /*background-color:#0C9;*/
        color:#0084B4;
        /*border-radius:50px;*/
        text-align:center;
        /*box-shadow: 2px 2px 3px #999;*/
    }

    .my-float{
        margin-top:22px;
        font-size: 40px;
    }
</style>
<?php
if(isset($pageName))
{
    if($pageName=="dashboard")
    {
        ?>
<style>
    .fixed_footer{

        display: block;
    }
</style>
        <input type="hidden" id="footerDisplayVal" value="1">
        <?php
    }else{
        ?>
        <style>
            .fixed_footer{
        display: none;
}
</style>
        <input type="hidden" id="footerDisplayVal" value="0">
<?php
}
}
else{
        ?>
<style>
    .fixed_footer{
        display: none;
    }
</style>
    <input type="hidden" id="footerDisplayVal" value="0">
    <?php
}
?>

<script src="<?php echo base_url(); ?>backend/dist/js/moment.min.js"></script>

<!--<footer class="main-footer">-->
<!--    &copy;  --><?php //echo date('Y'); ?><!-- -->
<!--    --><?php //echo $this->customlib->getAppName(); ?><!-- --><?php //echo $this->customlib->getAppVersion(); ?>
<!--</footer>-->
<div class="control-sidebar-bg"></div>
</div>


<a   class="float" onclick="footerDisp()" >
         <i class="fa fa-angle-double-up my-float"></i>
</a>
<div class="footer fixed_footer" id="mydiv"  style="z-index: 1" align="center">
    <ul class="list-inline dropdown"  >
        <li class="list-inline-item   "> <a href="#" data-target="#smart_edu" data-toggle="modal" > <i class="fa fa-desktop fa-2x circle-icon  mt10"></i> <br> Smart Edu </a>  </li>
        <li class="list-inline-item   "> <a href="#" data-target="#microsoft" data-toggle="modal" > <i class="fa fa-cloud fa-2x circle-icon  mt10"></i> <br> Microsoft </a>  </li>
        <li class="list-inline-item   "> <a href="<?=base_url('student/FacebookProfile')?>" > <i class="fa fa-facebook-official fa-2x circle-icon  mt10"></i> <br> facebook </a>  </li>
        <?php
        if ($this->rbac->hasPrivilege('student', 'can_add')) {
            ?>
            <li class="list-inline-item   "> <a href="<?=base_url('student/search')?>"> <i class="fa fa-user-plus fa-2x circle-icon mt10"></i> <br> Student Info </a>  </li>
            <?php
        }
        ?>

        <?php
        if ($this->rbac->hasPrivilege('student_attendance', 'can_view')) {
            ?>
            <li class="list-inline-item   "> <a href="<?=base_url('admin/stuattendence')?>"> <i class="fa fa-calendar-check-o fa-2x circle-icon mt10 "></i> <br> Attendance   </a>  </li>

            <?php
        }
        if (($this->rbac->hasPrivilege('upload_content', 'can_view'))) {
            ?>
             <li class="list-inline-item   "> <a href="<?=base_url('admin/content/assignment')?>"> <i class="fa fa-file-o fa-2x circle-icon mt15"></i> <br> Assignment</a>  </li>

             <?php
        }
        if (($this->rbac->hasPrivilege('homework', 'can_view'))) {
            ?>
             <li class="list-inline-item   "> <a href="<?=base_url('homework')?>"> <i class="fa fa-flask ftlayer fa-2x circle-icon mt15"></i> <br> Homework</a>  </li>

             <?php
        }
        if ($this->rbac->hasPrivilege('notice_board', 'can_view')) {
            ?>
             <li class="list-inline-item   "> <a href="<?=base_url('admin/notification')?>"> <i class="fa fa-bullhorn fa-2x circle-icon"></i> <br> <span class="mt5">Notice</span> </a>  </li>

             <?php
        }
        if ($this->rbac->hasPrivilege('email_sms', 'can_view')) {
            ?>
             <li class="list-inline-item   "> <a href="<?=base_url('admin/mailsms/compose')?>"> <i class="fa fa-inbox fa-2x circle-icon"></i> <br> <span class="mt5">SMS</span></a>  </li>

             <?php
        }
        if ($this->rbac->hasPrivilege('collect_fees', 'can_view')) { ?>

             <li class="list-inline-item   "> <a href="<?=base_url('studentfee/feeCollectionSearch')?>"> <i class="fa fa-money fa-2x circle-icon mt5"></i> <br> Fee Collect</a>  </li>

             <?php
        }
        if ($this->rbac->hasPrivilege('expense', 'can_view')) {
            ?>
             <li class="list-inline-item   "> <a href="<?=base_url('admin/expense')?>"> <i class="fa fa-bank fa-2x circle-icon mt5"></i> <br>Expenses</a>  </li>

             <?php
        }
        if ($this->rbac->hasPrivilege('complaint', 'can_view')) {
            ?>
             <li class="list-inline-item   "> <a href="<?=base_url('admin/complaint')?>"> <i class="fa fa-comment-o fa-2x circle-icon mt5"></i> <br>Complain</a>  </li>

             <?php
        }
        if ($this->rbac->hasPrivilege('admission_enquiry', 'can_view')) {
            ?>
             <li class="list-inline-item   "> <a href="<?=base_url('admin/enquiry')?>"> <i class="fa fa-calendar-check-o fa-2x circle-icon  "></i> <br>  Inquiry</a>  </li>

             <?php
        }

        ?>
        <li  class="list-inline-item  hideangle " style="float: right;padding-right: 20px;">
            <a onclick="footerDisp()"  class="d-flex">
                 <i class="fa fa-angle-double-down fa-3x"> </i>
            </a>
        </li>
    </ul>

</div>

<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<?php
$language = $this->customlib->getLanguage();
  $language_name = $language["short_code"];

 ?>
<link href="<?php echo base_url(); ?>backend/toast-alert/toastr.css" rel="stylesheet"/>
<script src="<?php echo base_url(); ?>backend/toast-alert/toastr.js"></script>
<script src="<?php echo base_url(); ?>backend/bootstrap/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/select2/select2.min.css">
<script src="<?php echo base_url(); ?>backend/plugins/select2/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="<?php echo base_url(); ?>backend/dist/js/moment.min.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!--<script src="--><?php //echo base_url(); ?><!--backend/plugins/slimScroll/jquery.slimscroll.js"></script>-->
<script src="<?php echo base_url(); ?>backend/dist/js/jquery.mCustomScrollbar.concat.min.js"></script>
<!--language js-->
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/js/bootstrap-select.min.js"></script>
  <script type="text/javascript">
    $(function(){
      $('.languageselectpicker').selectpicker();
   });
</script>

 <script type="text/javascript">

     function openMicrosoftTeam() {
         myWindow = window.open("https://teams.microsoft.com/", "_blank", "width=1000,height=700");
      }
    function openOutlook() {
             myWindow = window.open("https://outlook.office365.com/", "_blank", "width=1000,height=700");
         }
    function openExcel() {
             myWindow = window.open("https://www.office.com/launch/excel?auth=2", "myWindow", "width=1000,height=700");
         }
    function openPowerpoint() {
             myWindow = window.open("https://www.office.com/launch/powerpoint?auth=2", "myWindow", "width=1000,height=700");
         }
    function openWord() {
             myWindow = window.open("https://www.office.com/launch/word", "myWindow", "width=1000,height=700");
         }

    function openNoteBook() {
             myWindow = window.open("https://www.onenote.com/classnotebook/signin?omkt=en-US", "myWindow", "width=1000,height=700");
         }


     function footerDisp() {
        var val=parseInt($('#footerDisplayVal').val());
        if(val==1)
        {
            $('#mydiv').css('display','none');
            $('#footerDisplayVal').val(0);
        }else {
            $('#mydiv').css('display','block');
            $('#footerDisplayVal').val(1);
        }
        
    }
    $(document).ready(function () {
        if (window.matchMedia('(max-width: 768px)').matches)
        {
            $('#footerDisplayVal').val(0);
            // do functionality on screens smaller than 768px
        }

        $(".studentsidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('.studentsideclose, .overlay').on('click', function () {
            $('.studentsidebar').removeClass('active');
            $('.overlay').fadeOut();
        });

        $('#sidebarCollapse').on('click', function () {
            $('.studentsidebar').addClass('active');
            $('.overlay').fadeIn();
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
</script>


<script src="<?php echo base_url(); ?>backend/plugins/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/datepicker/bootstrap-datepicker.js"></script>
<?php
if ($language_name != 'en') {
    ?>
    <script src="<?php echo base_url(); ?>backend/plugins/datepicker/locales/bootstrap-datepicker.<?php echo $language_name ?>.js"></script>
    <script src="<?php echo base_url(); ?>backend/dist/js/locale/<?php echo $language_name ?>.js"></script>

<?php } ?>
<script src="<?php echo base_url(); ?>backend/datepicker/js/bootstrap-datetimepicker.js"></script>

<script src="<?php echo base_url(); ?>backend/plugins/chartjs/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/fastclick/fastclick.min.js"></script>
<!-- <script type="text/javascript" src="<?php //echo base_url();   ?>backend/dist/js/bootstrap-filestyle.min.js"></script> -->
<script src="<?php echo base_url(); ?>backend/dist/js/app.min.js"></script>

<!--nprogress-->
<script src="<?php echo base_url(); ?>backend/dist/js/nprogress.js"></script>
<!--file dropify-->
<script src="<?php echo base_url(); ?>backend/dist/js/dropify.min.js"></script>
<!-- <script src="<?php echo base_url(); ?>backend/dist/datatables/js/moment.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/jszip.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/pdfmake.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/vfs_fonts.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/buttons.print.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/buttons.colVis.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/dataTables.responsive.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/ss.custom.js" ></script>
<!-- <script src="<?php echo base_url(); ?>backend/dist/datatables/js/datetime-moment.js"></script>
 -->
</body>
</html>
<!-- jQuery 3 -->
<!--script src="<?php echo base_url(); ?>backend/dist/js/pages/dashboard2.js"></script-->
<script src="<?php echo base_url() ?>backend/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="<?php echo base_url() ?>backend/fullcalendar/dist/locale-all.js"></script>
<?php if ($language_name != 'en') { ?>
    <script src="<?php echo base_url() ?>backend/fullcalendar/dist/locale/<?php echo $language_name ?>.js"></script>
<?php } ?>
<script type="text/javascript">

    $(document).ready(function () {

<?php
if ($this->session->flashdata('success_msg')) {
    ?>
            successMsg("<?php echo $this->session->flashdata('success_msg'); ?>");
    <?php
} else if ($this->session->flashdata('error_msg')) {
    ?>
            errorMsg("<?php echo $this->session->flashdata('error_msg'); ?>");
    <?php
} else if ($this->session->flashdata('warning_msg')) {
    ?>
            infoMsg("<?php echo $this->session->flashdata('warning_msg'); ?>");
    <?php
} else if ($this->session->flashdata('info_msg')) {
    ?>
            warningMsg("<?php echo $this->session->flashdata('info_msg'); ?>");
    <?php
}
?>
    });


    function complete_event(id, status) {

        $.ajax({
            url: "<?php echo site_url("admin/calendar/markcomplete/") ?>" + id,
            type: "POST",
            data: {id: id, active: status},
            dataType: 'json',

            success: function (res)
            {

                if (res.status == "fail") {

                    var message = "";
                    $.each(res.error, function (index, value) {

                        message += value;
                    });
                    errorMsg(message);

                } else {

                    successMsg(res.message);

                    window.location.reload(true);
                }

            }

        });
    }

    function markc(id) {

        $('#newcheck' + id).change(function () {

            if (this.checked) {

                complete_event(id, 'yes');
            } else {

                complete_event(id, 'no');
            }

        });
    }

</script>



<!-- Button trigger modal -->
<!-- Modal -->
<div class="row">
    <div class="modal fade" id="sessionModal" tabindex="-1" role="dialog" aria-labelledby="sessionModalLabel">
        <form action="<?php echo site_url('admin/admin/activeSession') ?>" id="form_modal_session" class="form-horizontal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="sessionModalLabel"><?php echo $this->lang->line('session'); ?></h4>
                    </div>
                    <div class="modal-body sessionmodal_body pb0">

                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-primary submit_session" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Please wait.."><?php echo $this->lang->line('save'); ?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<?php $this->load->view('layout/routine_update'); ?>

<script type="text/javascript">

    function savedata(eventData) {
        var base_url = '<?php echo base_url() ?>';
        $.ajax({
            url: base_url + 'admin/calendar/saveevent',
            type: 'POST',
            data: eventData,
            dataType: "json",
            success: function (msg) {
                alert(msg);

            }
        });
    }

    $calendar = $('#calendar');
    var base_url = '<?php echo base_url() ?>';
    today = new Date();
    y = today.getFullYear();
    m = today.getMonth();
    d = today.getDate();
    var viewtitle = 'month';
    var pagetitle = "<?php
if (isset($title)) {
    echo $title;
}
?>";

    if (pagetitle == "Dashboard") {

        viewtitle = 'agendaWeek';
    }

    $calendar.fullCalendar({
        viewRender: function (view, element) {
            // We make sure that we activate the perfect scrollbar when the view isn't on Month
            //if (view.name != 'month'){
            //  $(element).find('.fc-scroller').perfectScrollbar();
            //}
        },

        header: {
            center: 'title',
            right: 'month,agendaWeek,agendaDay',
            left: 'prev,next,today'
        },
        defaultDate: today,
        defaultView: viewtitle,
        selectable: true,
        selectHelper: true,
        views: {
            month: {// name of view
                titleFormat: 'MMMM YYYY'
                        // other view-specific options here
            },
            week: {
                titleFormat: " MMMM D YYYY"
            },
            day: {
                titleFormat: 'D MMM, YYYY'
            }
        },
        timezone: "Asia/Kolkata",
        draggable: false,
         lang: '<?php echo $language_name ?>',
        editable: false,
        eventLimit: false, // allow "more" link when too many events


        // color classes: [ event-blue | event-azure | event-green | event-orange | event-red ]
        events: {
            url: base_url + 'admin/calendar/getevents'

        },

        eventRender: function (event, element) {
            element.attr('title', event.title);
            element.attr('onclick', event.onclick);
            element.attr('data-toggle', 'tooltip');
            if ((!event.url) && (event.event_type != 'task')) {
                element.attr('title', event.title + '-' + event.description);
                element.click(function () {
                    view_event(event.id);
                });
            }
        },
        dayClick: function (date, jsEvent, view) {
            var d = date.format();
            if (!$.fullCalendar.moment(d).hasTime()) {
                d += ' 05:30';
            }
            //var vformat = (app_time_format == 24 ? app_date_format + ' H:i' : app_date_format + ' g:i A');
<?php if ($this->rbac->hasPrivilege('calendar_to_do_list', 'can_add')) { ?>


                $("#input-field").val('');
                $("#desc-field").text('');
                $("#date-field").daterangepicker({
                    startDate: date,
                    endDate: date,
                    timePicker: true, timePickerIncrement: 5, locale: {
                        format: 'MM/DD/YYYY hh:mm a'
                    }
                });
                $('#newEventModal').modal('show');

<?php } ?>
            return false;
        }

    });

    $(document).ready(function () {
        $("#date-field").daterangepicker({timePicker: true, timePickerIncrement: 5, locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }});


    });

    function datepic() {
        $("#date-field").daterangepicker();
    }
    function view_event(id) {
        
        $('.selectevent').find('.cpicker-big').removeClass('cpicker-big').addClass('cpicker-small');
        var base_url = '<?php echo base_url() ?>';
        if (typeof (id) == 'undefined') {
            return;
        }
        $.ajax({
            url: base_url + 'admin/calendar/view_event/' + id,
            type: 'POST',
            //data: '',
            dataType: "json",
            success: function (msg) {


                $("#event_title").val(msg.event_title);
                $("#event_desc").text(msg.event_description);
                $('#eventdates').val(msg.start_date + '-' + msg.end_date);
                $('#eventid').val(id);
                if (msg.event_type == 'public') {

                    $('input:radio[name=eventtype]')[0].checked = true;

                } else if (msg.event_type == 'private') {
                    $('input:radio[name=eventtype]')[1].checked = true;

                } else if (msg.event_type == 'sameforall') {
                    $('input:radio[name=eventtype]')[2].checked = true;

                } else if (msg.event_type == 'protected') {
                    $('input:radio[name=eventtype]')[3].checked = true;

                }
                // $("#red#28B8DA").removeClass('cpicker-big').addClass('cpicker-small');

                //$(this).removeClass('cpicker-small', 'fast').addClass('cpicker-big', 'fast');
                $("#eventdates").daterangepicker({
                    startDate: msg.startdate,
                    endDate: msg.enddate,
                    timePicker: true, timePickerIncrement: 5, locale: {
                        format: 'MM/DD/YYYY hh:mm A'
                    }
                });
                $("#event_color").val(msg.event_color);
                $("#delete_event").attr("onclick", "deleteevent(" + id + ",'Event')")

                // $("#28B8DA").removeClass('cpicker-big').addClass('cpicker-small');
                $("#" + msg.colorid).removeClass('cpicker-small').addClass('cpicker-big');
                $('#viewEventModal').modal('show');
            }
        });


    }

    $(document).ready(function (e) {
        $("#addevent_form").on('submit', (function (e) {

            e.preventDefault();
            $.ajax({
                url: "<?php echo site_url("admin/calendar/saveevent") ?>",
                type: "POST",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function (res)
                {

                    if (res.status == "fail") {

                        var message = "";
                        $.each(res.error, function (index, value) {

                            message += value;
                        });
                        errorMsg(message);

                    } else {

                        successMsg(res.message);

                        window.location.reload(true);
                    }
                }
            });
        }));


    });


    $(document).ready(function (e) {
        $("#updateevent_form").on('submit', (function (e) {

            e.preventDefault();
            $.ajax({
                url: "<?php echo site_url("admin/calendar/updateevent") ?>",
                type: "POST",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function (res)
                {

                    if (res.status == "fail") {

                        var message = "";
                        $.each(res.error, function (index, value) {

                            message += value;
                        });
                        errorMsg(message);

                    } else {

                        successMsg(res.message);

                        window.location.reload(true);
                    }
                }
            });
        }));


    });

    function deleteevent(id, msg) {
        if (typeof (id) == 'undefined') {
            return;
        }
        if (confirm("Are you sure to delete this " + msg + " !")) {
            $.ajax({
                url: base_url + 'admin/calendar/delete_event/' + id,
                type: 'POST',
                //data: '',
                dataType: "json",
                success: function (res) {
                    if (res.status == "fail") {



                        errorMsg(res.message);

                    } else {

                        successMsg(msg + " Deleted Succssfully.");

                        window.location.reload(true);
                    }
                }

            })
        }

    }


    $("body").on('click', '.cpicker', function () {
        var color = $(this).data('color');
        // Clicked on the same selected color
        if ($(this).hasClass('cpicker-big')) {
            return false;
        }

        $(this).parents('.cpicker-wrapper').find('.cpicker-big').removeClass('cpicker-big').addClass('cpicker-small');
        $(this).removeClass('cpicker-small', 'fast').addClass('cpicker-big', 'fast');
        if ($(this).hasClass('kanban-cpicker')) {
            $(this).parents('.panel-heading-bg').css('background', color);
            $(this).parents('.panel-heading-bg').css('border', '1px solid ' + color);
        } else if ($(this).hasClass('calendar-cpicker')) {
            $("body").find('input[name="eventcolor"]').val(color);
        }
    });



          $(document).ready(function () {
            
        $("body").delegate(".date", "focusin", function () {
        var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy',]) ?>';

        $(this).datepicker({
                todayHighlight: false,
                format: date_format,
                autoclose: true,
                language: '<?php echo $language_name ?>'
            });
        });

        var datetime_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(true, true), ['d' => 'DD', 'm' => 'MM', 'Y' => 'YYYY', 'H' => 'hh', 'i' => 'mm',]) ?>';
        $("body").delegate(".datetime", "focusin", function () {
            $(this).datetimepicker({
                format: datetime_format,
                locale:
                        '<?php echo $language_name ?>',

            });
        });
           // loadDate();
          });

        function loadDate(){

            var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy',]) ?>';

            $('.date').datetimepicker({
                format: datetime_format,
                locale:
                        '<?php echo $language_name ?>',

            });
        }

        showdate('this_year');

       function showdate(type){
        
        <?php 
        if(isset($_POST['date_from']) && $_POST['date_from']!='' && isset($_POST['date_to']) && $_POST['date_to']!='') {

                ?>
                var date_from='<?php echo date($this->customlib->getSchoolDateFormat(),strtotime($_POST['date_from'])); ?>';
                 var date_to='<?php echo date($this->customlib->getSchoolDateFormat(),strtotime($_POST['date_to'])); ?>';


                <?php

        }else{
            ?>
            var date_from='<?php echo date($this->customlib->getSchoolDateFormat()); ?>';
             var date_to='<?php echo date($this->customlib->getSchoolDateFormat()); ?>';
            <?php
        }

        ?>
       
        if(type=='period'){

               $.ajax({
                url: base_url+'Report/get_betweendate/'+type,
                type: 'POST', 
              data:{date_from:date_from,date_to:date_to},
                success: function (res) {
                     
                  $('#date_result').html(res);

                  loadDate();
                }


            });

        }else{
            $('#date_result').html('');
        }
    

    }
</script>
