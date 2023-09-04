const viewPackageDetails = () => {
    $.ajax({
        url: '../controllers/viewPackageController.php',
        type: "POST",
        data: "fetch=true",
        cache: false,
        success: (response) => {
            const packageParsedResponse = JSON.parse(response);
            let packageParsedResponseInfo = `
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Benifits</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            <tbody>`;
            if (packageParsedResponse['result']['status']['statusCode'] == "0") {
                const packageDetails = packageParsedResponse['packageDetails'];
                for (let i = 0; i < packageDetails.length; i++) {
                    packageParsedResponseInfo += `<tr>
                        <td>${i + 1}</td>
                        <td>${packageDetails[i].title == null ? "" : packageDetails[i].title}</td>
                        <td>${packageDetails[i].price == null ? "" : packageDetails[i].price}</td>`;

                    if (packageDetails[i].benifits == null) {
                        packageParsedResponseInfo += `<td></td>`;
                    } else {
                        const benefitsList = packageDetails[i].benifits.split(',');
                        packageParsedResponseInfo += `<td><ul>`;
                        benefitsList.forEach(benefit => {
                            packageParsedResponseInfo += `<li style="list-style-type: none;">${benefit.trim()}</li>`;
                        });
                        packageParsedResponseInfo += `</ul></td>`;
                    }
                    if (packageDetails[i].isActive == '1') {
                        packageParsedResponseInfo += `<td>Published</td>`;
                    } else {
                        packageParsedResponseInfo += `<td>Draft</td>`;
                    }
                    packageParsedResponseInfo += `<td>
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#editPackageModal" onclick="editPackageDetails(${packageDetails[i].id});"><i
                                    class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn btn-sm btn-danger" onclick="deletePackage(${packageDetails[i].id});"><i
                                class="bi bi-trash3"></i></button>
                        </td>
                    </tr>`;
                }
            }
            packageParsedResponseInfo += `</tbody ></table > `;
            $("#packageTableContainer").html(packageParsedResponseInfo);
            $('.datatable').DataTable({
                // scrollX: true,
                responsive: true
            });
        }
    });
}

// Autofill
const editPackageDetails = (packageId) => {
    $("#editPackageForm")[0].reset();
    $.ajax({
        url: '../controllers/getPackageDetails.php',
        type: "POST",
        data: 'packageId=' + packageId,
        cache: false,
        beforeSend: () => {

        },
        success: (response) => {
            const editPackageParsedResponse = JSON.parse(response);
            if (editPackageParsedResponse['result']['status']['statusCode'] == "0") {
                const packageDetail = editPackageParsedResponse['packageDetails'];
                if (packageDetail.length > 0) {
                    $("#editPackageId").val(packageId);
                    $("#editTitle").val(packageDetail[0]['title']);
                    $("#editPrice").val(packageDetail[0]['price']);
                    $("#editBenifits").val(packageDetail[0]['benifits']);
                    if (packageDetail[0]['isActive'] == "0") {
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

                    $("#editPackageModal").modal("show");
                } else {
                    sweetAlert("error", "Internal Error");
                }
            } else {
                sweetAlert("error", editPackageParsedResponse.result.status.errorMessage);
            }

        }
    });
}


//delete
async function deletePackage(packageId) {
    if (await sweetConfirm("Are You Sure You want to Delete?")) {
        $.ajax({
            url: '../controllers/deletePackageController.php',
            type: "POST",
            data: 'packageId=' + packageId,
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
                viewPackageDetails();
            }
        });
    }
}


$(document).ready(() => {
    viewPackageDetails();

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

    $("#addPackageForm").submit(function (e) {
        e.preventDefault(); // Prevent the form from submitting normally

        // Get the form data
        const formData = new FormData(this);

        // Make the AJAX request
        $.ajax({
            url: '../controllers/addPackageController.php',
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
        $("#addPackageCloseButton").click();
        viewPackageDetails();
    });


    $('#editPackageForm').submit(function (e) {
        e.preventDefault(); // Prevent the form from submitting normally

        // Get the form data
        const formData = new FormData(this);

        // Make the AJAX request
        $.ajax({
            url: '../controllers/updatePackageController.php',
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
        $("#editPackageCloseButton").click();
        viewPackageDetails();
    });
});