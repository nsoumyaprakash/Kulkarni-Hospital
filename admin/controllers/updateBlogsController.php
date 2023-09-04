<?php
	require '../assets/includes/checklogin.php';

	try {
        include "../assets/includes/utility_functions.php";
		require_once '../assets/includes/config.php';
        
        $blogsId = $_POST['editBlogId'];
        $editTag = $_POST['editTag'];
        $editTitle = $_POST['editTitle'];
        $editContent = $_POST['editContent']; 
        $editContent = mysqli_real_escape_string($conn, $editContent);                  
        $editAuthor = $_POST['editAuthor'];
        $editImageInput = $_FILES['editImageInput'];
        $imageName = handleFile($editImageInput, "../../img/uplaods/");
        $editAuthorImageInput = $_FILES['editAuthorImageInput'];
        $authorImageName = handleFile($editAuthorImageInput, "../../img/uplaods/");
        $editStatus = isset($_POST['editStatus']) ? 1 : 0;

        if ($editStatus == '1') {
            if ($imageName != '' && $authorImageName != '') {
                $sql = "UPDATE `blogs` SET `imgSrc` = '$imageName', `tag` = '$editTag', `title` = '$editTitle', `content` = '$editContent', `authorImg` = '$authorImageName', `author` = '$editAuthor', `publishedAt` = NOW(), `isActive` = '$editStatus', `updated` = NOW() WHERE id = '$blogsId' ";
            } else if ($imageName != '') {
                $sql = "UPDATE `blogs` SET `imgSrc` = '$imageName', `tag` = '$editTag', `title` = '$editTitle', `content` = '$editContent', `author` = '$editAuthor', `publishedAt` = NOW(), `isActive` = '$editStatus', `updated` = NOW() WHERE id = '$blogsId' ";
            } else if ($authorImageName != '') {
                $sql = "UPDATE `blogs` SET `tag` = '$editTag', `title` = '$editTitle', `content` = '$editContent', `authorImg` = '$authorImageName', `author` = '$editAuthor', `publishedAt` = NOW(), `isActive` = '$editStatus', `updated` = NOW() WHERE id = '$blogsId' ";
            } else {
                $sql = "UPDATE `blogs` SET  `tag` = '$editTag', `title` = '$editTitle', `content` = '$editContent', `author` = '$editAuthor', `publishedAt` = NOW(), `isActive` = '$editStatus', `updated` = NOW() WHERE id = '$blogsId' ";
            }
        } else {
            if ($imageName != '' && $authorImageName != '') {
                $sql = "UPDATE `blogs` SET `imgSrc` = '$imageName', `tag` = '$editTag', `title` = '$editTitle', `content` = '$editContent', `authorImg` = '$authorImageName', `author` = '$editAuthor', `isActive` = '$editStatus', `updated` = NOW() WHERE id = '$blogsId' ";
            } else if ($imageName != '') {
                $sql = "UPDATE `blogs` SET `imgSrc` = '$imageName', `tag` = '$editTag', `title` = '$editTitle', `content` = '$editContent', `author` = '$editAuthor', `isActive` = '$editStatus', `updated` = NOW() WHERE id = '$blogsId' ";
            } else if ($authorImageName != '') {
                $sql = "UPDATE `blogs` SET `tag` = '$editTag', `title` = '$editTitle', `content` = '$editContent', `authorImg` = '$authorImageName', `author` = '$editAuthor', `isActive` = '$editStatus', `updated` = NOW() WHERE id = '$blogsId' ";
            } else {
                $sql = "UPDATE `blogs` SET  `tag` = '$editTag', `title` = '$editTitle', `content` = '$editContent', `author` = '$editAuthor', `isActive` = '$editStatus', `updated` = NOW() WHERE id = '$blogsId' ";
            }
        }
        
		$result = mysqli_query($conn, $sql);

		if ($result) {
			$data = [
				'result' => [
					'status' => [
						'statusCode' => "0",
                        'sql' => $sql
					]
				]
			];
			echo json_encode($data);
			exit();
		} else {
			$data = [
				'result' => [
					'status' => [
						'statusCode' => "1", 
						'errorCode' => mysqli_errno($conn),
						'errorMessage' => mysqli_error($conn),
					]
				]
            ];
			echo json_encode($data);
			exit();
		}

	} catch (Exception $e) {
		$data = [
			'result' => [
				'status' => [
					'statusCode' => "1", 
					'errorCode' => $e->getCode(), 
					'errorLine' => $e->getLine(), 
					'errorMessage' => $e->getMessage(),
					'errorFile' => $e->getFile()
				]
			]
		];
		echo json_encode($data);
		exit();
	}
?>