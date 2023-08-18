console.log("Blogs");

const getAllBlogs = () => {
    $.ajax({
        url: '../controllers/getAllBlogs.php',
        method: 'GET',
        success: (response) => {
            const parsedResponse = JSON.parse(response);

            if (parsedResponse.statusCode === 0) {
                const data = parsedResponse.data;

                let html = "";
                data.forEach(item => {
                    html += `
                    <div class="single-blog wow fadeInUp animated">
                        <div class="single-blog-img">
                            <div class="entry-mark"></div>
                            <img class="img-fluid" src="../img/blog/${item.thumbnail}" alt="${item.title}">
                            <div class="entry-action">
                                <a href="single-blog.php?blog=${item.id}"><i class="icofont icofont-link"></i></a>
                            </div>
                        </div>
                        <div class="single-blog-info mt-5">
                            <div class="single-blog-info-img">
                                <img class="img-fluid" src="../img/blog/author/${item.author_img}" alt="${item.author}">
                                <div class="single-blog-info-pm">
                                    <i class="icofont icofont-file-image"></i>
                                </div>
                            </div>
                            <div class="single-blog-info-detail">
                                <a href="single-blog.php?blog=${item.id}">
                                    <h5>${item.title}</h5>
                                </a>
                                <div class="single-blog-meta">
                                    <span class="post-date"><i class="lnr lnr-calendar-full"></i> ${item.created.substring(0, 10)}</span>
                                    <span class="post-user"><i class="lnr lnr-user"></i> ${item.author}</span>
                                    <span class="allpost-cata"><i class="lnr lnr-tag"></i> ${item.tag}</span>
                                    <span class="post-comment"><i class="lnr lnr-bubble"></i> ${item.comments ? item.comments : 0} comments</span>
                                </div>
                                <p>${item.content.substring(0, 200)}...</p>
                                <a href="single-blog.php?blog=${item.id}" class="blog-home-rmbtn">Continue <i class="icofont icofont-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>`;
                });
                $("#allBlogsContainer").html(html);
                for (let i = 0; i < Math.ceil(data.length / 3); i++) {
                    $("#blog .pagination").append(`<li class="page-item"><a class="page-link">${i + 1}</a></li>`);
                }
                initializePagination(".single-blog", 3);
            }
        },
        error: (error) => {
            console.error('GET Error:', error);
        }
    });
}





$(document).ready(() => {
    getAllBlogs();
});