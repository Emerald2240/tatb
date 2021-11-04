<div class="container text-center">
    <h2 class="heading">Latest Posts</h2>
</div>
<div class="formcontainer m-3">
    <form action="" method="post">
        <div class="form-group">
            <label class="sr-only" for="semail">Search</label>
            <input type="search" id="search" name="search" class="form-control mr-md-1 search" placeholder="Enter Post Title or Tags" required>
        </div>
        <div class="form-group">
            <label for="stype">Search Type</label>
            <select class="p-1" name="stype" id="stype">

                <!-- with_any_one_of -->
                <option value="1">Containing Words</option>
                <!-- with_the_exact_of -->
                <option value="2">Exact</option>
                <!-- without -->
                <option value="3">Without</option>
                <!-- starts with -->
                <option value="4">Starts With</option>
                <!-- Advanced Search -->
                <!-- <option value="0">Broad Range</option> -->
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Search</button>
    </form>
</div>
<!--//container-->