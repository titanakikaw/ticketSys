<?php
require('../client/index.php');
?>
<div class="department-container">

    <div class="search-filter">
        <div class="item-search">
            <input type="text" placeholder="Enter Department Code" style="font-size: 11px;">
        </div>
    </div>
    <div class="table-container">
        <div class="table-actions">
            <input type="button" value="Open" onclick="openItem('existing')">
            <input type="button" value="New Ticket" id="new" onclick="openItem('new')">
            <input type="button" value="Mark As Done">
        </div>
        <div class="table">
            <table id="table">
                <thead>
                    <tr>
                        <th style="width:10px"><input type="checkbox" onclick="checkAllItems(this)" id="checkAll"></th>
                        <th style="width: 120px;display:none">Dept Id</th>
                        <th style="width: 120px;">Dept Code</th>
                        <th style="width: 200px;">Dept Description</th>
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
                <h3>Employee Information</h3>
            </div>
            <div class="itm-modal-body">
                <div class="form-input">
                    <p>Position Code</p>
                    <input type="text" id="code">
                </div>
                <div class="form-input">
                    <p>Position Description</p>
                    <input type="text" id="description">
                </div>
                <div class="form-input">
                    <p>Rank</p>
                    <input type="number" id="description">
                </div>
            </div>
            <div class="itm-modal-action">
                <input type="button" value="Save" style="background-color: green;" onclick="save()">
                <input type="button" value="Cancel" id="modalClose" onclick="closemodal()">
            </div>
        </div>
    </div>
</div>
<script>
    let table = $('#table').DataTable({
        searching: false,
        paging: true,
        info: false,
        ordering: false,
        language: {
            "zeroRecords": " "
        },
    });
    $(document).ready(() => {
        loadTable()
        $('select[name="table_length"]').first().css('font-size', '10px')
        $('select[name="table_length"]').first().css('border', '0px')

        $('#modalClose').click(() => {
            $('.modal-bg').css("opacity", "0")
            $('.modal-bg').css("display", "none")
        })
    })


    async function save() {
        if ($('#code').val() != '' && $('#description').val() != '') {
            $('#code').css("border", "1px solid black")
            $('#description').css("border", "1px solid black")
            const res = await fetch("../controller/department.php", {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json'
                },
                body: JSON.stringify({
                    xdata: {
                        title: $('#code').val(),
                        desc: $('#description').val()
                    },
                    action: "new"
                })
            })
            const data = await res.json();
            loadTable()
        } else {
            if ($('#code').val() == '') {
                $('#code').css("border", "1px solid red")
            } else if ($('#description').val() == '') {
                $('#description').css("border", "1px solid red")
            }
        }

    }
    async function loadTable() {
        $('#mt-table-body').empty()
        const res = await fetch("../controller/department.php", {
            method: 'POST',
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify({
                xdata: {
                    title: $('#code').val(),
                    desc: $('#description').val()
                },
                action: "get_list"
            })
        })
        const data = await res.json();
        if (data) {
            data.forEach((elem, index) => {
                $('#mt-table-body').append(`<tr data-ticket-id="1" onclick=""><td><input type="checkbox" value="${elem['dept_id']}" id="checkBoxItem"></td><td style="font-weight:bold;display:none">${elem['dept_id']}</td><td>${elem['title']}</td><td>${elem['desc']}</td></tr>`)
            });
        }
    }
</script>

<?php require('../client/footer.php') ?>