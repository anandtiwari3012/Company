document.addEventListener("DOMContentLoaded", function() {
    fetchBlogPosts();
    
    document.getElementById("add-post-form").addEventListener("submit", function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        addBlogPost(formData);
    });

    document.getElementById("update-post-form").addEventListener("submit", function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        updateBlogPost(formData);
    });

    document.getElementById("delete-post-form").addEventListener("submit", function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        deleteBlogPost(formData);
    });
});

function fetchBlogPosts() {
    fetch("fetch_posts.php")
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
            <div><strong>ID:</strong> ${post.id}</div>
            <div><strong>Title:</strong> ${post.title}</div>
            <div><strong>Description:</strong> ${post.description}</div>
            <div><strong>Author:</strong> ${post.author}</div>
            <hr>
        `;
        blogPostsContainer.appendChild(postElement);
    });
}

function addBlogPost(formData) {
    fetch("add_post.php", {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        fetchBlogPosts();
    })
    .catch(error => console.error('Error:', error));
}

function updateBlogPost(formData) {
    fetch("update_post.php", {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        fetchBlogPosts();
    })
    .catch(error => console.error('Error:', error));
}

function deleteBlogPost(formData) {
    fetch("delete_post.php", {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        fetchBlogPosts();
    })
    .catch(error => console.error('Error:', error));
}
