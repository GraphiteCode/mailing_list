<div class="subscribe_form">
    <form action="" method="POST">
        <p>Subscribe to our Newsletter</p>
        <input type="email" name="email" placeholder="E-mail">
        <button type="submit" name="submit">Subscribe</button>
        <?php
        if (!empty($alert)) : ?>
            <div class="alert"><small><?php echo $alert; ?></small></div>
        <?php endif; ?>
    </form>
</div>