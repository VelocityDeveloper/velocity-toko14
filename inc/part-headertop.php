<div class="header-top">
    <div class="container p-0 text-center text-md-start d-md-flex align-items-center justify-content-end">
        <div class="kontak-seller px-2"><?php echo do_shortcode('[kontak style="false"]'); ?></div>
        <div class="profile-icons px-2">
            <div class="d-flex justify-content-center justify-content-md-end align-items-center">
                <div class="p-2"><?php echo do_shortcode('[profile]'); ?></div>
                <div class="p-2"><?php echo do_shortcode('[cart]'); ?></div>
            </div>
        </div>
    </div>
    <div class="d-md-none d-xl-none d-block py-1">
        <form action="<?php echo get_site_url(); ?>/products" class="d-flex" method="get">
            <input style="font-size: 12px;" type="text" name="s" placeholder="Cari.." class="form-control form-control-sm rounded-start p-2 h-auto rounded-0 border-0">
            <button type="submit" class="border-0 btn btn-dark btn-sm p-2 h-auto rounded-0 rounded-end border-0">
                <svg class="bi" fill="currentColor" width="16" height="16">
                    <use href="#search"></use>
                </svg>
            </button>
        </form>
    </div>
</div>