const viewDisclaimerDetails = () => {
    $.ajax({
        url: '../controllers/viewDisclaimerController.php',
        type: "POST",
        data: "fetch=true",
        cache: false,
        success: (response) => {
            const editDisclaimerParsedResponse = JSON.parse(response);
            if (editDisclaimerParsedResponse['result']['status']['statusCode'] == "0") {
                let disclaimerDetail = editDisclaimerParsedResponse['disclaimerDetails'];
                if (disclaimerDetail.length > 0) {
                    $("#editDisclaimerId").val(disclaimerDetail[0]['id']);
                    $("#privacyPolicyInput").val(disclaimerDetail[0]['privacy_policy']);
                    $("#termsAndConditionInput").val(disclaimerDetail[0]['terms_n_conditions']);

                } else {
                    // notification("Error", "exclamation-sign", "Internal Error", "danger");
                }
            } else {

            }

        }
    });
}

$(document).ready(() => {

    viewDisclaimerDetails();


    $("#disclaimerForm").submit(function (e) {
        e.preventDefault(); // Prevent the form from submitting normally

        // Get the form data
        const formData = new FormData(this);

        // Make the AJAX request
        $.ajax({
            url: '../controllers/addDisclaimerController.php',
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
        viewDisclaimerDetails();

    });

});

