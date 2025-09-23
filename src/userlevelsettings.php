<?php

namespace PHPMaker2025\project22092025TrabajosCupoParentField;

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
$USER_LEVEL_PRIVS = [["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}aportes_legales","-2","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}aportes_legales","0","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}aportes_legales","1","16777215"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}aportes_legales","2","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}compras","-2","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}compras","0","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}compras","1","16777215"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}compras","2","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}cooperativas","-2","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}cooperativas","0","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}cooperativas","1","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}cooperativas","2","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}horas_trabajadas","-2","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}horas_trabajadas","0","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}horas_trabajadas","1","16777215"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}horas_trabajadas","2","16777215"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}ingresos","-2","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}ingresos","0","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}ingresos","1","16777215"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}ingresos","2","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}movimientos_stock","-2","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}movimientos_stock","0","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}movimientos_stock","1","16777215"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}movimientos_stock","2","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}pagos_socios","-2","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}pagos_socios","0","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}pagos_socios","1","16777215"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}pagos_socios","2","16777215"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}proveedores","-2","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}proveedores","0","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}proveedores","1","16777215"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}proveedores","2","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}socios","-2","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}socios","0","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}socios","1","4095"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}socios","2","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}stock","-2","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}stock","0","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}stock","1","16777215"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}stock","2","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}actividad_log","-2","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}actividad_log","0","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}actividad_log","1","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}actividad_log","2","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}usuarios","-2","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}usuarios","0","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}usuarios","1","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}usuarios","2","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}cupos","-2","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}cupos","0","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}cupos","1","0"],
    ["{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}cupos","2","0"]];

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
$USER_LEVEL_TABLES = [["aportes_legales","aportes_legales","aportes legales",true,"{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}","AportesLegalesList"],
    ["compras","compras","compras",true,"{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}","ComprasList"],
    ["cooperativas","cooperativas","cooperativas",true,"{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}","CooperativasList"],
    ["horas_trabajadas","horas_trabajadas","horas trabajadas",true,"{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}","HorasTrabajadasList"],
    ["ingresos","ingresos","ingresos",true,"{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}","IngresosList"],
    ["movimientos_stock","movimientos_stock","movimientos stock",true,"{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}","MovimientosStockList"],
    ["pagos_socios","pagos_socios","pagos socios",true,"{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}","PagosSociosList"],
    ["proveedores","proveedores","proveedores",true,"{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}","ProveedoresList"],
    ["socios","socios","socios",true,"{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}","SociosList"],
    ["stock","stock","stock",true,"{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}","StockList"],
    ["actividad_log","actividad_log","actividad log",true,"{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}","ActividadLogList"],
    ["usuarios","usuarios","usuarios",true,"{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}","UsuariosList"],
    ["cupos","cupos","cupos",true,"{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}","CuposList"]];
