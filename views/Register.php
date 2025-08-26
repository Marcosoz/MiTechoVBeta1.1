<?php

namespace PHPMaker2025\project250825NoRepiteCIniEmailEnNuevosIngresos;

// Page object
$Register = &$Page;
?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { socios: currentTable } });
var currentPageID = ew.PAGE_ID = "register";
var currentForm;
var fregister;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fregister")
        .setPageId("register")

        // Add fields
        .setFields([
            ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null, ew.Validators.integer], fields.id.isInvalid],
            ["cooperativa_id", [fields.cooperativa_id.visible && fields.cooperativa_id.required ? ew.Validators.required(fields.cooperativa_id.caption) : null], fields.cooperativa_id.isInvalid],
            ["nombre_completo", [fields.nombre_completo.visible && fields.nombre_completo.required ? ew.Validators.required(fields.nombre_completo.caption) : null], fields.nombre_completo.isInvalid],
            ["cedula", [fields.cedula.visible && fields.cedula.required ? ew.Validators.required(fields.cedula.caption) : null, ew.Validators.username(fields.cedula.raw)], fields.cedula.isInvalid],
            ["email", [fields.email.visible && fields.email.required ? ew.Validators.required(fields.email.caption) : null], fields.email.isInvalid],
            ["c_contrasena", [ew.Validators.required(ew.language.phrase("ConfirmPassword")), ew.Validators.mismatchPassword], fields.contrasena.isInvalid],
            ["contrasena", [fields.contrasena.visible && fields.contrasena.required ? ew.Validators.required(fields.contrasena.caption) : null, ew.Validators.password(fields.contrasena.raw)], fields.contrasena.isInvalid]
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
    // Write your client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fregister" id="fregister" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="t" value="socios">
<?php if ($Page->isConfirm()) { // Confirm page ?>
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="confirm" id="confirm" value="confirm">
<?php } else { ?>
<input type="hidden" name="action" id="action" value="confirm">
<?php } ?>
<div class="ew-register-div"><!-- page* -->
<?php if ($Page->cooperativa_id->Visible) { // cooperativa_id ?>
    <div id="r_cooperativa_id"<?= $Page->cooperativa_id->rowAttributes() ?>>
        <label id="elh_socios_cooperativa_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->cooperativa_id->caption() ?><?= $Page->cooperativa_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->cooperativa_id->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<span id="el_socios_cooperativa_id">
<input type="hidden" data-table="socios" data-field="x_cooperativa_id" data-hidden="1" name="x_cooperativa_id" id="x_cooperativa_id" value="<?= HtmlEncode($Page->cooperativa_id->CurrentValue) ?>">
</span>
<?php } else { ?>
<span id="el_socios_cooperativa_id">
<input type="hidden" data-table="socios" data-field="x_cooperativa_id" data-hidden="1" name="x_cooperativa_id" id="x_cooperativa_id" value="<?= HtmlEncode($Page->cooperativa_id->FormValue) ?>">
</span>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->nombre_completo->Visible) { // nombre_completo ?>
    <div id="r_nombre_completo"<?= $Page->nombre_completo->rowAttributes() ?>>
        <label id="elh_socios_nombre_completo" for="x_nombre_completo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nombre_completo->caption() ?><?= $Page->nombre_completo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->nombre_completo->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<span id="el_socios_nombre_completo">
<input type="<?= $Page->nombre_completo->getInputTextType() ?>" name="x_nombre_completo" id="x_nombre_completo" data-table="socios" data-field="x_nombre_completo" value="<?= $Page->nombre_completo->getEditValue() ?>" size="30" maxlength="150" placeholder="<?= HtmlEncode($Page->nombre_completo->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->nombre_completo->formatPattern()) ?>"<?= $Page->nombre_completo->editAttributes() ?> aria-describedby="x_nombre_completo_help">
<?= $Page->nombre_completo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->nombre_completo->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el_socios_nombre_completo">
<span<?= $Page->nombre_completo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->nombre_completo->getDisplayValue($Page->nombre_completo->ViewValue))) ?>"></span>
<input type="hidden" data-table="socios" data-field="x_nombre_completo" data-hidden="1" name="x_nombre_completo" id="x_nombre_completo" value="<?= HtmlEncode($Page->nombre_completo->FormValue) ?>">
</span>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->cedula->Visible) { // cedula ?>
    <div id="r_cedula"<?= $Page->cedula->rowAttributes() ?>>
        <label id="elh_socios_cedula" for="x_cedula" class="<?= $Page->LeftColumnClass ?>"><?= $Page->cedula->caption() ?><?= $Page->cedula->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->cedula->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<span id="el_socios_cedula">
<input type="<?= $Page->cedula->getInputTextType() ?>" name="x_cedula" id="x_cedula" data-table="socios" data-field="x_cedula" value="<?= $Page->cedula->getEditValue() ?>" size="30" maxlength="20" placeholder="<?= HtmlEncode($Page->cedula->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->cedula->formatPattern()) ?>"<?= $Page->cedula->editAttributes() ?> aria-describedby="x_cedula_help">
<?= $Page->cedula->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->cedula->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el_socios_cedula">
<span<?= $Page->cedula->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->cedula->getDisplayValue($Page->cedula->ViewValue))) ?>"></span>
<input type="hidden" data-table="socios" data-field="x_cedula" data-hidden="1" name="x_cedula" id="x_cedula" value="<?= HtmlEncode($Page->cedula->FormValue) ?>">
</span>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->email->Visible) { // email ?>
    <div id="r_email"<?= $Page->email->rowAttributes() ?>>
        <label id="elh_socios_email" for="x_email" class="<?= $Page->LeftColumnClass ?>"><?= $Page->email->caption() ?><?= $Page->email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->email->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<span id="el_socios_email">
<input type="<?= $Page->email->getInputTextType() ?>" name="x_email" id="x_email" data-table="socios" data-field="x_email" value="<?= $Page->email->getEditValue() ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->email->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->email->formatPattern()) ?>"<?= $Page->email->editAttributes() ?> aria-describedby="x_email_help">
<?= $Page->email->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->email->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el_socios_email">
<span<?= $Page->email->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->email->getDisplayValue($Page->email->ViewValue))) ?>"></span>
<input type="hidden" data-table="socios" data-field="x_email" data-hidden="1" name="x_email" id="x_email" value="<?= HtmlEncode($Page->email->FormValue) ?>">
</span>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->contrasena->Visible) { // contraseña ?>
    <div id="r_contrasena"<?= $Page->contrasena->rowAttributes() ?>>
        <label id="elh_socios_contrasena" for="x_contrasena" class="<?= $Page->LeftColumnClass ?>"><?= $Page->contrasena->caption() ?><?= $Page->contrasena->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->contrasena->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<span id="el_socios_contrasena">
<div class="input-group">
    <input type="password" name="x_contrasena" id="x_contrasena" autocomplete="new-password" data-field="x_contrasena" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->contrasena->getPlaceHolder()) ?>"<?= $Page->contrasena->editAttributes() ?> aria-describedby="x_contrasena_help">
    <button type="button" class="btn btn-default ew-toggle-password rounded-end" data-ew-action="password"><i class="fa-solid fa-eye"></i></button>
</div>
<?= $Page->contrasena->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->contrasena->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el_socios_contrasena">
<span<?= $Page->contrasena->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->contrasena->getDisplayValue($Page->contrasena->ViewValue))) ?>"></span>
<input type="hidden" data-table="socios" data-field="x_contrasena" data-hidden="1" name="x_contrasena" id="x_contrasena" value="<?= HtmlEncode($Page->contrasena->FormValue) ?>">
</span>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->contrasena->Visible) { // contraseña ?>
    <div id="r_c_contrasena" class="row">
        <label id="elh_c_socios_contrasena" for="c_contrasena" class="<?= $Page->LeftColumnClass ?>"><?= $Language->phrase("Confirm") ?> <?= $Page->contrasena->caption() ?><?= $Page->contrasena->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->contrasena->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<span id="el_c_socios_contrasena">
<div class="input-group">
    <input type="password" name="c_contrasena" id="c_contrasena" autocomplete="new-password" data-field="c_contrasena" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->contrasena->getPlaceHolder()) ?>"<?= $Page->contrasena->editAttributes() ?> aria-describedby="x_contrasena_help">
    <button type="button" class="btn btn-default ew-toggle-password rounded-end" data-ew-action="password"><i class="fa-solid fa-eye"></i></button>
</div>
<?= $Page->contrasena->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->contrasena->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el_c_socios_contrasena">
<span<?= $Page->contrasena->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->contrasena->getDisplayValue($Page->contrasena->ViewValue))) ?>"></span>
<input type="hidden" data-table="socios" data-field="x_contrasena" data-hidden="1" name="c_contrasena" id="c_contrasena" value="<?= HtmlEncode($Page->contrasena->FormValue) ?>">
</span>
<?php } ?>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<?php if (!$Page->isConfirm()) { // Confirm page ?>
<button class="btn btn-primary ew-btn disabled enable-on-init" name="btn-action" id="btn-action" type="submit" form="fregister" data-ew-action="set-action" data-value="confirm"><?= $Language->phrase("RegisterBtn") ?></button>
<?php } else { ?>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fregister"><?= $Language->phrase("ConfirmBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="submit" form="fregister" data-ew-action="set-action" data-value="cancel"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("socios");
});
</script>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your startup script here, no need to add script tags.
});
</script>
