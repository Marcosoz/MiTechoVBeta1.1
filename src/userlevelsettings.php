<?php

namespace PHPMaker2025\project250825NoRepiteCIniEmailEnNuevosIngresos;

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
$USER_LEVEL_PRIVS = [["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}aportes_legales","-2","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}aportes_legales","0","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}aportes_legales","1","16777215"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}aportes_legales","2","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}compras","-2","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}compras","0","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}compras","1","16777215"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}compras","2","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}cooperativas","-2","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}cooperativas","0","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}cooperativas","1","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}cooperativas","2","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}horas_trabajadas","-2","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}horas_trabajadas","0","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}horas_trabajadas","1","16777215"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}horas_trabajadas","2","16777215"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}ingresos","-2","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}ingresos","0","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}ingresos","1","16777215"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}ingresos","2","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}movimientos_stock","-2","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}movimientos_stock","0","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}movimientos_stock","1","16777215"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}movimientos_stock","2","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}pagos_socios","-2","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}pagos_socios","0","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}pagos_socios","1","16777215"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}pagos_socios","2","16777215"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}proveedores","-2","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}proveedores","0","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}proveedores","1","16777215"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}proveedores","2","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}socios","-2","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}socios","0","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}socios","1","16777215"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}socios","2","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}stock","-2","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}stock","0","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}stock","1","16777215"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}stock","2","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}actividad_log","-2","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}actividad_log","0","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}actividad_log","1","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}actividad_log","2","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}usuarios","-2","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}usuarios","0","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}usuarios","1","0"],
    ["{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}usuarios","2","0"]];

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
$USER_LEVEL_TABLES = [["aportes_legales","aportes_legales","aportes legales",true,"{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}","AportesLegalesList"],
    ["compras","compras","compras",true,"{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}","ComprasList"],
    ["cooperativas","cooperativas","cooperativas",true,"{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}","CooperativasList"],
    ["horas_trabajadas","horas_trabajadas","horas trabajadas",true,"{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}","HorasTrabajadasList"],
    ["ingresos","ingresos","ingresos",true,"{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}","IngresosList"],
    ["movimientos_stock","movimientos_stock","movimientos stock",true,"{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}","MovimientosStockList"],
    ["pagos_socios","pagos_socios","pagos socios",true,"{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}","PagosSociosList"],
    ["proveedores","proveedores","proveedores",true,"{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}","ProveedoresList"],
    ["socios","socios","socios",true,"{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}","SociosList"],
    ["stock","stock","stock",true,"{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}","StockList"],
    ["actividad_log","actividad_log","actividad log",true,"{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}","ActividadLogList"],
    ["usuarios","usuarios","usuarios",true,"{C423DE49-5AC5-4071-ABDE-3500DB33A9A1}","UsuariosList"]];
