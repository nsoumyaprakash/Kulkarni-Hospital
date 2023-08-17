console.log("Gallery");

const getGalleryItems = () => {
    $.ajax({
        url: '../controllers/getGalleryItems.php',
        method: 'GET',
        success: (response) => {
            const parsedResponse = JSON.parse(response);

            if (parsedResponse.statusCode === 0) {
                const galleryData = parsedResponse.data.galleryData;
                const catData = parsedResponse.data.catData;

                let galleryHtml = "";
                galleryData.forEach(item => {
                    galleryHtml += `
                    <div class="gallery-item col-lg-3 col-md-3 col-sm-12 col-12 mix ${item.catagory}">
                        <div class="single-gallery-item">
                            <div class="single-gallery single-gallery-first">
                                <img class="img-fluid" src="../img/gallery/${item.img}" alt="${item.title}" />
                                <div class="single-gallery">
                                    <div class="single-gallery-inner">
                                        <h5>${item.title}</h5>
                                        <p>${item.description}</p>
                                        <a href="../img/gallery/${item.img}" class="info"><i class="icofont icofont-link"></i></a>
                                        <a href="../img/gallery/${item.img}" class="venobox info" data-title="PORTFOLIO TITTLE"
                                            data-gall="gall1"><i class="icofont icofont-expand"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;
                });
                $("#galleryContainer").html(galleryHtml);
                $('.venobox').venobox({
                    numeratio: true,
                    titleattr: 'data-title',
                    spinner: 'cube-grid',
                    spinColor: '#fff'
                });
                let catHtml = "";
                catData.forEach(item => {
                    catHtml += `
                    <li class="filter" data-filter=".${item.catagory}">
                        <i class="${item.catagory_icon}"></i>${item.catagory.replace("-", " ")}
                    </li>`;
                });
                // $("#galleryImgCat").append(catHtml);

                for (let i = 0; i < Math.ceil(galleryData.length / 8); i++) {
                    $("#gallery .pagination").append(`<li class="page-item"><a class="page-link">${i + 1}</a></li>`);
                }
                initializePagination(".gallery-item", 8);
            }
        },
        error: (error) => {
            console.error('GET Error:', error);
        }
    });
}





$(document).ready(() => {
    getGalleryItems();
});