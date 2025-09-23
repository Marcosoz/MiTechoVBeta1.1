<?php

namespace PHPMaker2025\project22092025TrabajosCupoParentField;

// Navbar menu
$topMenu = new Menu("navbar", true, true);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", true, false);
$sideMenu->addMenuItem(1, "mi_aportes_legales", $Language->menuPhrase("1", "MenuText"), "AportesLegalesList", -1, "", AllowListMenu('{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}aportes_legales'), false, false, "", "", false, true);
$sideMenu->addMenuItem(2, "mi_stock", $Language->menuPhrase("2", "MenuText"), "StockList", -1, "", AllowListMenu('{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}stock'), false, false, "", "", false, true);
$sideMenu->addMenuItem(3, "mi_socios", $Language->menuPhrase("3", "MenuText"), "SociosList", -1, "", AllowListMenu('{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}socios'), false, false, "", "", false, true);
$sideMenu->addMenuItem(4, "mi_proveedores", $Language->menuPhrase("4", "MenuText"), "ProveedoresList", -1, "", AllowListMenu('{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}proveedores'), false, false, "", "", false, true);
$sideMenu->addMenuItem(5, "mi_pagos_socios", $Language->menuPhrase("5", "MenuText"), "PagosSociosList", -1, "", AllowListMenu('{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}pagos_socios'), false, false, "", "", false, true);
$sideMenu->addMenuItem(6, "mi_movimientos_stock", $Language->menuPhrase("6", "MenuText"), "MovimientosStockList", -1, "", AllowListMenu('{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}movimientos_stock'), false, false, "", "", false, true);
$sideMenu->addMenuItem(7, "mi_horas_trabajadas", $Language->menuPhrase("7", "MenuText"), "HorasTrabajadasList", -1, "", AllowListMenu('{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}horas_trabajadas'), false, false, "", "", false, true);
$sideMenu->addMenuItem(8, "mi_cooperativas", $Language->menuPhrase("8", "MenuText"), "CooperativasList", -1, "", AllowListMenu('{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}cooperativas'), false, false, "", "", false, true);
$sideMenu->addMenuItem(9, "mi_compras", $Language->menuPhrase("9", "MenuText"), "ComprasList", -1, "", AllowListMenu('{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}compras'), false, false, "", "", false, true);
$sideMenu->addMenuItem(10, "mi_ingresos", $Language->menuPhrase("10", "MenuText"), "IngresosList", -1, "", AllowListMenu('{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}ingresos'), false, false, "", "", false, true);
$sideMenu->addMenuItem(11, "mi_actividad_log", $Language->menuPhrase("11", "MenuText"), "ActividadLogList", -1, "", AllowListMenu('{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}actividad_log'), false, false, "", "", false, true);
$sideMenu->addMenuItem(12, "mi_usuarios", $Language->menuPhrase("12", "MenuText"), "UsuariosList", -1, "", AllowListMenu('{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}usuarios'), false, false, "", "", false, true);
$sideMenu->addMenuItem(13, "mi_cupos", $Language->menuPhrase("13", "MenuText"), "CuposList", -1, "", AllowListMenu('{29B1FFB6-C0FF-469B-A397-61C0ADB6819E}cupos'), false, false, "", "", false, true);
echo $sideMenu->toScript();
