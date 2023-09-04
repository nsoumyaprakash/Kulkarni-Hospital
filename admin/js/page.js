const viewPageDetails = () => {
    $.ajax({
        url: '../controllers/viewPageController.php',
        type: "POST",
        data: "fetch=true",
        cache: false,
        success: (response) => {
            const pageParsedResponse = JSON.parse(response);
            let pageParsedResponseInfo = `
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">URL</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            <tbody>`;
            if (pageParsedResponse['result']['status']['statusCode'] == "0") {
                const pageDetails = pageParsedResponse['pageDetails'];
                for (let i = 0; i < pageDetails.length; i++) {
                    pageParsedResponseInfo += `<tr>
                        <td>${i + 1}</td>
                        <td>${pageDetails[i].title == null ? "" : pageDetails[i].title}</td>
                        <td>${pageDetails[i].url == null ? "" : pageDetails[i].url}</td>`;

                    if (pageDetails[i].isActive == '1') {
                        pageParsedResponseInfo += `<td>Published</td>`;
                    } else {
                        pageParsedResponseInfo += `<td>Draft</td>`;
                    }
                    pageParsedResponseInfo += `<td>
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#editPageModal" onclick="editPageDetails(${pageDetails[i].id});"><i
                                    class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn btn-sm btn-danger" onclick="deletePage(${pageDetails[i].id});"><i
                                class="bi bi-trash3"></i></button>
                        </td>
                    </tr>`;
                }
            }
            pageParsedResponseInfo += `</tbody ></table > `;
            $("#pageTableContainer").html(pageParsedResponseInfo);
            $('.datatable').DataTable({
                // scrollX: true,
                responsive: true
            });
        }
    });
}

// Autofill
const editPageDetails = (pageId) => {
    $("#editPageForm")[0].reset();
    $.ajax({
        url: '../controllers/getPageDetails.php',
        type: "POST",
        data: 'pageId=' + pageId,
        cache: false,
        beforeSend: () => {

        },
        success: (response) => {
            const editPageParsedResponse = JSON.parse(response);
            if (editPageParsedResponse['result']['status']['statusCode'] == "0") {
                const pageDetail = editPageParsedResponse['pageDetails'];
                if (pageDetail.length > 0) {
                    $("#editPageId").val(pageId);
                    $("#editTitle").val(pageDetail[0]['title']);
                    $("#editUrl").val(pageDetail[0]['url']);
                    $("#editHtml").val(pageDetail[0]['html']);
                    $("#editCss").val(pageDetail[0]['css']);
                    $("#editJs").val(pageDetail[0]['javascript']);
                    if (pageDetail[0]['isActive'] == "0") {
                        $("#editStatus").prop("checked", false);
                    } else {
                        $("#editStatus").prop("checked", true);
                    }
                    let editStatusCheckbox = document.getElementById('editStatus');
                    if (editStatusCheckbox.checked == '1') {
                        $("#editStatusOption").html("Published");
                    } else {
                        $("#editStatusOption").html("Draft");
                    }

                    $("#editPageModal").modal("show");
                } else {
                    sweetAlert("error", "Internal Error");
                }
            } else {
                sweetAlert("error", editPageParsedResponse.result.status.errorMessage);
            }

        }
    });
}


//delete
async function deletePage(pageId) {
    if (await sweetConfirm("Are You Sure You want to Delete?")) {
        $.ajax({
            url: '../controllers/deletePageController.php',
            type: "POST",
            data: 'pageId=' + pageId,
            cache: false,
            beforeSend: function () {

            },
            success: function (response) {
                const parsedResponse = JSON.parse(response);
                if (parsedResponse.result.status.statusCode == "0") {
                    sweetAlert("success", "Deleted Successfully");
                } else {
                    sweetAlert("error", parsedResponse.result.status.errorMessage);
                }
                viewPageDetails();
            }
        });
    }
}


$(document).ready(() => {
    viewPageDetails();

    let addStatusCheckbox = document.getElementById('addStatus');
    let addStatusOutput = document.getElementById('addStatusOption');
    addStatusCheckbox.addEventListener('change', function () {
        if (addStatusCheckbox.checked) {
            addStatusOutput.textContent = 'Published';
        } else {
            addStatusOutput.textContent = 'Draft';
        }
    });

    let editStatusCheckbox = document.getElementById('editStatus');
    let editStatusOutput = document.getElementById('editStatusOption');
    editStatusCheckbox.addEventListener('change', function () {
        if (editStatusCheckbox.checked) {
            editStatusOutput.textContent = 'Published';
        } else {
            editStatusOutput.textContent = 'Draft';
        }
    });

    $("#addPageForm").submit(function (e) {
        e.preventDefault(); // Prevent the form from submitting normally

        // Get the form data
        const formData = new FormData(this);

        // Make the AJAX request
        $.ajax({
            url: '../controllers/addPageController.php',
            type: 'POST',
            data: formData,
            processData: false, // Important! Prevent jQuery from processing the data
            contentType: false, // Important! Set the content type to false
            success: function (response) {
                const parsedResponse = JSON.parse(response);
                if (parsedResponse.result.status.statusCode == "0") {
                    sweetAlert("success", "Added Successfully");
                } else {
                    sweetAlert("error", parsedResponse.result.status.errorMessage);
                }
            },
            error: function (xhr, status, error) {
                console.error(error); // Print any error messages
            }
        });
        e.target.reset();
        $("#addPageCloseButton").click();
        viewPageDetails();
    });


    $('#editPageForm').submit(function (e) {
        e.preventDefault(); // Prevent the form from submitting normally

        // Get the form data
        const formData = new FormData(this);

        // Make the AJAX request
        $.ajax({
            url: '../controllers/updatePageController.php',
            type: 'POST',
            data: formData,
            processData: false, // Important! Prevent jQuery from processing the data
            contentType: false, // Important! Set the content type to false
            success: function (response) {
                const parsedResponse = JSON.parse(response);
                if (parsedResponse.result.status.statusCode == "0") {
                    sweetAlert("success", "Updated Successfully");
                } else {
                    sweetAlert("error", parsedResponse.result.status.errorMessage);
                }
            },
            error: function (xhr, status, error) {
                console.error(error); // Print any error messages
            }
        });
        $("#editPageCloseButton").click();
        viewPageDetails();
    });
});