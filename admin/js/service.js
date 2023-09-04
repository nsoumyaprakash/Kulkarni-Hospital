const viewServiceDetails = () => {
    $.ajax({
        url: '../controllers/viewServiceController.php',
        type: "POST",
        data: "fetch=true",
        cache: false,
        success: (response) => {
            const serviceParsedResponse = JSON.parse(response);
            let serviceParsedResponseInfo = `
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Short/Long</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            <tbody>`;
            if (serviceParsedResponse['result']['status']['statusCode'] == "0") {
                const serviceDetails = serviceParsedResponse['serviceDetails'];
                for (let i = 0; i < serviceDetails.length; i++) {
                    serviceParsedResponseInfo += `<tr>
                        <td>${i + 1}</td>
                        <td>${serviceDetails[i].image == null ? "" : serviceDetails[i].image}</td>
                        <td>${serviceDetails[i].title == null ? "" : serviceDetails[i].title}</td>
                        <td>${serviceDetails[i].description == null ? "" : serviceDetails[i].description}</td>`;
                    if (serviceDetails[i].isShort == '1') {
                        serviceParsedResponseInfo += `<td>Short</td>`;
                    } else {
                        serviceParsedResponseInfo += `<td>Long</td>`;
                    }

                    serviceParsedResponseInfo += `<td>
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#editServiceModal" onclick="editServiceDetails(${serviceDetails[i].id});"><i
                                    class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn btn-sm btn-danger" onclick="deleteService(${serviceDetails[i].id});"><i
                                class="bi bi-trash3"></i></button>
                        </td>
                    </tr>`;
                }
            }
            serviceParsedResponseInfo += `</tbody ></table > `;
            $("#serviceTableContainer").html(serviceParsedResponseInfo);
            $('.datatable').DataTable({
                // scrollX: true,
                responsive: true
            });
        }
    });
}

// Autofill
const editServiceDetails = (serviceId) => {
    $("#editServiceForm")[0].reset();
    $.ajax({
        url: '../controllers/getServiceDetails.php',
        type: "POST",
        data: 'serviceId=' + serviceId,
        cache: false,
        beforeSend: () => {

        },
        success: (response) => {
            const editServiceParsedResponse = JSON.parse(response);
            if (editServiceParsedResponse['result']['status']['statusCode'] == "0") {
                const serviceDetail = editServiceParsedResponse['serviceDetails'];
                if (serviceDetail.length > 0) {
                    $("#editServiceId").val(serviceId);
                    $("#editTitle").val(serviceDetail[0]['title']);
                    $("#editPath").val(serviceDetail[0]['path']);
                    $("#editDescription").val(serviceDetail[0]['description']);
                    $("#editImageHiddenFile").val(serviceDetail[0]['image']);
                    if (serviceDetail[0]['image'] != null) {
                        $("#storedViewImage").attr("src", '../../img/uplaods/' + serviceDetail[0]['image']);
                        $("#storedeViewImage").attr("alt", serviceDetail[0]['image']);
                        $("#storedeViewImage").css("display", "block");
                    } else {
                        $("#storedViewImage").attr("src", "");
                        $("#storedeViewImage").attr("alt", "");
                        $("#storedeViewImage").css("display", "none");
                    }
                    $("#editBannerImageHiddenFile").val(serviceDetail[0]['banner']);
                    if (serviceDetail[0]['banner'] != null) {
                        $("#storedViewBannerImage").attr("src", '../../img/uplaods/' + serviceDetail[0]['banner']);
                        $("#storedeViewBannerImage").attr("alt", serviceDetail[0]['banner']);
                        $("#storedeViewBannerImage").css("display", "block");
                    } else {
                        $("#storedeViewBannerImage").attr("src", "");
                        $("#storedeViewBannerImage").attr("alt", "");
                        $("#storedeViewBannerImage").css("display", "none");
                    }
                    if (serviceDetail[0]['isActive'] == "0") {
                        $("#editStatus").prop("checked", false);
                    } else {
                        $("#editStatus").prop("checked", true);
                    }
                    if (serviceDetail[0]['isShort'] == "0") {
                        $("#editShortLong").prop("checked", true);
                        $("#editImageInput").prop("disabled", false);
                        $("#editBannerImageInput").prop("disabled", false);
                    } else {
                        $("#editShortLong").prop("checked", false);
                        $("#editImageInput").prop("disabled", true);
                        $("#editBannerImageInput").prop("disabled", true);
                    }
                    let editStatusCheckbox = document.getElementById('editStatus');
                    if (editStatusCheckbox.checked) {
                        $("#editStatusOption").html("Published");
                    } else {
                        $("#editStatusOption").html("Draft");
                    }
                    let editShortLongCheckbox = document.getElementById('editShortLong');
                    if (editShortLongCheckbox.checked) {
                        $("#editShortLongOption").html("Long");
                    } else {
                        $("#editShortLongOption").html("Short");
                    }

                    $("#editserviceModal").modal("show");
                } else {
                    sweetAlert("error", "Internal Error");
                }
            } else {
                sweetAlert("error", editServiceParsedResponse.result.status.errorMessage);
            }

        }
    });
}

//delete
async function deleteService(serviceId) {
    if (await sweetConfirm("Are You Sure You want to Delete?")) {
        $.ajax({
            url: '../controllers/deleteServiceController.php',
            type: "POST",
            data: 'serviceId=' + serviceId,
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
                viewServiceDetails();
            }
        });
    }
}


$(document).ready(() => {
    viewServiceDetails();

    // Get the input element
    const imageInput = document.getElementById('addImageInput');

    // Get the preview image element
    const previewImage = document.getElementById('previewImage');

    // Listen for changes in the input file selection
    imageInput.addEventListener('change', function (event) {
        // Check if a file is selected
        if (event.target.files && event.target.files[0]) {
            // Create a FileReader object
            const reader = new FileReader();

            // Set the image source once it's loaded
            reader.onload = function (e) {
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(event.target.files[0]);
        } else {
            // No file selected, hide the preview
            previewImage.style.display = 'none';
        }
    });

    // Get the input element
    const imageEditInput = document.getElementById('editImageInput');

    // Get the preview image element
    const previewEditImage = document.getElementById('previewEditImage');

    // Get the Stored image element
    const storedViewImage = document.getElementById('storedViewImage');

    // Listen for changes in the input file selection
    imageEditInput.addEventListener('change', function (event) {
        // Check if a file is selected
        if (event.target.files && event.target.files[0]) {
            // Create a FileReader object
            const reader = new FileReader();

            // Set the image source once it's loaded
            reader.onload = function (e) {
                previewEditImage.src = e.target.result;
                previewEditImage.style.display = 'block';
                storedViewImage.style.display = 'none';
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(event.target.files[0]);
        } else {
            // No file selected, hide the preview
            previewEditImage.style.display = 'none';
            storedViewImage.style.display = 'block';
        }
    });

    const checkbox = document.getElementById('addShortLong');
    const image = document.getElementById('addImageInput');
    const bannerImage = document.getElementById('addBannerImageInput');

    checkbox.addEventListener('change', function () {
        if (checkbox.checked) {
            image.disabled = false;
            bannerImage.disabled = false;
        } else {
            image.disabled = true;
            bannerImage.disabled = true;
        }
    });

    const editCheckbox = document.getElementById('editShortLong');
    const editImage = document.getElementById('editImageInput');
    const editBannerImage = document.getElementById('editBannerImageInput');

    editCheckbox.addEventListener('change', function () {
        if (editCheckbox.checked) {
            editImage.disabled = false;
            editBannerImage.disabled = false;
        } else {
            editImage.disabled = true;
            editBannerImage.disabled = true;
        }
    });

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
    let addShortLongCheckbox = document.getElementById('addShortLong');
    let addShortLongOutput = document.getElementById('addShortLongOption');
    addShortLongCheckbox.addEventListener('change', function () {
        if (addShortLongCheckbox.checked) {
            addShortLongOutput.textContent = 'Long';
        } else {
            addShortLongOutput.textContent = 'Short';
        }
    });

    let editShortLongCheckbox = document.getElementById('editShortLong');
    let editShortLongOutput = document.getElementById('editShortLongOption');
    editShortLongCheckbox.addEventListener('change', function () {
        if (editShortLongCheckbox.checked) {
            editShortLongOutput.textContent = 'Long';
        } else {
            editShortLongOutput.textContent = 'Short';
        }
    });

    $("#addServiceForm").submit(function (e) {
        e.preventDefault(); // Prevent the form from submitting normally

        // Get the form data
        const formData = new FormData(this);

        // Make the AJAX request
        $.ajax({
            url: '../controllers/addServiceController.php',
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
        $("#addServiceCloseButton").click();
        viewServiceDetails();
    });


    $('#editServiceForm').submit(function (e) {
        e.preventDefault(); // Prevent the form from submitting normally

        // Get the form data
        const formData = new FormData(this);

        // Make the AJAX request
        $.ajax({
            url: '../controllers/updateServiceController.php',
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

        $("#editServiceCloseButton").click();
        viewServiceDetails();
    });
});