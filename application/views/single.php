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
                        <div class="news-block">
                            <h2><?=$article->title?>
                                <?if($this->ion_auth->logged_in()):?>
                                    <a title="Edit the post" href="<?=site_url(['post', 'edit',$article->id])?>"><img src="/images/edit.png" /></a>
                                    <a title="Delete the post" onclick="return confirmDelete();" href="<?=site_url(['post', 'delete', $article->id])?>"><img src="/images/delete.png" /></a>
                                <?endif;?></h2>
                            <?=$article->text?>
                            <div class="news-bottom">
                                <div class="inside">
                                    <div class="right">Published: <?=date('H:i - m/d/Y', $article->published)?></div>
                                </div>
                            </div>
                        </div>
                <? endif; ?>
            </main>
        </div>
        <?  $this->load->view('sidebar'); ?>
    </div>
<?  $this->load->view('footer'); ?>