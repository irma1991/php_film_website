<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading"><?=$siteName;?></div>
    <div class="list-group list-group-flush">
        <?php foreach ($nav as $id => $navigation):?>
            <?php if ($id == 'sidebar'):?>
                <?php foreach ($navigation as $id => $tab):?>
                    <a class="list-group-item list-group-item-action bg-light" href ="?page=<?=$id?>"><?=$tab;?></a>
                <?php endforeach;?>
            <?php endif;?>
        <?php endforeach;?>
    </div>
</div>
<!-- /#sidebar-wrapper -->