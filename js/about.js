console.log("about");

const getAboutDetails = () => {
    $.ajax({
        url: '../controllers/getAboutDetails.php',
        method: 'GET',
        success: (response) => {
            const parsedResponse = JSON.parse(response);

            if (parsedResponse.statusCode === 0) {
                const aboutData = parsedResponse.data.aboutData[0];
                const aboutFeatureData = parsedResponse.data.aboutFeatureData;

                $("#aboutIntro").html(`<h6>${aboutData.date_place}</h6><h3>Welcome to <span>Our Medical</span></h3>${aboutData.description}`);
                $("#hospitalPromoVideo").attr("href", aboutData.promo_video);

                let aboutFeatureHtml = "";
                aboutFeatureData.forEach(item => {
                    aboutFeatureHtml += `
                    <div class="about-us-into-features mb-5">
                        <div class="about-us-into-features-icon">
                            <i class="${item.icon}"></i>
                        </div>
                        <div class="about-us-into-features-text">
                            <h5>${item.title}</h5>
                            <p>${item.content}</p>
                        </div>
                    </div>`;
                });
                $("#aboutFeaturesContainer").html(aboutFeatureHtml);
            }
        },
        error: (error) => {
            console.error('GET Error:', error);
        }
    });
}

const getFaqs = () => {
    $.ajax({
        url: '../controllers/getFaqs.php',
        method: 'GET',
        success: (response) => {
            const parsedResponse = JSON.parse(response);

            if (parsedResponse.statusCode === 0) {
                const data = parsedResponse.data;

                let faqHtml = "";
                data.forEach((item, index) => {
                    faqHtml += `
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">
                                <i class="icofont icofont-thin-right"></i><a class="accordion-toggle collapsed"
                                    data-toggle="collapse" data-parent="#accordion" href="#panel${index}">${item.question}</a>
                            </h5>
                        </div>
                        <div id="panel${index}" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>${item.answer}</p>
                            </div>
                        </div>
                    </div>`;
                });
                $("#accordion").html(faqHtml);
            }
        },
        error: (error) => {
            console.error('GET Error:', error);
        }
    });
}

const getTestimonials = () => {
    $.ajax({
        url: '../controllers/getTestimonials.php',
        method: 'GET',
        success: (response) => {
            const parsedResponse = JSON.parse(response);

            if (parsedResponse.statusCode === 0) {
                const data = parsedResponse.data;

                let testimonialHtml = "";
                data.forEach(item => {
                    testimonialHtml += `
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="single-testimonial mb-4">
                            <div class="single-testimonial-img">
                                <img class="img-fluid" src="../img/user.png" alt="Patient">
                            </div>
                            <div class="single-testimonial-text-warp">
                                <div class="single-testimonial-text-inner">
                                    <p>${item.content}</p>
                                    <footer class="blockquote-footer">${item.posted_by} , <cite title="Source Title">${item.created.substring(0, 10)}</cite>
                                    </footer>
                                </div>
                                <div class="single-testimonial-text-icon">
                                    <i class="icofont icofont-quote-left"></i>
                                </div>
                            </div>
                        </div>
                    </div>`;
                });
                $("#testimonialContainer").html(testimonialHtml);
            }
        },
        error: (error) => {
            console.error('GET Error:', error);
        }
    });
}

const getClients = () => {
    $.ajax({
        url: '../controllers/getClients.php',
        method: 'GET',
        success: (response) => {
            const parsedResponse = JSON.parse(response);

            if (parsedResponse.statusCode === 0) {
                const data = parsedResponse.data;

                let clientHtml = "";
                data.forEach(item => {
                    clientHtml += `
                    <div class="single-client">
                        <a href="../img/clients/${item.image}" class="venobox info vbox-item" data-title="PORTFOLIO TITTLE data-gall="gall1">
                            <img class="img-fluid" src="../img/clients/${item.image}" alt="${item.name}">
                        </a>
                    </div>`;
                });
                $("#clientsContainer").html(clientHtml);
                $('#clientsContainer').owlCarousel({
                    loop: true,
                    margin: 30,
                    autoplay: true,
                    autoplayTimeout: 3500,
                    items: 5,
                    dots: false,
                    nav: false,
                    responsive: {
                        0: {
                            items: 2
                        },
                        600: {
                            items: 3
                        },
                        768: {
                            items: 4
                        },
                        1000: {
                            items: 5
                        }
                    }
                });
            }
        },
        error: (error) => {
            console.error('GET Error:', error);
        }
    });
}





$(document).ready(() => {
    getAboutDetails();
    getFaqs();
    getTestimonials();
    getClients();
});