/* global $ */
(function () {
    "use strict";

    var blogsDiv = $('#blogsDiv'),
        postsDiv = $('#postsDiv'),
        thePosts = $('#thePosts'),
        prevButton = $('#prevButton'),
        nextButton = $('#nextButton'),
        numPostsPerPage = 3,
        pagingIndex = 0,
        postsArray = [];

    $('#homeButton').click(function () {
        postsDiv.hide();
        thePosts.empty();
        postsArray = [];
        pagingIndex = 0;

        getBlogs();

    });

    prevButton.click(function () {
        if (pagingIndex > 0) {
            pagingIndex -= numPostsPerPage;
            if (pagingIndex <= 0) {
                prevButton.attr('disabled', true);
            }
            nextButton.removeAttr("disabled");
            thePosts.empty();
            pagePosts();
        }
    });

    nextButton.click(function () {
        if (pagingIndex < postsArray.length - numPostsPerPage) {
            pagingIndex += numPostsPerPage;
            if (pagingIndex > postsArray.length - numPostsPerPage) {
                nextButton.attr('disabled', true);
            }
            prevButton.removeAttr("disabled");
            thePosts.empty();
            pagePosts();
        }
    });

    function getBlogs() {
        $.getJSON('https://jsonplaceholder.typicode.com/users', function (blogs) {
            blogs = blogs.map(function (blog) {
                return {
                    id: blog.id,
                    name: blog.name,
                    website: blog.website,
                    company: blog.company.name
                };
            });
            blogs.forEach(function (blog) {
                addBlog(blog).click(function () {
                    blogsDiv.empty();
                    displayPosts(blog.id);
                });
            });
        }).fail(function (xhr, statusCode, statusText) {
            console.log(xhr, statusCode, statusText);
        });
    }

    function addBlog(blog) {
        return $('<div class="blog"><h3>' + blog.name + '</h3><h5>' + blog.website + '</h5><h5>' +
            blog.company + '</h5></div>').appendTo(blogsDiv);
    }

    function addPost(post) {
        var thePost = $('<div class="post"><h3>' + post.title + '</h3><p>' + post.body + '</p>' +
            '<button class="showComments">Show Comments</button><div class="theComments"></div><div>')
            .appendTo(thePosts);

        var theButton = thePost.find('button');

        var theComments = thePost.find('.theComments');

        theButton.click(function () {
            var showCommentsString = 'Show Comments';
            if (theButton.html() === showCommentsString) {
                theButton.html('Hide Comments');

                $.getJSON('https://jsonplaceholder.typicode.com/comments',
                    { postId: post.id }, function (comments) {
                        comments.forEach(function (comment) {
                            theComments.append('<p class="comment">' + comment.body + '</p>');
                        });
                    }).fail(function (xhr, statusCode, statusText) {
                        console.log(xhr, statusCode, statusText);
                    });
            } else {
                theButton.html(showCommentsString);
                theComments.empty();
            }
        });
    }

    // gets next/prev set of posts
    function pagePosts() {
        for (var index = pagingIndex; index < pagingIndex + numPostsPerPage; index++) {
            if (index < postsArray.length) {
                addPost(postsArray[index]);
            }
        }
    }

    // gets posts and pushes to array
    function displayPosts(id) {
        console.log(id);
        $.getJSON('https://jsonplaceholder.typicode.com/posts', { userId: id }, function (posts) {
            postsDiv.show();
            posts.forEach(function (post) {
                postsArray.push(post);
            });
            pagePosts();
        }).fail(function (xhr, statusCode, statusText) {
            console.log(xhr, statusCode, statusText);
        });
    }

    getBlogs();
}());