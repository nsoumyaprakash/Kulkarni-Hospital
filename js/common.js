console.log("Common");

const getNavAndFooterContents = () => {
    $.ajax({
        url: '../controllers/getContactDetails.php',
        method: 'GET',
        success: (response) => {
            const parsedResponse = JSON.parse(response);

            if (parsedResponse.statusCode === 0) {
                const data = parsedResponse.data[0];
                const socialLinks = JSON.parse(data.social_links);

                // Header items
                const phoneHtml = `<div class="header-info-icon"><span class="lnr lnr-phone-handset"></span></div><p>Contact Us</p><a href="tel:${data.phone}">${data.phone}</a>`;
                const openingHoursHtml = `<div class="header-info-icon"><span class="lnr lnr-map-marker"></span></div>
                <p>Opening hours</p>${data.opening_hours}`;

                let navSocialLinksHtml = "";
                for (const key in socialLinks) {
                    if (socialLinks[key] != "") {
                        navSocialLinksHtml += `<li><a href="${socialLinks[key]}"><i class="icofont icofont-social-${key}"></i></a></li>`;
                    }
                }

                $("#navPhone").html(phoneHtml);
                $("#navOpeningHours").html(openingHoursHtml);
                $("#navSocialLinks").html(navSocialLinksHtml);

                // Footer items
                const copyrightHtml = `<p>${data.copyright} | Powered by <a href="https://ikontel.com" target="__blank">iKonTel</a></p>`;
                const footerContactHtml = `
                <li><a href="${data.map}"><i class="lnr lnr-map-marker"></i> ${data.address}</a></li>
                <li><a href="mailto:${data.email}"><i class="lnr lnr-envelope "></i> ${data.email}</a></li>
                <li><a href="tel:${data.phone}"><i class="lnr lnr-phone "></i> ${data.phone}</a></li>`;

                let footerSocialLinksHtml = "";
                for (const key in socialLinks) {
                    if (socialLinks[key] != "") {
                        footerSocialLinksHtml += `<li><a href="${socialLinks[key]}"><i class="icofont icofont-social-${key}"></i></a></li>`;
                    }
                }

                $("#copyright").html(copyrightHtml);
                $("#footerContact").html(footerContactHtml);
                $("#footerSocialLinks").html(footerSocialLinksHtml);
            }
        },
        error: (error) => {
            console.error('GET Error:', error);
        }
    });
}

const getOrgContents = () => {
    $.ajax({
        url: '../controllers/getHomePageContent.php',
        method: 'GET',
        success: (response) => {
            const parsedResponse = JSON.parse(response);

            if (parsedResponse.statusCode === 0) {
                const data = parsedResponse.data[0];

                $("#navOrgTitle").html(`<p>${data.heading}</p>`);
                $("#orgLogo").html(`<a href="home.php"><img class="img-fluid" src="../img/${data.logo}" alt="${data.org_name}"></a>`);
                $("#footerAbout").html(`<p>${data.paragraph} <a class="wn-readm" href="about.php">Know more</a></p>`);
            }
        },
        error: (error) => {
            console.error('GET Error:', error);
        }
    });
}




$(document).ready(() => {
    getNavAndFooterContents();
    getOrgContents();
});