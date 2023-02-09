<div class="mt-5 text-center" style="margin-left: 20em; margin-right: 20em">
    <h2>
    Welcome to the world of limitless creativity! 
    Our blog app is the perfect 
    platform to unleash your writing potential and share 
    your thoughts, ideas, and stories 
    with a global audience.
    </h2>
</div>

<div class="container">
    <div class="row mt-5">
    <h3>Most Popular</h3>
    <hr>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php if (! empty($posts) && is_array($posts)): ?>
            <?php foreach ($posts as $posts_item): ?>
            <div class="col">
                <div class="card border-0" style="max-width: 320px;">
                    <img class="rounded" src="<?= esc($posts_item['img_url']) ?>" alt="" width="auto" height="250px">
                    <div class="mt-3 text-uppercase h6" style="font-size: 12px; color: gray;">
                    <?= esc($posts_item['author']) ?> &#x2022; <p class="d-inline" style="font-size: 10px;"><?= date("M j", strtotime(esc($posts_item['created_at']))) ?></p>
                    </div>
                    <div class="mt-2 text-uppercase h6">
                    <?= esc($posts_item['title']) ?>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <div>
                                <a class="stretched-link" href="/posts/<?= esc($posts_item['slug'], 'url') ?>"></a>
                            </div>
                            <div>
                            <?php foreach (explode(",", esc($posts_item['tags'])) as $tag): ?>
                            <p class="d-inline badge" style="border: black; color: white; background-color: gray;"><?= esc($tag) ?></p>
                            <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>



<?php else: ?>
<h3>No Posts</h3>
<p>Unable to find any posts for you.</p>

<?php endif ?>