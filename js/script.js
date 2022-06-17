$(document).ready(() => {
    // console.log('test')
    // STANDARD VARIABLE STORAGE
    var dateNow = new Date()
    
    // TRIGGER ON LOAD FUNCTIONS
    if($('#dbdDate').length >= 1){
        $('#dbdDate')[0].innerText = dateNow.toDateString();
        setInterval(() => {
            var TimeNow = new Date()
            $('#dbdTime')[0].innerText  = TimeNow.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true })
        }, 1000);
    }
 
    

    $( "#ticketDatePicker" ).datepicker();
    $('.ui-datepicker').first().css('background-color' , '#f3f3f3')
    $('.dataTables_length').first().css('position' , 'absolute')
    $('.dataTables_length').first().css('top' , '-40')
    $('.dataTables_length').first().css('right' , '0')
    $('.dataTables_length').first().css('font-size' , '11px')
    $('.dataTables_length').first().css('text-transform' , 'uppercase')
    $('.dataTables_length').first().css('font-weight' , 'bold')
    $('.dataTables_length').first().css('margin-right' , '10px')
    $('select[name="mt-table_length"]').first().css('font-size' , '10px')
    $('select[name="mt-table_length"]').first().css('border' , '0px')
    $('select[name="table_length"]').first().css('font-size' , '10px')
    $('select[name="table_length"]').first().css('border' , '0px')
    $('table').first().css('border' , 'none')
})

function formObject(form) {
    let items = {};
    let formElements = form.elements

    for (let i = 0; i < formElements.length; i++) {
        if (formElements[i].type != 'button' && formElements[i].type != 'submit') {
            items[formElements[i].name] = formElements[i].value
        }
    }
    return items
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
function unSelectItems(items) {
    items.forEach(item => {
        if (item.checked == true) {
            item.checked = false
        }
    });
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
function selectedItems(items) {
    let selectedItems = [];
    items.forEach(item => {
        if (item.checked) {
            selectedItems.push(item.value)
        }
    });
    return selectedItems
}

function openItem(type) {
    var children = $('.form-input').children()
    if (type === 'existing') {
        let items = document.querySelectorAll('#checkBoxItem');
        let checkedItem = checkSelected(items);
        if (checkedItem.count > 1) {
            alert("Please select one item only!")
            unSelectItems(items)
        } else if (checkedItem.count == 1) {
            $('.modal-bg').css("display", "flex")
            $('.modal-bg').css("opacity", "1")
            children.map((index, child) => {
                if (child.tagName.toUpperCase() != "P") {
                    child.setAttribute("disabled", "")
                }
            })
        } else {
            alert("Please ensure that an item is selected !")
        }
    } else if (type == 'new') {
        $('.modal-bg').css("display", "flex")
        $('.modal-bg').css("opacity", "1")
        children.map((index, child) => {
            if (child.tagName.toUpperCase() != "P") {
                child.removeAttribute("disabled")
            }
        })
    } else {
        console.log('invalid ')
    }

}

function closemodal(){
    $('.modal-bg').css("display", "none")
    $('.modal-bg').css("opacity", "0")
    let input_fields = $(".itm-modal-body input[type='text']");
    input_fields.map((index) => {
        input_fields[index].value  = ""
        input_fields[index].removeAttribute('disabled');
    })
}
function FormJsonData(form) {
    const formData = {};
    if (form) {
        var children = $(`${form} .form-input`).children()
    } else {
        var children = $('.form-input').children()
    }
    children.map((index, child) => {
        // console.log(child.tagName)
        if (child.tagName.toUpperCase() != "P") {
            formData[child.name] = child.value
            // console.log(child.tagName)
        }
    })
    return formData

}