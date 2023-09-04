const regexPatterns = [
    /^[A-Za-z\s]{3,}$/, // Full Name
    /^[\w.-]+@[a-zA-Z_-]+?(?:\.[a-zA-Z]{2,6})+$/, // Email
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-_+=<>?])[A-Za-z\d!@#$%^&*()\-_+=<>?]{8,}$/, // Password
    /^\d{10}$/ // Mobile Number
];

const validateField = (inputElement, regex) => {
    if (regex.test(inputElement.value)) {
        $(inputElement).addClass("is-valid");
        $(inputElement).removeClass("is-invalid");
    } else {
        $(inputElement).addClass("is-invalid ");
        $(inputElement).removeClass("is-valid");
    }
}

const isAnyFieldBlank = (elements) => {
    for (let i = 0; i < elements.length; i++) {
        if (elements[i].value.trim() === '') {
            return true;
        }
    }
    return false;
}

const viewUsersDetails = (fromDate = '', toDate = '') => {
    const userImg = `<span class="ant-avatar ant-avatar-square ant-avatar-icon" style="width: 64px; height: 64px; line-height: 64px; font-size: 32px;"><i aria-label="icon: user" class="anticon anticon-user"><svg viewBox="64 64 896 896" data-icon="user" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false" class=""><path d="M858.5 763.6a374 374 0 0 0-80.6-119.5 375.63 375.63 0 0 0-119.5-80.6c-.4-.2-.8-.3-1.2-.5C719.5 518 760 444.7 760 362c0-137-111-248-248-248S264 225 264 362c0 82.7 40.5 156 102.8 201.1-.4.2-.8.3-1.2.5-44.8 18.9-85 46-119.5 80.6a375.63 375.63 0 0 0-80.6 119.5A371.7 371.7 0 0 0 136 901.8a8 8 0 0 0 8 8.2h60c4.4 0 7.9-3.5 8-7.8 2-77.2 33-149.5 87.8-204.3 56.7-56.7 132-87.9 212.2-87.9s155.5 31.2 212.2 87.9C779 752.7 810 825 812 902.2c.1 4.4 3.6 7.8 8 7.8h60a8 8 0 0 0 8-8.2c-1-47.8-10.9-94.3-29.5-138.2zM512 534c-45.9 0-89.1-17.9-121.6-50.4S340 407.9 340 362c0-45.9 17.9-89.1 50.4-121.6S466.1 190 512 190s89.1 17.9 121.6 50.4S684 316.1 684 362c0 45.9-17.9 89.1-50.4 121.6S557.9 534 512 534z"></path></svg></i></span>`;

    $.ajax({
        url: '../controllers/viewUsersController.php',
        type: "POST",
        data: {
            fromDate: fromDate,
            toDate: toDate
        },
        cache: false,
        success: (response) => {
            const UsersParsedResponse = JSON.parse(response);

            let UsersParsedResponseInfo = `
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Profile</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Role</th>
                        <th scope="col">Suspend Status</th>
                        <th scope="col">Login Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            <tbody>`;
            if (UsersParsedResponse['result']['status']['statusCode'] == "0") {
                const UsersDetails = UsersParsedResponse['usersDetails'];

                for (let i = 0; i < UsersDetails.length; i++) {
                    UsersParsedResponseInfo += `
                    <tr>
                        <td>${i + 1}</td>`;
                    if (UsersDetails[i].image != null) {
                        UsersParsedResponseInfo += `<td><img src="../../img/uplaods/${UsersDetails[i].image}" onclick="showEnlargedImage('../../img/uplaods/${UsersDetails[i].image}');"></td>`;
                    } else {
                        UsersParsedResponseInfo += `<td>${userImg}</td>`;
                    }

                    UsersParsedResponseInfo += `<td>${UsersDetails[i].name == null ? "" : UsersDetails[i].name}</td>
                        <td>${UsersDetails[i].email == null ? "" : UsersDetails[i].email}</td>
                        <td>${UsersDetails[i].phone == null ? "" : UsersDetails[i].phone}</td>
                        <td>${UsersDetails[i].role == null ? "" : UsersDetails[i].role}</td>
                        <td>${UsersDetails[i].status == '1' ? "Active" : "Inactive"}</td>
                        <td>${UsersDetails[i].status == '1' ? "Can Login" : "Cannot Login"}</td>
                        <td>`;

                    if (UsersDetails[i].role != "SuperAdmin") {
                        UsersParsedResponseInfo += `
                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editUserDetailsModal" onclick="editUserDetails(${UsersDetails[i].id});"><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-sm btn-danger" onclick="deleteUsers(${UsersDetails[i].id});"><i class="bi bi-trash3"></i></button>`;
                    }

                    UsersParsedResponseInfo += `</td></tr>`;
                }
            }
            UsersParsedResponseInfo += `</tbody></table>`;
            $("#usersTableContainer").html(UsersParsedResponseInfo);
            $('.datatable').DataTable({
                // scrollX: true,
                responsive: true
            });
        }
    });
}

const createUser = (element) => {
    const dropdownAddValue = $("#addRole").val();
    const serializedAddData = element.serialize() + "&addRole=" + encodeURIComponent(dropdownAddValue);
    $.ajax({
        url: '../controllers/addUsersController.php',
        type: "POST",
        data: serializedAddData,
        cache: false,
        beforeSend: () => {

        },
        success: (response) => {
            const parsedResponse = JSON.parse(response);
            if (parsedResponse.result.status.statusCode == "0") {
                sweetAlert("success", "User Created Successfully");
            } else {
                sweetAlert("error", parsedResponse.result.status.errorMessage);
            }
            viewUsersDetails();
        }
    });
}


$(document).ready(() => {
    viewUsersDetails();

    $("#advanceFiltersForm").submit((e) => {
        e.preventDefault();
        viewUsersDetails($("#fromAddedDate").val(), $("#toAddedDate").val());
        $("#closeFilterButton").click();
    });

    // Add Form Validation
    $("#addUserFullName").on("input", (e) => {
        validateField(e.target, regexPatterns[0])
    });
    $("#addUserEmail").on("input", (e) => {
        validateField(e.target, regexPatterns[1])
    });
    $("#addUserPassword").on("input", (e) => {
        validateField(e.target, regexPatterns[2])
    });
    $("#addUserPhoneNumber").on("input", (e) => {
        validateField(e.target, regexPatterns[3])
    });
    $("#addUserConfirmPassword").on("input", (e) => {
        if (e.target.value == $("#addUserPassword").val()) {
            $(e.target).addClass("is-valid");
            $(e.target).removeClass("is-invalid");
        } else {
            $(e.target).addClass("is-invalid ");
            $(e.target).removeClass("is-valid");
        }
    });

    $("#addUserForm").submit((e) => {
        e.preventDefault();
        if ($('#addUserForm').find('.is-invalid').length == 0 && !isAnyFieldBlank($('#addUserForm').find('input'))) {
            createUser($("#addUserForm"));
            viewUsersDetails();
            e.target.reset();
            $("#addUserModalCloseButton").click();
        } else {
            sweetAlert("error", "Please Enter All Details Correctly");
        }
    });

    // Edit Form Validation
    $("#editUserFullName").on("input", (e) => {
        validateField(e.target, regexPatterns[0])
    });
    $("#editUserEmail").on("input", (e) => {
        validateField(e.target, regexPatterns[1])
    });
    $("#editUserPassword").on("input", (e) => {
        validateField(e.target, regexPatterns[2])
    });
    $("#editUserPhoneNumber").on("input", (e) => {
        validateField(e.target, regexPatterns[3])
    });
    $("#editUserConfirmPassword").on("input", (e) => {
        if (e.target.value == $("#editUserPassword").val()) {
            $(e.target).addClass("is-valid");
            $(e.target).removeClass("is-invalid");
        } else {
            $(e.target).addClass("is-invalid ");
            $(e.target).removeClass("is-valid");
        }
    });
    $("#editUserPassword").on("input", (e) => {
        if ($("#editUserConfirmPassword").val() == e.target.value) {
            $("#editUserConfirmPassword").addClass("is-valid");
            $("#editUserConfirmPassword").removeClass("is-invalid");
        } else {
            $("#editUserConfirmPassword").addClass("is-invalid ");
            $("#editUserConfirmPassword").removeClass("is-valid");
        }
    });

    $("#editUserDetailsForm").submit((e) => {
        e.preventDefault();
        if ($('#editUserDetailsForm').find('.is-invalid').length == 0 && !isAnyFieldBlank($('#editUserDetailsForm').find('input'))) {
            editUser($("#editUserDetailsForm"));
            viewUsersDetails();
            $("#editUserModalCloseButton").click();
        } else {
            sweetAlert("error", "Please Enter All Details Correctly");
        }
    });
});

// Autofill
const editUserDetails = (userId) => {
    $("#editUserDetailsForm")[0].reset();
    $.ajax({
        url: '../controllers/getUsersDetails.php',
        type: "POST",
        data: 'userId=' + userId,
        cache: false,
        beforeSend: () => {

        },
        success: (response) => {
            const editUsersParsedResponse = JSON.parse(response);
            if (editUsersParsedResponse['result']['status']['statusCode'] == "0") {
                let usersDetail = editUsersParsedResponse['userDetails'];
                if (usersDetail.length > 0) {
                    $("#editUserId").val(userId);
                    $("#editUserFullName").val(usersDetail[0]['name']);
                    $("#editUserEmail").val(usersDetail[0]['email']);
                    $("#editUserPhoneNumber").val(usersDetail[0]['phone']);
                    $("#editOrganizationCode").val(usersDetail[0]['orgCode']);
                    $("#editRole").val(usersDetail[0]['role']);
                    if (usersDetail[0]['status'] == "0") {
                        $("#editUserStatus").prop("checked", false);
                    } else {
                        $("#editUserStatus").prop("checked", true);
                    }
                    $("#editUserDetailsModal").modal("show");
                } else {
                    sweetAlert("error", "Internal Error");
                }
            } else {
                sweetAlert("error", editUsersParsedResponse.result.status.errorMessage);
            }

        }
    });
}

const editUser = (element) => {
    const dropdownEditValue = $("#editRole").val();
    const serializedEditData = element.serialize() + "&editRole=" + encodeURIComponent(dropdownEditValue);
    $.ajax({
        url: '../controllers/updateUsersController.php',
        type: "POST",
        data: serializedEditData,
        cache: false,
        beforeSend: () => {

        },
        success: (response) => {
            const parsedResponse = JSON.parse(response);
            if (parsedResponse.result.status.statusCode == "0") {
                sweetAlert("success", "Updated Successfully");
            } else {
                sweetAlert("error", parsedResponse.result.status.errorMessage);
            }
            viewUsersDetails();
        }
    });
}

//delete
async function deleteUsers(userId) {
    if (await sweetConfirm("Are You Sure You want to Delete?")) {
        $.ajax({
            url: '../controllers/deleteUsersController.php',
            type: "POST",
            data: 'userId=' + userId,
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
                viewUsersDetails();
            }
        });
    }
}