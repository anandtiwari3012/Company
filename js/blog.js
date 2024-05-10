document.addEventListener("DOMContentLoaded", function() {
    fetchBlogPosts();
});

function fetchBlogPosts() {
    fetch("get_blog.php")
        .then(response => response.json())
        .then(data => {
            displayBlogPosts(data);
        })
        .catch(error => console.error('Error:', error));
}

function displayBlogPosts(posts) {
    const blogPostsContainer = document.getElementById("blog-posts");
    blogPostsContainer.innerHTML = "";

    posts.forEach(post => {
        const postElement = document.createElement("div");
        postElement.classList.add("blog-post");
        postElement.innerHTML = `
           <div class="post">
            <div class="blog-title">Title-${post.title}</div>
            <div class="blog-description">${post.description}</div>
            <div class="blog-author">Author: ${post.author}</div>
           </div>  `;
        blogPostsContainer.appendChild(postElement);
    });
}
