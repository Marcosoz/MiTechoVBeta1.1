<?php

namespace PHPMaker2025\project260825TrabajosCreatedAT;

// Page object
$MovimientosStockAdd = &$Page;
?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { movimientos_stock: currentTable } });
var currentPageID = ew.PAGE_ID = "add";
var currentForm;
var fmovimientos_stockadd;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fmovimientos_stockadd")
        .setPageId("add")

        // Add fields
        .setFields([
            ["cooperativa_id", [fields.cooperativa_id.visible && fields.cooperativa_id.required ? ew.Validators.required(fields.cooperativa_id.caption) : null], fields.cooperativa_id.isInvalid],
            ["tipo_movimiento", [fields.tipo_movimiento.visible && fields.tipo_movimiento.required ? ew.Validators.required(fields.tipo_movimiento.caption) : null], fields.tipo_movimiento.isInvalid],
            ["cantidad", [fields.cantidad.visible && fields.cantidad.required ? ew.Validators.required(fields.cantidad.caption) : null, ew.Validators.float], fields.cantidad.isInvalid],
            ["motivo", [fields.motivo.visible && fields.motivo.required ? ew.Validators.required(fields.motivo.caption) : null], fields.motivo.isInvalid],
            ["fecha", [fields.fecha.visible && fields.fecha.required ? ew.Validators.required(fields.fecha.caption) : null, ew.Validators.datetime(fields.fecha.clientFormatPattern)], fields.fecha.isInvalid],
            ["created_at", [fields.created_at.visible && fields.created_at.required ? ew.Validators.required(fields.created_at.caption) : null, ew.Validators.datetime(fields.created_at.clientFormatPattern)], fields.created_at.isInvalid],
            ["updated_at", [fields.updated_at.visible && fields.updated_at.required ? ew.Validators.required(fields.updated_at.caption) : null, ew.Validators.datetime(fields.updated_at.clientFormatPattern)], fields.updated_at.isInvalid]
        ])

        // Form_CustomValidate
        .setCustomValidate(
            function (fobj) { // DO NOT CHANGE THIS LINE! (except for adding "async" keyword)
                    // Your custom validation code in JAVASCRIPT here, return false if invalid.
                    return true;
                }
        )

        // Use JavaScript validation or not
        .setValidateRequired(ew.CLIENT_VALIDATE)

        // Dynamic selection lists
        .setLists({
            "cooperativa_id": <?= $Page->cooperativa_id->toClientList($Page) ?>,
            "tipo_movimiento": <?= $Page->tipo_movimiento->toClientList($Page) ?>,
        })
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
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fmovimientos_stockadd" id="fmovimientos_stockadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="movimientos_stock">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->getFormOldKeyName() ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->cooperativa_id->Visible) { // cooperativa_id ?>
    <div id="r_cooperativa_id"<?= $Page->cooperativa_id->rowAttributes() ?>>
        <label id="elh_movimientos_stock_cooperativa_id" for="x_cooperativa_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->cooperativa_id->caption() ?><?= $Page->cooperativa_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->cooperativa_id->cellAttributes() ?>>
<span id="el_movimientos_stock_cooperativa_id">
    <select
        id="x_cooperativa_id"
        name="x_cooperativa_id"
        class="form-select ew-select<?= $Page->cooperativa_id->isInvalidClass() ?>"
        <?php if (!$Page->cooperativa_id->IsNativeSelect) { ?>
        data-select2-id="fmovimientos_stockadd_x_cooperativa_id"
        <?php } ?>
        data-table="movimientos_stock"
        data-field="x_cooperativa_id"
        data-value-separator="<?= $Page->cooperativa_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->cooperativa_id->getPlaceHolder()) ?>"
        <?= $Page->cooperativa_id->editAttributes() ?>>
        <?= $Page->cooperativa_id->selectOptionListHtml("x_cooperativa_id") ?>
    </select>
    <?= $Page->cooperativa_id->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->cooperativa_id->getErrorMessage() ?></div>
<?= $Page->cooperativa_id->Lookup->getParamTag($Page, "p_x_cooperativa_id") ?>
<?php if (!$Page->cooperativa_id->IsNativeSelect) { ?>
<script<?= Nonce() ?>>
loadjs.ready("fmovimientos_stockadd", function() {
    var options = { name: "x_cooperativa_id", selectId: "fmovimientos_stockadd_x_cooperativa_id" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fmovimientos_stockadd.lists.cooperativa_id?.lookupOptions.length) {
        options.data = { id: "x_cooperativa_id", form: "fmovimientos_stockadd" };
    } else {
        options.ajax = { id: "x_cooperativa_id", form: "fmovimientos_stockadd", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.movimientos_stock.fields.cooperativa_id.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->tipo_movimiento->Visible) { // tipo_movimiento ?>
    <div id="r_tipo_movimiento"<?= $Page->tipo_movimiento->rowAttributes() ?>>
        <label id="elh_movimientos_stock_tipo_movimiento" class="<?= $Page->LeftColumnClass ?>"><?= $Page->tipo_movimiento->caption() ?><?= $Page->tipo_movimiento->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->tipo_movimiento->cellAttributes() ?>>
<span id="el_movimientos_stock_tipo_movimiento">
<template id="tp_x_tipo_movimiento">
    <div class="form-check">
        <input type="radio" class="form-check-input" data-table="movimientos_stock" data-field="x_tipo_movimiento" name="x_tipo_movimiento" id="x_tipo_movimiento"<?= $Page->tipo_movimiento->editAttributes() ?>>
        <label class="form-check-label"></label>
    </div>
</template>
<div id="dsl_x_tipo_movimiento" class="ew-item-list"></div>
<selection-list hidden
    id="x_tipo_movimiento"
    name="x_tipo_movimiento"
    value="<?= HtmlEncode($Page->tipo_movimiento->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_tipo_movimiento"
    data-target="dsl_x_tipo_movimiento"
    data-repeatcolumn="5"
    class="form-control<?= $Page->tipo_movimiento->isInvalidClass() ?>"
    data-table="movimientos_stock"
    data-field="x_tipo_movimiento"
    data-value-separator="<?= $Page->tipo_movimiento->displayValueSeparatorAttribute() ?>"
    <?= $Page->tipo_movimiento->editAttributes() ?>></selection-list>
<?= $Page->tipo_movimiento->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->tipo_movimiento->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->cantidad->Visible) { // cantidad ?>
    <div id="r_cantidad"<?= $Page->cantidad->rowAttributes() ?>>
        <label id="elh_movimientos_stock_cantidad" for="x_cantidad" class="<?= $Page->LeftColumnClass ?>"><?= $Page->cantidad->caption() ?><?= $Page->cantidad->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->cantidad->cellAttributes() ?>>
<span id="el_movimientos_stock_cantidad">
<input type="<?= $Page->cantidad->getInputTextType() ?>" name="x_cantidad" id="x_cantidad" data-table="movimientos_stock" data-field="x_cantidad" value="<?= $Page->cantidad->getEditValue() ?>" size="30" placeholder="<?= HtmlEncode($Page->cantidad->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->cantidad->formatPattern()) ?>"<?= $Page->cantidad->editAttributes() ?> aria-describedby="x_cantidad_help">
<?= $Page->cantidad->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->cantidad->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->motivo->Visible) { // motivo ?>
    <div id="r_motivo"<?= $Page->motivo->rowAttributes() ?>>
        <label id="elh_movimientos_stock_motivo" for="x_motivo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->motivo->caption() ?><?= $Page->motivo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->motivo->cellAttributes() ?>>
<span id="el_movimientos_stock_motivo">
<input type="<?= $Page->motivo->getInputTextType() ?>" name="x_motivo" id="x_motivo" data-table="movimientos_stock" data-field="x_motivo" value="<?= $Page->motivo->getEditValue() ?>" size="30" maxlength="65535" placeholder="<?= HtmlEncode($Page->motivo->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->motivo->formatPattern()) ?>"<?= $Page->motivo->editAttributes() ?> aria-describedby="x_motivo_help">
<?= $Page->motivo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->motivo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->fecha->Visible) { // fecha ?>
    <div id="r_fecha"<?= $Page->fecha->rowAttributes() ?>>
        <label id="elh_movimientos_stock_fecha" for="x_fecha" class="<?= $Page->LeftColumnClass ?>"><?= $Page->fecha->caption() ?><?= $Page->fecha->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->fecha->cellAttributes() ?>>
<span id="el_movimientos_stock_fecha">
<input type="<?= $Page->fecha->getInputTextType() ?>" name="x_fecha" id="x_fecha" data-table="movimientos_stock" data-field="x_fecha" value="<?= $Page->fecha->getEditValue() ?>" placeholder="<?= HtmlEncode($Page->fecha->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->fecha->formatPattern()) ?>"<?= $Page->fecha->editAttributes() ?> aria-describedby="x_fecha_help">
<?= $Page->fecha->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->fecha->getErrorMessage() ?></div>
<?php if (!$Page->fecha->ReadOnly && !$Page->fecha->Disabled && !isset($Page->fecha->EditAttrs["readonly"]) && !isset($Page->fecha->EditAttrs["disabled"])) { ?>
<script<?= Nonce() ?>>
loadjs.ready(["fmovimientos_stockadd", "datetimepicker"], function () {
    let format = "<?= DateFormat(0) ?>",
        options = {
            localization: {
                locale: ew.LANGUAGE_ID + "-u-nu-" + ew.getNumberingSystem(),
                hourCycle: format.match(/H/) ? "h24" : "h12",
                format,
                ...ew.language.phrase("datetimepicker")
            },
            display: {
                icons: {
                    previous: ew.IS_RTL ? "fa-solid fa-chevron-right" : "fa-solid fa-chevron-left",
                    next: ew.IS_RTL ? "fa-solid fa-chevron-left" : "fa-solid fa-chevron-right"
                },
                components: {
                    clock: !!format.match(/h/i) || !!format.match(/m/) || !!format.match(/s/i),
                    hours: !!format.match(/h/i),
                    minutes: !!format.match(/m/),
                    seconds: !!format.match(/s/i)
                },
                theme: ew.getPreferredTheme()
            }
        };
    ew.createDateTimePicker(
        "fmovimientos_stockadd",
        "x_fecha",
        ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options),
        {"inputGroup":true}
    );
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <div id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <label id="elh_movimientos_stock_created_at" for="x_created_at" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created_at->caption() ?><?= $Page->created_at->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->created_at->cellAttributes() ?>>
<span id="el_movimientos_stock_created_at">
<input type="<?= $Page->created_at->getInputTextType() ?>" name="x_created_at" id="x_created_at" data-table="movimientos_stock" data-field="x_created_at" value="<?= $Page->created_at->getEditValue() ?>" placeholder="<?= HtmlEncode($Page->created_at->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->created_at->formatPattern()) ?>"<?= $Page->created_at->editAttributes() ?> aria-describedby="x_created_at_help">
<?= $Page->created_at->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created_at->getErrorMessage() ?></div>
<?php if (!$Page->created_at->ReadOnly && !$Page->created_at->Disabled && !isset($Page->created_at->EditAttrs["readonly"]) && !isset($Page->created_at->EditAttrs["disabled"])) { ?>
<script<?= Nonce() ?>>
loadjs.ready(["fmovimientos_stockadd", "datetimepicker"], function () {
    let format = "<?= DateFormat(0) ?>",
        options = {
            localization: {
                locale: ew.LANGUAGE_ID + "-u-nu-" + ew.getNumberingSystem(),
                hourCycle: format.match(/H/) ? "h24" : "h12",
                format,
                ...ew.language.phrase("datetimepicker")
            },
            display: {
                icons: {
                    previous: ew.IS_RTL ? "fa-solid fa-chevron-right" : "fa-solid fa-chevron-left",
                    next: ew.IS_RTL ? "fa-solid fa-chevron-left" : "fa-solid fa-chevron-right"
                },
                components: {
                    clock: !!format.match(/h/i) || !!format.match(/m/) || !!format.match(/s/i),
                    hours: !!format.match(/h/i),
                    minutes: !!format.match(/m/),
                    seconds: !!format.match(/s/i)
                },
                theme: ew.getPreferredTheme()
            }
        };
    ew.createDateTimePicker(
        "fmovimientos_stockadd",
        "x_created_at",
        ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options),
        {"inputGroup":true}
    );
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->updated_at->Visible) { // updated_at ?>
    <div id="r_updated_at"<?= $Page->updated_at->rowAttributes() ?>>
        <label id="elh_movimientos_stock_updated_at" for="x_updated_at" class="<?= $Page->LeftColumnClass ?>"><?= $Page->updated_at->caption() ?><?= $Page->updated_at->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->updated_at->cellAttributes() ?>>
<span id="el_movimientos_stock_updated_at">
<input type="<?= $Page->updated_at->getInputTextType() ?>" name="x_updated_at" id="x_updated_at" data-table="movimientos_stock" data-field="x_updated_at" value="<?= $Page->updated_at->getEditValue() ?>" placeholder="<?= HtmlEncode($Page->updated_at->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->updated_at->formatPattern()) ?>"<?= $Page->updated_at->editAttributes() ?> aria-describedby="x_updated_at_help">
<?= $Page->updated_at->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->updated_at->getErrorMessage() ?></div>
<?php if (!$Page->updated_at->ReadOnly && !$Page->updated_at->Disabled && !isset($Page->updated_at->EditAttrs["readonly"]) && !isset($Page->updated_at->EditAttrs["disabled"])) { ?>
<script<?= Nonce() ?>>
loadjs.ready(["fmovimientos_stockadd", "datetimepicker"], function () {
    let format = "<?= DateFormat(0) ?>",
        options = {
            localization: {
                locale: ew.LANGUAGE_ID + "-u-nu-" + ew.getNumberingSystem(),
                hourCycle: format.match(/H/) ? "h24" : "h12",
                format,
                ...ew.language.phrase("datetimepicker")
            },
            display: {
                icons: {
                    previous: ew.IS_RTL ? "fa-solid fa-chevron-right" : "fa-solid fa-chevron-left",
                    next: ew.IS_RTL ? "fa-solid fa-chevron-left" : "fa-solid fa-chevron-right"
                },
                components: {
                    clock: !!format.match(/h/i) || !!format.match(/m/) || !!format.match(/s/i),
                    hours: !!format.match(/h/i),
                    minutes: !!format.match(/m/),
                    seconds: !!format.match(/s/i)
                },
                theme: ew.getPreferredTheme()
            }
        };
    ew.createDateTimePicker(
        "fmovimientos_stockadd",
        "x_updated_at",
        ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options),
        {"inputGroup":true,"minDateField":null,"maxDateField":null}
    );
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fmovimientos_stockadd"><?= $Language->phrase("AddBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fmovimientos_stockadd" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
<?php } ?>
    </div><!-- /buttons offset -->
<?= $Page->IsModal ? "</template>" : "</div>" ?><!-- /buttons .row -->
</form>
<?php
$Page->showPageFooter();
?>
<script<?= Nonce() ?>>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("movimientos_stock");
});
</script>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
