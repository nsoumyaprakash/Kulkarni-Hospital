console.log("Service Sidebar");

const getPopularDoctors = () => {
    $.ajax({
        url: '../controllers/getDoctors.php',
        method: 'GET',
        success: (response) => {
            const parsedResponse = JSON.parse(response);

            if (parsedResponse.statusCode === 0) {
                const data = parsedResponse.data;

                let html = "";
                for (let i = data.length - 1; i >= data.length - 3; i--) {
                    html += `
                    <div class="blog-singleRecpost">
                        <img class="img-fluid" src="../img/doctors/${data[i].img}" alt="${data[i].name}">
                        <h5 class="blog-recTitle">
                            <a href="single-doctor.php">${data[i].name}</a>
                        </h5>
                        <p>${data[i].speciality}</p>
                    </div>`;
                }
                $("#servicePopularDoctors").html(html);
            }
        },
        error: (error) => {
            console.error('GET Error:', error);
        }
    });
}






$(document).ready(() => {
    getPopularDoctors();
});