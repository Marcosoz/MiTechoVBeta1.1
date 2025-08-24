<?php

namespace PHPMaker2025\project240825SeleccionarManualCoop;

// Navbar menu
$topMenu = new Menu("navbar", true, true);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", true, false);
$sideMenu->addMenuItem(1, "mi_aportes_legales", $Language->menuPhrase("1", "MenuText"), "AportesLegalesList", -1, "", AllowListMenu('{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}aportes_legales'), false, false, "", "", false, true);
$sideMenu->addMenuItem(2, "mi_stock", $Language->menuPhrase("2", "MenuText"), "StockList", -1, "", AllowListMenu('{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}stock'), false, false, "", "", false, true);
$sideMenu->addMenuItem(3, "mi_socios", $Language->menuPhrase("3", "MenuText"), "SociosList", -1, "", AllowListMenu('{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}socios'), false, false, "", "", false, true);
$sideMenu->addMenuItem(4, "mi_proveedores", $Language->menuPhrase("4", "MenuText"), "ProveedoresList", -1, "", AllowListMenu('{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}proveedores'), false, false, "", "", false, true);
$sideMenu->addMenuItem(5, "mi_pagos_socios", $Language->menuPhrase("5", "MenuText"), "PagosSociosList", -1, "", AllowListMenu('{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}pagos_socios'), false, false, "", "", false, true);
$sideMenu->addMenuItem(6, "mi_movimientos_stock", $Language->menuPhrase("6", "MenuText"), "MovimientosStockList", -1, "", AllowListMenu('{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}movimientos_stock'), false, false, "", "", false, true);
$sideMenu->addMenuItem(7, "mi_horas_trabajadas", $Language->menuPhrase("7", "MenuText"), "HorasTrabajadasList", -1, "", AllowListMenu('{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}horas_trabajadas'), false, false, "", "", false, true);
$sideMenu->addMenuItem(8, "mi_cooperativas", $Language->menuPhrase("8", "MenuText"), "CooperativasList", -1, "", AllowListMenu('{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}cooperativas'), false, false, "", "", false, true);
$sideMenu->addMenuItem(9, "mi_compras", $Language->menuPhrase("9", "MenuText"), "ComprasList", -1, "", AllowListMenu('{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}compras'), false, false, "", "", false, true);
$sideMenu->addMenuItem(10, "mi_ingresos", $Language->menuPhrase("10", "MenuText"), "IngresosList", -1, "", AllowListMenu('{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}ingresos'), false, false, "", "", false, true);
$sideMenu->addMenuItem(11, "mi_actividad_log", $Language->menuPhrase("11", "MenuText"), "ActividadLogList", -1, "", AllowListMenu('{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}actividad_log'), false, false, "", "", false, true);
$sideMenu->addMenuItem(12, "mi_usuarios", $Language->menuPhrase("12", "MenuText"), "UsuariosList", -1, "", AllowListMenu('{B7BE75E3-663E-4081-9EE1-23CDCEE47BA8}usuarios'), false, false, "", "", false, true);
echo $sideMenu->toScript();
