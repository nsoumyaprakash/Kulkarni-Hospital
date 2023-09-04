const viewLandingDetails = () => {
    $.ajax({
        url: '../controllers/viewLandingController.php',
        type: "POST",
        data: "fetch=true",
        cache: false,
        success: (response) => {
            const editLandingParsedResponse = JSON.parse(response);
            if (editLandingParsedResponse['result']['status']['statusCode'] == "0") {
                let landingDetail = editLandingParsedResponse['landingDetails'];
                if (landingDetail.length > 0) {
                    $("#editLandingtId").val(landingDetail[0]['id']);
                    $("#orgNameInput").val(landingDetail[0]['organization_name']);
                    $("#titleInput").val(landingDetail[0]['title']);
                    $("#descInput").val(landingDetail[0]['description']);
                    $("#linkInput").val(landingDetail[0]['link']);
                    $("#textInput").val(landingDetail[0]['linkText']);
                    $("#editImageHiddenFile").val(landingDetail[0]['logo']);
                    if (landingDetail[0]['logo'] != null) {
                        $("#storedViewImage").attr("src", '../../img/uplaods/' + landingDetail[0]['logo']);
                        $("#storedViewImage").attr("alt", landingDetail[0]['logo']);
                    } else {
                        $("#storedViewImage").attr("src", "");
                        $("#storedViewImage").attr("alt", "");
                    }
                    $("#editBgImageHiddenFile").val(landingDetail[0]['bg_img']);
                    if (landingDetail[0]['bg_img'] != null) {
                        $("#storedViewBgImage").attr("src", '../../img/uplaods/' + landingDetail[0]['bg_img']);
                        $("#storedViewBgImage").attr("alt", landingDetail[0]['bg_img']);
                    } else {
                        $("#storedViewBgImage").attr("src", "");
                        $("#storedViewBgImage").attr("alt", "");
                    }

                    if (landingDetail[0]['isActive'] == "0") {
                        $("#addLandingStatus").prop("checked", false);
                    } else {
                        $("#addLandingStatus").prop("checked", true);
                    }
                    let editStatusCheckbox = document.getElementById('addLandingStatus');
                    if (editStatusCheckbox.checked == '1') {
                        $("#addLandingStatusOption").html("Published");
                    } else {
                        $("#addLandingStatusOption").html("Draft");
                    }

                } else {
                    // notification("Error", "exclamation-sign", "Internal Error", "danger");
                }
            } else {

            }

        }
    });
}

$(document).ready(() => {

    viewLandingDetails();

    // Get the input element
    const imageEditInput = document.getElementById('imageInput');

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

    // Get the input element
    const bgImageEditInput = document.getElementById('bgImageInput');

    // Get the preview image element
    const previewEditBgImage = document.getElementById('previewEditBgImage');

    // Get the Stored image element
    const storedViewBgImage = document.getElementById('storedViewBgImage');

    // Listen for changes in the input file selection
    bgImageEditInput.addEventListener('change', function (event) {
        // Check if a file is selected
        if (event.target.files && event.target.files[0]) {
            // Create a FileReader object
            const reader = new FileReader();

            // Set the image source once it's loaded
            reader.onload = function (e) {
                previewEditBgImage.src = e.target.result;
                previewEditBgImage.style.display = 'block';
                storedViewBgImage.style.display = 'none';
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(event.target.files[0]);
        } else {
            // No file selected, hide the preview
            previewEditBgImage.style.display = 'none';
            storedViewBgImage.style.display = 'block';
        }
    });


    let addStatusCheckbox = document.getElementById('addLandingStatus');
    let addStatusOutput = document.getElementById('addLandingStatusOption');
    addStatusCheckbox.addEventListener('change', function () {
        if (addStatusCheckbox.checked) {
            addStatusOutput.textContent = 'Published';
        } else {
            addStatusOutput.textContent = 'Draft';
        }
    });

    $("#landingForm").submit(function (e) {
        e.preventDefault(); // Prevent the form from submitting normally

        // Get the form data
        const formData = new FormData(this);

        // Make the AJAX request
        $.ajax({
            url: '../controllers/addLandingController.php',
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
        viewLandingDetails();

    });

});

