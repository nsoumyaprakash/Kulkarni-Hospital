console.log("termsAndConditions");

const getTermsAndConditions = () => {
    $.ajax({
        url: '../controllers/getTermsAndConditions.php',
        method: 'GET',
        success: (response) => {
            const parsedResponse = JSON.parse(response);

            if (parsedResponse.statusCode === 0) {
                const data = parsedResponse.data[0];
                $("#termsAndConditionsContainer").html(data.content);
            }
        },
        error: (error) => {
            console.error('GET Error:', error);
        }
    });
}





$(document).ready(() => {
    getTermsAndConditions();
});