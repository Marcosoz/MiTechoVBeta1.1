<?php

namespace PHPMaker2025\project22092025TrabajosCupoParentField;

use DI\ContainerBuilder;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Container\ContainerInterface;
use Psr\Cache\CacheItemPoolInterface;
use Doctrine\DBAL\ParameterType;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Result;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\DBAL\Cache\QueryCacheProfile;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Dflydev\FigCookies\FigRequestCookies;
use Dflydev\FigCookies\FigResponseCookies;
use Dflydev\FigCookies\SetCookie;
use Slim\Interfaces\RouteCollectorProxyInterface;
use Slim\App;
use League\Flysystem\DirectoryListing;
use League\Flysystem\FilesystemException;
use Closure;
use DateTime;
use DateTimeImmutable;
use DateInterval;
use Exception;
use InvalidArgumentException;

/**
 * Table class for socios
 */
class Socios extends DbTable implements LookupTableInterface
{
    protected string $SqlFrom = "";
    protected ?QueryBuilder $SqlSelect = null;
    protected ?string $SqlSelectList = null;
    protected string $SqlWhere = "";
    protected string $SqlGroupBy = "";
    protected string $SqlHaving = "";
    protected string $SqlOrderBy = "";
    public string $DbErrorMessage = "";
    public $UseSessionForListSql = true;

    // Column CSS classes
    public string $LeftColumnClass = "col-sm-2 col-form-label ew-label";
    public string $RightColumnClass = "col-sm-10";
    public string $OffsetColumnClass = "col-sm-10 offset-sm-2";
    public string $TableLeftColumnClass = "w-col-2";

    // Ajax / Modal
    public bool $UseAjaxActions = false;
    public bool $ModalSearch = false;
    public bool $ModalView = false;
    public bool $ModalAdd = false;
    public bool $ModalEdit = false;
    public bool $ModalUpdate = false;
    public bool $InlineDelete = false;
    public bool $ModalGridAdd = false;
    public bool $ModalGridEdit = false;
    public bool $ModalMultiEdit = false;

    // Fields
    public DbField $id;
    public DbField $cooperativa_id;
    public DbField $nombre_completo;
    public DbField $cedula;
    public DbField $telefono;
    public DbField $email;
    public DbField $fecha_ingreso;
    public DbField $created_at;
    public DbField $contrasena;
    public DbField $nivel_usuario;
    public DbField $updated_at;
    public DbField $sociosi;
    public DbField $cupo;

    // Page ID
    public string $PageID = ""; // To be set by subclass

    // Constructor
    public function __construct(Language $language, AdvancedSecurity $security)
    {
        parent::__construct($language, $security);
        $this->TableVar = "socios";
        $this->TableName = 'socios';
        $this->TableType = "TABLE";
        $this->ImportUseTransaction = $this->supportsTransaction() && Config("IMPORT_USE_TRANSACTION");
        $this->UseTransaction = $this->supportsTransaction() && Config("USE_TRANSACTION");
        $this->UpdateTable = "socios"; // Update table
        $this->Dbid = 'DB';
        $this->ExportAll = true;
        $this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)

        // PDF
        $this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
        $this->ExportPageSize = "a4"; // Page size (PDF only)

        // PhpSpreadsheet
        $this->ExportExcelPageOrientation = null; // Page orientation (PhpSpreadsheet only)
        $this->ExportExcelPageSize = null; // Page size (PhpSpreadsheet only)

        // PHPWord
        $this->ExportWordPageOrientation = ""; // Page orientation (PHPWord only)
        $this->ExportWordPageSize = ""; // Page orientation (PHPWord only)
        $this->ExportWordColumnWidth = null; // Cell width (PHPWord only)
        $this->DetailAdd = false; // Allow detail add
        $this->DetailEdit = false; // Allow detail edit
        $this->DetailView = false; // Allow detail view
        $this->ShowMultipleDetails = false; // Show multiple details
        $this->GridAddRowCount = 5;
        $this->AllowAddDeleteRow = true; // Allow add/delete row
        $this->UseAjaxActions = $this->UseAjaxActions || Config("USE_AJAX_ACTIONS");
        $this->BasicSearch = new BasicSearch($this, Session(), $this->language);

        // id
        $this->id = new DbField(
            $this, // Table
            'x_id', // Variable name
            'id', // Name
            '`id`', // Expression
            '`id`', // Basic search expression
            3, // Type
            11, // Size
            -1, // Date/Time format
            false, // Is upload field
            '`id`', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->id->InputTextType = "text";
        $this->id->Raw = true;
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Nullable = false; // NOT NULL field
        $this->id->DefaultErrorMessage = $this->language->phrase("IncorrectInteger");
        $this->id->SearchOperators = ["=", "<>", "IN", "NOT IN", "<", "<=", ">", ">=", "BETWEEN", "NOT BETWEEN"];
        $this->Fields['id'] = &$this->id;

        // cooperativa_id
        $this->cooperativa_id = new DbField(
            $this, // Table
            'x_cooperativa_id', // Variable name
            'cooperativa_id', // Name
            '`cooperativa_id`', // Expression
            '`cooperativa_id`', // Basic search expression
            3, // Type
            11, // Size
            -1, // Date/Time format
            false, // Is upload field
            '`cooperativa_id`', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'SELECT' // Edit Tag
        );
        $this->cooperativa_id->InputTextType = "text";
        $this->cooperativa_id->Raw = true;
        $this->cooperativa_id->Nullable = false; // NOT NULL field
        $this->cooperativa_id->Required = true; // Required field
        $this->cooperativa_id->setSelectMultiple(false); // Select one
        $this->cooperativa_id->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->cooperativa_id->PleaseSelectText = $this->language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->cooperativa_id->Lookup = new Lookup($this->cooperativa_id, 'cooperativas', false, 'id', ["nombre","","",""], '', "", [], [], [], [], [], [], false, '', '', "`nombre`");
        $this->cooperativa_id->DefaultErrorMessage = $this->language->phrase("IncorrectInteger");
        $this->cooperativa_id->SearchOperators = ["=", "<>", "<", "<=", ">", ">=", "BETWEEN", "NOT BETWEEN"];
        $this->Fields['cooperativa_id'] = &$this->cooperativa_id;

        // nombre_completo
        $this->nombre_completo = new DbField(
            $this, // Table
            'x_nombre_completo', // Variable name
            'nombre_completo', // Name
            '`nombre_completo`', // Expression
            '`nombre_completo`', // Basic search expression
            200, // Type
            150, // Size
            -1, // Date/Time format
            false, // Is upload field
            '`nombre_completo`', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->nombre_completo->InputTextType = "text";
        $this->nombre_completo->Nullable = false; // NOT NULL field
        $this->nombre_completo->Required = true; // Required field
        $this->nombre_completo->SearchOperators = ["=", "<>", "IN", "NOT IN", "STARTS WITH", "NOT STARTS WITH", "LIKE", "NOT LIKE", "ENDS WITH", "NOT ENDS WITH", "IS EMPTY", "IS NOT EMPTY"];
        $this->Fields['nombre_completo'] = &$this->nombre_completo;

        // cedula
        $this->cedula = new DbField(
            $this, // Table
            'x_cedula', // Variable name
            'cedula', // Name
            '`cedula`', // Expression
            '`cedula`', // Basic search expression
            200, // Type
            20, // Size
            -1, // Date/Time format
            false, // Is upload field
            '`cedula`', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->cedula->InputTextType = "text";
        $this->cedula->Raw = true;
        $this->cedula->Required = true; // Required field
        $this->cedula->SearchOperators = ["=", "<>", "IN", "NOT IN", "STARTS WITH", "NOT STARTS WITH", "LIKE", "NOT LIKE", "ENDS WITH", "NOT ENDS WITH", "IS EMPTY", "IS NOT EMPTY", "IS NULL", "IS NOT NULL"];
        $this->Fields['cedula'] = &$this->cedula;

        // telefono
        $this->telefono = new DbField(
            $this, // Table
            'x_telefono', // Variable name
            'telefono', // Name
            '`telefono`', // Expression
            '`telefono`', // Basic search expression
            200, // Type
            50, // Size
            -1, // Date/Time format
            false, // Is upload field
            '`telefono`', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->telefono->InputTextType = "text";
        $this->telefono->SearchOperators = ["=", "<>", "IN", "NOT IN", "STARTS WITH", "NOT STARTS WITH", "LIKE", "NOT LIKE", "ENDS WITH", "NOT ENDS WITH", "IS EMPTY", "IS NOT EMPTY", "IS NULL", "IS NOT NULL"];
        $this->Fields['telefono'] = &$this->telefono;

        // email
        $this->email = new DbField(
            $this, // Table
            'x_email', // Variable name
            'email', // Name
            '`email`', // Expression
            '`email`', // Basic search expression
            200, // Type
            100, // Size
            -1, // Date/Time format
            false, // Is upload field
            '`email`', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->email->InputTextType = "text";
        $this->email->Required = true; // Required field
        $this->email->SearchOperators = ["=", "<>", "IN", "NOT IN", "STARTS WITH", "NOT STARTS WITH", "LIKE", "NOT LIKE", "ENDS WITH", "NOT ENDS WITH", "IS EMPTY", "IS NOT EMPTY", "IS NULL", "IS NOT NULL"];
        $this->Fields['email'] = &$this->email;

        // fecha_ingreso
        $this->fecha_ingreso = new DbField(
            $this, // Table
            'x_fecha_ingreso', // Variable name
            'fecha_ingreso', // Name
            '`fecha_ingreso`', // Expression
            CastDateFieldForLike("`fecha_ingreso`", 0, "DB"), // Basic search expression
            133, // Type
            10, // Size
            0, // Date/Time format
            false, // Is upload field
            '`fecha_ingreso`', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->fecha_ingreso->InputTextType = "text";
        $this->fecha_ingreso->Raw = true;
        $this->fecha_ingreso->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $this->language->phrase("IncorrectDate"));
        $this->fecha_ingreso->SearchOperators = ["=", "<>", "IN", "NOT IN", "<", "<=", ">", ">=", "BETWEEN", "NOT BETWEEN", "IS NULL", "IS NOT NULL"];
        $this->Fields['fecha_ingreso'] = &$this->fecha_ingreso;

        // created_at
        $this->created_at = new DbField(
            $this, // Table
            'x_created_at', // Variable name
            'created_at', // Name
            '`created_at`', // Expression
            CastDateFieldForLike("`created_at`", 0, "DB"), // Basic search expression
            135, // Type
            19, // Size
            0, // Date/Time format
            false, // Is upload field
            '`created_at`', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'HIDDEN' // Edit Tag
        );
        $this->created_at->InputTextType = "text";
        $this->created_at->Raw = true;
        $this->created_at->Nullable = false; // NOT NULL field
        $this->created_at->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $this->language->phrase("IncorrectDate"));
        $this->created_at->SearchOperators = ["=", "<>"];
        $this->Fields['created_at'] = &$this->created_at;

        // contraseña
        $this->contrasena = new DbField(
            $this, // Table
            'x_contrasena', // Variable name
            'contraseña', // Name
            '`contraseña`', // Expression
            '`contraseña`', // Basic search expression
            200, // Type
            100, // Size
            -1, // Date/Time format
            false, // Is upload field
            '`contraseña`', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'PASSWORD' // Edit Tag
        );
        $this->contrasena->InputTextType = "text";
        $this->contrasena->Nullable = false; // NOT NULL field
        $this->contrasena->Required = true; // Required field
        $this->contrasena->SearchOperators = ["=", "<>"];
        $this->Fields['contraseña'] = &$this->contrasena;

        // nivel_usuario
        $this->nivel_usuario = new DbField(
            $this, // Table
            'x_nivel_usuario', // Variable name
            'nivel_usuario', // Name
            '`nivel_usuario`', // Expression
            '`nivel_usuario`', // Basic search expression
            3, // Type
            10, // Size
            -1, // Date/Time format
            false, // Is upload field
            '`nivel_usuario`', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'SELECT' // Edit Tag
        );
        $this->nivel_usuario->InputTextType = "text";
        $this->nivel_usuario->Raw = true;
        $this->nivel_usuario->Nullable = false; // NOT NULL field
        $this->nivel_usuario->Required = true; // Required field
        $this->nivel_usuario->setSelectMultiple(false); // Select one
        $this->nivel_usuario->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->nivel_usuario->PleaseSelectText = $this->language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->nivel_usuario->Lookup = new Lookup($this->nivel_usuario, 'socios', false, '', ["","","",""], '', "", [], [], [], [], [], [], false, '', '', "");
        $this->nivel_usuario->OptionCount = 2;
        $this->nivel_usuario->DefaultErrorMessage = $this->language->phrase("IncorrectInteger");
        $this->nivel_usuario->SearchOperators = ["=", "<>", "<", "<=", ">", ">=", "BETWEEN", "NOT BETWEEN"];
        $this->Fields['nivel_usuario'] = &$this->nivel_usuario;

        // updated_at
        $this->updated_at = new DbField(
            $this, // Table
            'x_updated_at', // Variable name
            'updated_at', // Name
            '`updated_at`', // Expression
            CastDateFieldForLike("`updated_at`", 0, "DB"), // Basic search expression
            135, // Type
            19, // Size
            0, // Date/Time format
            false, // Is upload field
            '`updated_at`', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->updated_at->InputTextType = "text";
        $this->updated_at->Raw = true;
        $this->updated_at->Nullable = false; // NOT NULL field
        $this->updated_at->Required = true; // Required field
        $this->updated_at->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $this->language->phrase("IncorrectDate"));
        $this->updated_at->SearchOperators = ["=", "<>", "IN", "NOT IN", "<", "<=", ">", ">=", "BETWEEN", "NOT BETWEEN"];
        $this->Fields['updated_at'] = &$this->updated_at;

        // socio si
        $this->sociosi = new DbField(
            $this, // Table
            'x_sociosi', // Variable name
            'socio si', // Name
            '`socio si`', // Expression
            '`socio si`', // Basic search expression
            16, // Type
            1, // Size
            -1, // Date/Time format
            false, // Is upload field
            '`socio si`', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'CHECKBOX' // Edit Tag
        );
        $this->sociosi->addMethod("getDefault", fn() => 1);
        $this->sociosi->InputTextType = "text";
        $this->sociosi->Raw = true;
        $this->sociosi->Nullable = false; // NOT NULL field
        $this->sociosi->setDataType(DataType::BOOLEAN);
        $this->sociosi->Lookup = new Lookup($this->sociosi, 'socios', false, '', ["","","",""], '', "", [], [], [], [], [], [], false, '', '', "");
        $this->sociosi->OptionCount = 2;
        $this->sociosi->DefaultErrorMessage = $this->language->phrase("IncorrectValueRegExp");
        $this->sociosi->SearchOperators = ["=", "<>"];
        $this->Fields['socio si'] = &$this->sociosi;

        // cupo
        $this->cupo = new DbField(
            $this, // Table
            'x_cupo', // Variable name
            'cupo', // Name
            '`cupo`', // Expression
            '`cupo`', // Basic search expression
            3, // Type
            100, // Size
            -1, // Date/Time format
            false, // Is upload field
            '`EV__cupo`', // Virtual expression
            true, // Is virtual
            true, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'SELECT' // Edit Tag
        );
        $this->cupo->InputTextType = "text";
        $this->cupo->Raw = true;
        $this->cupo->setSelectMultiple(false); // Select one
        $this->cupo->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->cupo->PleaseSelectText = $this->language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->cupo->Lookup = new Lookup($this->cupo, 'cupos', false, 'cupo', ["cupo","","",""], '', "", [], [], [], [], [], [], false, '', '', "`cupo`");
        $this->cupo->DefaultErrorMessage = $this->language->phrase("IncorrectInteger");
        $this->cupo->SearchOperators = ["=", "<>", "<", "<=", ">", ">=", "BETWEEN", "NOT BETWEEN", "IS NULL", "IS NOT NULL"];
        $this->Fields['cupo'] = &$this->cupo;

        // Cache profile
        $this->cacheProfile = new QueryCacheProfile(0, $this->TableVar, Container("result.cache"));

        // Call Table Load event
        $this->tableLoad();
    }

    // Field Visibility
    public function getFieldVisibility(string $fldParm): bool
    {
        return $this->$fldParm->Visible; // Returns original value
    }

    // Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
    public function setLeftColumnClass(string $class): void
    {
        if (preg_match('/^col\-(\w+)\-(\d+)$/', $class, $match)) {
            $this->LeftColumnClass = $class . " col-form-label ew-label";
            $this->RightColumnClass = "col-" . $match[1] . "-" . strval(12 - (int)$match[2]);
            $this->OffsetColumnClass = $this->RightColumnClass . " " . str_replace("col-", "offset-", $class);
            $this->TableLeftColumnClass = preg_replace('/^col-\w+-(\d+)$/', "w-col-$1", $class); // Change to w-col-*
        }
    }

    // Single column sort
    public function updateSort(DbField &$fld): void
    {
        if ($this->CurrentOrder == $fld->Name) {
            $sortField = $fld->Expression;
            $lastSort = $fld->getSort();
            if (in_array($this->CurrentOrderType, ["ASC", "DESC", "NO"])) {
                $curSort = $this->CurrentOrderType;
            } else {
                $curSort = $lastSort;
            }
            $orderBy = in_array($curSort, ["ASC", "DESC"]) ? $sortField . " " . $curSort : "";
            $this->setSessionOrderBy($orderBy); // Save to Session
            $sortFieldList = ($fld->VirtualExpression != "") ? $fld->VirtualExpression : $sortField;
            $orderBy = in_array($curSort, ["ASC", "DESC"]) ? $sortFieldList . " " . $curSort : "";
            $this->setSessionOrderByList($orderBy); // Save to Session
        }
    }

    // Update field sort
    public function updateFieldSort(): void
    {
        $orderBy = $this->useVirtualFields() ? $this->getSessionOrderByList() : $this->getSessionOrderBy(); // Get ORDER BY from Session
        $flds = GetSortFields($orderBy);
        foreach ($this->Fields as $field) {
            $fldSort = "";
            foreach ($flds as $fld) {
                if ($fld[0] == $field->Expression || $fld[0] == $field->VirtualExpression) {
                    $fldSort = $fld[1];
                }
            }
            $field->setSort($fldSort);
        }
    }

    // Session ORDER BY for List page
    public function getSessionOrderByList(): string
    {
        return Session(AddTabId(PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_ORDER_BY_LIST"))) ?? "";
    }

    public function setSessionOrderByList(string $v): void
    {
        Session(AddTabId(PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_ORDER_BY_LIST")), $v);
    }

    // Render X Axis for chart
    public function renderChartXAxis(string $chartVar, array $chartRow): array
    {
        return $chartRow;
    }

    // Get FROM clause
    public function getSqlFrom(): string
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "socios";
    }

    // Get FROM clause (for backward compatibility)
    public function sqlFrom(): string
    {
        return $this->getSqlFrom();
    }

    // Set FROM clause
    public function setSqlFrom(string $v): void
    {
        $this->SqlFrom = $v;
    }

    // Get SELECT clause
    public function getSqlSelect(): QueryBuilder // Select
    {
        return $this->SqlSelect ?? $this->getQueryBuilder()->select($this->sqlSelectFields());
    }

    // Get list of fields
    private function sqlSelectFields(): string
    {
        $useFieldNames = false;
        $fieldNames = [];
        $platform = $this->getConnection()->getDatabasePlatform();
        foreach ($this->Fields as $field) {
            $expr = $field->Expression;
            $customExpr = $field->CustomDataType?->convertToPHPValueSQL($expr, $platform) ?? $expr;
            if ($customExpr != $expr) {
                $fieldNames[] = $customExpr . " AS " . QuotedName($field->Name, $this->Dbid);
                $useFieldNames = true;
            } else {
                $fieldNames[] = $expr;
            }
        }
        return $useFieldNames ? implode(", ", $fieldNames) : "*";
    }

    // Get SELECT clause (for backward compatibility)
    public function sqlSelect(): QueryBuilder
    {
        return $this->getSqlSelect();
    }

    // Set SELECT clause
    public function setSqlSelect(QueryBuilder $v): void
    {
        $this->SqlSelect = $v;
    }

    // Get SELECT clause for List page
    public function getSqlSelectList(): string
    {
        if ($this->SqlSelectList) {
            return $this->SqlSelectList;
        }
        $from = "(SELECT " . $this->sqlSelectFields() . ", (SELECT `cupo` FROM cupos TMP_LOOKUPTABLE WHERE TMP_LOOKUPTABLE.cupo = socios.cupo LIMIT 1) AS `EV__cupo` FROM socios)";
        return $from . " TMP_TABLE";
    }

    // Get SELECT clause for List page (for backward compatibility)
    public function sqlSelectList(): string
    {
        return $this->getSqlSelectList();
    }

    // Set SELECT clause for List page
    public function setSqlSelectList(string $v): void
    {
        $this->SqlSelectList = $v;
    }

    // Get default filter
    public function getDefaultFilter(): string
    {
        return "";
    }

    // Get WHERE clause
    public function getSqlWhere(bool $delete = false): string
    {
        $where = ($this->SqlWhere != "") ? $this->SqlWhere : "";
        AddFilter($where, $this->getDefaultFilter());
        if (!$delete && !IsEmpty($this->SoftDeleteFieldName) && $this->UseSoftDeleteFilter) { // Add soft delete filter
            AddFilter($where, $this->Fields[$this->SoftDeleteFieldName]->Expression . " IS NULL");
            if ($this->TimeAware) { // Add time aware filter
                AddFilter($where, $this->Fields[$this->SoftDeleteFieldName]->Expression . " > " . $this->getConnection()->getDatabasePlatform()->getCurrentTimestampSQL(), "OR");
            }
        }
        return $where;
    }

    // Get WHERE clause (for backward compatibility)
    public function sqlWhere(): string
    {
        return $this->getSqlWhere();
    }

    // Set WHERE clause
    public function setSqlWhere(string $v): void
    {
        $this->SqlWhere = $v;
    }

    // Get GROUP BY clause
    public function getSqlGroupBy(): string
    {
        return $this->SqlGroupBy != "" ? $this->SqlGroupBy : "";
    }

    // Get GROUP BY clause (for backward compatibility)
    public function sqlGroupBy(): string
    {
        return $this->getSqlGroupBy();
    }

    // set GROUP BY clause
    public function setSqlGroupBy(string $v): void
    {
        $this->SqlGroupBy = $v;
    }

    // Get HAVING clause
    public function getSqlHaving(): string // Having
    {
        return ($this->SqlHaving != "") ? $this->SqlHaving : "";
    }

    // Get HAVING clause (for backward compatibility)
    public function sqlHaving(): string
    {
        return $this->getSqlHaving();
    }

    // Set HAVING clause
    public function setSqlHaving(string $v): void
    {
        $this->SqlHaving = $v;
    }

    // Get ORDER BY clause
    public function getSqlOrderBy(): string
    {
        return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "";
    }

    // Get ORDER BY clause (for backward compatibility)
    public function sqlOrderBy(): string
    {
        return $this->getSqlOrderBy();
    }

    // set ORDER BY clause
    public function setSqlOrderBy(string $v): void
    {
        $this->SqlOrderBy = $v;
    }

    // Apply User ID filters
    public function applyUserIDFilters(string $filter, string $id = ""): string
    {
        // Add User ID filter
        if ($this->security->currentUserID() != "" && !$this->security->canAccess()) { // No access permission
            $filter = $this->addUserIDFilter($filter, $id);
        }
        return $filter;
    }

    // Check if User ID security allows view all
    public function userIDAllow(string $id = ""): bool
    {
        $allow = $this->UserIDPermission;
        return match ($id) {
            "add", "copy", "gridadd", "register", "addopt" => ($allow & Allow::ADD->value) == Allow::ADD->value,
            "edit", "gridedit", "update", "changepassword", "resetpassword" => ($allow & Allow::EDIT->value) == Allow::EDIT->value,
            "delete" => ($allow & Allow::DELETE->value) == Allow::DELETE->value,
            "view" => ($allow & Allow::VIEW->value) == Allow::VIEW->value,
            "search" => ($allow & Allow::SEARCH->value) == Allow::SEARCH->value,
            "lookup" => ($allow & Allow::LOOKUP->value) == Allow::LOOKUP->value,
            default => ($allow & Allow::LIST->value) == Allow::LIST->value
        };
    }

    /**
     * Get record count
     *
     * @param string|QueryBuilder $sql SQL or QueryBuilder
     * @param Connection $c Connection
     * @return int
     */
    public function getRecordCount(string|QueryBuilder $sql, ?Connection $c = null): int
    {
        $cnt = -1;
        $sqlwrk = $sql instanceof QueryBuilder // Query builder
            ? (clone $sql)->resetOrderBy()->getSQL()
            : $sql;
        $pattern = '/^SELECT\s([\s\S]+?)\sFROM\s/i';
        // Skip Custom View / SubQuery / SELECT DISTINCT / ORDER BY
        if (
            in_array($this->TableType, ["TABLE", "VIEW", "LINKTABLE"])
            && preg_match($pattern, $sqlwrk)
            && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sqlwrk)
            && !preg_match('/^\s*SELECT\s+DISTINCT\s+/i', $sqlwrk)
            && !preg_match('/\s+ORDER\s+BY\s+/i', $sqlwrk)
        ) {
            $sqlcnt = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sqlwrk);
        } else {
            $sqlcnt = "SELECT COUNT(*) FROM (" . $sqlwrk . ") COUNT_TABLE";
        }
        $conn = $c ?? $this->getConnection();
        $cnt = $conn->fetchOne($sqlcnt);
        if ($cnt !== false) {
            return (int)$cnt;
        }
        // Unable to get count by SELECT COUNT(*), execute the SQL to get record count directly
        $result = $conn->executeQuery($sqlwrk);
        $cnt = $result->rowCount();
        if ($cnt == 0) { // Unable to get record count, count directly
            while ($result->fetchAssociative()) {
                $cnt++;
            }
        }
        return $cnt;
    }

    // Get SQL
    public function getSql(string $where, string $orderBy = "", bool $delete = false): QueryBuilder
    {
        return $this->getSqlAsQueryBuilder($where, $orderBy, $delete);
    }

    // Get QueryBuilder
    public function getSqlAsQueryBuilder(string $where, string $orderBy = "", bool $delete = false): QueryBuilder
    {
        return $this->buildSelectSql(
            $this->getSqlSelect(),
            $this->getSqlFrom(),
            $this->getSqlWhere($delete),
            $this->getSqlGroupBy(),
            $this->getSqlHaving(),
            $this->getSqlOrderBy(),
            $where,
            $orderBy
        );
    }

    // Table SQL
    public function getCurrentSql(bool $delete = false): QueryBuilder
    {
        $filter = $this->CurrentFilter;
        $filter = $this->applyUserIDFilters($filter);
        $sort = $this->getSessionOrderBy();
        return $this->getSql($filter, $sort, $delete);
    }

    /**
     * Table SQL with List page filter
     *
     * @return QueryBuilder
     */
    public function getListSql(): QueryBuilder
    {
        $filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
        AddFilter($filter, $this->CurrentFilter);
        $filter = $this->applyUserIDFilters($filter);
        $this->recordsSelecting($filter);
        if ($this->useVirtualFields()) {
            $select = "*";
            $from = $this->getSqlSelectList();
            $sort = $this->UseSessionForListSql ? $this->getSessionOrderByList() : "";
        } else {
            $select = $this->getSqlSelect();
            $from = $this->getSqlFrom();
            $sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
        }
        $this->Sort = $sort;
        return $this->buildSelectSql(
            $select,
            $from,
            $this->getSqlWhere(),
            $this->getSqlGroupBy(),
            $this->getSqlHaving(),
            $this->getSqlOrderBy(),
            $filter,
            $sort
        );
    }

    // Get ORDER BY clause
    public function getOrderBy(): string
    {
        $orderBy = $this->getSqlOrderBy();
        $sort = ($this->useVirtualFields()) ? $this->getSessionOrderByList() : $this->getSessionOrderBy();
        if ($orderBy != "" && $sort != "") {
            $orderBy .= ", " . $sort;
        } elseif ($sort != "") {
            $orderBy = $sort;
        }
        return $orderBy;
    }

    // Check if virtual fields is used in SQL
    protected function useVirtualFields(): bool
    {
        $where = $this->UseSessionForListSql ? $this->getSessionWhere() : $this->CurrentFilter;
        $orderBy = $this->UseSessionForListSql ? $this->getSessionOrderByList() : "";
        if ($where != "") {
            $where = " " . str_replace(["(", ")"], ["", ""], $where) . " ";
        }
        if ($orderBy != "") {
            $orderBy = " " . str_replace(["(", ")"], ["", ""], $orderBy) . " ";
        }
        if (ContainsString($orderBy, " " . $this->cupo->VirtualExpression . " ")) {
            return true;
        }
        return false;
    }

    // Get record count based on filter
    public function loadRecordCount($filter, $delete = false): int
    {
        $origFilter = $this->CurrentFilter;
        $this->CurrentFilter = $filter;
        if ($delete == false) {
            $this->recordsSelecting($this->CurrentFilter);
        }
        $isCustomView = $this->TableType == "CUSTOMVIEW";
        $select = $isCustomView ? $this->getSqlSelect() : $this->getQueryBuilder()->select("*");
        $groupBy = $isCustomView ? $this->getSqlGroupBy() : "";
        $having = $isCustomView ? $this->getSqlHaving() : "";
        $sql = $this->buildSelectSql($select, $this->getSqlFrom(), $this->getSqlWhere($delete), $groupBy, $having, "", $this->CurrentFilter, "");
        $cnt = $this->getRecordCount($sql);
        $this->CurrentFilter = $origFilter;
        return $cnt;
    }

    // Get record count (for current List page)
    public function listRecordCount(): int
    {
        $filter = $this->getSessionWhere();
        AddFilter($filter, $this->CurrentFilter);
        $filter = $this->applyUserIDFilters($filter);
        $this->recordsSelecting($filter);
        $isCustomView = $this->TableType == "CUSTOMVIEW";
        $select = $isCustomView ? $this->getSqlSelect() : $this->getQueryBuilder()->select("*");
        $groupBy = $isCustomView ? $this->getSqlGroupBy() : "";
        $having = $isCustomView ? $this->getSqlHaving() : "";
        if ($this->useVirtualFields()) {
            $sql = $this->buildSelectSql("*", $this->getSqlSelectList(), $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
        } else {
            $sql = $this->buildSelectSql($select, $this->getSqlFrom(), $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
        }
        $cnt = $this->getRecordCount($sql);
        return $cnt;
    }

    /**
     * Get query builder for INSERT
     *
     * @param array $row Row to be inserted
     * @return QueryBuilder
     */
    public function insertSql(array $row): QueryBuilder
    {
        $queryBuilder = $this->getQueryBuilder()->insert($this->UpdateTable);
        $platform = $this->getConnection()->getDatabasePlatform();
        foreach ($row as $name => $value) {
            if (!isset($this->Fields[$name]) || $this->Fields[$name]->IsCustom) {
                continue;
            }
            if (Config("ENCRYPTED_PASSWORD") && $name == Config("LOGIN_PASSWORD_FIELD_NAME")) {
                $value = HashPassword($value);
            }
            $field = $this->Fields[$name];
            $parm = $queryBuilder->createPositionalParameter($value, $field->getParameterType());
            $parm = $field->CustomDataType?->convertToDatabaseValueSQL($parm, $platform) ?? $parm; // Convert database SQL
            $queryBuilder->setValue($field->Expression, $parm);
        }
        return $queryBuilder;
    }

    // Insert
    public function insert(array &$row): int|bool
    {
        $conn = $this->getConnection();
        try {
            $queryBuilder = $this->insertSql($row);
            $result = $queryBuilder->executeStatement();
            if ($result) {
                $this->clearLookupCache();
            }
            $this->DbErrorMessage = "";
        } catch (Exception $e) {
            $result = false;
            $this->DbErrorMessage = $e->getMessage();
        }
        if ($result) {
            $this->id->setDbValue($conn->lastInsertId());
            $row['id'] = $this->id->DbValue;
        }
        return $result;
    }

    /**
     * Get query builder for UPDATE
     *
     * @param array $row Row to be updated
     * @param string|array $where WHERE clause
     * @return QueryBuilder
     */
    public function updateSql(array $row, string|array $where = ""): QueryBuilder
    {
        $queryBuilder = $this->getQueryBuilder()->update($this->UpdateTable);
        $platform = $this->getConnection()->getDatabasePlatform();
        foreach ($row as $name => $value) {
            if (!isset($this->Fields[$name]) || $this->Fields[$name]->IsCustom || $this->Fields[$name]->IsAutoIncrement) {
                continue;
            }
            if (Config("ENCRYPTED_PASSWORD") && $name == Config("LOGIN_PASSWORD_FIELD_NAME")) {
                if ($value == $this->Fields[$name]->OldValue) { // No need to update hashed password if not changed
                    continue;
                }
                $value = HashPassword($value);
            }
            $field = $this->Fields[$name];
            $parm = $queryBuilder->createPositionalParameter($value, $field->getParameterType());
            $parm = $field->CustomDataType?->convertToDatabaseValueSQL($parm, $platform) ?? $parm; // Convert database SQL
            $queryBuilder->set($field->Expression, $parm);
        }
        $where = is_array($where) ? $this->arrayToFilter($where) : $where;
        if ($where != "") {
            $queryBuilder->where($where);
        }
        return $queryBuilder;
    }

    // Update
    public function update(array $row, string|array $where = "", ?array $old = null, bool $currentFilter = true): int|bool
    {
        // If no field is updated, execute may return 0. Treat as success
        try {
            $where = is_array($where) ? $this->arrayToFilter($where) : $where;
            $filter = $currentFilter ? $this->CurrentFilter : "";
            AddFilter($where, $filter);
            $success = $this->updateSql($row, $where)->executeStatement();
            $success = $success > 0 ? $success : true;
            if ($success) {
                $this->clearLookupCache();
            }
            $this->DbErrorMessage = "";
        } catch (Exception $e) {
            $success = false;
            $this->DbErrorMessage = $e->getMessage();
        }

        // Return auto increment field
        if ($success) {
            if (!isset($row['id']) && !IsEmpty($this->id->CurrentValue)) {
                $row['id'] = $this->id->CurrentValue;
            }
        }
        return $success;
    }

    /**
     * Get query builder for DELETE
     *
     * @param ?array $row Key values
     * @param string|array $where WHERE clause
     * @return QueryBuilder
     */
    public function deleteSql(?array $row, string|array $where = ""): QueryBuilder
    {
        $queryBuilder = $this->getQueryBuilder()->delete($this->UpdateTable);
        $where = is_array($where) ? $this->arrayToFilter($where) : $where;
        if ($row) {
            if (array_key_exists('id', $row)) {
                AddFilter($where, QuotedName('id', $this->Dbid) . '=' . QuotedValue($row['id'], $this->id->DataType, $this->Dbid));
            }
        }
        return $queryBuilder->where($where != "" ? $where : "0=1");
    }

    // Delete
    public function delete(array $row, string|array $where = "", bool $currentFilter = false): int|bool
    {
        $success = true;
        if ($success) {
            try {
                // Check soft delete
                $softDelete = !IsEmpty($this->SoftDeleteFieldName)
                    && (
                        !$this->HardDelete
                        || $row[$this->SoftDeleteFieldName] === null
                        || $this->TimeAware && (new DateTimeImmutable($row[$this->SoftDeleteFieldName]))->getTimestamp() > time()
                    );
                if ($softDelete) { // Soft delete
                    $newRow = $row;
                    if ($this->TimeAware && IsEmpty($row[$this->SoftDeleteFieldName])) { // Set expiration datetime
                        $newRow[$this->SoftDeleteFieldName] = StdDateTime(strtotime($this->SoftDeleteTimeAwarePeriod));
                    } else { // Set now
                        $newRow[$this->SoftDeleteFieldName] = StdCurrentDateTime();
                    }
                    $success = $this->update($newRow, $this->getRecordFilter($row), $row);
                } else { // Delete permanently
                    $where = is_array($where) ? $this->arrayToFilter($where) : $where;
                    $filter = $currentFilter ? $this->CurrentFilter : "";
                    AddFilter($where, $filter);
                    $success = $this->deleteSql($row, $where)->executeStatement();
                    $this->DbErrorMessage = "";
                }
                if ($success) {
                    $this->clearLookupCache();
                }
            } catch (Exception $e) {
                $success = false;
                $this->DbErrorMessage = $e->getMessage();
            }
        }
        return $success;
    }

    // Clear lookup cache for this table
    protected function clearLookupCache()
    {
        $cache = Container("result.cache");
        $cache->clear("lookup.cache." . $this->TableVar . ".");
        if ($cache instanceof PruneableInterface) {
            $cache->prune();
        }
    }

    // Load DbValue from result set or array
    protected function loadDbValues(?array $row)
    {
        if (!is_array($row)) {
            return;
        }
        $this->id->DbValue = $row['id'];
        $this->cooperativa_id->DbValue = $row['cooperativa_id'];
        $this->nombre_completo->DbValue = $row['nombre_completo'];
        $this->cedula->DbValue = $row['cedula'];
        $this->telefono->DbValue = $row['telefono'];
        $this->email->DbValue = $row['email'];
        $this->fecha_ingreso->DbValue = $row['fecha_ingreso'];
        $this->created_at->DbValue = $row['created_at'];
        $this->contrasena->DbValue = $row['contraseña'];
        $this->nivel_usuario->DbValue = $row['nivel_usuario'];
        $this->updated_at->DbValue = $row['updated_at'];
        $this->sociosi->DbValue = $row['socio si'];
        $this->cupo->DbValue = $row['cupo'];
    }

    // Delete uploaded files
    public function deleteUploadedFiles(array $row)
    {
        $this->loadDbValues($row);
    }

    // Record filter WHERE clause
    protected function sqlKeyFilter(): string
    {
        return "`id` = @id@";
    }

    // Get Key from record
    public function getKeyFromRecord(array $row, ?string $keySeparator = null): string
    {
        $keys = [];
        $val = $row['id'];
        if (IsEmpty($val)) {
            return "";
        } else {
            $keys[] = $val;
        }
        $keySeparator ??= Config("COMPOSITE_KEY_SEPARATOR");
        return implode($keySeparator, $keys);
    }

    // Get Key
    public function getKey(bool $current = false, ?string $keySeparator = null): string
    {
        $keys = [];
        $val = $current ? $this->id->CurrentValue : $this->id->OldValue;
        if (IsEmpty($val)) {
            return "";
        } else {
            $keys[] = $val;
        }
        $keySeparator ??= Config("COMPOSITE_KEY_SEPARATOR");
        return implode($keySeparator, $keys);
    }

    // Set Key
    public function setKey(string $key, bool $current = false, ?string $keySeparator = null): void
    {
        $keySeparator ??= Config("COMPOSITE_KEY_SEPARATOR");
        $this->OldKey = $key;
        $keys = explode($keySeparator, $this->OldKey);
        if (count($keys) == 1) {
            if ($current) {
                $this->id->CurrentValue = $keys[0];
            } else {
                $this->id->OldValue = $keys[0];
            }
        }
    }

    // Get record filter
    public function getRecordFilter(?array $row = null, bool $current = false): string
    {
        $keyFilter = $this->sqlKeyFilter();
        if (is_array($row)) {
            $val = array_key_exists('id', $row) ? $row['id'] : null;
        } else {
            $val = !IsEmpty($this->id->OldValue) && !$current ? $this->id->OldValue : $this->id->CurrentValue;
        }
        if (!is_numeric($val)) {
            return "0=1"; // Invalid key
        }
        if ($val === null) {
            return "0=1"; // Invalid key
        } else {
            $keyFilter = str_replace("@id@", AdjustSql($val), $keyFilter); // Replace key value
        }
        return $keyFilter;
    }

    // Return page URL
    public function getReturnUrl(): string
    {
        $referUrl = ReferUrl();
        $referPageName = ReferPageName();
        $name = AddTabId(PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL"));
        // Get referer URL automatically
        if ($referUrl != "" && $referPageName != CurrentPageName() && $referPageName != "login") { // Referer not same page or login page
            Session($name, $referUrl); // Save to Session
        }
        return Session($name) ?? GetUrl("SociosList");
    }

    // Set return page URL
    public function setReturnUrl(string $v): void
    {
        Session(AddTabId(PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL")), $v);
    }

    // Get modal caption
    public function getModalCaption(string $pageName): string
    {
        return match ($pageName) {
            "SociosView" => $this->language->phrase("View"),
            "SociosEdit" => $this->language->phrase("Edit"),
            "SociosAdd" => $this->language->phrase("Add"),
            default => ""
        };
    }

    // Default route URL
    public function getDefaultRouteUrl(): string
    {
        return "SociosList";
    }

    // API page name
    public function getApiPageName(string $action): string
    {
        return match (strtolower($action)) {
            Config("API_VIEW_ACTION") => "SociosView",
            Config("API_ADD_ACTION") => "SociosAdd",
            Config("API_EDIT_ACTION") => "SociosEdit",
            Config("API_DELETE_ACTION") => "SociosDelete",
            Config("API_LIST_ACTION") => "SociosList",
            default => ""
        };
    }

    // Current URL
    public function getCurrentUrl(string $parm = ""): string
    {
        $url = CurrentPageUrl(false);
        if ($parm != "") {
            $url = $this->keyUrl($url, $parm);
        } else {
            $url = $this->keyUrl($url, Config("TABLE_SHOW_DETAIL") . "=");
        }
        return $this->addMasterUrl($url);
    }

    // List URL
    public function getListUrl(): string
    {
        return "SociosList";
    }

    // View URL
    public function getViewUrl(string $parm = ""): string
    {
        if ($parm != "") {
            $url = $this->keyUrl("SociosView", $parm);
        } else {
            $url = $this->keyUrl("SociosView", Config("TABLE_SHOW_DETAIL") . "=");
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl(string $parm = ""): string
    {
        if ($parm != "") {
            $url = "SociosAdd?" . $parm;
        } else {
            $url = "SociosAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl(string $parm = ""): string
    {
        $url = $this->keyUrl("SociosEdit", $parm);
        return $this->addMasterUrl($url);
    }

    // Inline edit URL
    public function getInlineEditUrl(): string
    {
        $url = $this->keyUrl("SociosList", "action=edit");
        return $this->addMasterUrl($url);
    }

    // Copy URL
    public function getCopyUrl(string $parm = ""): string
    {
        $url = $this->keyUrl("SociosAdd", $parm);
        return $this->addMasterUrl($url);
    }

    // Inline copy URL
    public function getInlineCopyUrl(): string
    {
        $url = $this->keyUrl("SociosList", "action=copy");
        return $this->addMasterUrl($url);
    }

    // Delete URL
    public function getDeleteUrl(string $parm = ""): string
    {
        if ($this->UseAjaxActions && ConvertToBool(Param("infinitescroll")) && CurrentPageID() == "list") {
            return $this->keyUrl(GetApiUrl(Config("API_DELETE_ACTION") . "/" . $this->TableVar));
        } else {
            return $this->keyUrl("SociosDelete", $parm);
        }
    }

    // Add master url
    public function addMasterUrl(string $url): string
    {
        return $url;
    }

    public function keyToJson(bool $htmlEncode = false): string
    {
        $json = "";
        $json .= "\"id\":" . VarToJson($this->id->CurrentValue, "number");
        $json = "{" . $json . "}";
        if ($htmlEncode) {
            $json = HtmlEncode($json);
        }
        return $json;
    }

    // Add key value to URL
    public function keyUrl(string $url, string $parm = ""): string
    {
        if ($this->id->CurrentValue !== null) {
            $url .= "/" . $this->encodeKeyValue($this->id->CurrentValue);
        } else {
            return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
        }
        if ($parm != "") {
            $url .= "?" . $parm;
        }
        return $url;
    }

    // Render sort
    public function renderFieldHeader(DbField $fld): string
    {
        $sortUrl = "";
        $attrs = "";
        if ($this->PageID != "grid" && $fld->Sortable) {
            $sortUrl = $this->sortUrl($fld);
            $attrs = ' role="button" data-ew-action="sort" data-ajax="' . ($this->UseAjaxActions ? "true" : "false") . '" data-sort-url="' . $sortUrl . '" data-sort-type="1"';
            if ($this->ContextClass) { // Add context
                $attrs .= ' data-context="' . HtmlEncode($this->ContextClass) . '"';
            }
        }
        $html = '<div class="ew-table-header-caption"' . $attrs . '>' . $fld->caption() . '</div>';
        if ($sortUrl) {
            $html .= '<div class="ew-table-header-sort">' . $fld->getSortIcon() . '</div>';
        }
        if ($this->PageID != "grid" && !$this->isExport() && $fld->UseFilter && $this->security->canSearch()) {
            $html .= '<div class="ew-filter-dropdown-btn" data-ew-action="filter" data-table="' . $fld->TableVar . '" data-field="' . $fld->FieldVar .
                '"><div class="ew-table-header-filter" role="button" aria-haspopup="true">' . $this->language->phrase("Filter") .
                (is_array($fld->EditValue) ? sprintf($this->language->phrase("FilterCount"), count($fld->EditValue)) : '') .
                '</div></div>';
        }
        $html = '<div class="ew-table-header-btn">' . $html . '</div>';
        if ($this->UseCustomTemplate) {
            $scriptId = str_replace("{id}", $fld->TableVar . "_" . $fld->Param, "tpc_{id}");
            $html = '<template id="' . $scriptId . '">' . $html . '</template>';
        }
        return $html;
    }

    // Sort URL
    public function sortUrl(DbField $fld): string
    {
        global $DashboardReport;
        if (
            $this->CurrentAction || $this->isExport()
        || 
            in_array($fld->Type, [128, 204, 205])
        ) { // Unsortable data type
                return "";
        } elseif ($fld->Sortable) {
            $urlParm = "order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->getNextSort();
            if ($DashboardReport) {
                $urlParm .= "&amp;" . Config("PAGE_DASHBOARD") . "=" . $DashboardReport;
            }
            return $this->addMasterUrl($this->CurrentPageName . "?" . $urlParm);
        } else {
            return "";
        }
    }

    // Get record keys from Post/Get/Session
    public function getRecordKeys(): array
    {
        $arKeys = [];
        $arKey = [];
        if (Param("key_m") !== null) {
            $arKeys = Param("key_m");
            $cnt = count($arKeys);
        } else {
            $isApi = IsApi();
            $keyValues = $isApi
                ? (Route(0) == "export"
                    ? array_map(fn ($i) => Route($i + 3), range(0, 0))  // Export API
                    : array_map(fn ($i) => Route($i + 2), range(0, 0))) // Other API
                : []; // Non-API
            if (($keyValue = Param("id") ?? Route("id")) !== null) {
                $arKeys[] = $keyValue;
            } elseif ($isApi && (($keyValue = Key(0) ?? $keyValues[0] ?? null) !== null)) {
                $arKeys[] = $keyValue;
            } else {
                $arKeys = null; // Do not setup
            }
        }
        // Check keys
        $ar = [];
        if (is_array($arKeys)) {
            foreach ($arKeys as $key) {
                if (!is_numeric($key)) {
                    continue;
                }
                $ar[] = $key;
            }
        }
        return $ar;
    }

    // Get filter from records
    public function getFilterFromRecords(array $rows): string
    {
        return implode(" OR ", array_map(fn($row) => "(" . $this->getRecordFilter($row) . ")", $rows));
    }

    // Get filter from record keys
    public function getFilterFromRecordKeys(bool $setCurrent = true): string
    {
        $arKeys = $this->getRecordKeys();
        $keyFilter = "";
        foreach ($arKeys as $key) {
            if ($setCurrent) {
                $this->id->CurrentValue = $key;
            } else {
                $this->id->OldValue = $key;
            }
            AddFilter($keyFilter, $this->getRecordFilter(null, $setCurrent), "OR");
        }
        return $keyFilter;
    }

    // Load result set based on filter/sort
    public function loadRecords(string $filter, string $sort = ""): Result
    {
        $sql = $this->getSql($filter, $sort); // Set up filter (WHERE Clause) / sort (ORDER BY Clause)
        $conn = $this->getConnection();
        return $conn->executeQuery($sql);
    }

    // Load row values from record
    public function loadListRowValues(array &$row)
    {
        $this->id->setDbValue($row['id']);
        $this->cooperativa_id->setDbValue($row['cooperativa_id']);
        $this->nombre_completo->setDbValue($row['nombre_completo']);
        $this->cedula->setDbValue($row['cedula']);
        $this->telefono->setDbValue($row['telefono']);
        $this->email->setDbValue($row['email']);
        $this->fecha_ingreso->setDbValue($row['fecha_ingreso']);
        $this->created_at->setDbValue($row['created_at']);
        $this->contrasena->setDbValue($row['contraseña']);
        $this->nivel_usuario->setDbValue($row['nivel_usuario']);
        $this->updated_at->setDbValue($row['updated_at']);
        $this->sociosi->setDbValue($row['socio si']);
        $this->cupo->setDbValue($row['cupo']);
    }

    // Render list content
    public function renderListContent(string $filter)
    {
        global $Response;
        $container = Container();
        $listPage = "SociosList";
        $listClass = PROJECT_NAMESPACE . $listPage;
        $page = $container->make($listClass);
        $page->loadRecordsetFromFilter($filter);
        $view = $container->get("app.view");
        $template = $listPage . ".php"; // View
        $GLOBALS["Title"] ??= $page->Title; // Title
        try {
            $Response = $view->render($Response, $template, $GLOBALS);
        } finally {
            $page->terminate(); // Terminate page and clean up
        }
    }

    // Render list row values
    public function renderListRow()
    {
        global $CurrentLanguage;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // cooperativa_id

        // nombre_completo

        // cedula

        // telefono

        // email

        // fecha_ingreso

        // created_at

        // contraseña

        // nivel_usuario

        // updated_at

        // socio si

        // cupo

        // id
        $this->id->ViewValue = $this->id->CurrentValue;

        // cooperativa_id
        $curVal = strval($this->cooperativa_id->CurrentValue);
        if ($curVal != "") {
            $this->cooperativa_id->ViewValue = $this->cooperativa_id->lookupCacheOption($curVal);
            if ($this->cooperativa_id->ViewValue === null) { // Lookup from database
                $filterWrk = SearchFilter($this->cooperativa_id->Lookup->getTable()->Fields["id"]->searchExpression(), "=", $curVal, $this->cooperativa_id->Lookup->getTable()->Fields["id"]->searchDataType(), "DB");
                $sqlWrk = $this->cooperativa_id->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $conn = Conn();
                $rswrk = $conn->executeQuery($sqlWrk)->fetchAllAssociative();
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $rows = [];
                    foreach ($rswrk as $row) {
                        $rows[] = $this->cooperativa_id->Lookup->renderViewRow($row);
                    }
                    $this->cooperativa_id->ViewValue = $this->cooperativa_id->displayValue($rows[0]);
                } else {
                    $this->cooperativa_id->ViewValue = FormatNumber($this->cooperativa_id->CurrentValue, $this->cooperativa_id->formatPattern());
                }
            }
        } else {
            $this->cooperativa_id->ViewValue = null;
        }

        // nombre_completo
        $this->nombre_completo->ViewValue = $this->nombre_completo->CurrentValue;

        // cedula
        $this->cedula->ViewValue = $this->cedula->CurrentValue;

        // telefono
        $this->telefono->ViewValue = $this->telefono->CurrentValue;

        // email
        $this->email->ViewValue = $this->email->CurrentValue;

        // fecha_ingreso
        $this->fecha_ingreso->ViewValue = $this->fecha_ingreso->CurrentValue;
        $this->fecha_ingreso->ViewValue = FormatDateTime($this->fecha_ingreso->ViewValue, $this->fecha_ingreso->formatPattern());

        // created_at
        $this->created_at->ViewValue = $this->created_at->CurrentValue;
        $this->created_at->ViewValue = FormatDateTime($this->created_at->ViewValue, $this->created_at->formatPattern());

        // contraseña
        $this->contrasena->ViewValue = $this->language->phrase("PasswordMask");

        // nivel_usuario
        if ($this->security->canAdmin()) { // System admin
            if (strval($this->nivel_usuario->CurrentValue) != "") {
                $this->nivel_usuario->ViewValue = $this->nivel_usuario->optionCaption($this->nivel_usuario->CurrentValue);
            } else {
                $this->nivel_usuario->ViewValue = null;
            }
        } else {
            $this->nivel_usuario->ViewValue = $this->language->phrase("PasswordMask");
        }

        // updated_at
        $this->updated_at->ViewValue = $this->updated_at->CurrentValue;
        $this->updated_at->ViewValue = FormatDateTime($this->updated_at->ViewValue, $this->updated_at->formatPattern());

        // socio si
        if (ConvertToBool($this->sociosi->CurrentValue)) {
            $this->sociosi->ViewValue = $this->sociosi->tagCaption(1) != "" ? $this->sociosi->tagCaption(1) : "Yes";
        } else {
            $this->sociosi->ViewValue = $this->sociosi->tagCaption(2) != "" ? $this->sociosi->tagCaption(2) : "No";
        }

        // cupo
        if ($this->cupo->VirtualValue != "") {
            $this->cupo->ViewValue = $this->cupo->VirtualValue;
        } else {
            $arwrk = [];
            $arwrk["lf"] = $this->cupo->CurrentValue;
            $arwrk["df"] = $this->cupo->CurrentValue;
            $arwrk = $this->cupo->Lookup->renderViewRow($arwrk);
            $this->cupo->ViewValue = $this->cupo->displayValue($arwrk);
        }

        // id
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // cooperativa_id
        $this->cooperativa_id->HrefValue = "";
        $this->cooperativa_id->TooltipValue = "";

        // nombre_completo
        $this->nombre_completo->HrefValue = "";
        $this->nombre_completo->TooltipValue = "";

        // cedula
        $this->cedula->HrefValue = "";
        $this->cedula->TooltipValue = "";

        // telefono
        $this->telefono->HrefValue = "";
        $this->telefono->TooltipValue = "";

        // email
        $this->email->HrefValue = "";
        $this->email->TooltipValue = "";

        // fecha_ingreso
        $this->fecha_ingreso->HrefValue = "";
        $this->fecha_ingreso->TooltipValue = "";

        // created_at
        $this->created_at->HrefValue = "";
        $this->created_at->TooltipValue = "";

        // contraseña
        $this->contrasena->HrefValue = "";
        $this->contrasena->TooltipValue = "";

        // nivel_usuario
        $this->nivel_usuario->HrefValue = "";
        $this->nivel_usuario->TooltipValue = "";

        // updated_at
        $this->updated_at->HrefValue = "";
        $this->updated_at->TooltipValue = "";

        // socio si
        $this->sociosi->HrefValue = "";
        $this->sociosi->TooltipValue = "";

        // cupo
        $this->cupo->HrefValue = "";
        $this->cupo->TooltipValue = "";

        // Call Row Rendered event
        $this->rowRendered();

        // Save data for Custom Template
        $this->Rows[] = $this->customTemplateFieldValues();
    }

    // Aggregate list row values
    public function aggregateListRowValues()
    {
    }

    // Aggregate list row (for rendering)
    public function aggregateListRow()
    {
        // Call Row Rendered event
        $this->rowRendered();
    }

    // Export data in HTML/CSV/Word/Excel/Email/PDF format
    public function exportDocument(AbstractExportBase $doc, Result $result, int $startRec = 1, int $stopRec = 1, string $exportPageType = "")
    {
        if (!$result || !$doc) {
            return;
        }
        if (!$doc->ExportCustom) {
            // Write header
            $doc->exportTableHeader();
            if ($doc->Horizontal) { // Horizontal format, write header
                $doc->beginExportRow();
                if ($exportPageType == "view") {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->cooperativa_id);
                    $doc->exportCaption($this->nombre_completo);
                    $doc->exportCaption($this->cedula);
                    $doc->exportCaption($this->telefono);
                    $doc->exportCaption($this->email);
                    $doc->exportCaption($this->fecha_ingreso);
                    $doc->exportCaption($this->created_at);
                    $doc->exportCaption($this->contrasena);
                    $doc->exportCaption($this->nivel_usuario);
                    $doc->exportCaption($this->updated_at);
                    $doc->exportCaption($this->sociosi);
                    $doc->exportCaption($this->cupo);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->cooperativa_id);
                    $doc->exportCaption($this->nombre_completo);
                    $doc->exportCaption($this->cedula);
                    $doc->exportCaption($this->telefono);
                    $doc->exportCaption($this->email);
                    $doc->exportCaption($this->fecha_ingreso);
                    $doc->exportCaption($this->created_at);
                    $doc->exportCaption($this->contrasena);
                    $doc->exportCaption($this->nivel_usuario);
                    $doc->exportCaption($this->updated_at);
                    $doc->exportCaption($this->sociosi);
                    $doc->exportCaption($this->cupo);
                }
                $doc->endExportRow();
            }
        }
        $recCnt = $startRec - 1;
        $stopRec = $stopRec > 0 ? $stopRec : PHP_INT_MAX;
        while (($row = $result->fetchAssociative()) && $recCnt < $stopRec) {
            $recCnt++;
            if ($recCnt >= $startRec) {
                $rowCnt = $recCnt - $startRec + 1;

                // Page break
                if ($this->ExportPageBreakCount > 0) {
                    if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0) {
                        $doc->exportPageBreak();
                    }
                }
                $this->loadListRowValues($row);

                // Render row
                $this->RowType = RowType::VIEW; // Render view
                $this->resetAttributes();
                $this->renderListRow();
                if (!$doc->ExportCustom) {
                    $doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
                    if ($exportPageType == "view") {
                        $doc->exportField($this->id);
                        $doc->exportField($this->cooperativa_id);
                        $doc->exportField($this->nombre_completo);
                        $doc->exportField($this->cedula);
                        $doc->exportField($this->telefono);
                        $doc->exportField($this->email);
                        $doc->exportField($this->fecha_ingreso);
                        $doc->exportField($this->created_at);
                        $doc->exportField($this->contrasena);
                        $doc->exportField($this->nivel_usuario);
                        $doc->exportField($this->updated_at);
                        $doc->exportField($this->sociosi);
                        $doc->exportField($this->cupo);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->cooperativa_id);
                        $doc->exportField($this->nombre_completo);
                        $doc->exportField($this->cedula);
                        $doc->exportField($this->telefono);
                        $doc->exportField($this->email);
                        $doc->exportField($this->fecha_ingreso);
                        $doc->exportField($this->created_at);
                        $doc->exportField($this->contrasena);
                        $doc->exportField($this->nivel_usuario);
                        $doc->exportField($this->updated_at);
                        $doc->exportField($this->sociosi);
                        $doc->exportField($this->cupo);
                    }
                    $doc->endExportRow($rowCnt);
                }
            }

            // Call Row Export server event
            if ($doc->ExportCustom) {
                $this->rowExport($doc, $row);
            }
        }
        if (!$doc->ExportCustom) {
            $doc->exportTableFooter();
        }
    }

    // Render lookup field for view
    public function renderLookupForView(string $name, mixed $value): mixed
    {
        $this->RowType = RowType::VIEW;
        return $value;
    }

    // Render lookup field for edit
    public function renderLookupForEdit(string $name, mixed $value): mixed
    {
        $this->RowType = RowType::EDIT;
        return $value;
    }

    // User ID filter
    public function getUserIDFilter(mixed $userId): string
    {
        $userIdExpression = $this->Fields[Config("USER_ID_FIELD_NAME")]->Expression;
        $userIdDataType = $this->Fields[Config("USER_ID_FIELD_NAME")]->DataType;
        $userIdFilter = $userIdExpression . ' = ' . QuotedValue($userId, $userIdDataType, Config("USER_TABLE_DBID"));
        if (count($this->security->UserLevelIDs) > 0) {
            $userLevelExpression = $this->Fields[Config("USER_LEVEL_FIELD_NAME")]->Expression;
            $userLevelUserIdFilter = $userIdExpression . ' IN (SELECT ' . $userIdExpression . ' FROM ' . "socios" . ' WHERE ' . $userLevelExpression . ' IN (' . implode(", ", $this->security->UserLevelIDs) . '))';
            AddFilter($userIdFilter, $userLevelUserIdFilter, "OR");
        }
        return $userIdFilter;
    }

    // Add User ID filter
    public function addUserIDFilter(string $filter = "", string $id = ""): string
    {
        $filterWrk = "";
        if ($id == "") {
            $id = CurrentPageID() == "list" ? strval($this->CurrentAction) : CurrentPageID();
        }
        if (!$this->userIDAllow($id) && !$this->security->canAccess()) {
            $filterWrk = $this->security->userIdList();
            if ($filterWrk != "") {
                $filterWrk = '`cooperativa_id` IN (' . $filterWrk . ')';
            }
        }

        // Call User ID Filtering event
        $this->userIdFiltering($filterWrk);
        AddFilter($filter, $filterWrk);
        return $filter;
    }

    // User ID subquery
    public function getUserIDSubquery(DbField &$fld, DbField &$masterfld): string
    {
        $wrk = "";
        $sql = "SELECT " . $masterfld->Expression . " FROM socios";
        $filter = $this->addUserIDFilter("");
        if ($filter != "") {
            $sql .= " WHERE " . $filter;
        }

        // List all values
        $conn = Conn($this->Dbid);
        if ($rows = $conn->executeCacheQuery($sql, [], [], $this->cacheProfile)->fetchAllNumeric()) {
            $wrk = implode(",", array_map(fn($row) => QuotedValue($row[0], $masterfld->DataType, $this->Dbid), $rows));
        }
        if ($wrk != "") {
            $wrk = $fld->Expression . " IN (" . $wrk . ")";
        } else { // No User ID value found
            $wrk = "0=1";
        }
        return $wrk;
    }

    // Send register email
    public function sendRegisterEmail(array $row): bool|string
    {
        $userName = $row[Config("LOGIN_USERNAME_FIELD_NAME")];
        $user = LoadUserByIdentifier($userName);
        $email = $this->prepareRegisterEmail($user);
        $args = ["row" => $row];
        $emailSent = false;
        if ($this->emailSending($email, $args)) { // Use Email_Sending server event of user table
            $emailSent = $email->send();
        }
        return $emailSent;
    }

    // Get activate link
    public function getActivateLink(UserInterface $user): string
    {
        $loginLink = CreateLoginLink($user, Config("ACTIVATE_LINK_LIFETIME"));
        return $loginLink->getUrl() . "&action=activate";
    }

    // Prepare register email
    public function prepareRegisterEmail(UserInterface $user, string $langId = ""): Email
    {
        $emailAddress = $user->get(Config("USER_EMAIL_FIELD_NAME")) ?: Config("RECIPIENT_EMAIL"); // Send to recipient directly if no email address
        $fields = [
            'id' => (object)[ "caption" => $this->id->caption(), "value" => $user->get('id') ],
            'cooperativa_id' => (object)[ "caption" => $this->cooperativa_id->caption(), "value" => $user->get('cooperativa_id') ],
            'nombre_completo' => (object)[ "caption" => $this->nombre_completo->caption(), "value" => $user->get('nombre_completo') ],
            'cedula' => (object)[ "caption" => $this->cedula->caption(), "value" => $user->get('cedula') ],
            'email' => (object)[ "caption" => $this->email->caption(), "value" => $user->get('email') ],
        ];
        $email = new Email();
        $data = [
            'From' => Config("SENDER_EMAIL"), // Replace Sender
            'To' => $emailAddress, // Replace Recipient
            'Fields' => $fields,
            'id' => $fields['id'],
            'cooperativa_id' => $fields['cooperativa_id'],
            'nombre_completo' => $fields['nombre_completo'],
            'cedula' => $fields['cedula'],
            'email' => $fields['email'],
        ];
        if (Config("REGISTER_ACTIVATE") && !IsEmpty(Config("USER_ACTIVATED_FIELD_NAME"))) {
            $data['ActivateLink'] = $this->getActivateLink($user);
        }
        $email->load(Config("EMAIL_REGISTER_TEMPLATE"), $langId, $data);

        // Add Bcc
        if (!SameText($emailAddress, Config("RECIPIENT_EMAIL"))) {
            $email->addBcc(Config("RECIPIENT_EMAIL"));
        }
        return $email;
    }

    // Get file data
    public function getFileData(string $fldparm, string $key, bool $resize, int $width = 0, int $height = 0, array $plugins = []): Response
    {
        global $DownloadFileName;

        // No binary fields
        return $response;
    }

    // Table level events

    // Table Load event
    public function tableLoad(): void
    {
        // Enter your code here
    }

    // Records Selecting event
    public function recordsSelecting(string &$filter): void
    {
    // Restringir registros por cooperativa
    if (CurrentUserLevel() != -1) { // -1 = Administrador general
        $cooperativaId = CurrentUserInfo("cooperativa_id");
        $filter = "cooperativa_id = " . intval($cooperativaId);
        AddFilter($filter, $filter);
    }
    }

    // Records Selected event
    public function recordsSelected(Result $result): void
    {
        //Log("Records Selected");
    }

    // Records Search Validated event
    public function recordsSearchValidated(): void
    {
        // Example:
        //$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value
    }

    // Records Searching event
    public function recordsSearching(string &$filter): void
    {
        // Enter your code here
    }

    // Row_Selecting event
    public function rowSelecting(string &$filter): void
    {
        // Enter your code here
    }

    // Row Selected event
    public function rowSelected(array &$row): void
    {
        //Log("Row Selected");
    }

    // Row Inserting event
    public function rowInserting(?array $oldRow, array &$newRow): ?bool
    {
        // Bloque para instertar coop_id automatico al editar.
        $nivelUsuario = $GLOBALS["Security"]->CurrentUserLevelID();
        // Admin de cooperativa
        if ($nivelUsuario == 1) {
            $rsnew["cooperativa_id"] = $GLOBALS["Security"]->currentUserInfo("cooperativa_id");
        }
        return true; // continuar inserción

        // Verifica si el usuario No es administrador gral.
        if (CurrentUserLevel() != -1) {
            $newRow["cooperativa_id"] = CurrentUserInfo("cooperativa_id");
            }
        return true;

        //Verificacion de cedula, en caso de existir registro no deja ingresar el usuario.
        // 1. Documento ingresado
        $documento = $rsnew["cedula"];

        // 2. Conexión a la base
        $conn = $this->getConnection();

        // 3. Consulta para buscar si ya existe este documento en cualquier cooperativa
        $sql = "SELECT nombre_completo, cooperativa_id
                FROM socios
                WHERE cedula = '" . AdjustSql($documento) . "'";
        $rschk = $conn->fetchAssoc($sql);

        // 4. Si encontró coincidencia
        if ($rschk) {
            // Obtener datos del socio existente
            $nombreExistente = $rschk["nombre_completo"];
            $coopExistente = $rschk["cooperativa_id"];

            // Mensaje personalizado
            $this->setFailureMessage(
                "El documento ya está registrado por: " . $nombreExistente . 
                " (Cooperativa ID: " . $coopExistente . ")."
            );

            // Bloquear inserción
            return false;
        }

        // 5. Si no existe, permitir insertar
        return true;

        //Verificacion de email, en caso de existir registro no deja ingresar el usuario.
        // 1. email ingresado
        $email = $rsnew["email"];

        // 2. Conexión a la base
        $conn = $this->getConnection();

        // 3. Consulta para buscar si ya existe este documento en cualquier cooperativa
        $sql = "SELECT nombre_completo, cooperativa_id
                FROM socios
                WHERE email = '" . AdjustSql($email) . "'";
        $rschk = $conn->fetchAssoc($sql);

        // 4. Si encontró coincidencia
        if ($rschk) {
            // Obtener datos del socio existente
            $nombreExistente = $rschk["nombre_completo"];
            $coopExistente = $rschk["cooperativa_id"];

            // Mensaje personalizado
            $this->setFailureMessage(
                "El email ya está registrado por: " . $nombreExistente . 
                " (Cooperativa ID: " . $coopExistente . ")."
            );

            // Bloquear inserción
            return false;
        }

        // 5. Si no existe, permitir insertar
        return true;
        /*
        // Asignacion de cupos
        // id de la cooperativa del socio
        $cooperativa_id = $newRow['cooperativa_id'];
        // Cupo que se intentara asignar
        $cupo = $newRow['cupo'];

        // Obtener numero de cupo de la cooperativa
        $sqlcupo = "SELECT numero_cupos FROM cooperativas WHERE id =?";
        $stmt = $conn->prepare($sqlcupo);
        $stmt->bind_param("i", $cooperativa_id);
        $stmt->execute();
        $stmt->bind_result($numero_cupos);
        $stmt->fetch();
        $stmt->close();

        // Validar que el cupo exista
        if ($cupo < 1 || $cupo >$numero_cupos) {
            $this->setFailureMesage("El cupo seleccionado no existe en esta cooperativa.");
            return FALSE; // Cancela la insercion / actualizacion
        }
        return TRUE; // Todo ok
        */
    }

    // Row Inserted event
    public function rowInserted(?array $oldRow, array $newRow): void
    {
        //Log("Row Inserted");
    }

    // Row Updating event
    public function rowUpdating(array $oldRow, array &$newRow): ?bool
    {
        // Verifica si el usuario No es administrador gral.
        if (CurrentUserLevel() != -1) {
            $newRow["cooperativa_id"] = CurrentUserInfo("cooperativa_id");
            }
        return true;
    }

    // Row Updated event
    public function rowUpdated(array $oldRow, array $newRow): void
    {
        //Log("Row Updated");
    }

    // Row Update Conflict event
    public function rowUpdateConflict(array $oldRow, array &$newRow): bool
    {
        // Enter your code here
        // To ignore conflict, set return value to false
        return true;
    }

    // Grid Inserting event
    public function gridInserting(): bool
    {
        // Enter your code here
        // To reject grid insert, set return value to false
        return true;
    }

    // Grid Inserted event
    public function gridInserted(array $rows): void
    {
        //Log("Grid Inserted");
    }

    // Grid Updating event
    public function gridUpdating(array $rows): bool
    {
        // Enter your code here
        // To reject grid update, set return value to false
        return true;
    }

    // Grid Updated event
    public function gridUpdated(array $oldRows, array $newRows): void
    {
        //Log("Grid Updated");
    }

    // Row Deleting event
    public function rowDeleting(array $row): ?bool
    {
        // Enter your code here
        // To cancel, set return value to false
        // To skip for grid insert/update, set return value to null
        return true;
    }

    // Row Deleted event
    public function rowDeleted(array $row): void
    {
        //Log("Row Deleted");
    }

    // Email Sending event
    public function emailSending(Email $email, array $args): bool
    {
        //var_dump($email, $args); exit();
        return true;
    }

    // Lookup Selecting event
    public function lookupSelecting(DbField $field, string &$filter): void
    {
        /*if ($field->Name == "cupo") {
            $coopId = $this->cooperativa_id->CurrentValue;
            if (!EmptyValue($coopId)) {
                $sql = "SELECT numero_cupos FROM cooperativas WHERE id = " . intval($coopId);
                $maxCupos = ExecuteScalar($sql);
                if ($maxCupos > 0) {
                    $cupos = [];
                    for ($i = 1; $i <= $maxCupos; $i++) {
                        $cupos[] = $i;
                    }
                    $filter = "`cupo` IN (" . implode(",", $cupos) . ")";
                } else {
                    $filter = "0=1";
                }
            } else {
                $filter = "0=1";
            }
        }*/
    }

    // Row Rendering event
    public function rowRendering(): void
    {
        // Enter your code here
    }

    // Row Rendered event
    public function rowRendered(): void
    {
        $nivelUsuario = $GLOBALS["Security"]->CurrentUserLevelID();

        // SUPERADMIN (-1)
        if ($nivelUsuario == -1) {
            $this->cooperativa_id->Visible = true;
        } 
        // ADMIN DE COOPERATIVA (1)
        elseif ($nivelUsuario == 1) {
            $this->cooperativa_id->Visible = false;

            // Obtener cooperativa del admin
            $coopId = $GLOBALS["Security"]->currentUserInfo("cooperativa_id");

            // Verificar que exista en cooperativas
            $existe = ExecuteScalar("SELECT COUNT(*) FROM cooperativas WHERE id = " . intval($coopId));
            if ($existe) {
                $this->cooperativa_id->CurrentValue = $coopId;
            } else {
                $this->setFailureMessage("La cooperativa asignada al administrador no existe en el sistema.");
                $this->cooperativa_id->CurrentValue = null;
            }
        }
    }

    // User ID Filtering event
    public function userIdFiltering(string &$filter): void
    {
        // Enter your code here
    }
}
