// Global Variables for sub-menu
const subMenuItems = [];
const subMenuEditItems = [];

const viewFooterMenuDetails = (fromDate = '', toDate = '', status = '') => {
    $.ajax({
        url: '../controllers/viewFooterMenuController.php',
        type: "POST",
        data: {
            fromDate: fromDate,
            toDate: toDate,
            status: status
        },
        cache: false,
        success: (response) => {
            const footerMenuParsedResponse = JSON.parse(response);

            let footerMenuParsedResponseInfo = `
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            <tbody>`;
            if (footerMenuParsedResponse['result']['status']['statusCode'] == "0") {
                const footerMenuDetails = footerMenuParsedResponse['menuDetails'];

                for (let i = 0; i < footerMenuDetails.length; i++) {
                    footerMenuParsedResponseInfo += `<tr><td>${i + 1}</td>`;

                    // Showing Menu and Submenus
                    footerMenuParsedResponseInfo += `<td><ul class="p-0"><li class="fw-bold border-bottom" style="list-style: none;">${footerMenuDetails[i].title != null ? footerMenuDetails[i].title : ""}</li>`;
                    const subMenuDetails = footerMenuDetails[i]['subMenuData'];
                    for (let j = 0; j < subMenuDetails.length; j++) {
                        if (subMenuDetails.length > 0) {
                            footerMenuParsedResponseInfo += `<li style="list-style: none;"><i class="${subMenuDetails[j].submenu_icon} me-1"></i>${subMenuDetails[j].title != null ? subMenuDetails[j].title : ""} ${subMenuDetails[j].slug != null ? ", " + subMenuDetails[j].slug : ""}</li>`;


                        }
                    }

                    footerMenuParsedResponseInfo += `</ul></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                    data-bs-target="#editFooterMenuItemModal" onclick="editFooterMenuDetails(${footerMenuDetails[i].id});"><i
                                        class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn btn-sm btn-danger" onclick="deleteFooterMenu(${footerMenuDetails[i].id});"><i
                                        class="bi bi-trash3"></i></button>
                        </td>
                    </tr>`;
                }
            }
            footerMenuParsedResponseInfo += `</tbody></table>`;
            $("#footerMenuTableContainer").html(footerMenuParsedResponseInfo);
            $('.datatable').DataTable({
                // scrollX: true,
                responsive: true
            });
        }
    });
}

// Autofill
const editFooterMenuDetails = (footerMenuId) => {
    subMenuEditItems.splice(0);
    $("#editFooterMenuItemForm")[0].reset();
    $.ajax({
        url: '../controllers/getFooterMenuDetails.php',
        type: "POST",
        data: { footerMenuId },
        cache: false,
        beforeSend: () => {

        },
        success: (response) => {
            const editFooterMenuParsedResponse = JSON.parse(response);
            if (editFooterMenuParsedResponse['result']['status']['statusCode'] == "0") {
                let footerMenuDetail = editFooterMenuParsedResponse['menuDetails'];
                if (footerMenuDetail.length > 0) {
                    $("#editFooterId").val(footerMenuId);
                    $("#editFooterMenuTitle").val(footerMenuDetail[0]['title']);
                    $("#editFooterMenuSlNo").val(footerMenuDetail[0]['sl_no']);
                    // Sub-menu items filling
                    for (let i = 0; i < editFooterMenuParsedResponse['subMenuData'].length; i++) {
                        subMenuEditItems.push(editFooterMenuParsedResponse['subMenuData'][i]);
                    }

                    displayEditedSubMenuItems(subMenuEditItems);

                    $("#editFooterMenuItemModal").modal("show");
                } else {
                    notification("Error", "exclamation-sign", "Internal Error", "danger");
                    sweetAlert("error", "Internal Error");
                }
            } else {
                sweetAlert("error", editFooterMenuParsedResponse.result.status.errorMessage);
            }

        }
    });
}

//delete
async function deleteFooterMenu(footerMenuId) {
    if (await sweetConfirm("Are You Sure You want to Delete?")) {
        $.ajax({
            url: '../controllers/deleteFooterMenuController.php',
            type: "POST",
            data: { footerMenuId },
            cache: false,
            beforeSend: function () {

            },
            success: function (response) {
                const parsedResponse = JSON.parse(response);
                if (parsedResponse.result.status.statusCode == "0") {
                    sweetAlert("success", "Deleted Successfully");
                    viewFooterMenuDetails();
                } else {
                    sweetAlert("error", parsedResponse.result.status.errorMessage);
                }
            }
        });
    }
}

// Logic for displaying and deleting submenu
const displaySubMenuItems = (subMenuItems) => {
    $('#viewFooterSubMenuItemsContainer').empty();
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
        $('#viewFooterSubMenuItemsContainer').html(html);
    }
}

const displayEditedSubMenuItems = (subMenuEditItems) => {
    $('#viewFooterEditSubMenuItemsContainer').empty();
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
        $('#viewFooterEditSubMenuItemsContainer').html(html);
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
    viewFooterMenuDetails();

    $("#advanceFiltersWithStatusNavbar").on("submit", (e) => {
        e.preventDefault();
        viewFooterMenuDetails($("#withStatusFromAddedDate").val(), $("#withStatusToAddedDate").val(), $("#advanceFiltersStatus").val());
        $("#withStatusCloseButton").click();
    });

    // Todo
    $("#addFooterMenuItemForm").on("submit", (e) => {
        e.preventDefault();
        const formData = new FormData();
        formData.append('addFooterMenuTitle', $("#addFooterMenuTitle").val());
        formData.append('addFooterMenuSlNo', $("#addFooterMenuSlNo").val());
        formData.append('subMenuItems', JSON.stringify(subMenuItems));

        $.ajax({
            url: '../controllers/addFooterMenuController.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                const parsedResponse = JSON.parse(response);
                if (parsedResponse.result.status.statusCode == "0") {
                    sweetAlert("success", "Added Successfully");
                    viewFooterMenuDetails();
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

    $("#editFooterMenuItemForm").submit(function (e) {
        e.preventDefault(); // Prevent the form from submitting normally
        const formData = new FormData(this);
        formData.append('editFooterMenuTitle', $("#editFooterMenuTitle").val());
        formData.append('editFooterMenuSlNo', $("#editFooterMenuSlNo").val());
        formData.append('subMenuEditItems', JSON.stringify(subMenuEditItems));

        // Make the AJAX request
        $.ajax({
            url: '../controllers/updateFooterMenuController.php',
            type: 'POST',
            data: formData,
            processData: false, // Important! Prevent jQuery from processing the data
            contentType: false, // Important! Set the content type to false
            success: function (response) {
                const parsedResponse = JSON.parse(response);
                if (parsedResponse.result.status.statusCode == "0") {
                    sweetAlert("success", "Updated Successfully");
                    viewFooterMenuDetails();
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
    $('#addFooterSubMenuItemsButton').on("click", () => {
        const submenuTitle = $('#addFooterSubMenuTitle').val();
        const submenuSlug = $('#addFooterSubMenuSlug').val();

        if (submenuTitle != null) {
            const subMenuItem = {
                title: submenuTitle,
                slug: submenuSlug
            };
            subMenuItems.push(subMenuItem);
            $('#addFooterSubMenuTitle').val('');
            $('#addFooterSubMenuSlug').val('');
            displaySubMenuItems(subMenuItems);
        } else {
            sweetAlert("error", "Please fill all mandatory fields");
        }
    });

    // Logic for adding submenu icon image
    $('#editFooterSubMenuItemsButton').on("click", () => {
        const submenuEditTitle = $('#editFooterSubMenuTitle').val();
        const submenuEditSlug = $('#editFooterSubMenuSlug').val();

        if (submenuEditTitle != null) {
            const subMenuItem = {
                id: "",
                title: submenuEditTitle,
                slug: submenuEditSlug
            };
            subMenuEditItems.push(subMenuItem);

            $('#editFooterSubMenuTitle').val('');
            $('#editFooterSubMenuSlug').val('');
            displayEditedSubMenuItems(subMenuEditItems);
        } else {
            sweetAlert("error", "Please enter all values");
        }
    });
});