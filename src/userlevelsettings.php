<?php

namespace PHPMaker2025\project221825;

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
$USER_LEVEL_PRIVS = [["{4163245C-1E47-494B-853A-FA85D801B9EC}aportes_legales","-2","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}aportes_legales","0","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}aportes_legales","1","16777215"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}aportes_legales","2","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}compras","-2","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}compras","0","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}compras","1","16777215"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}compras","2","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}cooperativas","-2","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}cooperativas","0","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}cooperativas","1","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}cooperativas","2","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}horas_trabajadas","-2","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}horas_trabajadas","0","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}horas_trabajadas","1","16777215"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}horas_trabajadas","2","16777215"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}ingresos","-2","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}ingresos","0","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}ingresos","1","16777215"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}ingresos","2","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}movimientos_stock","-2","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}movimientos_stock","0","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}movimientos_stock","1","16777215"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}movimientos_stock","2","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}pagos_socios","-2","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}pagos_socios","0","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}pagos_socios","1","16777215"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}pagos_socios","2","16777215"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}proveedores","-2","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}proveedores","0","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}proveedores","1","16777215"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}proveedores","2","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}socios","-2","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}socios","0","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}socios","1","16777215"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}socios","2","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}stock","-2","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}stock","0","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}stock","1","16777215"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}stock","2","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}actividad_log","-2","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}actividad_log","0","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}actividad_log","1","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}actividad_log","2","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}usuarios","-2","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}usuarios","0","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}usuarios","1","0"],
    ["{4163245C-1E47-494B-853A-FA85D801B9EC}usuarios","2","0"]];

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
$USER_LEVEL_TABLES = [["aportes_legales","aportes_legales","aportes legales",true,"{4163245C-1E47-494B-853A-FA85D801B9EC}","AportesLegalesList"],
    ["compras","compras","compras",true,"{4163245C-1E47-494B-853A-FA85D801B9EC}","ComprasList"],
    ["cooperativas","cooperativas","cooperativas",true,"{4163245C-1E47-494B-853A-FA85D801B9EC}","CooperativasList"],
    ["horas_trabajadas","horas_trabajadas","horas trabajadas",true,"{4163245C-1E47-494B-853A-FA85D801B9EC}","HorasTrabajadasList"],
    ["ingresos","ingresos","ingresos",true,"{4163245C-1E47-494B-853A-FA85D801B9EC}","IngresosList"],
    ["movimientos_stock","movimientos_stock","movimientos stock",true,"{4163245C-1E47-494B-853A-FA85D801B9EC}","MovimientosStockList"],
    ["pagos_socios","pagos_socios","pagos socios",true,"{4163245C-1E47-494B-853A-FA85D801B9EC}","PagosSociosList"],
    ["proveedores","proveedores","proveedores",true,"{4163245C-1E47-494B-853A-FA85D801B9EC}","ProveedoresList"],
    ["socios","socios","socios",true,"{4163245C-1E47-494B-853A-FA85D801B9EC}","SociosList"],
    ["stock","stock","stock",true,"{4163245C-1E47-494B-853A-FA85D801B9EC}","StockList"],
    ["actividad_log","actividad_log","actividad log",true,"{4163245C-1E47-494B-853A-FA85D801B9EC}","ActividadLogList"],
    ["usuarios","usuarios","usuarios",true,"{4163245C-1E47-494B-853A-FA85D801B9EC}","UsuariosList"]];
