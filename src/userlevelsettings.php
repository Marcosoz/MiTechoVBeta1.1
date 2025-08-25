<?php

namespace PHPMaker2025\project250825AsignacionAutomaticaCoopASocios;

/**
 * User levels
 *
 * @var array<int, string, string>
 * [0] int User level ID
 * [1] string User level name
 * [2] string User level hierarchy
 */
$USER_LEVELS = [["-2","Anonymous",""],
    ["0","Default",""],
    ["1","Administrador Cooperativa",""],
    ["2","Socios",""]];

/**
 * User roles
 *
 * @var array<int, string>
 * [0] int User level ID
 * [1] string User role name
 */
$USER_ROLES = [["-1","ROLE_ADMIN"],
    ["0","ROLE_DEFAULT"],
    ["1","ROLE_ADMINISTRADOR_COOPERATIVA"],
    ["2","ROLE_SOCIOS"]];

/**
 * User level permissions
 *
 * @var array<string, int, int>
 * [0] string Project ID + Table name
 * [1] int User level ID
 * [2] int Permissions
 */
$USER_LEVEL_PRIVS = [["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}aportes_legales","-2","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}aportes_legales","0","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}aportes_legales","1","16777215"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}aportes_legales","2","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}compras","-2","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}compras","0","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}compras","1","16777215"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}compras","2","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}cooperativas","-2","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}cooperativas","0","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}cooperativas","1","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}cooperativas","2","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}horas_trabajadas","-2","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}horas_trabajadas","0","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}horas_trabajadas","1","16777215"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}horas_trabajadas","2","16777215"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}ingresos","-2","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}ingresos","0","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}ingresos","1","16777215"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}ingresos","2","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}movimientos_stock","-2","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}movimientos_stock","0","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}movimientos_stock","1","16777215"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}movimientos_stock","2","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}pagos_socios","-2","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}pagos_socios","0","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}pagos_socios","1","16777215"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}pagos_socios","2","16777215"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}proveedores","-2","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}proveedores","0","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}proveedores","1","16777215"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}proveedores","2","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}socios","-2","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}socios","0","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}socios","1","16777215"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}socios","2","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}stock","-2","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}stock","0","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}stock","1","16777215"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}stock","2","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}actividad_log","-2","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}actividad_log","0","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}actividad_log","1","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}actividad_log","2","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}usuarios","-2","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}usuarios","0","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}usuarios","1","0"],
    ["{A81AC1CA-32D0-4E22-8311-13FE01D4E508}usuarios","2","0"]];

/**
 * Tables
 *
 * @var array<string, string, string, bool, string>
 * [0] string Table name
 * [1] string Table variable name
 * [2] string Table caption
 * [3] bool Allowed for update (for userpriv.php)
 * [4] string Project ID
 * [5] string URL (for OthersController::index)
 */
$USER_LEVEL_TABLES = [["aportes_legales","aportes_legales","aportes legales",true,"{A81AC1CA-32D0-4E22-8311-13FE01D4E508}","AportesLegalesList"],
    ["compras","compras","compras",true,"{A81AC1CA-32D0-4E22-8311-13FE01D4E508}","ComprasList"],
    ["cooperativas","cooperativas","cooperativas",true,"{A81AC1CA-32D0-4E22-8311-13FE01D4E508}","CooperativasList"],
    ["horas_trabajadas","horas_trabajadas","horas trabajadas",true,"{A81AC1CA-32D0-4E22-8311-13FE01D4E508}","HorasTrabajadasList"],
    ["ingresos","ingresos","ingresos",true,"{A81AC1CA-32D0-4E22-8311-13FE01D4E508}","IngresosList"],
    ["movimientos_stock","movimientos_stock","movimientos stock",true,"{A81AC1CA-32D0-4E22-8311-13FE01D4E508}","MovimientosStockList"],
    ["pagos_socios","pagos_socios","pagos socios",true,"{A81AC1CA-32D0-4E22-8311-13FE01D4E508}","PagosSociosList"],
    ["proveedores","proveedores","proveedores",true,"{A81AC1CA-32D0-4E22-8311-13FE01D4E508}","ProveedoresList"],
    ["socios","socios","socios",true,"{A81AC1CA-32D0-4E22-8311-13FE01D4E508}","SociosList"],
    ["stock","stock","stock",true,"{A81AC1CA-32D0-4E22-8311-13FE01D4E508}","StockList"],
    ["actividad_log","actividad_log","actividad log",true,"{A81AC1CA-32D0-4E22-8311-13FE01D4E508}","ActividadLogList"],
    ["usuarios","usuarios","usuarios",true,"{A81AC1CA-32D0-4E22-8311-13FE01D4E508}","UsuariosList"]];
