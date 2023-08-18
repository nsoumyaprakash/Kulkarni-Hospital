console.log("Single blog");

const getSingleBlog = (blogId) => {
    $.ajax({
        url: '../controllers/getSingleBlog.php',
        method: 'POST',
        data: { blogId },
        success: (response) => {
            const parsedResponse = JSON.parse(response);

            if (parsedResponse.statusCode === 0) {
                const data = parsedResponse.data[0];

                const html = `
                <div class="single-blog mb-3">
                    <div class="single-blog-img">
                        <div class="entry-mark"></div>
                        <img class="img-fluid" src="../img/blog/${data.thumbnail}" alt="${data.title}">
                    </div>
                    <div class="single-blog-info mt-5">
                        <div class="single-blog-info-img">
                            <img class="img-fluid" src="../img/blog/author/${data.author_img}" alt="${data.author}">
                            <div class="single-blog-info-pm">
                                <i class="icofont icofont-file-image"></i>
                            </div>
                        </div>
                        <div class="single-blog-info-detail">
                            <h5>${data.title}</h5>
                            <div class="single-blog-meta">
                                <span class="post-date"><i class="lnr lnr-calendar-full"></i> ${data.created.substring(0, 10)}</span>
                                <span class="post-user"><i class="lnr lnr-user"></i> ${data.author}</span>
                                <span class="allpost-cata"><i class="lnr lnr-tag"></i> ${data.tag}</span>
                                <span class="post-comment"><i class="lnr lnr-bubble"></i> ${data.comments ? data.comments : 0} comments</span>
                            </div>
                            <p>${data.content}</p>
                        </div>
                    </div>
                </div>`;

                $("#singleBlogContainer").html(html);
            }
        },
        error: (error) => {
            console.error('POST Error:', error);
        }
    });
}

const getComments = (blogId) => {
    $.ajax({
        url: '../controllers/getBlogComments.php',
        method: 'POST',
        data: { blogId },
        success: (response) => {
            const parsedResponse = JSON.parse(response);

            if (parsedResponse.statusCode === 0) {
                const data = parsedResponse.data;

                let html = "";
                data.forEach(item => {
                    html += `
                    <li class="comment">
                        <div class="comment-body clearfix">
                            <div class="avatar">
                                <img alt="" class="avatar" src="../img/user.png">
                            </div>
                            <div class="comment-text">
                                <div class="author">
                                    <span>
                                        <p>${item.name}</p>
                                    </span>
                                    <p>${formatDate(item.created)}</p>
                                </div>
                                <p>${item.message}</p>
                            </div>
                        </div>
                    </li>`;
                });

                $("#blogCommentList").html(html);
            }
        },
        error: (error) => {
            console.error('POST Error:', error);
        }
    });
}





$(document).ready(() => {
    const urlParams = new URLSearchParams(window.location.search);
    const blogParam = urlParams.get('blog');

    getSingleBlog(blogParam);
    getComments(blogParam);

    // Saving comment in database
    $("#blogCommentForm").on("submit", (e) => {
        e.preventDefault();
        $.ajax({
            url: '../controllers/saveBlogComment.php',
            method: 'POST',
            data: $(e.target).serialize() + `&blogId=${blogParam}`,
            success: (response) => {
                const parsedResponse = JSON.parse(response);
                if (parsedResponse.statusCode === 0) {
                    $(e.target).trigger("reset");
                    getComments(blogParam);
                    getSingleBlog(blogParam);
                }
            },
            error: (error) => {
                console.error('POST Error:', error);
            }
        });
    });
});