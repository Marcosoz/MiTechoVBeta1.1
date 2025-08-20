<?php

namespace PHPMaker2025\project1;

// Page object
$AportesLegalesAdd = &$Page;
?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { aportes_legales: currentTable } });
var currentPageID = ew.PAGE_ID = "add";
var currentForm;
var faportes_legalesadd;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("faportes_legalesadd")
        .setPageId("add")

        // Add fields
        .setFields([
            ["cooperativa_id", [fields.cooperativa_id.visible && fields.cooperativa_id.required ? ew.Validators.required(fields.cooperativa_id.caption) : null, ew.Validators.integer], fields.cooperativa_id.isInvalid],
            ["concepto", [fields.concepto.visible && fields.concepto.required ? ew.Validators.required(fields.concepto.caption) : null], fields.concepto.isInvalid],
            ["monto", [fields.monto.visible && fields.monto.required ? ew.Validators.required(fields.monto.caption) : null, ew.Validators.float], fields.monto.isInvalid],
            ["archivo", [fields.archivo.visible && fields.archivo.required ? ew.Validators.fileRequired(fields.archivo.caption) : null], fields.archivo.isInvalid],
            ["fecha", [fields.fecha.visible && fields.fecha.required ? ew.Validators.required(fields.fecha.caption) : null, ew.Validators.datetime(fields.fecha.clientFormatPattern)], fields.fecha.isInvalid],
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
<form name="faportes_legalesadd" id="faportes_legalesadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="aportes_legales">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->getFormOldKeyName() ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->cooperativa_id->Visible) { // cooperativa_id ?>
    <div id="r_cooperativa_id"<?= $Page->cooperativa_id->rowAttributes() ?>>
        <label id="elh_aportes_legales_cooperativa_id" for="x_cooperativa_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->cooperativa_id->caption() ?><?= $Page->cooperativa_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->cooperativa_id->cellAttributes() ?>>
<span id="el_aportes_legales_cooperativa_id">
<input type="<?= $Page->cooperativa_id->getInputTextType() ?>" name="x_cooperativa_id" id="x_cooperativa_id" data-table="aportes_legales" data-field="x_cooperativa_id" value="<?= $Page->cooperativa_id->getEditValue() ?>" size="30" placeholder="<?= HtmlEncode($Page->cooperativa_id->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->cooperativa_id->formatPattern()) ?>"<?= $Page->cooperativa_id->editAttributes() ?> aria-describedby="x_cooperativa_id_help">
<?= $Page->cooperativa_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->cooperativa_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->concepto->Visible) { // concepto ?>
    <div id="r_concepto"<?= $Page->concepto->rowAttributes() ?>>
        <label id="elh_aportes_legales_concepto" for="x_concepto" class="<?= $Page->LeftColumnClass ?>"><?= $Page->concepto->caption() ?><?= $Page->concepto->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->concepto->cellAttributes() ?>>
<span id="el_aportes_legales_concepto">
<input type="<?= $Page->concepto->getInputTextType() ?>" name="x_concepto" id="x_concepto" data-table="aportes_legales" data-field="x_concepto" value="<?= $Page->concepto->getEditValue() ?>" size="30" maxlength="150" placeholder="<?= HtmlEncode($Page->concepto->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->concepto->formatPattern()) ?>"<?= $Page->concepto->editAttributes() ?> aria-describedby="x_concepto_help">
<?= $Page->concepto->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->concepto->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->monto->Visible) { // monto ?>
    <div id="r_monto"<?= $Page->monto->rowAttributes() ?>>
        <label id="elh_aportes_legales_monto" for="x_monto" class="<?= $Page->LeftColumnClass ?>"><?= $Page->monto->caption() ?><?= $Page->monto->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->monto->cellAttributes() ?>>
<span id="el_aportes_legales_monto">
<input type="<?= $Page->monto->getInputTextType() ?>" name="x_monto" id="x_monto" data-table="aportes_legales" data-field="x_monto" value="<?= $Page->monto->getEditValue() ?>" size="30" placeholder="<?= HtmlEncode($Page->monto->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->monto->formatPattern()) ?>"<?= $Page->monto->editAttributes() ?> aria-describedby="x_monto_help">
<?= $Page->monto->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->monto->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->archivo->Visible) { // archivo ?>
    <div id="r_archivo"<?= $Page->archivo->rowAttributes() ?>>
        <label id="elh_aportes_legales_archivo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->archivo->caption() ?><?= $Page->archivo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->archivo->cellAttributes() ?>>
<span id="el_aportes_legales_archivo">
<div id="fd_x_archivo" class="fileinput-button ew-file-drop-zone">
    <input
        type="file"
        id="x_archivo"
        name="x_archivo"
        class="form-control ew-file-input"
        title="<?= $Page->archivo->title() ?>"
        lang="<?= CurrentLanguageID() ?>"
        data-table="aportes_legales"
        data-field="x_archivo"
        data-size="65535"
        data-accept-file-types="<?= $Page->archivo->acceptFileTypes() ?>"
        data-max-file-size="<?= $Page->archivo->UploadMaxFileSize ?>"
        data-max-number-of-files="null"
        data-disable-image-crop="<?= $Page->archivo->ImageCropper ? 0 : 1 ?>"
        aria-describedby="x_archivo_help"
        <?= ($Page->archivo->ReadOnly || $Page->archivo->Disabled) ? " disabled" : "" ?>
        <?= $Page->archivo->editAttributes() ?>
    >
    <div class="text-body-secondary ew-file-text"><?= $Language->phrase("ChooseFile") ?></div>
    <?= $Page->archivo->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->archivo->getErrorMessage() ?></div>
</div>
<input type="hidden" name="fn_x_archivo" id= "fn_x_archivo" value="<?= $Page->archivo->Upload->FileName ?>">
<input type="hidden" name="fa_x_archivo" id= "fa_x_archivo" value="0">
<table id="ft_x_archivo" class="table table-sm float-start ew-upload-table"><tbody class="files"></tbody></table>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->fecha->Visible) { // fecha ?>
    <div id="r_fecha"<?= $Page->fecha->rowAttributes() ?>>
        <label id="elh_aportes_legales_fecha" for="x_fecha" class="<?= $Page->LeftColumnClass ?>"><?= $Page->fecha->caption() ?><?= $Page->fecha->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->fecha->cellAttributes() ?>>
<span id="el_aportes_legales_fecha">
<input type="<?= $Page->fecha->getInputTextType() ?>" name="x_fecha" id="x_fecha" data-table="aportes_legales" data-field="x_fecha" value="<?= $Page->fecha->getEditValue() ?>" placeholder="<?= HtmlEncode($Page->fecha->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->fecha->formatPattern()) ?>"<?= $Page->fecha->editAttributes() ?> aria-describedby="x_fecha_help">
<?= $Page->fecha->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->fecha->getErrorMessage() ?></div>
<?php if (!$Page->fecha->ReadOnly && !$Page->fecha->Disabled && !isset($Page->fecha->EditAttrs["readonly"]) && !isset($Page->fecha->EditAttrs["disabled"])) { ?>
<script<?= Nonce() ?>>
loadjs.ready(["faportes_legalesadd", "datetimepicker"], function () {
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
        "faportes_legalesadd",
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
        <label id="elh_aportes_legales_created_at" for="x_created_at" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created_at->caption() ?><?= $Page->created_at->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->created_at->cellAttributes() ?>>
<span id="el_aportes_legales_created_at">
<input type="<?= $Page->created_at->getInputTextType() ?>" name="x_created_at" id="x_created_at" data-table="aportes_legales" data-field="x_created_at" value="<?= $Page->created_at->getEditValue() ?>" placeholder="<?= HtmlEncode($Page->created_at->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->created_at->formatPattern()) ?>"<?= $Page->created_at->editAttributes() ?> aria-describedby="x_created_at_help">
<?= $Page->created_at->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created_at->getErrorMessage() ?></div>
<?php if (!$Page->created_at->ReadOnly && !$Page->created_at->Disabled && !isset($Page->created_at->EditAttrs["readonly"]) && !isset($Page->created_at->EditAttrs["disabled"])) { ?>
<script<?= Nonce() ?>>
loadjs.ready(["faportes_legalesadd", "datetimepicker"], function () {
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
        "faportes_legalesadd",
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
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="faportes_legalesadd"><?= $Language->phrase("AddBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="faportes_legalesadd" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("aportes_legales");
});
</script>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
