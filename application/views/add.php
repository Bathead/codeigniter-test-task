<?  $this->load->view('header'); ?>
    <div class="middle">
        <div class="container">
            <main class="content">
                    <form method="POST">
                    <div class="news-block">
                        <h2><input type="text" name="title" value="" /></h2>
                        <textarea id="ckeditor" name="text"></textarea>
                                <button class="button save-button pure-button pure-button-primary">Add news</button>
                    </div>
                    </form>
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