<?php

namespace PHPMaker2025\project240825SeleccionarManualCoop;

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
$USER_LEVEL_PRIVS = [["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}aportes_legales","-2","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}aportes_legales","0","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}aportes_legales","1","16777215"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}aportes_legales","2","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}compras","-2","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}compras","0","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}compras","1","16777215"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}compras","2","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}cooperativas","-2","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}cooperativas","0","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}cooperativas","1","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}cooperativas","2","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}horas_trabajadas","-2","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}horas_trabajadas","0","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}horas_trabajadas","1","16777215"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}horas_trabajadas","2","16777215"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}ingresos","-2","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}ingresos","0","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}ingresos","1","16777215"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}ingresos","2","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}movimientos_stock","-2","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}movimientos_stock","0","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}movimientos_stock","1","16777215"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}movimientos_stock","2","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}pagos_socios","-2","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}pagos_socios","0","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}pagos_socios","1","16777215"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}pagos_socios","2","16777215"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}proveedores","-2","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}proveedores","0","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}proveedores","1","16777215"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}proveedores","2","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}socios","-2","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}socios","0","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}socios","1","16777215"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}socios","2","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}stock","-2","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}stock","0","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}stock","1","16777215"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}stock","2","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}actividad_log","-2","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}actividad_log","0","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}actividad_log","1","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}actividad_log","2","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}usuarios","-2","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}usuarios","0","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}usuarios","1","0"],
    ["{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}usuarios","2","0"]];

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
$USER_LEVEL_TABLES = [["aportes_legales","aportes_legales","aportes legales",true,"{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}","AportesLegalesList"],
    ["compras","compras","compras",true,"{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}","ComprasList"],
    ["cooperativas","cooperativas","cooperativas",true,"{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}","CooperativasList"],
    ["horas_trabajadas","horas_trabajadas","horas trabajadas",true,"{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}","HorasTrabajadasList"],
    ["ingresos","ingresos","ingresos",true,"{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}","IngresosList"],
    ["movimientos_stock","movimientos_stock","movimientos stock",true,"{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}","MovimientosStockList"],
    ["pagos_socios","pagos_socios","pagos socios",true,"{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}","PagosSociosList"],
    ["proveedores","proveedores","proveedores",true,"{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}","ProveedoresList"],
    ["socios","socios","socios",true,"{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}","SociosList"],
    ["stock","stock","stock",true,"{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}","StockList"],
    ["actividad_log","actividad_log","actividad log",true,"{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}","ActividadLogList"],
    ["usuarios","usuarios","usuarios",true,"{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}","UsuariosList"]];
