console.log("blogs");
const viewBlogsDetails = () => {
    $.ajax({
        url: '../controllers/viewBlogsController.php',
        type: "POST",
        data: "fetch=true",
        cache: false,
        success: (response) => {
            const blogsParsedResponse = JSON.parse(response);
            let blogsParsedResponseInfo = `
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Tag</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Author Image</th>
                        <th scope="col">Author Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Published At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            <tbody>`;
            if (blogsParsedResponse['result']['status']['statusCode'] == "0") {
                const blogsDetails = blogsParsedResponse['blogsDetails'];
                for (let i = 0; i < blogsDetails.length; i++) {
                    blogsParsedResponseInfo += `<tr>
                                                    <td>${i + 1}</td>`;
                    if (blogsDetails[i].imgSrc != null) {
                        blogsParsedResponseInfo += `<td><img src="../../img/uplaods/${blogsDetails[i].imgSrc}" onclick="showEnlargedImage('../../img/uplaods/${blogsDetails[i].imgSrc}');"></td>`;
                    } else {
                        blogsParsedResponseInfo += `<td></td>`;
                    }
                    blogsParsedResponseInfo += `<td>${blogsDetails[i].tag == null ? "" : blogsDetails[i].tag}</td>
                        <td>${blogsDetails[i].title == null ? "" : blogsDetails[i].title}</td>
                        <td>${blogsDetails[i].content == null ? "" : blogsDetails[i].content}</td>`;
                    if (blogsDetails[i].authorImg != null) {
                        blogsParsedResponseInfo += `<td><img src="../../img/uplaods/${blogsDetails[i].authorImg}" onclick="showEnlargedImage('../../img/uplaods/${blogsDetails[i].authorImg}');"></td>`;
                    } else {
                        blogsParsedResponseInfo += `<td></td>`;
                    }
                    blogsParsedResponseInfo += `<td> ${blogsDetails[i].author == null ? "" : blogsDetails[i].author}</td>`;
                    if (blogsDetails[i].isActive == '1') {
                        blogsParsedResponseInfo += `<td>Published</td>`;
                    } else {
                        blogsParsedResponseInfo += `<td>Draft</td>`;
                    }
                    blogsParsedResponseInfo += `<td> ${blogsDetails[i].publishedAt == null ? "" : blogsDetails[i].publishedAt}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#editBlogModal" onclick="editBlogsDetails(${blogsDetails[i].id});"><i
                                    class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn btn-sm btn-danger" onclick="deleteBlogs(${blogsDetails[i].id});"><i
                                class="bi bi-trash3"></i></button>
                        </td>
                    </tr> `;
                }
            }
            blogsParsedResponseInfo += `</tbody></table> `;
            $("#blogsTableContainer").html(blogsParsedResponseInfo);
            $('.datatable').DataTable({
                // scrollX: true,
                responsive: true
            });
        }
    });
}

// Autofill
const editBlogsDetails = (blogsId) => {
    $("#editBlogForm")[0].reset();
    $.ajax({
        url: '../controllers/getBlogsDetails.php',
        type: "POST",
        data: 'blogsId=' + blogsId,
        cache: false,
        beforeSend: () => {

        },
        success: (response) => {
            const editBlogsParsedResponse = JSON.parse(response);
            if (editBlogsParsedResponse['result']['status']['statusCode'] == "0") {
                const blogsDetail = editBlogsParsedResponse['blogsDetails'];

                if (blogsDetail.length > 0) {
                    $("#editBlogId").val(blogsDetail[0]['id']);
                    $("#editTag").val(blogsDetail[0]['tag']);
                    $("#editTitle").val(blogsDetail[0]['title']);
                    $("#editContent").val(blogsDetail[0]['content']);
                    $("#editAuthor").val(blogsDetail[0]['author']);

                    if (blogsDetail[0]['isActive'] == "0") {
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

                    $("#editImageHiddenFile").val(blogsDetail[0]['imgSrc']);
                    if (blogsDetail[0]['imgSrc'] != null) {
                        $("#storedViewImage").attr("src", '../../img/uplaods/' + blogsDetail[0]['imgSrc']);
                        $("#storedeViewImage").attr("alt", blogsDetail[0]['imgSrc']);
                    } else {
                        $("#storedViewImage").attr("src", "");
                        $("#storedeViewImage").attr("alt", "");
                    }
                    $("#editAuthorImageHiddenFile").val(blogsDetail[0]['authorImg']);
                    if (blogsDetail[0]['authorImg'] != null) {
                        $("#storedViewAuthorImage").attr("src", '../../img/uplaods/' + blogsDetail[0]['authorImg']);
                        $("#storedViewAuthorImage").attr("alt", blogsDetail[0]['authorImg']);
                    } else {
                        $("#storedViewAuthorImage").attr("src", "");
                        $("#storedViewAuthorImage").attr("alt", "");
                    }

                    $("#editBlogModal").modal("show");
                } else {
                    sweetAlert("error", "Internal Error");
                }
            } else {
                sweetAlert("error", editBlogsParsedResponse.result.status.errorMessage);
            }

        }
    });
}

//delete
async function deleteBlogs(blogsId) {
    if (await sweetConfirm("Are You Sure You want to Delete?")) {
        $.ajax({
            url: '../controllers/deleteBlogsController.php',
            type: "POST",
            data: 'blogsId=' + blogsId,
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
                viewBlogsDetails();
            }
        });
    }
}


$(document).ready(() => {
    viewBlogsDetails();

    // Get the input element
    const imageInput = document.getElementById('addImageInput');

    // Get the preview image element
    const previewImage = document.getElementById('previewImage');

    // Listen for changes in the input file selection
    imageInput.addEventListener('change', function (event) {
        // Check if a file is selected
        if (event.target.files && event.target.files[0]) {
            // Create a FileReader object
            const reader = new FileReader();

            // Set the image source once it's loaded
            reader.onload = function (e) {
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(event.target.files[0]);
        } else {
            // No file selected, hide the preview
            previewImage.style.display = 'none';
        }
    });

    // Get the input element
    const imageEditInput = document.getElementById('editImageInput');

    // Get the preview image element
    const previewEditImage = document.getElementById('previewEditImage');

    // Get the Stored image element
    const storedViewImage = document.getElementById('storedViewImage');

    // Listen for changes in the input file selection
    imageEditInput.addEventListener('change', function (event) {
        // Check if a file is selected
        if (event.target.files && event.target.files[0]) {
            // Create a FileReader object
            const reader = new FileReader();

            // Set the image source once it's loaded
            reader.onload = function (e) {
                previewEditImage.src = e.target.result;
                previewEditImage.style.display = 'block';
                storedViewImage.style.display = 'none';
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(event.target.files[0]);
        } else {
            // No file selected, hide the preview
            previewEditImage.style.display = 'none';
            storedViewImage.style.display = 'block';
        }
    });

    // Get the input element
    const authorImageInput = document.getElementById('addAuthorImageInput');

    // Get the preview image element
    const previewAuthorImage = document.getElementById('previewAuthorImage');

    // Listen for changes in the input file selection
    authorImageInput.addEventListener('change', function (event) {
        // Check if a file is selected
        if (event.target.files && event.target.files[0]) {
            // Create a FileReader object
            const reader = new FileReader();

            // Set the image source once it's loaded
            reader.onload = function (e) {
                previewAuthorImage.src = e.target.result;
                previewAuthorImage.style.display = 'block';
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(event.target.files[0]);
        } else {
            // No file selected, hide the preview
            previewAuthorImage.style.display = 'none';
        }
    });

    // Get the input element
    const authorImageEditInput = document.getElementById('editAuthorImageInput');

    // Get the preview image element
    const previewEditAuthorImage = document.getElementById('previewAuthorEditImage');

    // Get the Stored image element
    const storedViewAuthorImage = document.getElementById('storedViewAuthorImage');

    // Listen for changes in the input file selection
    authorImageEditInput.addEventListener('change', function (event) {
        // Check if a file is selected
        if (event.target.files && event.target.files[0]) {
            // Create a FileReader object
            const reader = new FileReader();

            // Set the image source once it's loaded
            reader.onload = function (e) {
                previewEditAuthorImage.src = e.target.result;
                previewEditAuthorImage.style.display = 'block';
                storedViewAuthorImage.style.display = 'none';
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(event.target.files[0]);
        } else {
            // No file selected, hide the preview
            previewEditAuthorImage.style.display = 'none';
            storedViewAuthorImage.style.display = 'block';
        }
    });

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



    $("#addBlogsForm").submit(function (e) {
        e.preventDefault(); // Prevent the form from submitting normally

        // Get the form data
        const formData = new FormData(this);

        // Make the AJAX request
        $.ajax({
            url: '../controllers/addBlogsController.php',
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
        $("#addBlogsForm").click();
        viewBlogsDetails();
    });


    $('#editBlogForm').submit(function (e) {
        e.preventDefault(); // Prevent the form from submitting normally

        // Get the form data
        const formData = new FormData(this);

        // Make the AJAX request
        $.ajax({
            url: '../controllers/updateBlogsController.php',
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
        $("#editBlogsCloseButton").click();
        viewBlogsDetails();
    });

});