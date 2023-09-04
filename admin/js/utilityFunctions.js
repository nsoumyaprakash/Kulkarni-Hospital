const hrefObject = {
    "dashboard.php": ["", "Dashboard"],
    "about.php": ["", "About"],
    "landing.php": ["", "Home"],
    "services.php": ["", "Services"],
    "achievements.php": ["", "Achievements"],
    "blogs.php": ["", "Blogs"],
    "contactsInfo.php": ["", "Contacts Info"],
    "doctorsInfo.php": ["", "Doctors Info"],
    "packages.php": ["", "Packages"],
    "users.php": ["", "Users"],
    "userProfile.php": ["My Profile", "Profile Info"],
    "pages.php": ["", "Generate Page"],
    "disclaimer.php": ["", "Disclaimer"],
    "mainMenu.php": ["Menu Management", "Main Menu"],
    "footerMenu.php": ["Menu Management", "Footer Menu"]
};

const addActiveClass = () => {
    // Get the current URL
    const currentUrl = window.location.pathname;

    // Get the breadcrumb container element
    const breadcrumbContainer = $('.breadcrumb');

    // Clear any existing breadcrumbs
    breadcrumbContainer.empty();

    // Split the current URL into segments
    const urlSegments = currentUrl.split('/');
    const navLinks = $("#sidebar-nav .nav-link");

    for (let i = 1; i < urlSegments.length; i++) {
        for (let j = 0; j < navLinks.length; j++) {
            if (urlSegments[i] == $(navLinks[j]).attr("href")) {
                $(navLinks[j]).addClass("active");
                const navContent = $(navLinks[j]).closest(".nav-content");
                const collapse = $(navContent).siblings(".nav-link");
                if ($(collapse).hasClass("collapsed")) {
                    $(collapse).removeClass("collapsed");
                    $(navContent).addClass("show");
                }
            }
        }
    }
}

// Function to generate breadcrumbs based on the current URL
const generateBreadcrumbs = () => {
    // Get the current URL
    const currentUrl = window.location.pathname;

    // Get the breadcrumb container element
    const breadcrumbContainer = $('.breadcrumb');

    // Clear any existing breadcrumbs
    breadcrumbContainer.empty();

    // Split the current URL into segments
    const urlSegments = currentUrl.split('/');

    // Generate and append the breadcrumb items
    let breadcrumbHtml = '<li class="breadcrumb-item"><a href="/iKontelAdmin">Home</a></li>'; // Add a home breadcrumb as the starting point


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

    // Append the breadcrumbs to the container
    breadcrumbContainer.html(breadcrumbHtml);
}

const showEnlargedImage = (path) => {
    imageModal = `
    <div class="modal fade" tabindex="-1" id="enlargedImageModal" aria-labelledby="enlargedImageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-0"><img src="${path}"></div>
            </div>
        </div>
    </div>`;
    $("#imageEnlargerModalContainer").html(imageModal);
    $("#enlargedImageModal").modal("show");
}

// Sweet Custom Alert
const sweetAlert = (alertType, message, position = "top-end", timer = 3000) => {
    const Toast = Swal.mixin({
        toast: true,
        position: position,
        showConfirmButton: false,
        timer: timer,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: alertType,
        title: message
    })
}

// Sweet Confirm Prompt
const sweetConfirm = async (message, text = "This action cannot be undone.") => {
    const result = await Swal.fire({
        title: message,
        text: text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        reverseButtons: true
    });

    if (result.isConfirmed) {
        return true;
    } else if (result.dismiss === Swal.DismissReason.cancel) {
        return false;
    } else {
        return false;
    }
};

// Toastify Custom Alert
const toastifyAlert = (message) => {
    Toastify({
        text: message,
        backgroundColor: 'color',
        className: 'custom-toast',
        duration: 3000
    }).showToast();
}

// Loader
// const loader = () => {
//     $(".loader").
// }

$(document).ready(() => {
    generateBreadcrumbs();
    addActiveClass();
    // $('.replace-button').click((e) => {
    //     let targetDivId = $(e.target).data('target');
    //     if (targetDivId == undefined || targetDivId == "undefined") {
    //         targetDivId = $(e.target.parentElement).data('target');
    //     }
    //     $('.replacable-container').hide(); // Hide all existing divs with class 'replacable-container'
    //     $('#' + targetDivId).show(); // Show the target div based on its ID
    // });
});

