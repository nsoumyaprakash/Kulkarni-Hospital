console.log("Home");

const getHomePageContent = () => {
    $.ajax({
        url: '../controllers/getHomePageContent.php',
        method: 'GET',
        success: (response) => {
            const parsedResponse = JSON.parse(response);

            if (parsedResponse.statusCode === 0) {
                const data = parsedResponse.data[0];
                $("#aboutSectionTitle").html(data.heading);
                $("#aboutSectionParagraph").html(data.paragraph);
            }
        },
        error: (error) => {
            console.error('GET Error:', error);
        }
    });
}

const getHomePageBanners = () => {
    $.ajax({
        url: '../controllers/getHomePageBanners.php',
        method: 'GET',
        success: (response) => {
            const parsedResponse = JSON.parse(response);

            if (parsedResponse.statusCode === 0) {
                const data = parsedResponse.data;

                let html = "";
                data.forEach(item => {
                    html += `<div class="about-slider-item">
                                <img class="img-fluid" src="../img/banners/${item.img}" alt="Kulkarni Medzone" />
                            </div>`;
                });
                $("#homeBannerContainer").html(html);
                $('#homeBannerContainer').owlCarousel({
                    loop: true,
                    autoplay: false,
                    autoplayTimeout: 4000,
                    dots: false,
                    items: 1,
                    animateIn: "fadeInDown",
                    animateOut: "fadeOutDown",
                    nav: true,
                    navText: ["<i class='icofont icofont-thin-left'></i>", "<i class='icofont icofont-thin-right'></i>"]
                });

            }
        },
        error: (error) => {
            console.error('GET Error:', error);
        }
    });
}

const getHomePageGallery = () => {
    $.ajax({
        url: '../controllers/getGalleryItems.php',
        method: 'GET',
        success: (response) => {
            const parsedResponse = JSON.parse(response);

            if (parsedResponse.statusCode === 0) {
                const data = parsedResponse.data.galleryData;

                let html = "";
                data.forEach(item => {
                    html += `
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
                    </div>`;
                });
                $("#homeGalleryContainer").html(html);
                $('#homeGalleryContainer').owlCarousel({
                    loop: true,
                    autoplay: false,
                    autoplayTimeout: 4000,
                    navSpeed: 700,
                    dotsSpeed: 700,
                    dragEndSpeed: 1000,
                    dots: false,
                    nav: true,
                    navText: ["<i class='icofont icofont-thin-left'></i>", "<i class='icofont icofont-thin-right'></i>"],
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 1
                        },
                        768: {
                            items: 3
                        },
                        1000: {
                            items: 4
                        }
                    }
                });
                $('.venobox').venobox({
                    numeratio: true,
                    titleattr: 'data-title',
                    spinner: 'cube-grid',
                    spinColor: '#fff'
                });
            }
        },
        error: (error) => {
            console.error('GET Error:', error);
        }
    });
}

const getHomePageResources = () => {
    $.ajax({
        url: '../controllers/getResources.php',
        method: 'GET',
        success: (response) => {
            const parsedResponse = JSON.parse(response);

            if (parsedResponse.statusCode === 0) {
                const data = parsedResponse.data;

                let html = "";
                data.forEach(item => {
                    html += `
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-lg-0 mb-md-4 mb-sm-4 mb-4">
                        <div class="single-counter">
                            <div class="single-counter-icon">
                                <i class="${item.icon}"></i>
                            </div>
                            <div class="single-counter-text">
                                <h5 class="timer">${item.count}</h5>
                                <p>${item.title}</p>
                            </div>
                        </div>
                    </div>`;
                });
                $("#homeResourcesContainer").html(html);
            }
        },
        error: (error) => {
            console.error('GET Error:', error);
        }
    });
}

const getHomePageServices = () => {
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
                    <div class="single-service-item">
                        <div class="single-service">
                            <img class="img-fluid" src="../img/service/${item.thumbnail}" alt="${item.title}" />
                            <h5>${item.title}</h5>
                            <p>${item.description.substring(0, 60)}...</p>
                            <a class="serv-rmbtn" href="single-service.php?service=${item.id}">Read More</a>
                        </div>
                    </div>`;
                });
                $("#homeServicesContainer").html(html);
                $('#homeServicesContainer').owlCarousel({
                    loop: true,
                    margin: 30,
                    autoplay: false,
                    autoplayTimeout: 2000,
                    navSpeed: 700,
                    dotsSpeed: 700,
                    dragEndSpeed: 1000,
                    dots: false,
                    nav: true,
                    navText: ["<i class='icofont icofont-thin-left'></i>", "<i class='icofont icofont-thin-right'></i>"],
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 1
                        },
                        768: {
                            items: 2
                        },
                        1000: {
                            items: 4
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

const getHomePageDoctors = () => {
    $.ajax({
        url: '../controllers/getDoctors.php',
        method: 'GET',
        success: (response) => {
            const parsedResponse = JSON.parse(response);

            if (parsedResponse.statusCode === 0) {
                const data = parsedResponse.data;

                let html = "";
                data.forEach(item => {
                    html += `
                    <div class="single-doctor single-doctor-warp">
                        <img class="img-fluid" src="../img/doctors/${item.img}" alt="${item.name}" />
                        <div class="single-doctor-info">
                            <h4>${item.name}</h4>
                            <span>${item.speciality}</span>
                        </div>
                        <div class="single-doctor-mask">
                            <div class="single-doctor-mask-inner">
                                <h5>About Doctor</h5>
                                <p>${item.description}</p>
                                <ul><li><a href="appointment.php?doc=${item.id}">Get Appointment</a></li></ul>
                            </div>
                        </div>
                    </div>`;
                });
                $("#homeDoctorContainer").html(html);
                $('#homeDoctorContainer').owlCarousel({
                    loop: true,
                    margin: 30,
                    autoplay: true,
                    autoplayTimeout: 4000,
                    navSpeed: 700,
                    dotsSpeed: 700,
                    dragEndSpeed: 1000,
                    dots: true,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 1
                        },
                        768: {
                            items: 2
                        },
                        1000: {
                            items: 4
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

const getHomePagePromoVideo = () => {
    $.ajax({
        url: '../controllers/getAboutDetails.php',
        method: 'GET',
        success: (response) => {
            const parsedResponse = JSON.parse(response);

            if (parsedResponse.statusCode === 0) {
                const data = parsedResponse.data.aboutData[0];
                $("#homePromoVideoLink").attr("href", data.promo_video);
            }
        },
        error: (error) => {
            console.error('GET Error:', error);
        }
    });
}

const getHomePageFaqs = () => {
    $.ajax({
        url: '../controllers/getFaqs.php',
        method: 'GET',
        success: (response) => {
            const parsedResponse = JSON.parse(response);

            if (parsedResponse.statusCode === 0) {
                const data = parsedResponse.data;

                let html = "";
                data.forEach((item, index) => {
                    html += `
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
                $("#homeFaqsContainer").html(html);
            }
        },
        error: (error) => {
            console.error('GET Error:', error);
        }
    });
}

const getHomePageTestimonials = () => {
    $.ajax({
        url: '../controllers/getTestimonials.php',
        method: 'GET',
        success: (response) => {
            const parsedResponse = JSON.parse(response);

            if (parsedResponse.statusCode === 0) {
                const data = parsedResponse.data;

                let html = "";
                data.forEach(item => {
                    html += `
                    <div class="single-testimonial mb-4">
                        <div class="single-testimonial-img">
                            <img class="img-fluid" src="../img/user.png" alt="Patient">
                        </div>
                        <div class="single-testimonial-text-warp">
                            <div class="single-testimonial-text-inner">
                                <p>${item.content}</p>
                                <footer class="blockquote-footer">${item.posted_by} , <cite title="Source Title">${item.created.substring(0, 10)}</cite></footer>
                            </div>
                            <div class="single-testimonial-text-icon">
                                <i class="icofont icofont-quote-left"></i>
                            </div>
                        </div>
                    </div>`;
                });
                $("#homeTestimonialContainer").html(html);
            }
        },
        error: (error) => {
            console.error('GET Error:', error);
        }
    });
}

const getHomePageBlogs = () => {
    $.ajax({
        url: '../controllers/getAllBlogs.php',
        method: 'GET',
        success: (response) => {
            const parsedResponse = JSON.parse(response);

            if (parsedResponse.statusCode === 0) {
                const data = parsedResponse.data;
                let html = "";
                data.forEach(item => {
                    html += `
                    <div class="single-blog-home mx-2">
                        <div class="single-blog-home-img">
                            <a href="single-blog.php?blog=${item.id}"><img class="img-fluid" src="../img/blog/${item.thumbnail}" alt="${item.title}"></a>
                            <div class="single-blog-home-meta">
                                <span class="post-date"><i class="lnr lnr-calendar-full"></i> ${item.created.substring(0, 10)}</span>
                                <span class="post-user"><i class="lnr lnr-user"></i> ${item.author}</span>
                                <span class="post-comment"><i class="lnr lnr-bubble"></i> 6 comments</span>
                            </div>
                        </div>
                        <a href="single-blog.php?blog=${item.id}">
                            <h5>${item.title}</h5>
                        </a>
                        <p>${item.content.substring(0, 200)}...</p>
                        <a href="single-blog.php?blog=${item.id}" class="blog-home-rmbtn">Continue <i class="icofont icofont-long-arrow-right"></i></a>
                    </div>`;
                });
                $("#homeBlogsContainer").html(html);
                $("#homeBlogsContainer").owlCarousel({
                    loop: true,
                    autoplay: true,
                    autoplayTimeout: 4000,
                    navSpeed: 700,
                    dotsSpeed: 700,
                    dragEndSpeed: 1000,
                    dots: false,
                    nav: true,
                    navText: ["<i class='icofont icofont-thin-left'></i>", "<i class='icofont icofont-thin-right'></i>"],
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 2
                        },
                        768: {
                            items: 3
                        },
                        1000: {
                            items: 3
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
    getHomePageContent();
    getHomePageBanners();
    getHomePageGallery();
    getHomePageResources();
    getHomePageServices();
    getHomePageDoctors();
    getHomePagePromoVideo();
    getHomePageFaqs();
    getHomePageTestimonials();
    getHomePageBlogs();

    // Saving enquiry in database
    $("#homeAppointmentForm").on("submit", (e) => {
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