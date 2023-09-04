// Global Variables for sub-menu
const subMenuItems = [];
const viewAboutDetails = () => {
    $.ajax({
        url: '../controllers/viewAboutController.php',
        type: "POST",
        data: "fetch=true",
        cache: false,
        success: (response) => {
            const editAboutParsedResponse = JSON.parse(response);

            if (editAboutParsedResponse['result']['status']['statusCode'] == "0") {
                let aboutDetail = editAboutParsedResponse['aboutDetails'];
                if (aboutDetail.length > 0) {
                    $("#editAboutId").val(aboutDetail[0]['id']);
                    $("#titleInput").val(aboutDetail[0]['title']);
                    $("#descInput").val(aboutDetail[0]['description']);
                    $("#datePlaceInput").val(aboutDetail[0]['date_place']);
                    $("#videoLinkInput").val(aboutDetail[0]['promo_video']);
                } else {
                    // notification("Error", "exclamation-sign", "Internal Error", "danger");
                }
            } else {

            }

        }
    });
}
const editMainMenuDetails = (mainMenuId) => {
    subMenuEditItems.splice(0);
    $("#editMainMenuItemForm")[0].reset();
    $.ajax({
        url: '../controllers/getMainMenuDetails.php',
        type: "POST",
        data: { mainMenuId: mainMenuId },
        cache: false,
        beforeSend: () => {

        },
        success: (response) => {
            const editMainMenuParsedResponse = JSON.parse(response);
            if (editMainMenuParsedResponse['result']['status']['statusCode'] == "0") {
                let MainMenuDetail = editMainMenuParsedResponse['menuDetails'];
                if (MainMenuDetail.length > 0) {
                    $("#editMenuId").val(mainMenuId);
                    $("#editMainMenuSlNo").val(MainMenuDetail[0]['sl_no']);
                    $("#editMainMenuTitleInput").val(MainMenuDetail[0]['title']);
                    $("#editSlug").val(MainMenuDetail[0]['slug']);
                    // Sub-menu items filling
                    for (let i = 0; i < editMainMenuParsedResponse['subMenuData'].length; i++) {
                        subMenuEditItems.push(editMainMenuParsedResponse['subMenuData'][i]);
                    }
                    displayEditedSubMenuItems(subMenuEditItems);

                    $("#editMainMenuModal").modal("show");
                } else {
                    notification("Error", "exclamation-sign", "Internal Error", "danger");
                    sweetAlert("error", "Internal Error");
                }
            } else {
                sweetAlert("error", editMainMenuParsedResponse.result.status.errorMessage);
            }

        }
    });
}
// Logic for displaying and deleting submenu
const displaySubMenuItems = (subMenuItems) => {
    $('#viewSubMenuItemsContainer').empty();
    if (subMenuItems.length > 0) {
        let html = `
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sl No.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>`;
        $.each(subMenuItems, (index, item) => {
            html += `
            <tr>
                <th scope="row">${index + 1}</th>
                <td>${item.title}</td>
                <td>${item.slug}</td>
                <td><button type="button" class="btn btn-sm btn-danger" onclick="deleteSubMenuItem('${index}')"><i class="bi bi-trash3"></i></button></td>
            </tr>`;
        });
        html += `</tbody></table>`;
        $('#viewSubMenuItemsContainer').html(html);
    }
}
const deleteSubMenuItem = (index) => {
    subMenuItems.splice(index, 1);
    displaySubMenuItems(subMenuItems);
}

const getIcons = () => {
    // Make an AJAX request to fetch the data from the server
    $.ajax({
        url: "../controllers/fetchIconOptions.php",
        method: "GET",
        success: function (response) {
            let dropdownItems = "";
            response.forEach(option => {
                dropdownItems += `<a class="dropdown-item" > <i class="${option.text}"></i> ${option.text}</a> `;
            });
            $("#editIconsMenu").html(dropdownItems);
        }
    });
    // Logic For Service Icons Dropdown
    $(document).on('click', "#editIconsMenu .dropdown-item", (e) => {
        $("#showEditIcons").html($(e.target).html());
        $("#editIcons").val($(e.target).find("i").attr("class"));
    });
}

$(document).ready(() => {
    viewAboutDetails();
    getIcons();

    // Logic for adding sub-menu
    $('#addSubMenuItemsButton').on("click", () => {
        const submenuTitle = $('#addSubMenuTitleInput').val();
        const submenuSlug = $('#addSubMenuSlug').val();

        if (submenuTitle != null) {
            const subMenuItem = {
                title: submenuTitle,
                slug: submenuSlug
            };
            subMenuItems.push(subMenuItem);
            $('#addSubMenuTitleInput').val('');
            $('#addSubMenuSlug').val('');
            displaySubMenuItems(subMenuItems);
        } else {
            sweetAlert("error", "Please fill all mandatory fields");
        }
    });

    $("#aboutForm").submit(function (e) {
        e.preventDefault(); // Prevent the form from submitting normally

        // Get the form data
        const formData = new FormData(this);
        // Make the AJAX request
        $.ajax({
            url: '../controllers/addAboutController.php',
            type: 'POST',
            data: formData,
            processData: false, // Important! Prevent jQuery from processing the data
            contentType: false, // Important! Set the content type to false
            success: function (response) {
                const parsedResponse = JSON.parse(response);
                if (parsedResponse.result.status.statusCode == "0") {
                    sweetAlert("success", "Updated Successfully");
                } else {
                    sweetAlert("error", parsedResponse.result.status.errorMessage);
                }
            },
            error: function (xhr, status, error) {
                console.error(error); // Print any error messages
            }
        });
        viewAboutDetails();
    });
});

