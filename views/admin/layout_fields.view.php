<link rel="stylesheet" href="static/apps/noviusos_form/css/admin.css" />


<div id="<?= $uniqid = uniqid('container_') ?>">

    <div class="line">
        <div class="unit col c8" style="position:relative;">
            <p>
                <button type="button" data-icon="plus" data-id="add" data-params="<?= e(json_encode(array('where' => 'top'))) ?>"><?= __('Add a field') ?></button>
            </p>

            <div class="field_blank_slate ui-widget-content" style="display:none;">
                <table style="width: 100%;">
                    <tr>
                        <th><?= __('Standard fields'); ?></th>
                        <th><?= __('Special fields'); ?></th>
                    </tr>
                    <tr>
                        <td style="width: 50%">
<?php
foreach (\Config::get('noviusos_form::controller/admin/form.fields_meta.standard') as $type => $meta) {
    ?>
                                <p><label data-meta="<?= $type ?>"><img src="<?= $meta['icon'] ?>" /> <?= $meta['title'] ?></label></p>
    <?php
}
?>
                        </td>
                        <td style="width: 50%">
<?php
foreach (\Config::get('noviusos_form::controller/admin/form.fields_meta.special') as $type => $meta) {
    ?>
                                <p><label data-meta="<?= $type ?>"><img src="<?= $meta['icon'] ?>" /> <?= $meta['title'] ?></label></p>
    <?php
}
?>
                        </td>
                    </tr>
                </table>
            </div>

            <table style="width: 100%; table-layout:fixed; border-spacing: 1em 0; border-collapse: separate;">
                <colgroup>
                    <!-- 4 even columns -->
                    <col />
                    <col />
                    <col />
                    <col />
                </colgroup>
                <tbody class="preview_container">

                </tbody>
            </table>
            <p>
                <button data-icon="plus" data-id="add" data-params="<?= e(json_encode(array('where' => 'bottom'))) ?>"><?= __('Add a field') ?></button>
                <button data-icon="plus" data-id="add" data-params="<?= e(json_encode(array('where' => 'bottom', 'type' => 'page_break'))) ?>"><?= __('Add a page break') ?></button>
            </p>
        </div>

        <div class="lastUnit col c4 fields_container">
            <img class="preview_arrow show_hide" src="static/apps/noviusos_form/img/arrow-edition.png" />
            <p class="actions show_hide">
                <button type="button" data-icon="trash" data-id="delete" class="action"><?= ('Delete') ?></button>
                <button type="button" data-icon="copy" data-id="copy" class="action"><?= ('Duplicate') ?></button>
            </p>
<?php
$layout = explode("\n", $item->form_layout);
array_walk($layout, function(&$v) {
    $v = explode(',', $v);
});
$layout = \Arr::flatten($layout);
// Remove empty values
$layout = array_filter($layout);
array_walk($layout, function(&$v) {
    $v = explode('=', $v);
    $v = $v[0];
});
foreach ($layout as $field_id) {
    echo \Request::forge('noviusos_form/admin/form/render_field')->execute(array($item->fields[$field_id]));
}
?>
        </div>
    </div>

    <div class="field_preview ui-widget-content" style="display:none;">
        <table width="100%">
            <tbody>
            <tr class="preview_row" data-id="clone_preview">
                <td class="preview ui-widget-content" colspan="4">
                    <div class="resizable">
                        <div class="handle ui-widget-header">
                            <img src="static/apps/noviusos_form/img/move-handle-dark3.png" />
                        </div>
                        <label class="preview_label"></label>
                        <div class="preview_content">

                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
require(['jquery-nos', 'static/apps/noviusos_form/js/admin/insert_update.js'], function($, init_form) {
    $(function() {
        init_form('#<?= $uniqid ?>');
    });
});
</script>