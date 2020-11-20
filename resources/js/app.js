const { default: Axios } = require('axios');

require('./bootstrap');

 // Pass csrf token in ajax header
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//----- [ button click function ] ----------
$("#createBtn").click(function(event) {
    event.preventDefault();
    $(".error").remove();
    $(".alert").remove();

    let title       =       $("#title").val();
    let description =       $("#description").val();

    if(title == "") {
        $("#title").after('<span class="text-danger error"> Title is required </span>');

    }

    if(description == "") {
        $("#description").after('<span class="text-danger error"> Description is required </span>');
        return false;
    }

    let form_data   =       $("#categoryForm").serialize();

    // if category id exist
    if($("#id_hidden").val() !="") {
        updateCategory(form_data);
    }

    // else create category
    else {
        createCategory(form_data);
    }
});


// create new Category
function createCategory(form_data) {
    $.ajax({
        url: 'categories',
        method: 'post',
        data: form_data,
        dataType: 'json',

        beforeSend:function() {
            $("#createBtn").addClass("disabled");
            $("#createBtn").text("Processing..");
        },

        success:function(res) {
            $("#createBtn").removeClass("disabled");
            $("#createBtn").text("Save");

            if(res.status == "success") {
                $(".result").html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message+ "</div>");
            } else if(res.status == "failed") {
                $(".result").html("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message+ "</div>");
            }
        }
    });
}

// update category
function updateCategory(form_data) {
    $.ajax({
        url: 'categories',
        method: 'put',
        data: form_data,
        dataType: 'json',

        beforeSend:function() {
            $("#createBtn").addClass("disabled");
            $("#createBtn").text("Processing..");
        },

        success:function(res) {
            $("#createBtn").removeClass("disabled");
            $("#createBtn").text("Update");

            if(res.status == "success") {
                $(".result").html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message+ "</div>");
            } else if(res.status == "failed") {
                $(".result").html("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message+ "</div>");
            }
        }
    });
}

// ---------- [ Delete Category ] ----------------
function deleteCategory(category_id) {
    let status = confirm("Do you want to delete this Category?");
    if(status == true) {
        $.ajax({
            url: "categories/"+category_id,
            method: 'delete',
            dataType: 'json',

            success:function(res) {
                if(res.status == "success") {
                    $("#result").html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message + "</div>");
                }
                else if(res.status == "failed") {
                    $("#result").html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message + "</div>");
                }
            }
        });
    }
}

$('#addCategoryModal').on('shown.bs.modal', function (e) {
let id           =   $(e.relatedTarget).data('id');
let title        =   $(e.relatedTarget).data('title');
let description  =   $(e.relatedTarget).data('description');
let action       =   $(e.relatedTarget).data('action');

if(action !== undefined) {
    if(action === "view") {

        // set modal title
        $(".modal-title").html("Category Detail");

        // pass data to input fields
        $("#title").attr("readonly", "true");
        $("#title").val(title);

        $("#description").attr("readonly", "true");
        $("#description").val(description);

        // hide button
        $("#createBtn").addClass("d-none");
    }


    if(action === "edit") {
        $("#title").removeAttr("readonly");
        $("#description").removeAttr("readonly");

        // set modal title
        $(".modal-title").html("Update Category");

        $("#createBtn").text("Update");

         // pass data to input fields
        $("#id_hidden").val(id);
        $("#title").val(title);
        $("#description").val(description);

         // hide button
        $("#createBtn").removeClass("d-none");
    }
}

else {
    $(".modal-title").html("Create Category");

    // pass data to input fields
    $("#title").removeAttr("readonly");
    $("#title").val("");

    $("#description").removeAttr("readonly");
    $("#description").val("");

    // hide button
    $("#createBtn").removeClass("d-none");
}
});