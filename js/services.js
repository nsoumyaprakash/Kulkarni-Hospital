console.log("Services");

const getAllServices = () => {
    $.ajax({
        url: '../controllers/getAllServices.php',
        method: 'GET',
        success: (response) => {
            const parsedResponse = JSON.parse(response);

            if (parsedResponse.statusCode === 0) {
                const data = parsedResponse.data;
                let html = "";
                data.forEach(item => {
                    html += `
                    <div class="service-item col-lg-3 col-md-6 col-sm-12 col-12 mb-4">
                        <div class="single-service">
                            <img class="img-fluid" src="../img/service/${item.thumbnail}" alt="" />
                            <h5>${item.title}</h5>
                            <p>${item.description.substring(0, 70)}...</p>
                            <a class="serv-rmbtn" href="single-service.php?service=${item.id}">Read More</a>
                        </div>
                    </div>`;
                });
                $("#servicesContainer").html(html);
                for (let i = 0; i < Math.ceil(data.length / 8); i++) {
                    $("#services .pagination").append(`<li class="page-item"><a class="page-link">${i + 1}</a></li>`);
                }
                initializePagination(".service-item", 8);
            }
        },
        error: (error) => {
            console.error('GET Error:', error);
        }
    });
}





$(document).ready(() => {
    getAllServices();
});