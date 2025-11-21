<?php
require_once dirname(__DIR__) . '/Models/class.pdoMudry.inc.php';
require_once dirname(__DIR__) . '/Models/m_avion.php';
require_once dirname(__DIR__) . '/Models/m_employer.php';
require_once dirname(__DIR__) . '/Models/m_role.php';
require_once dirname(__DIR__) . '/Models/m_modele.php';

$pdo = PdoMudry::getPdoMudry();

$modeleAvion = new MouvementModel();
$modeleEmploye = new AvionModel();
$modeleRole = new RoleModel();
$modeleModele = new ModeleModel();


