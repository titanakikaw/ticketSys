<?php require('./index.php') ?>

<div class="main-request" style="padding: 10px;background-color :#f3f3f3;">
    <div class="mr-header" style="background-color: white;padding: 10px;font-size:12px!important;">
        <p>APPROVER : PAULAR, GENIVER A. | SR. PROGRAMMER 1</p>
        <p>PENDING REQUESTS : 5</p>
        <p>PENDING REQUESTS : 5</p>
    </div>
    <div class="mr-table-container" style="background-color: white;padding:1rem 10px; margin-top: 10px;">
        <div class="mr-table-actions" style="display: flex; width: 500px;">
            <input type="button" value="NEW REQUEST" style="width: 130px;font-size:11px; font-weight:500">
            <p><a href="#ex1" rel="modal:open">Open Modal</a></p>
        </div>
        <div class="mr-table" style="margin-top: 2rem;">
            <table id='mr-table'>
                <thead>
                    <tr>
                        <th style="width: 10px;">&nbsp</th>
                        <th>Control No.</th>
                        <th>Effective Date</th>
                        <th style="width: 200px;"> Remarks</th>
                        <th>Type</th>
                        <th>Date Created</th>
                        <th>Status</th>
                        <th>Approved Date</th>
                        <th>Approver</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border-left:2px solid red;"><i class="fa-solid fa-trash-can"></i></td>
                        <td>OT00000001</td>
                        <td>05-10-2022 8:30 am <br>05-10-2022 8:30 am</td>
                        <td>to offset remaing ot last may 6 [Offsetting OT00124740]</td>
                        <td>Temporary Attendance Record</td>
                        <td>05-10-2022</td>
                        <td>Pending</td>
                        <td>05-10-2022</td>
                        <td>Dela Cruz, Juan Luna</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

</div>

<div class="mr-modal-bg" style="background-color:rgba(0,0,0,0.53);position:absolute; width: 100%;top:0;height: 100%; display:none; align-items:center; justify-content:center">
    <div class="mr-modal" style="background-color: #f3f3f3; padding: 1rem; width: 900px; height:500px;font-size:11px;">
        <div class="" style="display: flex;">
            <input type="button" name="" value="Leave" onclick="openRequest('Leave')">
            <input type="button" value="Leave of Absence" onclick="openRequest('LOA')">
            <input type="button" value="Temporary Attendance Record" onclick="openRequest('TAR')">
            <input type="button" value="Overtime, Under Time, Early Leave" onclick="openRequest('OT')">
            <input type="button" value="Offsetting" onclick="openRequest('OF')">
            <input type="button" value="Itinerary Approval" onclick="openRequest('IA')">
        </div>
        <div class="multi-container" style="height:90%; overflow:scroll">
            <div id="Leave" class="request" style="height:100%; background-color:white; margin:auto">
                <div class="request-file-container" style="padding: 1rem;">
                    <h1>Vacational Leave</h1>
                    <div class="" style="display: flex; justify-content:space-between;background:#f3f3f3; padding: 10px">
                        <div class="rfc-radio-input" style="text-align: center;">
                            <input type="radio" name="leave" id="">
                            <p>Vacation Leave</p>
                        </div>
                        <div class="rfc-radio-input" style="text-align: center;">
                            <input type="radio" name="leave" id="">
                            <p>Vacation Leave (half-day)</p>
                        </div>
                        <div class="rfc-radio-input" style="text-align: center;">
                            <input type="radio" name="leave" id="">
                            <p>Sick Leave</p>
                        </div>
                        <div class="rfc-radio-input" style="text-align: center; ">
                            <input type="radio" name="leave" id="">
                            <p>Sick Leave (half-day)</p>
                        </div>
                        <div class="rfc-radio-input" style="text-align: center;">
                            <input type="radio" name="leave" id="rdoLeave">
                            <p>Maternity Leave</p>
                        </div>
                    </div>
                    <div class="" style="padding: 10px 1rem;display:flex; justify-content:space-around; align-items:center; background-color:#f3f3f3; margin-top:10px;">
                        <div class="">
                            <p>DATE FROM : </p>
                            <input type="text" id="leave_from_dte" style="font-size: 11px;">
                        </div>
                        <div class="">
                            <p>DATE TO : </p>
                            <input type="text" id="leave_to_dte" style="font-size: 11px;">
                        </div>
                        <div class="" id="LeaveHoursID">
                            <p>Leave Hours : </p>
                            <select name="leavehours" id="" style="font-size: 11px;">
                                <option>4.0</option>
                                <option>4.5</option>
                                <option>5.0</option>
                                <option>5.5</option>
                            </select>
                        </div>
                    </div>
                    <div class="" style="padding: 10px 1rem;background:#f3f3f3;margin-top: 10px;">
                        <p>REASON</p>
                        <textarea style="padding: 10px; max-width:100%; max-height:150px;height:150px;width: 100%"></textarea>
                    </div>
                    <div class="" style="padding: 0 1rem;">
                        <input type="button" value="Submit" style="width:200px;margin-top:5px;float:right; background-color:green;font-weight:500; text-transform:uppercase">
                    </div>
                </div>
            </div>
            <div id="LOA" class="Leave-container request" style="height:100%; background-color:white; margin:auto">
                <div class=" request-file-container" style="padding: 1rem;">
                    <h1>Leave of Absence</h1>
                    <div class="" style="padding: 10px 1rem;display:flex; justify-content:space-around; align-items:center; background-color:#f3f3f3; margin-top:10px;">
                        <div class="">
                            <p>DATE FROM : </p>
                            <input type="text" id="leave_from_dte" style="font-size: 11px;">
                        </div>
                        <div class="">
                            <p>DATE TO : </p>
                            <input type="text" id="leave_to_dte" style="font-size: 11px;">
                        </div>
                    </div>
                    <div class="" style="padding: 10px 1rem;background:#f3f3f3;margin-top: 10px;">
                        <p>REASON</p>
                        <textarea style="padding: 10px; max-width:100%; max-height:150px;height:150px;width: 100%"></textarea>
                    </div>
                    <div class="" style="padding: 0 1rem;">
                        <input type="button" value="Submit" style="width:200px;margin-top:5px;float:right; background-color:green;font-weight:500; text-transform:uppercase">
                    </div>
                </div>
            </div>
            <div id="TAR" class="Leave-container request" style="border: 1px solid black;">
                <div class=" request-file-container" style="padding: 1rem;">
                    <h1>Temporary Attendance Record</h1>
                    <div class="" style="padding: 10px 1rem;display:flex; flex-wrap:wrap; justify-content:space-around; align-items:center; background-color:#f3f3f3; margin-top:10px;">
                        <div class="">
                            <p>Effectivity Date : </p>
                            <input type="text" id="leave_from_dte" style="font-size: 11px;">
                        </div>
                        <div class="">
                            <p>Time In: </p>
                            <input type="text" id="leave_to_dte" style="font-size: 11px;">
                        </div>
                        <div class="">
                            <p>Lunch Break (Out): </p>
                            <input type="text" id="leave_to_dte" style="font-size: 11px;">
                        </div>
                        <div class="">
                            <p>Lunch Break (In): </p>
                            <input type="text" id="leave_to_dte" style="font-size: 11px;">
                        </div>
                        <div class="">
                            <p>Coffee Break (Out): </p>
                            <input type="text" id="leave_to_dte" style="font-size: 11px;">
                        </div>
                        <div class="">
                            <p>Coffee Break (In): </p>
                            <input type="text" id="leave_to_dte" style="font-size: 11px;">
                        </div>
                        <div class="">
                            <p>Time Out: </p>
                            <input type="text" id="leave_to_dte" style="font-size: 11px;">
                        </div>
                    </div>
                    <div class="" style="padding: 10px 1rem;background:#f3f3f3;margin-top: 10px;">
                        <p>REMARKS</p>
                        <textarea style="padding: 10px; max-width:100%; max-height:150px;height:150px;width: 100%"></textarea>
                    </div>
                    <div class="" style="padding: 0 1rem;">
                        <input type="button" value="Submit" style="width:200px;margin-top:5px;float:right; background-color:green;font-weight:500; text-transform:uppercase">
                    </div>
                </div>
            </div>
            <div id="OT" class="Leave-container request" style="overflow-x:scroll;">
                <div class=" request-file-container" style="padding: 1rem;">
                    <h1>Overtime and Undertime/ Early Leave</h1>
                    <hr>
                    <div class="" style="display: flex; justify-content:space-between;background:#f3f3f3; padding: 10px; width: 300px; margin:auto">
                        <div class="rfc-radio-input" style="text-align: center;">
                            <input type="radio" name="leave" id="">
                            <p>Overtime</p>
                        </div>
                        <div class="rfc-radio-input" style="text-align: center;">
                            <input type="radio" name="leave" id="">
                            <p> Undertime/ Early Leave</p>
                        </div>
                    </div>
                    <div class="" style="padding: 10px 1rem;display:flex; justify-content:space-around; align-items:center; background-color:#f3f3f3; margin-top:10px;">
                        <div class="">
                            <p>Effectivity Date: </p>
                            <input type="text" id="leave_from_dte" style="font-size: 11px;">
                        </div>
                    </div>
                    <div class="" style="display: flex; justify-content:space-between;background:#f3f3f3; padding: 10px;margin:auto; width: 500px">
                        <div class="rfc-radio-input" style="text-align: center;">
                            <input type="radio" name="leave" id="">
                            <p>Regular</p>
                        </div>
                        <div class="rfc-radio-input" style="text-align: center;">
                            <input type="radio" name="leave" id="">
                            <p>Overnight</p>
                        </div>
                        <div class="rfc-radio-input" style="text-align: center;">
                            <input type="radio" name="leave" id="">
                            <p> Morning</p>
                        </div>
                        <div class="rfc-radio-input" style="text-align: center;">
                            <input type="radio" name="leave" id="">
                            <p> Fiscal Year End (FYE)</p>
                        </div>
                    </div>
                    <div class="" style="padding: 10px 1rem;display:flex; justify-content:space-around; align-items:center; background-color:#f3f3f3; margin-top:10px;">
                        <div class="">
                            <p>Hours Rendered From :</p>
                            <input type="text" id="leave_from_dte" style="font-size: 11px;">
                        </div>
                        <div class="">
                            <p>Hours Rendered To :</p>
                            <input type="text" id="leave_from_dte" style="font-size: 11px;">
                        </div>
                        <div class="">
                            <p>Type :</p>
                            <select>

                            </select>
                        </div>

                    </div>
                    <div class="" style="padding: 10px 1rem;background:#f3f3f3;margin-top: 10px;">
                        <p>REASON</p>
                        <textarea style="padding: 10px; max-width:100%; max-height:150px;height:150px;width: 100%"></textarea>
                    </div>
                    <div class="" style="padding: 0 1rem;">
                        <input type="button" value="Submit" style="width:200px;margin-top:5px;float:right; background-color:green;font-weight:500; text-transform:uppercase">
                    </div>
                </div>
            </div>
            <div id="OF" class="Leave-container request" style="border: 1px solid black;">
                Offsetting
            </div>
            <div id="CWS" class="Leave-container request" style="border: 1px solid black;">
                Change of Work schedule
            </div>
            <div id="IA" class="Leave-container request" style="border: 1px solid black;">
                Itinerary Approval
            </div>
        </div>
        <div class="mr-modal-action">
            <input type="button" value="close">
        </div>

    </div>
</div>

<?php require('./footer.php') ?>
<script>
    $(document).ready(() => {
        $.modal.defaults = {
            searching: false,
            paging: true,
            info: false
        }
        $("#leave_from_dte").datepicker({
            dateFormat: "yy-mm-dd"
        });
        $("#leave_to_dte").datepicker({
            dateFormat: "yy-mm-dd"
        });

        $('select[name="mr-table_length"]').first().css('font-size', '10px')
        $('select[name="mr-table_length"]').first().css('border', '0px')
        openRequest('')
    })

    function openRequest(request) {
        let multiContainer = $('.multi-container')
        let modalContainers = multiContainer[0].querySelectorAll('.request')
        modalContainers.forEach((item) => {
            item.style.display = "none"
        })
        $(`#${request}`).css("display", "block")
    }
</script>