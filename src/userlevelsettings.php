<?php

namespace PHPMaker2025\project22092025ReparadoAsignacionCoopAutom;

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
$USER_LEVEL_PRIVS = [["{F0DA6626-7823-457E-805D-DB554F6B0901}aportes_legales","-2","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}aportes_legales","0","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}aportes_legales","1","16777215"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}aportes_legales","2","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}compras","-2","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}compras","0","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}compras","1","16777215"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}compras","2","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}cooperativas","-2","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}cooperativas","0","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}cooperativas","1","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}cooperativas","2","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}horas_trabajadas","-2","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}horas_trabajadas","0","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}horas_trabajadas","1","16777215"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}horas_trabajadas","2","16777215"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}ingresos","-2","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}ingresos","0","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}ingresos","1","16777215"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}ingresos","2","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}movimientos_stock","-2","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}movimientos_stock","0","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}movimientos_stock","1","16777215"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}movimientos_stock","2","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}pagos_socios","-2","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}pagos_socios","0","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}pagos_socios","1","16777215"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}pagos_socios","2","16777215"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}proveedores","-2","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}proveedores","0","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}proveedores","1","16777215"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}proveedores","2","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}socios","-2","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}socios","0","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}socios","1","4095"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}socios","2","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}stock","-2","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}stock","0","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}stock","1","16777215"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}stock","2","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}actividad_log","-2","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}actividad_log","0","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}actividad_log","1","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}actividad_log","2","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}usuarios","-2","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}usuarios","0","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}usuarios","1","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}usuarios","2","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}cupos","-2","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}cupos","0","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}cupos","1","0"],
    ["{F0DA6626-7823-457E-805D-DB554F6B0901}cupos","2","0"]];

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
$USER_LEVEL_TABLES = [["aportes_legales","aportes_legales","aportes legales",true,"{F0DA6626-7823-457E-805D-DB554F6B0901}","AportesLegalesList"],
    ["compras","compras","compras",true,"{F0DA6626-7823-457E-805D-DB554F6B0901}","ComprasList"],
    ["cooperativas","cooperativas","cooperativas",true,"{F0DA6626-7823-457E-805D-DB554F6B0901}","CooperativasList"],
    ["horas_trabajadas","horas_trabajadas","horas trabajadas",true,"{F0DA6626-7823-457E-805D-DB554F6B0901}","HorasTrabajadasList"],
    ["ingresos","ingresos","ingresos",true,"{F0DA6626-7823-457E-805D-DB554F6B0901}","IngresosList"],
    ["movimientos_stock","movimientos_stock","movimientos stock",true,"{F0DA6626-7823-457E-805D-DB554F6B0901}","MovimientosStockList"],
    ["pagos_socios","pagos_socios","pagos socios",true,"{F0DA6626-7823-457E-805D-DB554F6B0901}","PagosSociosList"],
    ["proveedores","proveedores","proveedores",true,"{F0DA6626-7823-457E-805D-DB554F6B0901}","ProveedoresList"],
    ["socios","socios","socios",true,"{F0DA6626-7823-457E-805D-DB554F6B0901}","SociosList"],
    ["stock","stock","stock",true,"{F0DA6626-7823-457E-805D-DB554F6B0901}","StockList"],
    ["actividad_log","actividad_log","actividad log",true,"{F0DA6626-7823-457E-805D-DB554F6B0901}","ActividadLogList"],
    ["usuarios","usuarios","usuarios",true,"{F0DA6626-7823-457E-805D-DB554F6B0901}","UsuariosList"],
    ["cupos","cupos","cupos",true,"{F0DA6626-7823-457E-805D-DB554F6B0901}","CuposList"]];
