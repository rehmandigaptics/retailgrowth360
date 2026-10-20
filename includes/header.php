<?php
$pageTitle = $pageTitle ?? 'RetailGrowth360 | Growth Systems for Modern Retail';
$pageDescription = $pageDescription ?? 'RetailGrowth360 helps modern retailers grow through strategy, digital marketing, automation, customer experience, analytics and conversion-focused technology.';
$activePage = $activePage ?? '';
$bodyClass = $bodyClass ?? 'inner-page';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <meta name="description" content="<?= htmlspecialchars($pageDescription) ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="<?= htmlspecialchars($bodyClass) ?>">
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php"><span class="brand-mark"><i class="bi bi-arrow-up-right"></i></span>RetailGrowth360</a>
    <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-label="Toggle navigation"><i class="bi bi-list nav-toggle-icon"></i></button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav mx-auto align-items-lg-center">
        <li class="nav-item"><a class="nav-link <?= $activePage==='about'?'active':'' ?>" href="about.php">About Us</a></li>
        <li class="nav-item dropdown solutions-dropdown">
          <a class="nav-link dropdown-toggle <?= $activePage==='solutions'?'active':'' ?>" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">Solutions</a>
          <ul class="dropdown-menu solutions-menu" data-lenis-prevent>
            <li><a class="solutions-menu-link solutions-menu-all" href="solutions.php"><i class="bi bi-grid-1x2"></i><span>All solutions</span></a></li>
            <li><a class="solutions-menu-link" href="retail-growth-strategy.php"><i class="bi bi-bullseye"></i><span>Retail Growth Strategy</span></a></li>
            <li><a class="solutions-menu-link" href="demand-marketing.php"><i class="bi bi-megaphone"></i><span>Demand &amp; Digital Marketing</span></a></li>
            <li><a class="solutions-menu-link" href="lead-generation.php"><i class="bi bi-person-plus"></i><span>Lead Generation</span></a></li>
            <li><a class="solutions-menu-link" href="web-commerce.php"><i class="bi bi-window-stack"></i><span>Web &amp; Commerce</span></a></li>
            <li><a class="solutions-menu-link" href="crm-automation.php"><i class="bi bi-diagram-3"></i><span>CRM &amp; Automation</span></a></li>
            <li><a class="solutions-menu-link" href="gohighlevel.php"><i class="bi bi-grid-3x3-gap"></i><span>GoHighLevel</span></a></li>
            <li><a class="solutions-menu-link" href="n8n-automation.php"><i class="bi bi-bezier2"></i><span>n8n Automation</span></a></li>
            <li><a class="solutions-menu-link" href="analytics-optimization.php"><i class="bi bi-graph-up-arrow"></i><span>Analytics &amp; Optimization</span></a></li>
            <li><a class="solutions-menu-link" href="customer-experience.php"><i class="bi bi-stars"></i><span>Customer Experience</span></a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link <?= $activePage==='approach'?'active':'' ?>" href="approach.php">Approach</a></li>
        <li class="nav-item"><a class="nav-link <?= $activePage==='why-us'?'active':'' ?>" href="why-us.php">Why Us</a></li>
        <li class="nav-item"><a class="nav-link <?= $activePage==='growth'?'active':'' ?>" href="growth.php">Growth</a></li>
      </ul>
      <a class="nav-cta" href="contact.php">Build Your Growth Plan <i class="bi bi-arrow-up-right ms-1"></i></a>
    </div>
  </div>
</nav>
