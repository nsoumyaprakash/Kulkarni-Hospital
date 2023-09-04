const viewDoctorDetails = () => {
    $.ajax({
        url: '../controllers/viewDoctorController.php',
        type: "POST",
        data: "fetch=true",
        cache: false,
        success: (response) => {
            const doctorParsedResponse = JSON.parse(response);
            let doctorParsedResponseInfo = `
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Speciality</th>
                        <th scope="col">About</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            <tbody>`;
            if (doctorParsedResponse['result']['status']['statusCode'] == "0") {
                const doctorDetails = doctorParsedResponse['doctorDetails'];
                for (let i = 0; i < doctorDetails.length; i++) {
                    doctorParsedResponseInfo += `<tr>
                                                    <td>${i + 1}</td>`;
                    if (doctorDetails[i].imgSrc != null) {
                        doctorParsedResponseInfo += `<td><img src="../../img/doctors/${doctorDetails[i].imgSrc}" onclick="showEnlargedImage('../../img/doctors/${doctorDetails[i].imgSrc}');"></td>`;
                    } else {
                        doctorParsedResponseInfo += `<td></td>`;
                    }
                    doctorParsedResponseInfo += `<td>${doctorDetails[i].name == null ? "" : doctorDetails[i].name}</td>
                        <td>${doctorDetails[i].speciality == null ? "" : doctorDetails[i].speciality}</td>
                        <td>${doctorDetails[i].about == null ? "" : doctorDetails[i].about}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#editDoctorModal" onclick="editDoctorsDetails(${doctorDetails[i].id});"><i
                                    class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn btn-sm btn-danger" onclick="deleteDoctor(${doctorDetails[i].id});"><i
                                class="bi bi-trash3"></i></button>
                        </td>
                    </tr>`;
                }
            }
            doctorParsedResponseInfo += `</tbody ></table > `;
            $("#doctorsTableContainer").html(doctorParsedResponseInfo);
            $('.datatable').DataTable({
                // scrollX: true,
                responsive: true
            });
        }
    });
}

// Autofill
const editDoctorsDetails = (doctorId) => {
    $("#editDoctorForm")[0].reset();
    $.ajax({
        url: '../controllers/getDoctorDetails.php',
        type: "POST",
        data: 'doctorId=' + doctorId,
        cache: false,
        beforeSend: () => {

        },
        success: (response) => {
            const editDoctorParsedResponse = JSON.parse(response);
            if (editDoctorParsedResponse['result']['status']['statusCode'] == "0") {
                const doctorDetail = editDoctorParsedResponse['doctorDetails'];
                if (doctorDetail.length > 0) {
                    $("#editDoctorId").val(doctorId);
                    $("#editName").val(doctorDetail[0]['name']);
                    $("#editSpeciality").val(doctorDetail[0]['speciality']);
                    $("#editAbout").val(doctorDetail[0]['about']);
                    const socialLinks = doctorDetail[0]['socialLinks'];
                    const individualLinks = JSON.parse(socialLinks);

                    $("#editFacebook").val(individualLinks[0]);
                    $("#editInstagram").val(individualLinks[1]);
                    $("#editTwitter").val(individualLinks[2]);
                    $("#editLinkedin").val(individualLinks[3]);
                    if (doctorDetail[0]['isActive'] == "0") {
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

                    $("#editImageHiddenFile").val(doctorDetail[0]['imgSrc']);
                    if (doctorDetail[0]['imgSrc'] != null) {
                        $("#storedViewImage").attr("src", '../../img/doctors/' + doctorDetail[0]['imgSrc']);
                        $("#storedeViewImage").attr("alt", doctorDetail[0]['imgSrc']);
                    } else {
                        $("#storedViewImage").attr("src", "");
                        $("#storedeViewImage").attr("alt", "");
                    }

                    $("#editDoctorModal").modal("show");
                } else {
                    sweetAlert("error", "Internal Error");
                }
            } else {
                sweetAlert("error", editDoctorParsedResponse.result.status.errorMessage);
            }

        }
    });
}

const viewDoctorDescDetails = () => {
    $.ajax({
        url: '../controllers/viewDoctorDescController.php',
        type: "POST",
        data: "fetch=true",
        cache: false,
        success: (response) => {
            const editDoctorDescParsedResponse = JSON.parse(response);
            if (editDoctorDescParsedResponse['result']['status']['statusCode'] == "0") {
                let doctorDescDetail = editDoctorDescParsedResponse['doctorDescDetails'];
                if (doctorDescDetail.length > 0) {
                    $("#editDoctorDescId").val(doctorDescDetail[0]['id']);
                    $("#addDesc").val(doctorDescDetail[0]['content']);

                    if (doctorDescDetail[0]['isActive'] == "0") {
                        $("#addDescStatus").prop("checked", false);
                    } else {
                        $("#addDescStatus").prop("checked", true);
                    }
                    let editStatusCheckbox = document.getElementById('addDescStatus');
                    if (editStatusCheckbox.checked == '1') {
                        $("#addDescStatusOption").html("Published");
                    } else {
                        $("#addDescStatusOption").html("Draft");
                    }

                } else {
                    // notification("Error", "exclamation-sign", "Internal Error", "danger");
                }
            } else {

            }

        }
    });
}



//delete
async function deleteDoctor(doctorId) {
    if (await sweetConfirm("Are You Sure You want to Delete?")) {
        $.ajax({
            url: '../controllers/deleteDoctorController.php',
            type: "POST",
            data: 'doctorId=' + doctorId,
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
                viewDoctorDetails();
            }
        });
    }
}


$(document).ready(() => {
    viewDoctorDetails();
    viewDoctorDescDetails();

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

    let addDocterDescCheckbox = document.getElementById('addDescStatus');
    let addDescStatusOutput = document.getElementById('addDescStatusOption');
    addDocterDescCheckbox.addEventListener('change', function () {
        if (addDocterDescCheckbox.checked) {
            addDescStatusOutput.textContent = 'Published';
        } else {
            addDescStatusOutput.textContent = 'Draft';
        }
    });

    $("#addDoctorForm").submit(function (e) {
        e.preventDefault(); // Prevent the form from submitting normally

        // Get the form data
        const formData = new FormData(this);

        // Make the AJAX request
        $.ajax({
            url: '../controllers/addDoctorsController.php',
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
        $("#addDoctorForm").click();
        viewDoctorDetails();
    });


    $('#editDoctorForm').submit(function (e) {
        e.preventDefault(); // Prevent the form from submitting normally

        // Get the form data
        const formData = new FormData(this);

        // Make the AJAX request
        $.ajax({
            url: '../controllers/updateDoctorController.php',
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
        $("#editDoctorCloseButton").click();
        viewDoctorDetails();
    });

    $("#addDoctorDescForm").submit(function (e) {
        e.preventDefault(); // Prevent the form from submitting normally

        // Get the form data
        const formData = new FormData(this);

        // Make the AJAX request
        $.ajax({
            url: '../controllers/addDoctorDescController.php',
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
        viewAboutDetails();

    });

});