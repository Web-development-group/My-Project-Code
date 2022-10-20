function deleteMsg(data){
    let ans = confirm(data);
    if(!ans){
        event.preventDefault();
    }
}

function validatePatient(id){
    let firstname = $("#firstname"+id).val();
    let lastname = $("#lastname"+id).val();
    let dob = $("#dob"+id).val();
    let username = $("#username"+id).val();
    let phone = $("#phone"+id).val();
    let email = $("#email"+id).val();
    let password = $('#password'+id).val();
    let confirm = $('#confirm_password'+id).val();
    let result = false;

    if(firstname == ""){
        $("#fmsg"+id).text("Firstname connot be empty");
        result = false;
    }else{
        $("#fmsg"+id).text("");
        result = true;
    }

    if(lastname == ""){
        $("#lmsg"+id).text("Lastname connot be empty");
        result = false;
    }else{
        $("#lmsg"+id).text("");
        result = true;
    }

    if(dob == ""){
        $("#dmsg"+id).text("Date of Birth connot be empty");
        result = false;
    }else{
        $("#dmsg"+id).text("");
        result = true;
    }

    if(username == ""){
        $("#umsg"+id).text("Username connot be empty");
        result = false;
    }else{
        $("#umsg"+id).text("");
        result = true;
    }

    if(phone == ""){
        $("#pmsg"+id).text("Phone connot be empty");
        result = false;
    }else if(phone.length != 10){
        $("#pmsg"+id).text("Phone Number must be 10 digit");
        result=false;
    }else{
        $("#pmsg"+id).text("");
        result = true;
    }

    if(email == ""){
        $("#emsg"+id).text("Email connot be empty");
        result = false;
    }else{
        $("#emsg"+id).text("");
        result = true;
    }

    if(password != "" & confirm != ""){
        if(password != confirm){
            $(`#cmsg${id}`).text("Password and Confirm_Password dosn`t Match");
            result = false;
        }else{
            $(`#cmsg${id}`).text('');
            result = true;
        }
    }

    return result;
}

// Print Methode...
function doPrint(id){
    $("#DataTables_Table_0_length").addClass('noprint');
    $("#DataTables_Table_0_filter").addClass('noprint');
    $("#DataTables_Table_0_info").addClass('noprint');
    $("#DataTables_Table_0_paginate").addClass('noprint');
    var printContent = document.getElementById(id).innerHTML;
    var orignalContent = document.body.innerHTML;
    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = orignalContent;
}
