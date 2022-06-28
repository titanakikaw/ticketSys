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
            <input type="button" value="Open" onclick="openItem('existing')">
            <input type="button" value="New" id="new" onclick="openItem('new')">
            <input type="button" value="Edit" id="new" onclick="openItem('new')">
            <input type="button" value="Delete" id="new" onclick="openItem('new')">
            <!-- <input type="button" value="Mark As Done"> -->
        </div>
        <div class="table">
            <table id="table">
                <thead>
                    <tr>
                        <th style="width:10px"><input type="checkbox" onclick="checkAllItems(this)" id="checkAll"></th>
                        <th style="width: 10px;">Position Code</th>
                        <th style="width: 120px;">Description</th>
                        <th style="width: 200px;">Rank</th>
                        <th style="width: 200px;">Department</th>
                    </tr>
                </thead>
                <tbody id="mt-table-body">
                </tbody>

            </table>
        </div>
    </div>
    <div class="modal-bg">
        <div class="item-modal" id="openItem">
            <div class="itm-modal-header">
                <h3>Position Information</h3>
            </div>
            <div class="itm-modal-body">
                <div class="form-input">
                    <p>Position Code</p>
                    <input type="text" id="code" name="posCode">
                </div>
                <div class="form-input">
                    <p>Position Description</p>
                    <input type="text" id="description" name="posDesc">
                </div>
                <div class="form-input">
                    <p>Rank</p>
                    <select style="width: 100%;" name="posRank">
                        <option></option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>
                <div class="form-input">
                    <p>Department</p>
                    <select style="width: 100%;" name="dept_id">
                        <option></option>
                        <?php
                        $clsConnection = new dbConnection();
                        $conn = $clsConnection->conn();
                        $query = "SELECT * from tbo_department";
                        $stmt = $conn->prepare($query);
                        $stmt->execute();

                        while ($data = $stmt->fetch()) {
                            echo "<option value=" . $data['dept_id'] . ">" . $data['title'] . "-" . $data['desc'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="itm-modal-action">
                <input type="button" value="Submit" style="background-color: green;" onclick="save()">
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
        "ajax": {
            "url": '../controller/employee.php',
            "type": 'POST',
            "contentType": "application/json",
            "data": function() {
                return JSON.stringify({
                    xdata: "",
                    action: "custom_list"
                });
            },
            "success": (data) => {
                table.clear()
                if (data) {
                    data.forEach(item => {
                        table.row.add([
                            `<input type="checkbox" value="1" id="checkBoxItem">`,
                            `${item['posCode']}`,
                            `${item['posDesc']}`,
                            `${item['posRank']}`,
                            `${item['title']}`,
                        ]).draw(false);

                    });
                }
            }
        }
    });
    $(document).ready(() => {
        $('select[name="table_length"]').first().css('font-size', '10px')
        $('select[name="table_length"]').first().css('border', '0px')
        $('#modalClose').click(() => {
            $('.modal-bg').css("opacity", "0")
            $('.modal-bg').css("display", "none")
        })
    })

    async function save() {
        const response = await fetch("../controller/position.php", {
            method: 'POST',
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify({
                xdata: FormJsonData('.itm-modal-body'),
                action: "new"
            })
        })
        const data = await response.json()
        // table.DataTable().ajax.reload();
        $('#table').DataTable().ajax.reload();
        closemodal();
     
        // loadTable()
    }

    async function loadTable() {
        $('#mt-table-body').empty()
        // table.clear()
        const response = await fetch("../controller/position.php", {
            method: 'POST',
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify({
                xdata: "",
                action: "custom_list"
            })
        })
        const data = await response.json()
        data.forEach(item => {
            $('#mt-table-body').append(`<tr data-ticket-id="1" onclick=""><td><input type="checkbox" value="1" id="checkBoxItem"></td><td style="font-weight:bold;">${item['posCode']}</td><td>${item['posDesc']}</td><td>${item['posRank']}</td><td>${item['title']}</td></tr>`)
        });
        // table.draw()
    }
    // loadTable()
</script>

<?php require('../client/footer.php') ?>