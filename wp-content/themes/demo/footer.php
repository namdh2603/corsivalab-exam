<!-- Footer -->
<footer class="footer">
    <div class="middle-footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-2">
                    <div class="footer-widget">
                        <?php if (is_active_sidebar('widget-footer-col-1')) :  dynamic_sidebar('widget-footer-col-1');
                        endif; ?>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-lg-2">
                    <div class="footer-widget">
                        <?php if (is_active_sidebar('widget-footer-col-2')) :  dynamic_sidebar('widget-footer-col-2');
                        endif; ?>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-lg-2">
                    <div class="footer-widget">
                        <?php if (is_active_sidebar('widget-footer-col-3')) :  dynamic_sidebar('widget-footer-col-3');
                        endif; ?>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-lg-2">
                    <div class="footer-widget">
                        <?php if (is_active_sidebar('widget-footer-col-4')) :  dynamic_sidebar('widget-footer-col-4');
                        endif; ?>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-lg-4">
                    <div class="footer-widget">
                        <?php if (is_active_sidebar('widget-footer-col-5')) :  dynamic_sidebar('widget-footer-col-5');
                        endif; ?>
                    </div>
                </div>
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