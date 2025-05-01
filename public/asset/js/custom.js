function page_loader(status){
    if(status == 'hide'){
        // $('#status').fadeOut();
        $('#ht-preloader').fadeOut();
        return;
    }

    // $('#status').fadeIn();
    $('#ht-preloader').fadeIn();
    return;
}
if ($('[data-toggle="select2"]').length > 0) {
    $('[data-toggle="select2"]').select2()
}
function toast(msg, title, type, timer){
    var opts = {
        title: title,
        html: msg,
        type: type,
        confirmButtonClass: "btn btn-confirm mt-2"
    };
    if(timer !== undefined){
        opts.timer = timer;
    }
    Swal.fire(opts);
}

function initAjaxForm() {
    var submit_btn = $("form.ajaxForm").data('submitBtn'),
        disabled_btn = '<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Loading...';

    if (submit_btn === null || submit_btn === undefined || submit_btn === '') {
        submit_btn = 'Submit';
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        }
    })
    $("form.ajaxForm button[type='submit']").removeAttr('disabled');
    $("form.ajaxForm").parsley();

    $("form.ajaxForm").ajaxForm({
        dataType: "json",
        beforeSubmit: function () {
            page_loader('show');

            $("button[type=submit]").attr("disabled", 'disabled').html(disabled_btn);

            if ($("form.ajaxForm").hasClass('popup')) {
                r = confirm("Are you sure?");
                if (!r) {
                    $("button[type=submit]").removeAttr("disabled").html(submit_btn);
                    page_loader('hide');
                    return false;
                }
            }

        },
        complete: function () {
            page_loader('hide');
        },
        error: function (data, err, msg) {
            page_loader('hide');
            $("button[type=submit]").removeAttr("disabled").html(submit_btn);
            ajaxErrorHandling(data, msg);
        },
        success: function (data) {
            $("button[type=submit]").removeAttr("disabled").html(submit_btn);

            if (data['error'] !== undefined) {
                toast(data['error'], "Error!", 'error');
            } else if (data['success'] !== undefined) {
                toast(data['success'], "Success!", 'success', 1200);
                // $('form.ajaxForm').clearForm();
            } else if (data['info'] !== undefined) {
                toast(data['info'], "Info", 'info');
            }

            if (data['errors'] !== undefined) {
                multiple_errors_ajax_handling(data['errors']);
            }

            if (data['redirect'] !== undefined) {
                window.setTimeout(function () {
                    window.location = data['redirect'];
                }, 2000);

            }
            if (data['reload'] !== undefined) {
                window.setTimeout(function () {
                    window.location.reload(true);
                }, 1000);
            }
        }
    });
}
function initAjaxFormImage() {
    // alert()
    var submit_btn = $("form.ajax-image-Form").data("submitBtn"),
        disabled_btn =
            '<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Loading...';

    if (submit_btn === null || submit_btn === undefined || submit_btn === "") {
        submit_btn = $("form.ajax-image-Form button[type='submit']").html();
    }

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr("content"),
        },
    });

    $("form.ajax-image-Form button[type='submit']").removeAttr("disabled");
    $("form.ajax-image-Form").parsley();

    $("form.ajax-image-Form").on("submit", function (e) {
        e.preventDefault(); // Prevent the default form submission
        page_loader("show");
        var submitButton = $(this).find("button[type='submit']");
        submitButton.attr("disabled", "disabled").html(disabled_btn);

        // Check for popup confirmation
        if ($(this).hasClass("popup")) {
            var confirmSubmission = confirm("Are you sure?");
            if (!confirmSubmission) {
                submitButton.removeAttr("disabled").html(submit_btn);
                page_loader("hide");
                return false;
            }
        }

        // Create FormData object
        var formData = new FormData(this);

        // AJAX Request
        $.ajax({
            url: $(this).attr("action"), // Get the form's action URL
            type: $(this).attr("method"), // Use the form's method (POST)
            data: formData,
            processData: false, // Prevent jQuery from automatically processing data
            contentType: false, // Required for file uploads
            dataType: "json", // Expect a JSON response
            success: function (data) {
                submitButton.removeAttr("disabled").html(submit_btn);
                page_loader("hide");

                // Handle success and error messages
                if (data["error"] !== undefined) {
                    toast(data["error"], "Error!", "error");
                } else if (data["success"] !== undefined) {
                    toast(data["success"], "Success!", "success", 1200);
                } else if (data["info"] !== undefined) {
                    toast(data["info"], "Info", "info");
                }

                // Handle validation errors
                if (data["errors"] !== undefined) {
                    multiple_errors_ajax_handling(data["errors"]);
                }

                // Handle redirection or reload
                if (data["redirect"] !== undefined) {
                    setTimeout(() => {
                        window.location = data["redirect"];
                    }, 2000);
                }
                if (data["reload"] !== undefined) {
                    setTimeout(() => {
                        window.location.reload(true);
                    }, 1000);
                }
            },
            error: function (xhr, status, error) {
                submitButton.removeAttr("disabled").html(submit_btn);
                page_loader("hide");
                ajaxErrorHandling(xhr, error); // Handle the AJAX error
            },
            complete: function () {
                page_loader("hide"); // Ensure loader is hidden on complete
            },
        });
    });
}
function ajaxRequest(_self) {
    var href = $(_self).data('url');
    run_ajax(href);
}


function run_ajax(href){
    page_loader('show');
    $.ajax({
        url: href,
        dataType: "json",
        complete: function () {
            page_loader('hide');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            ajaxErrorHandling(jqXHR, errorThrown);
        },
        success: function (data) {
            if (data['error'] !== undefined) {
                toast(data['error'], "Error!", 'error');
            } else if (data['success'] !== undefined) {
                toast(data['success'], "Success!", 'success', 1200);
            } else if (data['info'] !== undefined) {
                toast(data['info'], "Info", 'info');
            }

            if (data['errors'] !== undefined) {
                multiple_errors_ajax_handling(data['errors']);
            }

            if (data['reload'] !== undefined) {
                setTimeout(function () {
                    window.location.reload(true);
                }, 400);
            }

            if (data['redirect'] !== undefined) {
                setTimeout(function () {
                    window.location = data['redirect'];
                }, 400);
            }
        }
    });
}

function getAjaxRequests(url, params, method, callback) {
    page_loader('show');

    var params = (!params && params != '') ? {} : params;
    var method = (!method && method != '') ? "POST" : method;

    $.ajax({
        url: url,
        method: method,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: params,
        dataType: "json",
        complete: function () {
            page_loader('hide');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            ajaxErrorHandling(jqXHR, errorThrown);
        },
        success: function (data) {
            if (data['reload'] !== undefined) {
                setTimeout(function () {
                    window.location.reload(true);
                }, 400);
                return false;
            }
            if (data['redirect'] !== undefined) {
                setTimeout(function () {
                    window.location = data['redirect'];
                }, 400);
                return false;
            }
            if (data['error'] !== undefined) {
                toast(data['error'], "Error!", 'error');
                return false;
            }

            if (data['errors'] !== undefined) {
                multiple_errors_ajax_handling(data['errors']);
            }
            callback(data);
        }
    });
}
function getAjaxFileRequests(url, params, method, callback) {
    page_loader('show');

    var method = method || "POST";
    var formData = new FormData();

    if (params) {
        for (var key in params) {
            if (params.hasOwnProperty(key)) {
                let inputElement = $('#' + key);

                // Check if the input is a file input and it has files selected
                if (inputElement.length && inputElement.attr('type') === 'file') {
                    let files = inputElement[0].files;
                    // If there are files, loop through and append them
                    for (let i = 0; i < files.length; i++) {
                        formData.append(key + '[]', files[i]); // Use key + '[]' for multiple files
                    }
                } else {
                    formData.append(key, params[key]);
                }
            }
        }
    }

    $.ajax({
        url: url,
        method: method,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData,
        processData: false, // Prevents jQuery from converting the FormData object into a string
        contentType: false, // Required for file uploads
        dataType: "json",
        complete: function () {
            page_loader('hide');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            ajaxErrorHandling(jqXHR, errorThrown);
        },
        success: function (data) {
            if (data['reload'] !== undefined) {
                setTimeout(() => window.location.reload(true), 400);
                return false;
            }
            if (data['redirect'] !== undefined) {
                setTimeout(() => window.location = data['redirect'], 400);
                return false;
            }
            if (data['error'] !== undefined) {
                toast(data['error'], "Error!", 'error');
                return false;
            }

            if (data['errors'] !== undefined) {
                multiple_errors_ajax_handling(data['errors']);
            }
            callback(data);
        }
    });
}


function ajaxErrorHandling(data, msg){
    if (data.hasOwnProperty("responseJSON")) {
        var resp = data.responseJSON;

        if (resp.message != 'The given data was invalid.') {
            toast(resp.message, "Error!", "error");
            return;
        }
        if (resp.message == 'CSRF token mismatch.') {
            toast("Page has been expired and will reload in 2 seconds", "Page Expired!", "error");
            setTimeout(function () {
                window.location.reload();
            }, 2000);
            return;
        }
        // $_html = "";
        // for (error in resp.errors) {
        //     $_html += "<p class='m-1 text-danger'><strong>" + resp.errors[error][0] + "</strong></p>";
        // }
        // toast($_html, "Error!", 'error');
        multiple_errors_ajax_handling(resp.errors);
    } else {
        toast(msg + "!", "Error!", 'error');
    }
    return;
}

function multiple_errors_ajax_handling(errors){
    $_html = "";
    for (error in errors) {
        $_html += "<p class='m-1 text-danger'><strong>" + errors[error][0] + "</strong></p>";
    }
    toast($_html, "Error!", 'error');
    return false;
}

function logout(e){
    e.preventDefault();
    Swal.fire({
        title: "Are you sure?",
        text: "By this action you will be logged out are you sure you want to continue!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, log me out!"
    }).then(function (t) {
        if (t.value){
            document.getElementById('logout-form').submit();
        }
    })
}

function adminClearNotifications(e){
    e.preventDefault();
    Swal.fire({
        title: "Are you sure?",
        text: "By this action you will be logged out are you sure you want to continue!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, log me out!"
    }).then(function (t) {
        if (t.value){
            document.getElementById('logout-form').submit();
        }
    })
}
function disableBtn(button) {
    $(button).attr("disabled", "disabled").html(
        '<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Proceeding...'
    );
}

function removeDisableBtn(button, html) {
    console.log(html)
    let btn_text = html == undefined ? 'proceeding....' : html;
    setTimeout(() => $(button).removeAttr("disabled").html(btn_text), 360)
}


$(document).ready(function () {
    // alert('..')
    initAjaxForm();
    initAjaxFormImage();
});
