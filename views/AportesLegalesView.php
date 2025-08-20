<?php

namespace PHPMaker2025\project1;

// Page object
$AportesLegalesView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $Page->ExportOptions->render("body") ?>
<?php $Page->OtherOptions->render("body") ?>
</div>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="view">
<form name="faportes_legalesview" id="faportes_legalesview" class="ew-form ew-view-form overlay-wrapper" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (!$Page->isExport()) { ?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { aportes_legales: currentTable } });
var currentPageID = ew.PAGE_ID = "view";
var currentForm;
var faportes_legalesview;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("faportes_legalesview")
        .setPageId("view")
        .build();
    window[form.id] = form;
    currentForm = form;
    loadjs.done(form.id);
});
</script>
<script<?= Nonce() ?>>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="aportes_legales">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="<?= $Page->TableClass ?>">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id"<?= $Page->id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_aportes_legales_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id"<?= $Page->id->cellAttributes() ?>>
<span id="el_aportes_legales_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->cooperativa_id->Visible) { // cooperativa_id ?>
    <tr id="r_cooperativa_id"<?= $Page->cooperativa_id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_aportes_legales_cooperativa_id"><?= $Page->cooperativa_id->caption() ?></span></td>
        <td data-name="cooperativa_id"<?= $Page->cooperativa_id->cellAttributes() ?>>
<span id="el_aportes_legales_cooperativa_id">
<span<?= $Page->cooperativa_id->viewAttributes() ?>>
<?= $Page->cooperativa_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->concepto->Visible) { // concepto ?>
    <tr id="r_concepto"<?= $Page->concepto->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_aportes_legales_concepto"><?= $Page->concepto->caption() ?></span></td>
        <td data-name="concepto"<?= $Page->concepto->cellAttributes() ?>>
<span id="el_aportes_legales_concepto">
<span<?= $Page->concepto->viewAttributes() ?>>
<?= $Page->concepto->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->monto->Visible) { // monto ?>
    <tr id="r_monto"<?= $Page->monto->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_aportes_legales_monto"><?= $Page->monto->caption() ?></span></td>
        <td data-name="monto"<?= $Page->monto->cellAttributes() ?>>
<span id="el_aportes_legales_monto">
<span<?= $Page->monto->viewAttributes() ?>>
<?= $Page->monto->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->archivo->Visible) { // archivo ?>
    <tr id="r_archivo"<?= $Page->archivo->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_aportes_legales_archivo"><?= $Page->archivo->caption() ?></span></td>
        <td data-name="archivo"<?= $Page->archivo->cellAttributes() ?>>
<span id="el_aportes_legales_archivo">
<span<?= $Page->archivo->viewAttributes() ?>>
<?= GetFileViewTag($Page->archivo, $Page->archivo->getViewValue(), false) ?>
</span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->fecha->Visible) { // fecha ?>
    <tr id="r_fecha"<?= $Page->fecha->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_aportes_legales_fecha"><?= $Page->fecha->caption() ?></span></td>
        <td data-name="fecha"<?= $Page->fecha->cellAttributes() ?>>
<span id="el_aportes_legales_fecha">
<span<?= $Page->fecha->viewAttributes() ?>>
<?= $Page->fecha->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <tr id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_aportes_legales_created_at"><?= $Page->created_at->caption() ?></span></td>
        <td data-name="created_at"<?= $Page->created_at->cellAttributes() ?>>
<span id="el_aportes_legales_created_at">
<span<?= $Page->created_at->viewAttributes() ?>>
<?= $Page->created_at->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
</form>
</main>
<?php
$Page->showPageFooter();
?>
<?php if (!$Page->isExport()) { ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
