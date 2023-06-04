<div class="container-fluid mt-5">
                <div class="row">
    <?php require "./views/_adminbar.php"; ?>
                
                    <div class="card col mx-5 index-main">
                        <div class="admin-header mt-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card title-card">
                                    <h1>Add Blog Page</h1>
                                </div><br>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <strong>Tip for your blog!</strong>in blog textarea you can use html tags to make your blog better!
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                <div>
                                    <form action="add-blog.php" method="post">
                                    <div class="form-group">
                                            <h3>Title of the Blog</h3>
                                            <input type="text" class="form-control" id="title" name="title" placeholder="title">
                                        </div>
                                        <div class="form-group">
                                            <h3>Category</h3>
                                            <select class="form-control" id="category" name="category">
                                            <option>Please Select.</option>
                                            <option>Food</option>
                                            <option>Travel</option>
                                            <option>Lifestyle</option>
                                            <option>Health and Fitness</option>
                                            <option>Photography</option>
                                            <option>Book review</option>
                                            <option>Technology</option>
                                            <option>Science</option>
                                            <option>Movie Reviews</option>
                                            <option>Gaming</option>
                                            <option>sociology</option>
                                            <option>Education</option>
                                            <option>Computer Science</option>
                                            <option>Coding</option>
                                            <option>Music</option>
                                            <option>Board Games</option>
                                            <option>Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <h3>Blog URL</h3>
                                            <input type="text" class="form-control" id="url" name="url" placeholder="url">
                                        </div>
                                        <div class="form-group">
                                            <h3>Blog Image</h3>
                                            <input type="text" class="form-control" id="img" name="img" placeholder="blog image">
                                        </div>
                                        <br>
                                        
                                        <div class="form-group">
                                            <h3>Blog</h3>
                                            <textarea class="form-control" id="blogMain" name="blogMain" minlength="1500"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="postBlog">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>