<section>
    <div class="modal" id="editPost" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier le post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="?page=post&action=editPost" method="POST">
                        <input type="text" name="post_id" value="<?= $post->id ?>" hidden/>

                        <div class="mb-3">
                            <label for="title">Un titre</label>
                            <input type="text" class="form-control" name="title" id="title" value="<?= $post->title ?>" required>
                        </div>

                        <label for="intro">Intro</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="intro" id="intro" value="<?= $post->intro ?>" required>
                        </div>

                        <label for="content">Contenu du post</label>
                        <div class="input-group mb-3">
                            <textarea class="w-100 p-2" name="content" id="content" required><?= $post->content ?></textarea>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">
                                Ajouter
                            </button>

                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Retour
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>