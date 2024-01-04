<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
    <li class="m-nav__item m-nav__item--home">
        <a href="<?php echo base_url(); ?>" class="m-nav__link m-nav__link--icon">
            <i class="m-nav__link-icon la la-home"></i>
        </a>
    </li>
    <li class="m-nav__separator">
        -
    </li>
    <li class="m-nav__item">
        <a href="" class="m-nav__link">
            <span class="m-nav__link-text">
                Dashboard
            </span>
        </a>
    </li>
    <li class="m-nav__separator">
        -
    </li>
    <li class="m-nav__item">
        <a href="<?php echo base_url($page_url); ?>" class="m-nav__link">
            <span class="m-nav__link-text">
                <?php echo $page_text; ?>
            </span>
        </a>
    </li>
    <?php if ($data['sq'] === true): ?>
        <li class="m-nav__item" style="margin-left: 15px;">
            <div class="pull-right">
                <div class="dropdown dropup">
                    <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">
                        <i class="la la-ellipsis-h"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="<?php echo base_url($data['page_url']); ?>"><i class="la la-home"></i> Home</a>
                        <a class="dropdown-item" href="<?php echo base_url($data['page_url'] . '/edit/' . $data['page_id']); ?>"><i class="la la-edit"></i> Email Setting</a>
                        <a class="dropdown-item" href="<?php echo base_url($data['page_url'] . '/register/' . $data['page_id']); ?>"><i class="la la-envelope"></i> Registered</a>
                    </div>
                </div>
            </div>
        </li>
    <?php endif; ?>
</ul>