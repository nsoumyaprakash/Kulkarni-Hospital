<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CKEditor Example</title>
</head>

<body>
    <div id="editor"></div>
    <button id="saveBtn">Save Content</button>

    <figure class="table">
        <table>
            <thead>
                <tr>
                    <th>Hii</th>
                    <th>Hello</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>hbh</td>
                    <td>bvmb</td>
                </tr>
            </tbody>
        </table>
    </figure>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            document.getElementById('saveBtn').addEventListener('click', function() {
                var editorData = editor.getData();

                // Send the content to PHP for saving
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'http://localhost/kulkarrni/test.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        console.log(xhr.responseText);
                    }
                };
                xhr.send('content=' + encodeURIComponent(editorData));
            });
        })
        .catch(error => {
            console.error(error);
        });
    </script>
</body>

</html>



<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['content'];

    // Store the content in your database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kulkarni";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Escape the content to prevent SQL injection
    $escapedContent = $conn->real_escape_string($content);

    // Insert the content into the database
    $sql = "INSERT INTO editor_content (content) VALUES ('$escapedContent')";

    if ($conn->query($sql) === TRUE) {
        echo "Content saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request";
}
?>