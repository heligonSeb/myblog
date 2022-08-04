<section>
    <div class="modal" id="addCom" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un commentaire</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="?page=post&action=addComment" method="POST">
                        <input type="number" name="post_id" value="<?= $post->id ?>" hidden>
                        <div class="mb-3">
                            <label for="title">Un titre</label>
                            <input type="text" class="form-control" name="title" id="title"  required>
                        </div>

                        <label for="comment">Le commentaire</label>
                        <div class="input-group mb-3">
                            <textarea class="w-100" name="comment" id="comment"required></textarea>
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