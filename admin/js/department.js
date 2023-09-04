console.log("Departments");

function getAllDepts() {
    $.ajax({
        url: '../controllers/getDocDept.php',
        type: "GET",
        success: (response) => {
            const parsedResponse = JSON.parse(response);

            if (parsedResponse['result']['status']['statusCode'] == "0") {
                const data = parsedResponse['deptDetails'];
                let html = `
                <table class="table table-hover datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                <tbody>`;
                if (data.length > 0) {
                    data.forEach((item, i) => {
                        html += `
                        <tr>
                            <td>${i + 1}</td>
                            <td>${item.name}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-danger" onclick="deleteDepartment(${item.id});"><i class="bi bi-trash3"></i></button>
                            </td>
                        </tr> `;
                    });

                    html += `</tbody></table> `;
                    $("#departmentsContainer").html(html);
                    $('.datatable').DataTable({
                        // scrollX: true,
                        responsive: true
                    });
                } else {
                    sweetAlert("error", parsedResponse.result.status.errorMessage);
                }
            }
        }
    });
}

async function deleteDepartment(deptId) {
    if (await sweetConfirm("Are You Sure You want to Delete?")) {
        $.ajax({
            url: '../controllers/deleteDepartment.php',
            type: "POST",
            data: 'deptId=' + deptId,
            cache: false,
            beforeSend: function () {

            },
            success: function (response) {
                const parsedResponse = JSON.parse(response);
                if (parsedResponse.result.status.statusCode == "0") {
                    sweetAlert("success", "Deleted Successfully");
                    getAllDepts();
                } else {
                    sweetAlert("error", parsedResponse.result.status.errorMessage);
                }
            }
        });
    }
}



$(document).ready(() => {
    getAllDepts();

    $("#addDepartmentForm").on("submit", (e) => {
        e.preventDefault(); // Prevent the form from submitting normally

        // Make the AJAX request
        $.ajax({
            url: '../controllers/addDepartment.php',
            type: 'POST',
            data: { deptName: $("#name").val() },
            success: function (response) {
                const parsedResponse = JSON.parse(response);
                if (parsedResponse.result.status.statusCode == "0") {
                    sweetAlert("success", "Added Successfully");
                    getAllDepts();
                } else {
                    sweetAlert("error", parsedResponse.result.status.errorMessage);
                }
            },
            error: function (xhr, status, error) {
                console.error(error); // Print any error messages
            }
        });
    });
});
