<section id="addComment" class="container mt-2 d-none" >
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Ajouter un commentaire</h2>

            <form action="?page=post&action=addComment" method="POST">
                <input type="number" name="post_id" value="<?= $post->id ?>" hidden>

                <div class="mb-3 position-relative">
                    <input type="text" class="form-control form-custom-input" name="title" id="title" value="" placeholder=" " required>
                    <label for="title" class="form-label form-custom-label position-absolute">Un titre</label>
                </div>
                
                <div class="mb-3 position-relative">
                    <textarea class="col-12 form-control form-custom-input" name="comment" id="comment" placeholder=" "required></textarea>
                    <label for="comment" class="form-label form-custom-label position-absolute">Le commentaire</label>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary col-12 mb-2">
                        Ajouter
                    </button>

                    <button id="closeCommentButton" type="button" class="btn btn-outline-secondary col-12">
                        Retour
                    </button>
                </div>
            </form>

        </div>
    </div>
</section>
