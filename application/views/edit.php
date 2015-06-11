<?  $this->load->view('header'); ?>
    <script>
        function confirmDelete() {
            if (confirm("Are you sure you want to delete?")) {
                return true;
            } else {
                return false;
            }
        }
    </script>
    <div class="middle">
        <div class="container">
            <main class="content">
                <? if(isset($article)):
                    ?>
                    <form method="POST">
                    <div class="news-block">
                        <h2><input type="text" name="title" value="<?=$article->title?>" /></h2>
                        <textarea id="ckeditor" name="text"><?=$article->text?></textarea>
                                <a href="<?=site_url(['post', 'delete', $article->id])?>" class="button button-error pure-button" onclick="return confirmDelete();">Delete</a>
                                <button class="button pure-button pure-button-primary">Save changes</button>

                    </div>
                    </form>
                <? endif; ?>
            </main>
        </div>
        <?  $this->load->view('sidebar'); ?>
    </div>
    <script>
        CKEDITOR.replace( 'ckeditor', {
            enterMode: CKEDITOR.ENTER_BR,
        });
    </script>
<?  $this->load->view('footer'); ?>