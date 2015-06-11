<?  $this->load->view('header'); ?>
<?if($this->ion_auth->logged_in()):?>
<script>
    function confirmDelete() {
        if (confirm("Are you sure you want to delete?")) {
            return true;
        } else {
            return false;
        }
    }
</script>
<?endif;?>
    <div class="middle">
        <div class="container">
            <br />
        <?if($this->ion_auth->logged_in()):?><p><img src="/images/add.png" />&nbsp;<a href="<?=site_url(['post', 'add'])?>">Add news</a></p><?endif;?>
            <main class="content">
                <? if(isset($articlesArray)):?>
                    <? foreach ($articlesArray as $article): ?>
                        <div class="news-block">
                            <h2><a href="<?=site_url(['post', $article->id])?>"><?=$article->title?></a>
                                <?if($this->ion_auth->logged_in()):?>
                                    <a title="Edit the post" href="<?=site_url(['post', 'edit',$article->id])?>"><img src="/images/edit.png" /></a>
                                    <a title="Delete the post" onclick="return confirmDelete();" href="<?=site_url(['post', 'delete', $article->id])?>"><img src="/images/delete.png" /></a>
                                <?endif;?>
                            </h2>
                            <?=word_limiter($article->text, 100)?>
                            <div class="news-bottom">
                                <div class="inside">
                                    <div class="left"><a class="news-link" href="<?=site_url(['post', $article->id])?>">Read more</a></div>
                                    <div class="right">Published: <?=date('H:i - m/d/Y', $article->published)?></div>
                                </div>
                            </div>
                        </div>
                    <? endforeach; ?>
                <? endif; ?>
                <?=$pagination;?>
            </main>
        </div>
        <?  $this->load->view('sidebar'); ?>
    </div>
<?  $this->load->view('footer'); ?>