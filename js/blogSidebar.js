console.log("Blog sidebar");

const getBlogs = () => {
    $.ajax({
        url: '../controllers/getAllBlogs.php',
        method: 'GET',
        success: (response) => {
            const parsedResponse = JSON.parse(response);

            if (parsedResponse.statusCode === 0) {
                const data = parsedResponse.data;
                $("#blogSearcher").autocomplete({
                    source: data.map(item => { return { label: item.title, value: item.id } })
                });

                let recentBlogPostsHtml = "";
                for (let i = 0; i < 9; i++) {
                    recentBlogPostsHtml += `
                    <div class="single-recent-post">
                        <a href="single-blog.php?blog=${data[i].id}"><img class="img-fluid" src="../img/blog/${data[i].thumbnail}" alt="${data[i].title}"></a><a href="single-blog.php?blog=${data[i].id}" class="icon"><i class="icofont icofont-link"></i></a>
                    </div>`;
                }
                $("#recentBlogPosts").html(recentBlogPostsHtml);
            }
        },
        error: (error) => {
            console.error('GET Error:', error);
        }
    });
}

const getRecentComments = () => {
    $.ajax({
        url: '../controllers/getBlogComments.php',
        method: 'GET',
        success: (response) => {
            const parsedResponse = JSON.parse(response);

            if (parsedResponse.statusCode === 0) {
                const data = parsedResponse.data;

                let recentBlogCommentsHtml = "";
                data.forEach(item => {
                    recentBlogCommentsHtml += `<li class="px-2">
                        <span class="comment-author-link"><a href="single-blog.php?blog=${item.id}"><i class="icofont icofont-comment"></i> ${item.name} Commented</a></span>
                        <span>on</span><a href="single-blog.php?blog=${item.id}">${item.title}</a>
                    </li>`;
                });
                $("#recentBlogComments").html(recentBlogCommentsHtml);
            }
        },
        error: (error) => {
            console.error('GET Error:', error);
        }
    });
}




$(document).ready(() => {
    getBlogs();
    getRecentComments();

    $(document).on("click", ".ui-menu-item", (e) => {
        window.location.href = `single-blog.php?blog=${$("#blogSearcher").val()}`;
    });
});