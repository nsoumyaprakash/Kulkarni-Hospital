console.log("contact");

const getContactDetails = () => {
    $.ajax({
        url: '../controllers/getContactDetails.php',
        method: 'GET',
        success: (response) => {
            const parsedResponse = JSON.parse(response);

            if (parsedResponse.statusCode === 0) {
                const data = parsedResponse.data[0];
                const addressHtml = `
                <div class="single-address-box mb-3">
                    <span>Address:</span>
                    <p>${data.address}</p>
                </div>
                <div class="single-address-box mb-3">
                    <span>Phone:</span>
                    <p>${data.phone}</p>
                </div>
                <div class="single-address-box">
                    <span>Inquires:</span>
                    <p>${data.email}</p>
                </div>`;

                $("#locationMap").html(`<iframe id="gmap_canvas" src="${data.map}"></iframe>`);
                $("#addressBox").html(addressHtml);
            }
        },
        error: (error) => {
            console.error('GET Error:', error);
        }
    });
}





$(document).ready(() => {
    getContactDetails();

    // Saving enquiry in database
    $("#contactEnquiryForm").on("submit", (e) => {
        e.preventDefault();
        $.ajax({
            url: '../controllers/saveContactEnquiry.php',
            method: 'POST',
            data: $(e.target).serialize(),
            success: (response) => {
                const parsedResponse = JSON.parse(response);
                if (parsedResponse.statusCode === 0) {
                    $(e.target).trigger("reset");
                    alert(parsedResponse.message);
                }
            },
            error: (error) => {
                console.error('POST Error:', error);
            }
        });
    });
});