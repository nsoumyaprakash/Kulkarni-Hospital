const viewProfileDetails = () => {
    $.ajax({
        url: '../controllers/viewProfileController.php',
        type: "POST",
        data: "fetch=true",
        cache: false,
        success: (response) => {
            const profileParsedResponse = JSON.parse(response);

            let profileParsedResponseInfo = `
            <table class="table table-borderless table-hover" id="userTable">
            <tbody>`;
            if (profileParsedResponse['result']['status']['statusCode'] == "0") {
                const profileDetails = profileParsedResponse['profileDetails'];

                for (let i = 0; i < profileDetails.length; i++) {
                    profileParsedResponseInfo += `<tr>`;
                    profileParsedResponseInfo += `<th scope="col">Profile Image</th>`;
                    if (profileDetails[i].image != null) {
                        profileParsedResponseInfo += `<td><img src="../../img/uplaods/${profileDetails[i].image}" onclick="showEnlargedImage('../../img/uplaods/${profileDetails[i].image}');"></td>`;
                    } else {
                        profileParsedResponseInfo += `<td></td>`;
                    }
                    profileParsedResponseInfo += `</tr>`;
                    profileParsedResponseInfo += `<tr>`;
                    profileParsedResponseInfo += `<th scope="col">Full Name</th>`;
                    profileParsedResponseInfo += `<td>${profileDetails[i].name}</td>`;
                    profileParsedResponseInfo += `</tr>`;
                    profileParsedResponseInfo += `<tr>`;
                    profileParsedResponseInfo += `<th scope="col">Phone</th>`;
                    profileParsedResponseInfo += `<td>${profileDetails[i].phone}</td>`;
                    profileParsedResponseInfo += `</tr>`;
                    profileParsedResponseInfo += `<tr>`;
                    profileParsedResponseInfo += `<th scope="col">Email</th>`;
                    profileParsedResponseInfo += `<td>${profileDetails[i].email}</td>`;
                    profileParsedResponseInfo += `</tr>`;

                }
            }
            profileParsedResponseInfo += `</tbody ></table > `;
            $("#profileDetailsContainer").html(profileParsedResponseInfo);
        }
    });
}

const viewUserProfileDetails = () => {
    $.ajax({
        url: '../controllers/viewUserProfileController.php',
        type: "POST",
        data: "fetch=true",
        cache: false,
        success: (response) => {
            const editUserProfileParsedResponse = JSON.parse(response);
            if (editUserProfileParsedResponse['result']['status']['statusCode'] == "0") {
                let userProfileDetail = editUserProfileParsedResponse['userProfileDetails'];
                if (userProfileDetail.length > 0) {
                    $("#editUserProfileId").val(userProfileDetail[0]['id']);
                    $("#fullName").val(userProfileDetail[0]['name']);
                    $("#phone").val(userProfileDetail[0]['phone']);
                    $("#email").val(userProfileDetail[0]['email']);
                    $("#editImageHiddenFile").val(userProfileDetail[0]['image']);
                    if (userProfileDetail[0]['image'] != null) {
                        $("#storedViewImage").attr("src", '../../img/uplaods/' + userProfileDetail[0]['image']);
                        $("#storedeViewImage").attr("alt", userProfileDetail[0]['image']);
                    } else {
                        $("#storedViewImage").attr("src", "");
                        $("#storedeViewImage").attr("alt", "");
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

    viewProfileDetails();
    viewUserProfileDetails();

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

    $("#userProfileForm").submit(function (e) {

        e.preventDefault(); // Prevent the form from submitting normally

        // Get the form data
        const formData = new FormData(this);

        // Make the AJAX request
        $.ajax({
            url: '../controllers/userProfileController.php',
            type: 'POST',
            data: formData,
            processData: false, // Important! Prevent jQuery from processing the data
            contentType: false, // Important! Set the content type to false
            success: function (response) {
                const parsedResponse = JSON.parse(response);
                if (parsedResponse.result.status.statusCode == "0") {
                    sweetAlert("success", "Successfully Stored");
                } else {
                    sweetAlert("error", parsedResponse.result.status.errorMessage);
                }
            },
            error: function (xhr, status, error) {
                console.error(error); // Print any error messages
            }
        });
        viewProfileDetails();
        viewUserProfileDetails();

    });

});

