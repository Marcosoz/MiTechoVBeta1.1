<?php

namespace PHPMaker2025\project240825;

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
$USER_LEVEL_PRIVS = [["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}aportes_legales","-2","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}aportes_legales","0","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}aportes_legales","1","16777215"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}aportes_legales","2","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}compras","-2","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}compras","0","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}compras","1","16777215"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}compras","2","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}cooperativas","-2","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}cooperativas","0","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}cooperativas","1","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}cooperativas","2","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}horas_trabajadas","-2","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}horas_trabajadas","0","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}horas_trabajadas","1","16777215"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}horas_trabajadas","2","16777215"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}ingresos","-2","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}ingresos","0","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}ingresos","1","16777215"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}ingresos","2","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}movimientos_stock","-2","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}movimientos_stock","0","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}movimientos_stock","1","16777215"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}movimientos_stock","2","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}pagos_socios","-2","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}pagos_socios","0","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}pagos_socios","1","16777215"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}pagos_socios","2","16777215"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}proveedores","-2","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}proveedores","0","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}proveedores","1","16777215"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}proveedores","2","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}socios","-2","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}socios","0","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}socios","1","16777215"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}socios","2","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}stock","-2","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}stock","0","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}stock","1","16777215"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}stock","2","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}actividad_log","-2","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}actividad_log","0","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}actividad_log","1","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}actividad_log","2","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}usuarios","-2","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}usuarios","0","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}usuarios","1","0"],
    ["{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}usuarios","2","0"]];

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
$USER_LEVEL_TABLES = [["aportes_legales","aportes_legales","aportes legales",true,"{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}","AportesLegalesList"],
    ["compras","compras","compras",true,"{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}","ComprasList"],
    ["cooperativas","cooperativas","cooperativas",true,"{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}","CooperativasList"],
    ["horas_trabajadas","horas_trabajadas","horas trabajadas",true,"{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}","HorasTrabajadasList"],
    ["ingresos","ingresos","ingresos",true,"{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}","IngresosList"],
    ["movimientos_stock","movimientos_stock","movimientos stock",true,"{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}","MovimientosStockList"],
    ["pagos_socios","pagos_socios","pagos socios",true,"{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}","PagosSociosList"],
    ["proveedores","proveedores","proveedores",true,"{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}","ProveedoresList"],
    ["socios","socios","socios",true,"{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}","SociosList"],
    ["stock","stock","stock",true,"{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}","StockList"],
    ["actividad_log","actividad_log","actividad log",true,"{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}","ActividadLogList"],
    ["usuarios","usuarios","usuarios",true,"{91E0AA9A-3464-44A0-84FE-F7D207FCD4C4}","UsuariosList"]];
