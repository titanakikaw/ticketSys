<?php

require('./index.php');

?>

<div class="main-dashboard">
    <div class="timecontainer">
        <div class="dt-date-container">
            <p id="dbdDate">--- --, ----</p>
            <h1 id="dbdTime">-:-- -- </h1>
        </div>
        <div class="dt-time-container">
            <!-- <p>Welcome, Juan Dela Cruze</p> -->
            <!-- <div class="dt-time-actions">
                <input type="button" value="Break In" style="background-color: #6BEE5F;">
                <input type="button" value="Break Out" style="background-color: #F27575;" disabled>
            </div> -->
        </div>
    </div>
    <div class="d-notification-container">
        <div class="ticket-notification">
            <h5>LATEST TICKET NOTIFICATIONS</h5>
            <!-- <hr> -->
            <table class="ticket-notif-table">
                <tr>
                    <th>Ticket no.</th>
                    <th>Subject/Title</th>
                    <th>From</th>
                    <th>Date Filed</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <td>0001</td>
                    <td>Lorem ipsum, dolor sit amet consectetur</td>
                    <td>QA - Juan Dela Cruz</td>
                    <td>01-02-2022</td>
                    <td style="font-weight: bold;border-right:2px solid  rgb(225, 63, 63);">Pending</td>
                </tr>
                <tr>
                    <td>0001</td>
                    <td>Lorem ipsum, dolor sit amet consectetur</td>
                    <td>QA - Juan Dela Cruz</td>
                    <td>01-02-2022</td>
                    <td style="font-weight: bold;border-right:2px solid  rgb(225, 63, 63);">Pending</td>
                </tr>
                <tr>
                    <td>0001</td>
                    <td>Lorem ipsum, dolor sit amet consectetur</td>
                    <td>QA - Juan Dela Cruz</td>
                    <td>01-02-2022</td>
                    <td style="font-weight: bold;border-right:2px solid rgb(225, 63, 63);">Pending</td>
                </tr>
                <tr>
                    <td>0001</td>
                    <td>Lorem ipsum, dolor sit amet consectetur</td>
                    <td>QA - Juan Dela Cruz</td>
                    <td>01-02-2022</td>
                    <td style="font-weight: bold;border-right:2px solid  rgb(225, 63, 63);">Pending</td>
                </tr>
                <tr>
                    <td>0001</td>
                    <td>Lorem ipsum, dolor sit amet consectetur</td>
                    <td>QA - Juan Dela Cruz</td>
                    <td>01-02-2022</td>
                    <td style="font-weight: bold;border-right:2px solid  #a1ed9a;">Done</td>
                </tr>
                <tr>
                    <td>0001</td>
                    <td>Lorem ipsum, dolor sit amet consectetur</td>
                    <td>QA - Juan Dela Cruz</td>
                    <td>01-02-2022</td>
                    <td style="font-weight: bold;border-right:2px solid rgb(225, 63, 63);">Pending</td>
                </tr>


            </table>
        </div>
        <div class="request-notification">
            <h5>MY LATEST REQUESTS STATUS</h5>
            <hr>
            <table class="request-notif-table">
                <tr>
                    <th>R.O no.</th>
                    <th style="width: 100px;">Application</th>
                    <th>Date Applied</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <td>00002</td>
                    <td>OFF SETTING</td>
                    <td>12-11-2022</td>
                    <td>APPROVED</td>
                </tr>
                <tr>
                    <td>00002</td>
                    <td>OVERTIME</td>
                    <td>12-11-2022</td>
                    <td>Pending</td>
                </tr>
                <tr>
                    <td>00002</td>
                    <td>UNDERTIME</td>
                    <td>12-11-2022</td>
                    <td>Pending</td>
                </tr>
                <tr>
                    <td>00002</td>
                    <td>OFF SETTING</td>
                    <td>12-11-2022</td>
                    <td>Pending</td>
                </tr>
                <tr>
                    <td>00002</td>
                    <td>OFF SETTING</td>
                    <td>12-11-2022</td>
                    <td>Pending</td>
                </tr>
                <tr>
                    <td>00002</td>
                    <td>OFF SETTING</td>
                    <td>12-11-2022</td>
                    <td>Pending</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php require('./footer.php') ?>