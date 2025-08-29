<?php

namespace PHPMaker2025\project260825TrabajosCreatedAT;

// Page object
$SociosEdit = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="edit">
<form name="fsociosedit" id="fsociosedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { socios: currentTable } });
var currentPageID = ew.PAGE_ID = "edit";
var currentForm;
var fsociosedit;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fsociosedit")
        .setPageId("edit")

        // Add fields
        .setFields([
            ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null, ew.Validators.integer], fields.id.isInvalid],
            ["cooperativa_id", [fields.cooperativa_id.visible && fields.cooperativa_id.required ? ew.Validators.required(fields.cooperativa_id.caption) : null], fields.cooperativa_id.isInvalid],
            ["nombre_completo", [fields.nombre_completo.visible && fields.nombre_completo.required ? ew.Validators.required(fields.nombre_completo.caption) : null], fields.nombre_completo.isInvalid],
            ["cedula", [fields.cedula.visible && fields.cedula.required ? ew.Validators.required(fields.cedula.caption) : null], fields.cedula.isInvalid],
            ["telefono", [fields.telefono.visible && fields.telefono.required ? ew.Validators.required(fields.telefono.caption) : null], fields.telefono.isInvalid],
            ["email", [fields.email.visible && fields.email.required ? ew.Validators.required(fields.email.caption) : null], fields.email.isInvalid],
            ["fecha_ingreso", [fields.fecha_ingreso.visible && fields.fecha_ingreso.required ? ew.Validators.required(fields.fecha_ingreso.caption) : null, ew.Validators.datetime(fields.fecha_ingreso.clientFormatPattern)], fields.fecha_ingreso.isInvalid],
            ["activo", [fields.activo.visible && fields.activo.required ? ew.Validators.required(fields.activo.caption) : null], fields.activo.isInvalid],
            ["created_at", [fields.created_at.visible && fields.created_at.required ? ew.Validators.required(fields.created_at.caption) : null], fields.created_at.isInvalid],
            ["contrasena", [fields.contrasena.visible && fields.contrasena.required ? ew.Validators.required(fields.contrasena.caption) : null], fields.contrasena.isInvalid],
            ["nivel_usuario", [fields.nivel_usuario.visible && fields.nivel_usuario.required ? ew.Validators.required(fields.nivel_usuario.caption) : null], fields.nivel_usuario.isInvalid],
            ["updated_at", [fields.updated_at.visible && fields.updated_at.required ? ew.Validators.required(fields.updated_at.caption) : null], fields.updated_at.isInvalid]
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
            "activo": <?= $Page->activo->toClientList($Page) ?>,
            "nivel_usuario": <?= $Page->nivel_usuario->toClientList($Page) ?>,
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
<input type="hidden" name="t" value="socios">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->getFormOldKeyName() ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id"<?= $Page->id->rowAttributes() ?>>
        <label id="elh_socios_id" for="x_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id->cellAttributes() ?>>
<span id="el_socios_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->getEditValue()))) ?>"></span>
<input type="hidden" data-table="socios" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->nombre_completo->Visible) { // nombre_completo ?>
    <div id="r_nombre_completo"<?= $Page->nombre_completo->rowAttributes() ?>>
        <label id="elh_socios_nombre_completo" for="x_nombre_completo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nombre_completo->caption() ?><?= $Page->nombre_completo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->nombre_completo->cellAttributes() ?>>
<span id="el_socios_nombre_completo">
<input type="<?= $Page->nombre_completo->getInputTextType() ?>" name="x_nombre_completo" id="x_nombre_completo" data-table="socios" data-field="x_nombre_completo" value="<?= $Page->nombre_completo->getEditValue() ?>" size="30" maxlength="150" placeholder="<?= HtmlEncode($Page->nombre_completo->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->nombre_completo->formatPattern()) ?>"<?= $Page->nombre_completo->editAttributes() ?> aria-describedby="x_nombre_completo_help">
<?= $Page->nombre_completo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->nombre_completo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->cedula->Visible) { // cedula ?>
    <div id="r_cedula"<?= $Page->cedula->rowAttributes() ?>>
        <label id="elh_socios_cedula" for="x_cedula" class="<?= $Page->LeftColumnClass ?>"><?= $Page->cedula->caption() ?><?= $Page->cedula->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->cedula->cellAttributes() ?>>
<span id="el_socios_cedula">
<input type="<?= $Page->cedula->getInputTextType() ?>" name="x_cedula" id="x_cedula" data-table="socios" data-field="x_cedula" value="<?= $Page->cedula->getEditValue() ?>" size="30" maxlength="20" placeholder="<?= HtmlEncode($Page->cedula->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->cedula->formatPattern()) ?>"<?= $Page->cedula->editAttributes() ?> aria-describedby="x_cedula_help">
<?= $Page->cedula->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->cedula->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->telefono->Visible) { // telefono ?>
    <div id="r_telefono"<?= $Page->telefono->rowAttributes() ?>>
        <label id="elh_socios_telefono" for="x_telefono" class="<?= $Page->LeftColumnClass ?>"><?= $Page->telefono->caption() ?><?= $Page->telefono->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->telefono->cellAttributes() ?>>
<span id="el_socios_telefono">
<input type="<?= $Page->telefono->getInputTextType() ?>" name="x_telefono" id="x_telefono" data-table="socios" data-field="x_telefono" value="<?= $Page->telefono->getEditValue() ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->telefono->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->telefono->formatPattern()) ?>"<?= $Page->telefono->editAttributes() ?> aria-describedby="x_telefono_help">
<?= $Page->telefono->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->telefono->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->email->Visible) { // email ?>
    <div id="r_email"<?= $Page->email->rowAttributes() ?>>
        <label id="elh_socios_email" for="x_email" class="<?= $Page->LeftColumnClass ?>"><?= $Page->email->caption() ?><?= $Page->email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->email->cellAttributes() ?>>
<span id="el_socios_email">
<input type="<?= $Page->email->getInputTextType() ?>" name="x_email" id="x_email" data-table="socios" data-field="x_email" value="<?= $Page->email->getEditValue() ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->email->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->email->formatPattern()) ?>"<?= $Page->email->editAttributes() ?> aria-describedby="x_email_help">
<?= $Page->email->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->email->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->fecha_ingreso->Visible) { // fecha_ingreso ?>
    <div id="r_fecha_ingreso"<?= $Page->fecha_ingreso->rowAttributes() ?>>
        <label id="elh_socios_fecha_ingreso" for="x_fecha_ingreso" class="<?= $Page->LeftColumnClass ?>"><?= $Page->fecha_ingreso->caption() ?><?= $Page->fecha_ingreso->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->fecha_ingreso->cellAttributes() ?>>
<span id="el_socios_fecha_ingreso">
<input type="<?= $Page->fecha_ingreso->getInputTextType() ?>" name="x_fecha_ingreso" id="x_fecha_ingreso" data-table="socios" data-field="x_fecha_ingreso" value="<?= $Page->fecha_ingreso->getEditValue() ?>" placeholder="<?= HtmlEncode($Page->fecha_ingreso->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->fecha_ingreso->formatPattern()) ?>"<?= $Page->fecha_ingreso->editAttributes() ?> aria-describedby="x_fecha_ingreso_help">
<?= $Page->fecha_ingreso->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->fecha_ingreso->getErrorMessage() ?></div>
<?php if (!$Page->fecha_ingreso->ReadOnly && !$Page->fecha_ingreso->Disabled && !isset($Page->fecha_ingreso->EditAttrs["readonly"]) && !isset($Page->fecha_ingreso->EditAttrs["disabled"])) { ?>
<script<?= Nonce() ?>>
loadjs.ready(["fsociosedit", "datetimepicker"], function () {
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
        "fsociosedit",
        "x_fecha_ingreso",
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
<?php if ($Page->activo->Visible) { // activo ?>
    <div id="r_activo"<?= $Page->activo->rowAttributes() ?>>
        <label id="elh_socios_activo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->activo->caption() ?><?= $Page->activo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->activo->cellAttributes() ?>>
<span id="el_socios_activo">
<div class="form-check d-inline-block">
    <input type="checkbox" class="form-check-input<?= $Page->activo->isInvalidClass() ?>" data-table="socios" data-field="x_activo" data-boolean name="x_activo" id="x_activo" value="1"<?= ConvertToBool($Page->activo->CurrentValue) ? " checked" : "" ?><?= $Page->activo->editAttributes() ?> aria-describedby="x_activo_help">
    <div class="invalid-feedback"><?= $Page->activo->getErrorMessage() ?></div>
</div>
<?= $Page->activo->getCustomMessage() ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->contrasena->Visible) { // contraseña ?>
    <div id="r_contrasena"<?= $Page->contrasena->rowAttributes() ?>>
        <label id="elh_socios_contrasena" for="x_contrasena" class="<?= $Page->LeftColumnClass ?>"><?= $Page->contrasena->caption() ?><?= $Page->contrasena->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->contrasena->cellAttributes() ?>>
<span id="el_socios_contrasena">
<div class="input-group">
    <input type="password" name="x_contrasena" id="x_contrasena" autocomplete="new-password" data-field="x_contrasena" value="<?= $Page->contrasena->getEditValue() ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->contrasena->getPlaceHolder()) ?>"<?= $Page->contrasena->editAttributes() ?> aria-describedby="x_contrasena_help">
    <button type="button" class="btn btn-default ew-toggle-password rounded-end" data-ew-action="password"><i class="fa-solid fa-eye"></i></button>
</div>
<?= $Page->contrasena->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->contrasena->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->nivel_usuario->Visible) { // nivel_usuario ?>
    <div id="r_nivel_usuario"<?= $Page->nivel_usuario->rowAttributes() ?>>
        <label id="elh_socios_nivel_usuario" for="x_nivel_usuario" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nivel_usuario->caption() ?><?= $Page->nivel_usuario->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->nivel_usuario->cellAttributes() ?>>
<?php if (!$Security->canAccess() && $Security->isLoggedIn()) { // No access permission ?>
<span id="el_socios_nivel_usuario">
<span class="form-control-plaintext"><?= $Page->nivel_usuario->getDisplayValue($Page->nivel_usuario->getEditValue()) ?></span>
</span>
<?php } else { ?>
<span id="el_socios_nivel_usuario">
    <select
        id="x_nivel_usuario"
        name="x_nivel_usuario"
        class="form-select ew-select<?= $Page->nivel_usuario->isInvalidClass() ?>"
        <?php if (!$Page->nivel_usuario->IsNativeSelect) { ?>
        data-select2-id="fsociosedit_x_nivel_usuario"
        <?php } ?>
        data-table="socios"
        data-field="x_nivel_usuario"
        data-value-separator="<?= $Page->nivel_usuario->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->nivel_usuario->getPlaceHolder()) ?>"
        <?= $Page->nivel_usuario->editAttributes() ?>>
        <?= $Page->nivel_usuario->selectOptionListHtml("x_nivel_usuario") ?>
    </select>
    <?= $Page->nivel_usuario->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->nivel_usuario->getErrorMessage() ?></div>
<?php if (!$Page->nivel_usuario->IsNativeSelect) { ?>
<script<?= Nonce() ?>>
loadjs.ready("fsociosedit", function() {
    var options = { name: "x_nivel_usuario", selectId: "fsociosedit_x_nivel_usuario" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fsociosedit.lists.nivel_usuario?.lookupOptions.length) {
        options.data = { id: "x_nivel_usuario", form: "fsociosedit" };
    } else {
        options.ajax = { id: "x_nivel_usuario", form: "fsociosedit", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.socios.fields.nivel_usuario.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
</span>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->updated_at->Visible) { // updated_at ?>
    <div id="r_updated_at"<?= $Page->updated_at->rowAttributes() ?>>
        <label id="elh_socios_updated_at" for="x_updated_at" class="<?= $Page->LeftColumnClass ?>"><?= $Page->updated_at->caption() ?><?= $Page->updated_at->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->updated_at->cellAttributes() ?>>
<span id="el_socios_updated_at">
<span<?= $Page->updated_at->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->updated_at->getDisplayValue($Page->updated_at->getEditValue()))) ?>"></span>
<input type="hidden" data-table="socios" data-field="x_updated_at" data-hidden="1" name="x_updated_at" id="x_updated_at" value="<?= HtmlEncode($Page->updated_at->CurrentValue) ?>">
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<span id="el_socios_cooperativa_id">
<input type="hidden" data-table="socios" data-field="x_cooperativa_id" data-hidden="1" name="x_cooperativa_id" id="x_cooperativa_id" value="<?= HtmlEncode($Page->cooperativa_id->CurrentValue) ?>">
</span>
<span id="el_socios_created_at">
<input type="hidden" data-table="socios" data-field="x_created_at" data-hidden="1" name="x_created_at" id="x_created_at" value="<?= HtmlEncode($Page->created_at->CurrentValue) ?>">
</span>
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fsociosedit"><?= $Language->phrase("SaveBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fsociosedit" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("socios");
});
</script>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
