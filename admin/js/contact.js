const viewContactDetails = () => {
    $.ajax({
        url: '../controllers/viewContactInfoController.php',
        type: "POST",
        data: "fetch=true",
        cache: false,
        success: (response) => {
            const editContactInfoParsedResponse = JSON.parse(response);

            if (editContactInfoParsedResponse['result']['status']['statusCode'] == "0") {
                let contactInfoDetail = editContactInfoParsedResponse['contactInfoDetails'];
                if (contactInfoDetail.length > 0) {
                    $("#editContactInfoId").val(contactInfoDetail[0]['id']);
                    $("#mapIframe").val(contactInfoDetail[0]['map']);
                    $("#addressText").val(contactInfoDetail[0]['address']);
                    $("#emailText").val(contactInfoDetail[0]['email']);
                    $("#phoneText").val(contactInfoDetail[0]['phone']);
                    $("#copyRight").val(contactInfoDetail[0]['copyright']);
                    $("#openingHours").val(contactInfoDetail[0]['opening_hours']);

                    const individualLinks = JSON.parse(contactInfoDetail[0]['social_links']);
                    $("#facebook").val(individualLinks.facebook);
                    $("#instagram").val(individualLinks.instagram);
                    $("#twitter").val(individualLinks.twitter);
                    $("#youtubePlay").val(individualLinks['youtube-play']);

                    if (contactInfoDetail[0]['isActive'] == "0") {
                        $("#addStatus").prop("checked", false);
                    } else {
                        $("#addStatus").prop("checked", true);
                    }

                    let editStatusCheckbox = $('#addStatus');
                    if (editStatusCheckbox.checked == '1') {
                        $("#addStatusOption").html("Published");
                    } else {
                        $("#addStatusOption").html("Draft");
                    }

                } else {
                    sweetAlert("error", "Internal Error");
                }
            } else {
                sweetAlert("error", parsedResponse.result.status.errorMessage);
            }
        }
    });
}

$(document).ready(() => {
    viewContactDetails();

    let addStatusCheckbox = document.getElementById("addStatus");
    let addStatusOutput = $('#addStatusOption');
    addStatusCheckbox.addEventListener('change', function () {
        if (addStatusCheckbox.checked) {
            addStatusOutput.textContent = 'Published';
        } else {
            addStatusOutput.textContent = 'Draft';
        }
    });

    $("#contactInfoForm").on("submit", (e) => {
        e.preventDefault();

        const formData = {
            editContactInfoId: $("#editContactInfoId").val(),
            mapIframe: $("#mapIframe").val(),
            addStatus: $("#addStatus").val()
        };

        const socialLinks = {
            facebook: $("#facebook").val(),
            instagram: $("#instagram").val(),
            twitter: $("#twitter").val(),
            "youtube-play": $("#linkedin").val()
        };

        formData.address = $("#addressText").val();
        formData.email = $("#emailText").val();
        formData.call = $("#phoneText").val();
        formData.socialLinks = JSON.stringify(socialLinks);
        formData.openingHours = $("#openingHours").val();
        formData.copyRight = $("#copyRight").val();

        $.ajax({
            url: '../controllers/contactInfoController.php',
            type: 'POST',
            data: formData,
            success: function (response) {
                const parsedResponse = JSON.parse(response);
                if (parsedResponse.result.status.statusCode == "0") {
                    sweetAlert("success", "Updated Successfully");
                    viewContactDetails();
                } else {
                    sweetAlert("error", parsedResponse.result.status.errorMessage);
                }
            },
            error: function (xhr, status, error) {
                console.error(error); // Print any error messages
            }
        });
    });
});