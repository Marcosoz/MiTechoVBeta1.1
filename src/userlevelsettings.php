<?php

namespace PHPMaker2025\project290825TrabajosCreatedAT;

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
$USER_LEVEL_PRIVS = [["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}aportes_legales","-2","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}aportes_legales","0","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}aportes_legales","1","16777215"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}aportes_legales","2","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}compras","-2","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}compras","0","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}compras","1","16777215"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}compras","2","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}cooperativas","-2","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}cooperativas","0","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}cooperativas","1","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}cooperativas","2","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}horas_trabajadas","-2","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}horas_trabajadas","0","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}horas_trabajadas","1","16777215"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}horas_trabajadas","2","16777215"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}ingresos","-2","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}ingresos","0","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}ingresos","1","16777215"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}ingresos","2","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}movimientos_stock","-2","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}movimientos_stock","0","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}movimientos_stock","1","16777215"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}movimientos_stock","2","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}pagos_socios","-2","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}pagos_socios","0","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}pagos_socios","1","16777215"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}pagos_socios","2","16777215"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}proveedores","-2","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}proveedores","0","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}proveedores","1","16777215"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}proveedores","2","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}socios","-2","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}socios","0","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}socios","1","16777215"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}socios","2","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}stock","-2","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}stock","0","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}stock","1","16777215"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}stock","2","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}actividad_log","-2","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}actividad_log","0","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}actividad_log","1","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}actividad_log","2","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}usuarios","-2","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}usuarios","0","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}usuarios","1","0"],
    ["{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}usuarios","2","0"]];

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
$USER_LEVEL_TABLES = [["aportes_legales","aportes_legales","aportes legales",true,"{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}","AportesLegalesList"],
    ["compras","compras","compras",true,"{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}","ComprasList"],
    ["cooperativas","cooperativas","cooperativas",true,"{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}","CooperativasList"],
    ["horas_trabajadas","horas_trabajadas","horas trabajadas",true,"{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}","HorasTrabajadasList"],
    ["ingresos","ingresos","ingresos",true,"{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}","IngresosList"],
    ["movimientos_stock","movimientos_stock","movimientos stock",true,"{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}","MovimientosStockList"],
    ["pagos_socios","pagos_socios","pagos socios",true,"{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}","PagosSociosList"],
    ["proveedores","proveedores","proveedores",true,"{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}","ProveedoresList"],
    ["socios","socios","socios",true,"{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}","SociosList"],
    ["stock","stock","stock",true,"{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}","StockList"],
    ["actividad_log","actividad_log","actividad log",true,"{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}","ActividadLogList"],
    ["usuarios","usuarios","usuarios",true,"{1E20465B-36C6-4BDF-85AC-982EDCBA0E9A}","UsuariosList"]];
