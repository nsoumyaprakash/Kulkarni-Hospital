const viewAchievementsDetails = () => {
    $.ajax({
        url: '../controllers/viewAchievementsController.php',
        type: "POST",
        data: "fetch=true",
        cache: false,
        success: (response) => {
            const achievementsParsedResponse = JSON.parse(response);
            let achievementsParsedResponseInfo = `
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Title</th>
                        <th scope="col">Number</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            <tbody>`;
            if (achievementsParsedResponse['result']['status']['statusCode'] == "0") {
                const achievementsDetails = achievementsParsedResponse['achievementsDetails'];
                for (let i = 0; i < achievementsDetails.length; i++) {
                    achievementsParsedResponseInfo += `<tr>
                        <td>${i + 1}</td>
                        <td><i class="${achievementsDetails[i].icon}"></i></td>
                        <td>${achievementsDetails[i].title == null ? "" : achievementsDetails[i].title}</td>
                        <td>${achievementsDetails[i].count == null ? "" : achievementsDetails[i].count}</td>`;

                    if (achievementsDetails[i].isActive == '1') {
                        achievementsParsedResponseInfo += `<td>Published</td>`;
                    } else {
                        achievementsParsedResponseInfo += `<td>Draft</td>`;
                    }

                    achievementsParsedResponseInfo += `<td>
                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                            data-bs-target="#editAchievementsModal" onclick="editAchievementsDetails(${achievementsDetails[i].id});"><i
                                class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-sm btn-danger" onclick="deleteAchievements(${achievementsDetails[i].id});"><i
                            class="bi bi-trash3"></i></button>
                    </td>
                    </tr > `;
                }
            }
            achievementsParsedResponseInfo += `</tbody ></table > `;
            $("#achievementsTableContainer").html(achievementsParsedResponseInfo);
            $('.datatable').DataTable({
                // scrollX: true,
                responsive: true
            });
        }
    });
}

// Autofill
const editAchievementsDetails = (achievementsId) => {
    $("#editAchievementsForm")[0].reset();
    $.ajax({
        url: '../controllers/getAchievementsDetails.php',
        type: "POST",
        data: 'achievementsId=' + achievementsId,
        cache: false,
        beforeSend: () => {

        },
        success: (response) => {
            const editAchievementsParsedResponse = JSON.parse(response);
            if (editAchievementsParsedResponse['result']['status']['statusCode'] == "0") {
                const achievementsDetail = editAchievementsParsedResponse['achievementsDetails'];

                if (achievementsDetail.length > 0) {
                    $("#editAchievementsId").val(achievementsId);
                    $("#editNumbers").val(achievementsDetail[0]['count']);
                    $("#editTitle").val(achievementsDetail[0]['title']);
                    $("#showEditIcons").html(`< i class="${achievementsDetail[0]['icon']}" ></ > ${achievementsDetail[0]['icon']} `);
                    $("#editIcons").val(achievementsDetail[0]['icon']);
                    if (achievementsDetail[0]['isActive'] == "0") {
                        $("#editStatus").prop("checked", false);
                    } else {
                        $("#editStatus").prop("checked", true);
                    }
                    let editStatusCheckbox = document.getElementById('editStatus');
                    if (editStatusCheckbox.checked == '1') {
                        $("#editStatusOption").html("Published");
                    } else {
                        $("#editStatusOption").html("Draft");
                    }

                    $("#editAchievementsModal").modal("show");
                } else {
                    sweetAlert("error", "Internal Error");
                }
            } else {
                sweetAlert("error", editAchievementsParsedResponse.result.status.errorMessage);
            }

        }
    });
}

const getIcons = () => {
    console.log("hii");
    // Make an AJAX request to fetch the data from the server
    $.ajax({
        url: "../controllers/fetchIconOptions.php",
        method: "GET",
        success: function (response) {
            let dropdownItems = "";
            response.forEach(option => {
                dropdownItems += `<a class="dropdown-item" > <i class="${option.text}"></i> ${option.text}</a> `;
            });
            $("#addIconsMenu").html(dropdownItems);
            $("#editIconsMenu").html(dropdownItems);
        }
    });
    // Logic For Service Icons Dropdown
    $(document).on('click', "#addIconsMenu .dropdown-item", (e) => {
        $("#showAddIcons").html($(e.target).html());
        $("#addIcons").val($(e.target).find("i").attr("class"));
    });
    $(document).on('click', "#editIconsMenu .dropdown-item", (e) => {
        $("#showEditIcons").html($(e.target).html());
        $("#editIcons").val($(e.target).find("i").attr("class"));
    });
}


//delete
async function deleteAchievements(achievementId) {
    if (await sweetConfirm("Are You Sure You want to Delete?")) {
        $.ajax({
            url: '../controllers/deleteAchievementsController.php',
            type: "POST",
            data: 'achievementId=' + achievementId,
            cache: false,
            beforeSend: function () {

            },
            success: function (response) {
                const parsedResponse = JSON.parse(response);
                if (parsedResponse.result.status.statusCode == "0") {
                    sweetAlert("success", "Deleted Successfully");
                } else {
                    sweetAlert("error", parsedResponse.result.status.errorMessage);
                }
                viewAchievementsDetails();
            }
        });
    }
}


$(document).ready(() => {
    viewAchievementsDetails();
    getIcons();


    let addStatusCheckbox = document.getElementById('addStatus');
    let addStatusOutput = document.getElementById('addStatusOption');
    addStatusCheckbox.addEventListener('change', function () {
        if (addStatusCheckbox.checked) {
            addStatusOutput.textContent = 'Published';
        } else {
            addStatusOutput.textContent = 'Draft';
        }
    });

    let editStatusCheckbox = document.getElementById('editStatus');
    let editStatusOutput = document.getElementById('editStatusOption');
    editStatusCheckbox.addEventListener('change', function () {
        if (editStatusCheckbox.checked) {
            editStatusOutput.textContent = 'Published';
        } else {
            editStatusOutput.textContent = 'Draft';
        }
    });

    $("#addAchievementsForm").submit(function (e) {
        e.preventDefault(); // Prevent the form from submitting normally

        // Get the form data
        const formData = new FormData(this);

        // Make the AJAX request
        $.ajax({
            url: '../controllers/addAchievementsController.php',
            type: 'POST',
            data: formData,
            processData: false, // Important! Prevent jQuery from processing the data
            contentType: false, // Important! Set the content type to false
            success: function (response) {
                const parsedResponse = JSON.parse(response);
                if (parsedResponse.result.status.statusCode == "0") {
                    sweetAlert("success", "Added Successfully");
                } else {
                    sweetAlert("error", parsedResponse.result.status.errorMessage);
                }
            },
            error: function (xhr, status, error) {
                console.error(error); // Print any error messages
            }
        });
        e.target.reset();
        $("#addAchievementsCloseButton").click();
        viewAchievementsDetails();
    });


    $('#editAchievementsForm').submit(function (e) {
        e.preventDefault(); // Prevent the form from submitting normally

        // Get the form data
        const formData = new FormData(this);

        // Make the AJAX request
        $.ajax({
            url: '../controllers/updateAchievementsController.php',
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
        $("#editAchievementsCloseButton").click();
        viewAchievementsDetails();
    });
});