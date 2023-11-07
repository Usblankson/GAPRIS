<?php include "includes/header.php"; ?>
<div class="row">
    <!-- main title -->
    <div class="col-12">
        <div class="main__title">
            <h2>Add new video</h2>
        </div>
    </div>
    <!-- end main title -->

    <!-- form -->
    <div class="col-12">
        <form action="php/add-video.php" class="form" enctype="multipart/form-data" method="POST">
            <div class="row row--form">
                <div class="col-12 col-md-5 form__cover">
                    <div class="row row--form">
                        <div class="col-12 col-sm-6 col-md-12">
                            <div class="form__img">
                                <label for="form__img-upload">Upload cover (270 x 400)</label>
                                <input id="form__img-upload" name="thumbnailFile" type="file" accept=".png, .jpg, .jpeg" required>
                                <img id="form__img" src="#" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-7 form__content">
                    <div class="row row--form">
                        <div class="col-12">
                            <input type="text" name="title" class="form__input" placeholder="Title">
                        </div>

                        <div class="col-12">
                            <textarea name="description" class="form__textarea" placeholder="Description"  required></textarea>
                        </div>

                    </div>
                </div>

                <div class="col-12">
                    <ul class="form__radio">
                        <li>
                            <span>Category:</span>
                        </li>
                        <li>
                            <input id="type1" type="radio" name="category" value="Goat" checked>
                            <label for="type1">Goat Collection</label>
                        </li>
                        <li>
                            <input id="type2" type="radio" name="category" value="Pig">
                            <label for="type2">Pig Collection</label>
                        </li>
                    </ul>
                </div>

                <div class="col-12">
                    <div class="row row--form">
                        <div class="col-12">
                            <div class="form__video">
                                <label id="movie1" for="form__video-upload">Upload video</label>
                                <input data-name="#movie1" id="form__video-upload" name="videoFile" class="form__video-upload" type="file" accept="video/mp4,video/x-m4v,video/*"  required>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="form__btn">Publish</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- end form -->
</div>
<?php include "includes/footer.php"; ?>
