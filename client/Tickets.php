<?php require('./index.php');
// die();
?>
<div class="main-tickets">
    <div class="search-filter">
        <div class="item-search">
            <input type="text" placeholder="Enter Ticket Number or Subject/Title" style="font-size: 11px;">
        </div>
        <div class="item-search-fields">
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
        </div>
    </div>
    <div class="mt-ticket-container" style="position: relative;">
        <div class="mt-table-actions">
            <input type="button" value="Open" onclick="open_custom_Item('existing')">
            <input type="button" value="New Ticket" id="new" onclick="openItem('new')">
            <input type="button" value="Mark As Done">
        </div>
        <div class="mt-table">
            <table id="mt-table">
                <thead>
                    <tr>
                        <th style="width:10px"><input type="checkbox" onclick="checkAllItems(this)" id="checkAll"></th>
                        <th style="width: 20px;">Status</th>
                        <th style="width: 120px;">Ticket Number</th>
                        <th style="width: 200px;">Subject</th>
                        <th style="width: 150px;">Date Submitted</th>
                        <th style="width: 180px;">AUTHOR</th>
                        <th style="width: 180px;">WITH FILES</th>
                        <th style="width: 180px;">ASSIGNED EMPLOYEE</th>
                    </tr>
                </thead>
                <tbody id="mt-table-body">
                    <!-- <tr data-ticket-id="1" onclick="">
                        <td style="border-left: 2px solid red;width:10px"><input type="checkbox" value="1" id="checkBoxItem"></td>
                        <td style="font-weight:bold;">Pending</td>
                        <td>000013</td>
                        <td>Sample Subject / Title to Fix</td>
                        <td>Fri, 13 May 2022</td>
                        <td>ITD - Juan Dela Cruz</td>
                        <td>EVER - HEAD OFFICE </td>
                        <td>EVER - HEAD OFFICE </td>
                    </tr> -->
                </tbody>

            </table>
        </div>

    </div>
    <div class="modal-bg">
        <div class="item-modal" id="openItem">
            <div class="itm-modal-header">
                <h3>Ticket INFORMATIOn</h3>
            </div>
            <div class="itm-modal-body">
                <div class="" style="display:flex; align-items:center">
                    <!-- <div class="form-input" style="width: 30%;">
                        <p>Ticket No.</p>
                        <input type="text" name="" id="">
                    </div> -->
                    <div class="form-input" style="width: 50%;">
                        <p>Assigned to</p>
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

                    <div class="form-input" style="width:30%">
                        <p>Priority</p>
                        <select style="width: 100%;" name="priority">
                            <option></option>
                            <option>Urgent</option>
                            <option>High</option>
                            <option>Normal</option>
                        </select>
                    </div>
                    <div class="form-input">
                        <p>Files</p>
                        <input type="file">
                    </div>
                </div>

                <div class="form-input">
                    <p>Subject</p>
                    <input type="text" name="subject">
                </div>

                <div class="form-input">
                    <p>Details :</p>
                    <textarea style="" name="details"></textarea>
                </div>

            </div>
            <div class="itm-modal-action">
                <input type="button" value="Submit" style="background-color: green;">
                <input type="button" value="Cancel" id="modalClose">
            </div>
        </div>
    </div>
</div>
<?php require('./footer.php') ?>
<script>
    let table = $('#mt-table').DataTable({
        searching: false,
        paging: true,
        info: false,
        ordering: false,
        language: {
            "zeroRecords": " "
        }
    });
    $(document).ready(() => {
        $("#ticketDatePicker").datepicker({
            dateFormat: "yy-mm-dd"
        });
        $('#item-select2').select2();
        $('#item2-select2').select2();
        $('#item3-select2').select2();
        $('#new-select-user-mt').select2();
        $('#new-select-category-mt').select2();


        $('#modalClose').click(() => {
            $('.modal-bg').css("opacity", "0")
            $('.modal-bg').css("display", "none")
        })

        // tableLoad()
    })

    async function tableLoad() {
        $('#mt-table-body').empty();
        const response = await fetch('../controller/ticket.php', {
            method: 'POST',
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify({
                method: 'table',
                type: 'deptTickets',
                find: ['9']
            })
        })
        let dataArray = await response.json();
        dataArray.forEach(ticket => {
            let ticketElement = '<tr data-ticket-id="2">';
            ticketElement += `<td style="border-left: 2px solid red;width:10px"><input type="checkbox" value="${ticket['ticket_id']}" id="checkBoxItem"></td>`;
            ticketElement += `<td style = "font-weight:bold;">${ticket['status']}</td>`;
            ticketElement += `<td>${ticket['ticket_no']} </td>`;
            ticketElement += `<td>${ticket['subject']}</td>`;
            ticketElement += `<td>${ticket['date']}</td>`;
            ticketElement += `<td> ${ticket['lname']}, ${ticket['fname']}</td>`;
            ticketElement += '<td> NONE</td>';
            ticketElement += `<td>${ticket['20'] ? ticket['20'] : 'Unassigned'} </td>`;
            ticketElement += '<tr>';
            $('#mt-table-body').append(ticketElement)
        });
    }

    function open_custom_Item(type) {

        if (type === 'existing') {
            let items = document.querySelectorAll('#checkBoxItem');
            let checkedItem = checkSelected(items);
            if (checkedItem.count > 1) {
                alert("Please select one item only!")
                unSelectItems(items)
            } else if (checkedItem.count == 1) {
                $('<form/>', {
                    action: 'TicketView.php',
                    method: 'POST'
                }).append(
                    $('<input>', {
                        type: 'hidden',
                        id: 'id_field_1',
                        name: 'ticket_id',
                        value: checkedItem.item
                    }),

                ).appendTo('body').submit();
            } else {
                alert("Please ensure that an item is selected !")
            }
        } else if (type == 'new') {

        } else {
            console.log('invalid ')
        }

    }

    function checkSelected(items) {
        let checkedItem = {
            count: 0,
            item: ''
        }
        items.forEach(item => {
            if (item.checked == true) {
                checkedItem.count += 1;
                checkedItem.item = item.value;

            }
        });
        return checkedItem
    }

    function unSelectItems(items) {
        items.forEach(item => {
            if (item.checked == true) {
                item.checked = false
            }
        });
    }

    function checkAllItems(e) {
        let items = document.querySelectorAll('#checkBoxItem');
        if (e.checked) {
            items.forEach(item => {
                if (item.checked == false) {
                    item.checked = true
                }
            })
        } else {
            unSelectItems(items)
        }
    }

    function cancelNew() {
        $('.mt-new').css("display", "none")
        $('.mt-table').css("display", "block")
    }

    function createTicket() {
        $('.mt-new').css("display", "block")
        $('.mt-table').css("display", "none")
        getItems();
        getCategory();
    }

    async function save() {
        let form = document.querySelector('#newticket')
        let data = {
            params: FormJsonData('.itm-modal-body'),
            method: 'new',
            currentUser: "<?php echo "Me" ?>"
        };
        const response = await fetch('../controller/ticket.php', {
            method: 'POST',
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        let status = await response.json()
        console.log(data)

    }

    async function getCategory() {
        $('#new-select-category-mt').empty()
        let response = await fetch('../controller/p_ticket.php', {
            method: 'POST',
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify({
                method: 'get_cat'
            })
        })
        let items = await response.json();
        items[0].forEach(element => {
            $('#new-select-category-mt').append(`<option value=${element['cat_id']}> ${element['catDesc']}</option>`)
        })
    }
    async function getItems() {
        $('#new-select-user-mt').empty()
        let response = await fetch('../controller/p_ticket.php', {
            method: 'POST',
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify({
                method: 'get_emp'
            })
        })
        let items = await response.json();
        items[0].forEach(element => {
            $('#new-select-user-mt').append(`<option value=${element['emp_id']}>${element['lname']}, ${element['fname']}</option>`)
        })
    }
    tableLoad()
</script>