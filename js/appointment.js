console.log("Appointment");


const getAllDepartments = () => {
    $.ajax({
        url: '../controllers/getAllDepartments.php',
        method: 'GET',
        success: (response) => {
            const parsedResponse = JSON.parse(response);

            if (parsedResponse.statusCode === 0) {
                const data = parsedResponse.data;

                let html = `<option value="" selected>Select Department</option>`;
                data.forEach(item => {
                    html += `<option value="${item.id}">${item.name}</option>`;
                });
                $("#apptDepartment").html(html);
            } else {
                $("#apptDepartment").html(`<option value="" selected>Select Department</option>`);
            }
        },
        error: (error) => {
            console.error('GET Error:', error);
        }
    });
}

const getApptDoctors = (deptId) => {
    $.ajax({
        url: '../controllers/getDoctors.php',
        method: 'POST',
        data: { deptId },
        success: (response) => {
            const parsedResponse = JSON.parse(response);

            if (parsedResponse.statusCode === 0) {
                const data = parsedResponse.data;

                let html = `<option value="" selected>Select Doctor</option>`;
                data.forEach(item => {
                    html += `<option value="${item.id}">${item.name}</option>`;
                });
                $("#apptDoctor").html(html);
            } else {
                $("#apptDoctor").html(`<option value="" selected>Select Doctor</option>`);
            }
        },
        error: (error) => {
            console.error('POST Error:', error);
        }
    });
}







$(document).ready(() => {
    getAllDepartments();

    $("#apptDepartment").on("change", () => {
        getApptDoctors($("#apptDepartment").val());
    });

    $("#apptDatepicker").on("blur", () => {
        console.log(new Date($("#apptDatepicker").val()) >= new Date());
    });

    // Saving the appointment details into database
    $("#bookApptForm").on("submit", (e) => {
        e.preventDefault();
        if (new Date($("#apptDatepicker").val()) >= new Date()) {
            $.ajax({
                url: '../controllers/saveAppointmentDetails.php',
                method: 'POST',
                data: $(e.target).serialize(),
                success: (response) => {
                    const parsedResponse = JSON.parse(response);
                    if (parsedResponse.statusCode === 0) {
                        $(e.target).trigger("reset");
                        alert(parsedResponse.message);
                    } else {
                        alert(parsedResponse.errorMessage);
                    }
                },
                error: (error) => {
                    console.error('POST Error:', error);
                }
            });
        } else {
            alert("Please Select A Valid Appointment Date and Time!");
        }
    });
});