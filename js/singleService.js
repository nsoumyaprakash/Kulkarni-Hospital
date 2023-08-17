console.log("Single Services");

const getSingleServices = (serviceId) => {
    $.ajax({
        url: '../controllers/getSingleServices.php',
        method: 'POST',
        data: { serviceId },
        success: (response) => {
            const parsedResponse = JSON.parse(response);

            if (parsedResponse.statusCode === 0) {
                const data = parsedResponse.data[0];
                const imgHtml = `
                <div id="one" class="tab-pane animated fadeInRight active show">
                    <img class="img-fluid" src="../img/service/${data.img1}" alt="${data.title}">
                </div>
                <div id="two" class="tab-pane animated fadeInRight">
                    <img class="img-fluid" src="../img/service/${data.img2}" alt="${data.title}">
                </div>
                <div id="three" class="tab-pane animated fadeInRight">
                    <img class="img-fluid" src="../img/service/${data.img3}" alt="${data.title}">
                </div>`;
                const imgNavHtml = `
                <li class="nav-item">
                    <a href="#" data-target="#one" data-toggle="tab" class="nav-link active">
                        <img class="img-fluid" src="../img/service/${data.img1}" alt="${data.title}">
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" data-target="#two" data-toggle="tab" class="nav-link">
                        <img class="img-fluid" src="../img/service/${data.img2}" alt="${data.title}">
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" data-target="#three" data-toggle="tab" class="nav-link">
                        <img class="img-fluid" src="../img/service/${data.img3}" alt="${data.title}">
                    </a>
                </li>`;
                const html = `<h4>${data.title}</h4><hr><div class="mb-3">${data.description}</div>`;

                $("#tabsJustifiedContent").html(imgHtml);
                $("#tabsJustified").html(imgNavHtml);
                $("#singleServiceContainer").html(html);
            }
        },
        error: (error) => {
            console.error('POST Error:', error);
        }
    });
}





$(document).ready(() => {
    const urlParams = new URLSearchParams(window.location.search);
    const serviceParam = urlParams.get('service');

    getSingleServices(serviceParam);
});