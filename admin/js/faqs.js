const viewFAQDetails = () => {
    $.ajax({
        url: '../controllers/viewFAQController.php',
        type: "POST",
        data: "fetch=true",
        cache: false,
        success: (response) => {
            const FAQParsedResponse = JSON.parse(response);
            let FAQParsedResponseInfo = `
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Question</th>
                        <th scope="col">Answer</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            <tbody>`;
            if (FAQParsedResponse['result']['status']['statusCode'] == "0") {
                const FAQDetails = FAQParsedResponse['FAQDetails'];
                for (let i = 0; i < FAQDetails.length; i++) {
                    FAQParsedResponseInfo += `<tr>
                        <td>${i + 1}</td>
                        <td>${FAQDetails[i].question == null ? "" : FAQDetails[i].question}</td>
                        <td>${FAQDetails[i].answer == null ? "" : FAQDetails[i].answer}</td>`;
                    if (FAQDetails[i].isActive == '1') {
                        FAQParsedResponseInfo += `<td>Published</td>`;
                    } else {
                        FAQParsedResponseInfo += `<td>Draft</td>`;
                    }

                    FAQParsedResponseInfo += `<td>
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#editFAQModal" onclick="editFAQDetails(${FAQDetails[i].id});"><i
                                    class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn btn-sm btn-danger" onclick="deleteFAQ(${FAQDetails[i].id});"><i
                                class="bi bi-trash3"></i></button>
                        </td>
                    </tr>`;
                }
            }
            FAQParsedResponseInfo += `</tbody ></table > `;
            $("#FAQTableContainer").html(FAQParsedResponseInfo);
            $('.datatable').DataTable({
                // scrollX: true,
                responsive: true
            });
        }
    });
}

// Autofill
const editFAQDetails = (FAQId) => {
    $("#editFAQForm")[0].reset();
    $.ajax({
        url: '../controllers/getFAQDetails.php',
        type: "POST",
        data: 'FAQId=' + FAQId,
        cache: false,
        beforeSend: () => {

        },
        success: (response) => {
            const editFAQParsedResponse = JSON.parse(response);
            if (editFAQParsedResponse['result']['status']['statusCode'] == "0") {
                const FAQDetail = editFAQParsedResponse['FAQDetails'];
                if (FAQDetail.length > 0) {
                    $("#editFAQId").val(FAQId);
                    $("#editQuestion").val(FAQDetail[0]['question']);

                    if (FAQDetail[0]['isActive'] == "0") {
                        $("#editStatus").prop("checked", false);
                    } else {
                        $("#editStatus").prop("checked", true);
                    }
                    let editStatusCheckbox = document.getElementById('editStatus');
                    if (editStatusCheckbox.checked) {
                        $("#editStatusOption").html("Published");
                    } else {
                        $("#editStatusOption").html("Draft");
                    }

                    $("#editFAQModal").modal("show");
                } else {
                    sweetAlert("error", "Internal Error");
                }
            } else {
                sweetAlert("error", editFAQParsedResponse.result.status.errorMessage);
            }

        }
    });
}

//delete
async function deleteFAQ(FAQId) {
    if (await sweetConfirm("Are You Sure You want to Delete?")) {
        $.ajax({
            url: '../controllers/deleteFAQController.php',
            type: "POST",
            data: 'FAQId=' + FAQId,
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
                viewFAQDetails();
            }
        });
    }
}


$(document).ready(() => {
    viewFAQDetails();

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


    $("#addFAQForm").submit(function (e) {
        e.preventDefault(); // Prevent the form from submitting normally

        // Get the form data
        const formData = new FormData(this);

        // Make the AJAX request
        $.ajax({
            url: '../controllers/addFAQController.php',
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
        $("#addFAQCloseButton").click();
        viewFAQDetails();
    });


    $('#editFAQForm').submit(function (e) {
        e.preventDefault(); // Prevent the form from submitting normally

        // Get the form data
        const formData = new FormData(this);

        // Make the AJAX request
        $.ajax({
            url: '../controllers/updateFAQController.php',
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

        $("#editFAQCloseButton").click();
        viewFAQDetails();
    });
});