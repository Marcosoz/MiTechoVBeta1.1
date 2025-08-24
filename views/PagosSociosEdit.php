<?php

namespace PHPMaker2025\project240825SeleccionarManualCoop;

// Page object
$PagosSociosEdit = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="edit">
<form name="fpagos_sociosedit" id="fpagos_sociosedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { pagos_socios: currentTable } });
var currentPageID = ew.PAGE_ID = "edit";
var currentForm;
var fpagos_sociosedit;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fpagos_sociosedit")
        .setPageId("edit")

        // Add fields
        .setFields([
            ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
            ["cooperativa_id", [fields.cooperativa_id.visible && fields.cooperativa_id.required ? ew.Validators.required(fields.cooperativa_id.caption) : null], fields.cooperativa_id.isInvalid],
            ["socio_id", [fields.socio_id.visible && fields.socio_id.required ? ew.Validators.required(fields.socio_id.caption) : null, ew.Validators.integer], fields.socio_id.isInvalid],
            ["monto", [fields.monto.visible && fields.monto.required ? ew.Validators.required(fields.monto.caption) : null, ew.Validators.float], fields.monto.isInvalid],
            ["concepto", [fields.concepto.visible && fields.concepto.required ? ew.Validators.required(fields.concepto.caption) : null], fields.concepto.isInvalid],
            ["fecha", [fields.fecha.visible && fields.fecha.required ? ew.Validators.required(fields.fecha.caption) : null, ew.Validators.datetime(fields.fecha.clientFormatPattern)], fields.fecha.isInvalid],
            ["comprobante", [fields.comprobante.visible && fields.comprobante.required ? ew.Validators.fileRequired(fields.comprobante.caption) : null], fields.comprobante.isInvalid],
            ["created_at", [fields.created_at.visible && fields.created_at.required ? ew.Validators.required(fields.created_at.caption) : null, ew.Validators.datetime(fields.created_at.clientFormatPattern)], fields.created_at.isInvalid]
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
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pagos_socios">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->getFormOldKeyName() ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id"<?= $Page->id->rowAttributes() ?>>
        <label id="elh_pagos_socios_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id->cellAttributes() ?>>
<span id="el_pagos_socios_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->getEditValue()))) ?>"></span>
<input type="hidden" data-table="pagos_socios" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->cooperativa_id->Visible) { // cooperativa_id ?>
    <div id="r_cooperativa_id"<?= $Page->cooperativa_id->rowAttributes() ?>>
        <label id="elh_pagos_socios_cooperativa_id" for="x_cooperativa_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->cooperativa_id->caption() ?><?= $Page->cooperativa_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->cooperativa_id->cellAttributes() ?>>
<?php if (!$Security->canAccess() && $Security->isLoggedIn() && !$Page->userIDAllow("edit")) { // No access permission ?>
<span<?= $Page->cooperativa_id->viewAttributes() ?>>
<span class="form-control-plaintext"><?= $Page->cooperativa_id->getDisplayValue($Page->cooperativa_id->getEditValue()) ?></span></span>
<input type="hidden" data-table="pagos_socios" data-field="x_cooperativa_id" data-hidden="1" name="x_cooperativa_id" id="x_cooperativa_id" value="<?= HtmlEncode($Page->cooperativa_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_pagos_socios_cooperativa_id">
    <select
        id="x_cooperativa_id"
        name="x_cooperativa_id"
        class="form-select ew-select<?= $Page->cooperativa_id->isInvalidClass() ?>"
        <?php if (!$Page->cooperativa_id->IsNativeSelect) { ?>
        data-select2-id="fpagos_sociosedit_x_cooperativa_id"
        <?php } ?>
        data-table="pagos_socios"
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
loadjs.ready("fpagos_sociosedit", function() {
    var options = { name: "x_cooperativa_id", selectId: "fpagos_sociosedit_x_cooperativa_id" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fpagos_sociosedit.lists.cooperativa_id?.lookupOptions.length) {
        options.data = { id: "x_cooperativa_id", form: "fpagos_sociosedit" };
    } else {
        options.ajax = { id: "x_cooperativa_id", form: "fpagos_sociosedit", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.pagos_socios.fields.cooperativa_id.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
</span>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->socio_id->Visible) { // socio_id ?>
    <div id="r_socio_id"<?= $Page->socio_id->rowAttributes() ?>>
        <label id="elh_pagos_socios_socio_id" for="x_socio_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->socio_id->caption() ?><?= $Page->socio_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->socio_id->cellAttributes() ?>>
<span id="el_pagos_socios_socio_id">
<input type="<?= $Page->socio_id->getInputTextType() ?>" name="x_socio_id" id="x_socio_id" data-table="pagos_socios" data-field="x_socio_id" value="<?= $Page->socio_id->getEditValue() ?>" size="30" placeholder="<?= HtmlEncode($Page->socio_id->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->socio_id->formatPattern()) ?>"<?= $Page->socio_id->editAttributes() ?> aria-describedby="x_socio_id_help">
<?= $Page->socio_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->socio_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->monto->Visible) { // monto ?>
    <div id="r_monto"<?= $Page->monto->rowAttributes() ?>>
        <label id="elh_pagos_socios_monto" for="x_monto" class="<?= $Page->LeftColumnClass ?>"><?= $Page->monto->caption() ?><?= $Page->monto->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->monto->cellAttributes() ?>>
<span id="el_pagos_socios_monto">
<input type="<?= $Page->monto->getInputTextType() ?>" name="x_monto" id="x_monto" data-table="pagos_socios" data-field="x_monto" value="<?= $Page->monto->getEditValue() ?>" size="30" placeholder="<?= HtmlEncode($Page->monto->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->monto->formatPattern()) ?>"<?= $Page->monto->editAttributes() ?> aria-describedby="x_monto_help">
<?= $Page->monto->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->monto->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->concepto->Visible) { // concepto ?>
    <div id="r_concepto"<?= $Page->concepto->rowAttributes() ?>>
        <label id="elh_pagos_socios_concepto" for="x_concepto" class="<?= $Page->LeftColumnClass ?>"><?= $Page->concepto->caption() ?><?= $Page->concepto->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->concepto->cellAttributes() ?>>
<span id="el_pagos_socios_concepto">
<input type="<?= $Page->concepto->getInputTextType() ?>" name="x_concepto" id="x_concepto" data-table="pagos_socios" data-field="x_concepto" value="<?= $Page->concepto->getEditValue() ?>" size="30" maxlength="65535" placeholder="<?= HtmlEncode($Page->concepto->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->concepto->formatPattern()) ?>"<?= $Page->concepto->editAttributes() ?> aria-describedby="x_concepto_help">
<?= $Page->concepto->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->concepto->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->fecha->Visible) { // fecha ?>
    <div id="r_fecha"<?= $Page->fecha->rowAttributes() ?>>
        <label id="elh_pagos_socios_fecha" for="x_fecha" class="<?= $Page->LeftColumnClass ?>"><?= $Page->fecha->caption() ?><?= $Page->fecha->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->fecha->cellAttributes() ?>>
<span id="el_pagos_socios_fecha">
<input type="<?= $Page->fecha->getInputTextType() ?>" name="x_fecha" id="x_fecha" data-table="pagos_socios" data-field="x_fecha" value="<?= $Page->fecha->getEditValue() ?>" placeholder="<?= HtmlEncode($Page->fecha->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->fecha->formatPattern()) ?>"<?= $Page->fecha->editAttributes() ?> aria-describedby="x_fecha_help">
<?= $Page->fecha->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->fecha->getErrorMessage() ?></div>
<?php if (!$Page->fecha->ReadOnly && !$Page->fecha->Disabled && !isset($Page->fecha->EditAttrs["readonly"]) && !isset($Page->fecha->EditAttrs["disabled"])) { ?>
<script<?= Nonce() ?>>
loadjs.ready(["fpagos_sociosedit", "datetimepicker"], function () {
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
        "fpagos_sociosedit",
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
<?php if ($Page->comprobante->Visible) { // comprobante ?>
    <div id="r_comprobante"<?= $Page->comprobante->rowAttributes() ?>>
        <label id="elh_pagos_socios_comprobante" class="<?= $Page->LeftColumnClass ?>"><?= $Page->comprobante->caption() ?><?= $Page->comprobante->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->comprobante->cellAttributes() ?>>
<span id="el_pagos_socios_comprobante">
<div id="fd_x_comprobante" class="fileinput-button ew-file-drop-zone">
    <input
        type="file"
        id="x_comprobante"
        name="x_comprobante"
        class="form-control ew-file-input"
        title="<?= $Page->comprobante->title() ?>"
        lang="<?= CurrentLanguageID() ?>"
        data-table="pagos_socios"
        data-field="x_comprobante"
        data-size="65535"
        data-accept-file-types="<?= $Page->comprobante->acceptFileTypes() ?>"
        data-max-file-size="<?= $Page->comprobante->UploadMaxFileSize ?>"
        data-max-number-of-files="null"
        data-disable-image-crop="<?= $Page->comprobante->ImageCropper ? 0 : 1 ?>"
        aria-describedby="x_comprobante_help"
        <?= ($Page->comprobante->ReadOnly || $Page->comprobante->Disabled) ? " disabled" : "" ?>
        <?= $Page->comprobante->editAttributes() ?>
    >
    <div class="text-body-secondary ew-file-text"><?= $Language->phrase("ChooseFile") ?></div>
    <?= $Page->comprobante->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->comprobante->getErrorMessage() ?></div>
</div>
<input type="hidden" name="fn_x_comprobante" id= "fn_x_comprobante" value="<?= $Page->comprobante->Upload->FileName ?>">
<input type="hidden" name="fa_x_comprobante" id= "fa_x_comprobante" value="<?= (Post("fa_x_comprobante") == "0") ? "0" : "1" ?>">
<table id="ft_x_comprobante" class="table table-sm float-start ew-upload-table"><tbody class="files"></tbody></table>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <div id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <label id="elh_pagos_socios_created_at" for="x_created_at" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created_at->caption() ?><?= $Page->created_at->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->created_at->cellAttributes() ?>>
<span id="el_pagos_socios_created_at">
<input type="<?= $Page->created_at->getInputTextType() ?>" name="x_created_at" id="x_created_at" data-table="pagos_socios" data-field="x_created_at" value="<?= $Page->created_at->getEditValue() ?>" placeholder="<?= HtmlEncode($Page->created_at->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->created_at->formatPattern()) ?>"<?= $Page->created_at->editAttributes() ?> aria-describedby="x_created_at_help">
<?= $Page->created_at->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created_at->getErrorMessage() ?></div>
<?php if (!$Page->created_at->ReadOnly && !$Page->created_at->Disabled && !isset($Page->created_at->EditAttrs["readonly"]) && !isset($Page->created_at->EditAttrs["disabled"])) { ?>
<script<?= Nonce() ?>>
loadjs.ready(["fpagos_sociosedit", "datetimepicker"], function () {
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
        "fpagos_sociosedit",
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
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fpagos_sociosedit"><?= $Language->phrase("SaveBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fpagos_sociosedit" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
<?php } ?>
    </div><!-- /buttons offset -->
<?= $Page->IsModal ? "</template>" : "</div>" ?><!-- /buttons .row -->
</form>
</main>
<?php
$Page->showPageFooter();
?>
<script<?= Nonce() ?>>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("pagos_socios");
});
</script>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
