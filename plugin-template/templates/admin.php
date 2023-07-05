<div class="wrap">
    <h1>Modular Admin Area Plugin Dashboard</h1>
    <?php settings_errors(); ?>

    <form action="options.php" class="post">
        <?php
            settings_fields('template_options_group');
            do_settings_sections('plugin-template');
            submit_button();
        ?>
    </form>
</div>

