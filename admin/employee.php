<?php
require('../client/index.php');
?>
<div class="department-container">

    <div class="search-filter">
        <div class="item-search">
            <!-- <p style="font-size: 9px;">Dept. Code : </p> -->
            <input type="text" placeholder="Enter Department Code" style="font-size: 11px;">
            <!-- <input type="button" value="GO"> -->
        </div>
        <!-- <div class="item-search-fields">
            <div class="searchField-group">
                <select id="item-select2" data-placeholder="Select a state" style="width: 500px; font-size: 11px">
                </select>
                <input type="text" id="ticketDatePicker" style="font-size: 11px; margin-left:1rem; padding-left:5px;" placeholder="Select Date Submitted">
            </div>
            <div class="searchField-group">
                <select id="item2-select2" data2-placeholder="Select a status" style="width: 237px; font-size: 11px">
                    <option value="NA">Select a status</option>
                    <option>Pending</option>
                    <option>Done</option>
                </select>
                <div class="" style="width: 18px;"></div>
                <select id="item3-select2" data3-placeholder="Select a category" style="width: 240px; font-size: 11px">
                    <option value="NA">Select a category</option>
                    <option>Sample</option>
                    <option>Sample 2</option>
                </select>

            </div>
        </div> -->
    </div>
    <div class="table-container">
        <div class="table-actions">
            <input type="button" value="New" id="new" onclick="openItem('new')">
            <input type="button" value="View" onclick="openItem('existing')">
        </div>
        <div class="table">
            <table id="table">
                <thead>
                    <tr>
                        <th style="width:10px"><input type="checkbox" onclick="checkAllItems(this)" id="checkAll"></th>
                        <th style="width: 80px;">Employee Code</th>
                        <th style="width: 150px;">Full Name</th>
                        <th style="width: 100px;">Position</th>
                        <th style="width: 100px;">Rank</th>
                        <th style="width: 100px;">Department</th>
                        <th style="width: 100px;">Username</th>
                        <th style="width: 100px;">Password</th>
                    </tr>
                </thead>
                <tbody id="mt-table-body">
                    <tr data-ticket-id="1" onclick="">
                        <td><input type="checkbox" value="1" id="checkBoxItem"></td>
                        <td style="font-weight:bold;">001</td>
                        <td>Juan Dela Cruz</td>
                        <td>Helpdesk</td>
                        <td>Mid</td>
                        <td>IT - Department</td>
                        <td>JDC@20222</td>
                        <td>JDC@20222</td>
                    </tr>
                    <tr data-ticket-id="2" onclick="">
                        <td><input type="checkbox" value="1" id="checkBoxItem"></td>
                        <td style="font-weight:bold;">001</td>
                        <td>auan Dela Cruz</td>
                        <td>Helpdesk</td>
                        <td>Mid</td>
                        <td>IT</td>
                        <td>JDC@20222</td>
                        <td>JDC@20222</td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
    <div class="modal-bg">
        <div class="item-modal" id="openItem">
            <div class="itm-modal-header">
                <h3>Employee Information</h3>
            </div>
            <div class="itm-modal-body">
                <div class="" style="display:flex;">
                    <div class="form-input" style="margin:5px">
                        <p>Lastname</p>
                        <input type="text" id="code">
                    </div>
                    <div class="form-input" style="margin:5px">
                        <p>Firstname</p>
                        <input type="text" id="description">
                    </div>
                </div>
                <div class="" style="display:flex;">
                    <div class="form-input" style="flex-grow: 1;margin:5px">
                        <p>Department:</p>
                        <select style="width: 100%;" id="department" onchange="handleDeptChange()" name="dept_id">
                        <option></option>
                            <?php
                                $clsConnection = new dbConnection(); 
                                $conn = $clsConnection->conn();
                                $query = "SELECT * from tbo_department";
                                $stmt = $conn->prepare($query);
                                $stmt->execute();
                                while($data = $stmt->fetch()){
                                    echo '<option value='.$data['dept_id'].'>'.$data['title'].'-'.$data['desc'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-input" style="width: 45%;margin:5px">
                        <p>Position:</p>
                        <select style="width: 100%;" id="positions" name="pos_id">
                            <option></option>
                        </select>
                    </div>

                </div>
                <div class="" style="display:flex;">
                    <div class="form-input" style="width: 45%;margin:5px">
                        <p>Username:</p>
                        <input type="text" name="[username]">
                    </div>
                    <div class="form-input" style="flex-grow: 1;margin:5px">
                        <p>Password:</p>
                        <input type="password" name="[password]">
                    </div>
                </div>

            </div>
            <div class="itm-modal-action">
                <input type="button" value="Submit" style="background-color: green;">
                <input type="button" value="Cancel" id="modalClose">
            </div>
        </div>
    </div>
</div>
<script>
    let table = $('#table').DataTable({
        searching: false,
        paging: true,
        info: false,
        language: {
            "zeroRecords": " "
        },
    });
    $(document).ready(() => {

        $('select[name="table_length"]').first().css('font-size', '10px')
        $('select[name="table_length"]').first().css('border', '0px')

        $('#modalClose').click(() => {
            $('.modal-bg').css("opacity", "0")
            $('.modal-bg').css("display", "none")
        })
    })


    function save() {
        console.log(FormJsonData('.itm-modal-body'));

        // const response = await fetch("../controller/position.php", {
        //     method: 'POST',
        //     headers: {
        //         'Content-type': 'application/json'
        //     },
        //     body: JSON.stringify({
        //         xdata: FormJsonData('.itm-modal-body'),
        //         action: "new"
        //     })
        // })
    }

    async function handleDeptChange(){
        $('#positions').empty()
        $('#positions').append(`<option></option>`);
        const response = await fetch ("../controller/employee.php", {
            method : 'POST',
            headers : {
                'Content-type' : 'application/json'
            },
            body : JSON.stringify({
                action : "get_position",
                xdata : {
                    dept_id : `${$('#department').val()}`
                }
            })
        })
        const data = await response.json()
        data.forEach(item => {
            $('#positions').append(`<option value=${item['pos_id']}>${item['posCode']} - ${item['posDesc']}</option>`)
        });
    }
</script>

<?php require('../client/footer.php') ?>