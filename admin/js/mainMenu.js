// Global Variables for sub-menu
const subMenuItems = [];
const subMenuEditItems = [];

const viewMainMenuDetails = (fromDate = '', toDate = '', status = '') => {
    $.ajax({
        url: '../controllers/viewMainMenuController.php',
        type: "POST",
        data: {
            fromDate: fromDate,
            toDate: toDate,
            status: status
        },
        cache: false,
        success: (response) => {
            const MainMenuParsedResponse = JSON.parse(response);

            let MainMenuParsedResponseInfo = `
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            <tbody>`;
            if (MainMenuParsedResponse['result']['status']['statusCode'] == "0") {
                const MainMenuDetails = MainMenuParsedResponse['menuDetails'];

                for (let i = 0; i < MainMenuDetails.length; i++) {
                    MainMenuParsedResponseInfo += `<tr><td>${i + 1}</td>`;

                    // Showing Menu and Submenus
                    MainMenuParsedResponseInfo += `<td><ul class="p-0"><li class="fw-bold border-bottom" style="list-style: none;">${MainMenuDetails[i].title != null ? MainMenuDetails[i].title : ""}</li>`;
                    const subMenuDetails = MainMenuDetails[i]['subMenuData'];
                    for (let j = 0; j < subMenuDetails.length; j++) {
                        if (subMenuDetails.length > 0) {
                            MainMenuParsedResponseInfo += `<li style="list-style: none;"><i class="${subMenuDetails[j].submenu_icon} me-1"></i>${subMenuDetails[j].title != null ? subMenuDetails[j].title : ""} ${subMenuDetails[j].slug != null ? ", " + subMenuDetails[j].slug : ""}</li>`;
                        }
                    }

                    MainMenuParsedResponseInfo += `</ul></td>
                        <td>${MainMenuDetails[i].slug == null ? "" : MainMenuDetails[i].slug}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                    data-bs-target="#menuManagementEditMainMenuItemModal" onclick="editMainMenuDetails(${MainMenuDetails[i].id});"><i
                                        class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn btn-sm btn-danger" onclick="deleteMainMenu(${MainMenuDetails[i].id});"><i
                                        class="bi bi-trash3"></i></button>
                        </td>
                    </tr>`;
                }
            }
            MainMenuParsedResponseInfo += `</tbody></table>`;
            $("#mainMenuTableContainer").html(MainMenuParsedResponseInfo);
            $('.datatable').DataTable({
                // scrollX: true,
                responsive: true
            });
        }
    });
}

// Autofill
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

//delete
async function deleteMainMenu(mainMenuId) {
    if (await sweetConfirm("Are You Sure You want to Delete?")) {
        $.ajax({
            url: '../controllers/deleteMainMenuController.php',
            type: "POST",
            data: 'mainMenuId=' + mainMenuId,
            cache: false,
            beforeSend: function () {

            },
            success: function (response) {
                const parsedResponse = JSON.parse(response);
                if (parsedResponse.result.status.statusCode == "0") {
                    sweetAlert("success", "Deleted Successfully");
                    viewMainMenuDetails();
                } else {
                    sweetAlert("error", parsedResponse.result.status.errorMessage);
                }
            }
        });
    }
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
                    <th scope="col">Slug</th>
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

const displayEditedSubMenuItems = (subMenuEditItems) => {
    $('#viewEditSubMenuItemsContainer').empty();
    if (subMenuEditItems.length > 0) {
        let html = `
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sl No.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>`;
        $.each(subMenuEditItems, (index, item) => {
            html += `
            <tr>
                <th scope="row">${index + 1}</th>
                <td scope="col">${item.title}</td>
                <td scope="col">${item.slug}</td>
                <td scope="col"><button type="button" class="btn btn-sm btn-danger" onclick="deleteEditedSubMenuItem('${index}')"><i class="bi bi-trash3"></i></button></td>
            </tr>`;
        });
        html += `</tbody></table>`;
        $('#viewEditSubMenuItemsContainer').html(html);
    }
}

const deleteSubMenuItem = (index) => {
    subMenuItems.splice(index, 1);
    displaySubMenuItems(subMenuItems);
}

const deleteEditedSubMenuItem = (index) => {
    subMenuEditItems.splice(index, 1);
    displayEditedSubMenuItems(subMenuEditItems);
}

$(document).ready(() => {
    viewMainMenuDetails();

    $("#advanceFiltersWithStatusNavbar").on("submit", (e) => {
        e.preventDefault();
        viewMainMenuDetails($("#withStatusFromAddedDate").val(), $("#withStatusToAddedDate").val(), $("#advanceFiltersStatus").val());
        $("#withStatusCloseButton").click();
    });

    // Todo
    $("#addMainMenuItemForm").on("submit", (e) => {
        e.preventDefault();
        const formData = new FormData();
        formData.append('addMainMenuTitleInput', $("#addMainMenuTitleInput").val());
        formData.append('addMainMenuSlNo', $("#addMainMenuSlNo").val());
        formData.append('addSlug', $("#addSlug").val());
        formData.append('subMenuItems', JSON.stringify(subMenuItems));

        $.ajax({
            url: '../controllers/addMainMenuController.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                const parsedResponse = JSON.parse(response);
                if (parsedResponse.result.status.statusCode == "0") {
                    sweetAlert("success", "Added Successfully");
                    viewMainMenuDetails();
                } else {
                    sweetAlert("error", parsedResponse.result.status.errorMessage);
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
                sweetAlert("error", "Internal server error!");
            }
        });
        subMenuItems.splice(0);
        displaySubMenuItems(subMenuItems);
        $(e.target).trigger("reset");
        $("#addMenuCloseButton").click();
    });

    $("#editMainMenuItemForm").submit(function (e) {
        e.preventDefault(); // Prevent the form from submitting normally
        const formData = new FormData(this);
        formData.append('editMainMenuTitleInput', $("#editMainMenuTitleInput").val());
        formData.append('editMainMenuSlNo', $("#editMainMenuSlNo").val());
        formData.append('editSlug', $("#editSlug").val());
        formData.append('subMenuEditItems', JSON.stringify(subMenuEditItems));

        // Make the AJAX request
        $.ajax({
            url: '../controllers/updateMainMenuController.php',
            type: 'POST',
            data: formData,
            processData: false, // Important! Prevent jQuery from processing the data
            contentType: false, // Important! Set the content type to false
            success: function (response) {
                const parsedResponse = JSON.parse(response);
                if (parsedResponse.result.status.statusCode == "0") {
                    sweetAlert("success", "Updated Successfully");
                    viewMainMenuDetails();
                } else {
                    sweetAlert("error", parsedResponse.result.status.errorMessage);
                }
            },
            error: function (xhr, status, error) {
                console.error(error); // Print any error messages
            }
        });
        subMenuEditItems.splice(0);
        displayEditedSubMenuItems(subMenuEditItems);
        $(e.target).trigger("reset");
        $("#editMenuCloseButton").click();
    });

});

// Logic for adding and editing sub-menu
$(document).ready(() => {
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

    // Logic for adding submenu icon image
    $('#editSubMenuItemsButton').on("click", () => {
        const submenuEditTitle = $('#editSubMenuTitleInput').val();
        const submenuEditSlug = $('#editSubMenuSlug').val();

        if (submenuEditTitle != null) {
            const subMenuItem = {
                id: "",
                title: submenuEditTitle,
                slug: submenuEditSlug
            };
            subMenuEditItems.push(subMenuItem);

            $('#editSubMenuTitleInput').val('');
            $('#editSubMenuSlug').val('');
            displayEditedSubMenuItems(subMenuEditItems);
        } else {
            sweetAlert("error", "Please enter all values");
        }
    });
});