<!-- Footer -->
<footer class="footer">
    <div class="middle-footer">
        <div class="container">
            <div class="row">
                <?php for ($i = 1; $i <= 4; $i++) { ?>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget">
                            <?php if (is_active_sidebar('widget-sidebar-footer' . $i)) :  dynamic_sidebar('widget-sidebar-footer' . $i);
                            endif; ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="copyright text-center">
        <div class="container">
            <div class="copyright-txt"><?php echo tr_options_field('corsivalab_options.copyright_footer'); ?></div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>