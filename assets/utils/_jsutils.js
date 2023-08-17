console.log("Utils function");

const hrefObject = {
    "about.php": ["", "About"],
    "appointment.php": ["", "Appointment"],
    "blog.php": ["", "Blog"],
    "achievements.php": ["", "Achievements"],
    "contact.php": ["", "Contact"],
    "doctors.php": ["", "Doctors"],
    "faq.php": ["", "FAQs"],
    "gallery.php": ["", "Gallery"],
    "single-service.php": ["Services", "Single Service"],
    "home.php": ["", "Home"],
    "services.php": ["", "Services"],
    "termsandconditions.php": ["", "Terms And Conditions"]
};

function generateBreadcrumbs() {
    const currentUrl = window.location.pathname;
    const breadcrumbContainer = $('.breadcrumb');
    breadcrumbContainer.empty();
    const urlSegments = currentUrl.split('/');
    let breadcrumbHtml = '<li class="breadcrumb-item"><a href="/kulkarrni/pages">Home</a></li>';

    for (let i = 1; i < urlSegments.length; i++) {
        for (items in hrefObject) {
            if (urlSegments[i] == items) {
                if (hrefObject[items][0] == "") {
                    breadcrumbHtml += `<li class="breadcrumb-item"><a class="active" href="${items}">${hrefObject[items][1]}</a></li>`;
                } else {
                    breadcrumbHtml += `<li class="breadcrumb-item">${hrefObject[items][0]}</li><li class="breadcrumb-item"><a class="active" href="${items}">${hrefObject[items][1]}</a></li>`;
                }
            }
        }
    }

    breadcrumbContainer.html(breadcrumbHtml);
}

function initializePagination(element, postsPerPage) {
    let currentPage = 1;

    function showPage(page) {
        $(element).hide();
        let startIndex = (page - 1) * postsPerPage;
        let endIndex = startIndex + postsPerPage;
        $(element).slice(startIndex, endIndex).show();
    }

    showPage(currentPage);

    $('.pagination .page-item').on('click', function () {
        $('.pagination .page-item').removeClass("active");
        $(this).closest(".page-item").addClass("active");
        let newPage = parseInt($(this).text());
        currentPage = newPage;
        showPage(currentPage);
    });
}


function formatDate(inputDate) {
    const months = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];

    const date = new Date(inputDate);
    const month = months[date.getMonth()];
    const day = date.getDate();
    const year = date.getFullYear();
    const hours = date.getHours();
    const minutes = date.getMinutes();
    const ampm = hours >= 12 ? 'pm' : 'am';

    // Convert to 12-hour format
    const formattedHours = hours % 12 === 0 ? 12 : hours % 12;

    const formattedDate = `${month} ${day}, ${year} at ${formattedHours}:${(minutes < 10 ? '0' : '') + minutes} ${ampm}`;

    return formattedDate;
}

$(document).ready(() => {
    generateBreadcrumbs();
});
