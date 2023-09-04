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
                    $("#shortText").val(contactInfoDetail[0]['shortText']);
                    $("#otherLink").val(contactInfoDetail[0]['other']);
                    $("#mapIframe").val(contactInfoDetail[0]['mapIframe']);

                    const addressData = JSON.parse(contactInfoDetail[0]['address']);
                    $("#showAddressIcon").html(`<i class="${addressData.icon}"></i> ${addressData.icon}`);
                    $("#addressIcon").val(addressData.icon);
                    $('#addressText').val(addressData.address);

                    const emailData = JSON.parse(contactInfoDetail[0]['email']);
                    $("#showEmailIcon").html(`<i class="${emailData.icon}"></i> ${emailData.icon}`);
                    $("#emailIcon").val(emailData.icon);
                    $('#emailText').val(emailData.email);

                    const phoneData = JSON.parse(contactInfoDetail[0]['phone']);
                    $("#showPhoneIcon").html(`<i class="${phoneData.icon}"></i> ${phoneData.icon}`);
                    $("#phoneIcon").val(phoneData.icon);
                    $('#phoneText').val(phoneData.phone);

                    const individualLinks = JSON.parse(contactInfoDetail[0]['social_links']);
                    $("#facebook").val(individualLinks.facebook);
                    $("#instagram").val(individualLinks.instagram);
                    $("#twitter").val(individualLinks.twitter);
                    $("#linkedin").val(individualLinks.linkedin);

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

const getIcons = () => {
    $.ajax({
        url: "../controllers/fetchIconOptions.php",
        method: "GET",
        success: function (response) {
            let dropdownItems = "";
            response.forEach(option => {
                dropdownItems += `<a class="dropdown-item"><i class="${option.text}"></i> ${option.text}</a>`;
            });

            $("#addressIconMenu").html(dropdownItems);
            $("#emailIconMenu").html(dropdownItems);
            $("#phoneIconMenu").html(dropdownItems);
        }
    });

    // Logic For Icons Dropdown
    $(document).on('click', "#addressIconMenu .dropdown-item", (e) => {
        $("#showAddressIcon").html($(e.target).html());
        $("#addressIcon").val($(e.target).find("i").attr("class"));
    });

    $(document).on('click', "#emailIconMenu .dropdown-item", (e) => {
        $("#showEmailIcon").html($(e.target).html());
        $("#emailIcon").val($(e.target).find("i").attr("class"));
    });

    $(document).on('click', "#phoneIconMenu .dropdown-item", (e) => {
        $("#showPhoneIcon").html($(e.target).html());
        $("#phoneIcon").val($(e.target).find("i").attr("class"));
    });
}

$(document).ready(() => {
    viewContactDetails();
    getIcons();

    let addStatusCheckbox = $('#addStatus');
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
            shortText: $("#shortText").val(),
            mapIframe: $("#mapIframe").val(),
            otherLink: $("#otherLink").val(),
            addStatus: $("#addStatus").val()
        };

        const address = {
            icon: $("#addressIcon").val(),
            heading: "Address:",
            address: $("#addressText").val()
        };

        const email = {
            icon: $("#emailIcon").val(),
            heading: "Email:",
            email: $("#emailText").val()
        };

        const call = {
            icon: $("#phoneIcon").val(),
            heading: "Call:",
            phone: $("#phoneText").val()
        };

        const socialLinks = {
            facebook: $("#facebook").val(),
            instagram: $("#instagram").val(),
            twitter: $("#twitter").val(),
            linkedin: $("#linkedin").val()
        };

        formData.address = JSON.stringify(address);
        formData.email = JSON.stringify(email);
        formData.call = JSON.stringify(call);
        formData.socialLinks = JSON.stringify(socialLinks);

        $.ajax({
            url: '../controllers/contactInfoController.php',
            type: 'POST',
            data: formData,
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
    });
});