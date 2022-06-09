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
            <input type="button" value="New Ticket" id="new" onclick="createTicket()">
            <input type="button" value="Mark As Done">
        </div>
        <div class="mt-table">
            <table id="mt-table">
                <thead>
                    <tr>
                        <th style="width:10px"><input type="checkbox" onclick="checkAllItems(this)" id="checkAll"></th>
                        <th style="width: 20px;">Status</th>
                        <th style="width: 120px;">Ticket Number</th>
                        <th style="width: 200px;">Subject / Title</th>
                        <th style="width: 170px;">Category</th>
                        <th style="width: 150px;">Date Submitted</th>
                        <th style="width: 180px;">Filed By</th>
                        <th style="width: 180px;">Location</th>
                    </tr>
                </thead>
                <tbody id="mt-table-body">
                    <tr data-ticket-id="1" onclick="">
                        <td style="border-left: 2px solid red;width:10px"><input type="checkbox" value="1" id="checkBoxItem"></td>
                        <td style="font-weight:bold;">Pending</td>
                        <td>000013</td>
                        <td>Sample Subject / Title to Fix</td>
                        <td>POS 1- Not Working </td>
                        <td>Fri, 13 May 2022</td>
                        <td>ITD - Juan Dela Cruz</td>
                        <td>EVER - HEAD OFFICE </td>
                    </tr>
                </tbody>

            </table>
        </div>
        <div class="mt-new" style="padding: 10px; font-size: 12px; width: 700px;display:none">
            <form id="newticket">
                <div class="" style="display: flex; justify-content:space-between">
                    <div class="form-group-mt">
                        <p>To : </p>
                        <select id="new-select-user-mt" name="assigned" style="width: 300px;">
                            <option></option>
                        </select>

                        <p>Category : </p>
                        <select id="new-select-category-mt" name="cat_id" style="width: 300px;">
                            <option></option>
                        </select>
                        <p>Subject / Title: </p>
                        <input type="text" name="title" style="font-size: 11px;padding-left:5px;" placeholder="Enter Subject or Title">
                    </div>
                    <div class="form-group-mt">
                        <p>Attachments : </p>
                        <input type="file" name="attachments">
                    </div>
                </div>

                <div class="form-group-mt" style="margin-top: 1rem;">
                    <p>Explanation :</p>
                    <textarea style="width: 100%; padding: 5px; font-size:12px" name="desc"></textarea>
                </div>
                <div class="form-group-my-actions" style="padding: 10px; display:flex;justify-content:space-between;align-items:center">
                    <input type="button" value="Submit Ticket" style="width:100%; margin-left:0; font-size:11px; font-weight:500; text-transform: uppercase;" onclick="newItem()">
                    <input type="button" value="Cancel" style="width:100%; font-size:11px; font-weight:500; text-transform: uppercase;" onclick="cancelNew()">
                </div>
            </form>
        </div>
    </div>
    <div class="modal-bg">
        <div class="item-modal" id="openItem">
            <div class="itm-modal-header">
                <h3>Ticket INFORMATIOn</h3>
            </div>
            <div class="itm-modal-body">
                <p>FROM: <span>ITD - JUAN DELA CRUZ</span></p>
                <p>TO : <span>ITD - TONI DELA CRUZ</span></p>
                <p>Ticket No :<span> 00000123</span></p>
                <p>Category :<span> Desktop PC / Laptop</span></p>
                <p>Date Submitted : <span>12-02-2022</span></p>
                <p>Ticket Status : <span>Pending</span></p>

                <p><span>Concern Explanation:</span></p>
                <textarea name="explanation" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="itm-modal-body">
                <p>To: <span>ITD - JUAN DELA CRUZ</span></p>
                <p><span>Solution / Explanation :</span></p>
                <textarea name="explanation" id="" cols="30" rows="10"></textarea>
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
    $(document).ready(() => {
        $("#ticketDatePicker").datepicker({
            dateFormat: "yy-mm-dd"
        });
        $('#item-select2').select2();
        $('#item2-select2').select2();
        $('#item3-select2').select2();
        $('#new-select-user-mt').select2();
        $('#new-select-category-mt').select2();
        $('#mt-table').DataTable({
            searching: false,
            paging: true,
            info: false
        });

        $('#modalClose').click(() => {
            $('.modal-bg').css("opacity", "0")
            $('.modal-bg').css("display", "none")
        })

        tableLoad()
    })

    async function tableLoad() {
        // console.log('test')
        const response = await fetch('../controller/p_ticket.php', {
            method: 'POST',
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify({
                method: 'table'
            })
        })
        let dataArray = await response.json();
        dataArray.forEach(ticket => {
            let ticketElement = '<tr data-ticket-id="2">';
            ticketElement += '<td style="border-left: 2px solid red;width:10px"><input type="checkbox" value="1" id="checkBoxItem"></td>';
            ticketElement += '<td style = "font-weight:bold;"> Pending </td>';
            ticketElement += '<td> 000012 </td>';
            ticketElement += '<td> Sample Subject / Title to Fix </td>';
            ticketElement += '<td> POS 1 - Not Working </td>';
            ticketElement += '<td> Fri, 13 May 2022 </td>';
            ticketElement += '<td> ITD - Juan Dela Cruz </td>';
            ticketElement += '<td> EVER - HEAD OFFICE </td> ';
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

    async function newItem() {
        let form = document.querySelector('#newticket')
        let data = {
            params: formObject(form),
            method: 'new'
        };
        const response = await fetch('../controller/p_ticket.php', {
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
</script>