<?php

require_once __DIR__ . '/service-catalog.php';

$serviceSlug = $serviceSlug ?? '';
$service = rg_service($serviceSlug);

if (!$service) {
    http_response_code(404);
    $pageTitle = 'Service not found | RetailGrowth360';
    $pageDescription = 'The requested RetailGrowth360 service page could not be found.';
    $activePage = 'solutions';
    $bodyClass = 'inner-page';
    include __DIR__ . '/header.php';
    echo '<main><section class="page-hero"><div class="container"><h1>This service page is not available.</h1><p>Browse the full growth stack from the solutions page.</p><a class="header-dark-cta" href="solutions.php">View solutions <i class="bi bi-arrow-right"></i></a></div></section></main>';
    include __DIR__ . '/footer.php';
    return;
}

$pageTitle = $service['title'];
$pageDescription = $service['description'];
$activePage = 'solutions';
$bodyClass = 'inner-page';

$e = static function (string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
};

$contactHref = 'contact.php?need=' . rawurlencode($service['contactNeed']);
$catalog = rg_service_catalog();

include __DIR__ . '/header.php';
?>
<main>

<section class="page-hero">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-7">
        <a class="service-back-link" href="solutions.php"><i class="bi bi-arrow-left"></i> All solutions</a>
        <div class="page-kicker"><i class="bi <?= $e($service['icon']) ?>"></i> <?= $e($service['kicker']) ?></div>
        <h1><?= $e($service['headline']) ?> <span class="gradient-text"><?= $e($service['accent']) ?></span></h1>
        <p><?= $e($service['intro']) ?></p>
        <div class="service-chip-row">
          <?php foreach ($service['chips'] as $chip): ?>
            <span><?= $e($chip) ?></span>
          <?php endforeach; ?>
        </div>
        <div class="service-hero-actions">
          <a class="header-dark-cta" href="<?= $e($contactHref) ?>">Discuss <?= $e($service['short']) ?> <i class="bi bi-arrow-right"></i></a>
          <a class="service-hero-secondary" href="approach.php">See our approach <i class="bi bi-arrow-up-right"></i></a>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="hero-side-card">
          <img src="<?= $e($service['image']) ?>" alt="<?= $e($service['imageAlt']) ?>">
          <div class="mini-label"><?= $e($service['sideLabel']) ?></div>
          <h3><?= $e($service['sideTitle']) ?></h3>
          <p><?= $e($service['sideCopy']) ?></p>
          <ul class="service-side-list">
            <?php foreach ($service['sidePoints'] as $point): ?>
              <li><i class="bi bi-check2-circle"></i><span><?= $e($point) ?></span></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="premium-section">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <div class="eyebrow"><?= $e($service['problemEyebrow']) ?></div>
        <h2 class="section-title"><?= $e($service['problemTitle']) ?></h2>
        <p class="section-copy mt-4"><?= $e($service['problemCopy']) ?></p>
        <div class="service-problem-list">
          <?php foreach ($service['problemPoints'] as $index => $point): ?>
            <div>
              <span><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?></span>
              <div>
                <strong><?= $e($point['title']) ?></strong>
                <p><?= $e($point['copy']) ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="col-lg-6">
        <img class="editorial-image service-editorial" src="<?= $e($service['problemImage']) ?>" alt="<?= $e($service['problemImageAlt']) ?>">
      </div>
    </div>
  </div>
</section>

<section class="premium-section soft">
  <div class="container">
    <div class="row align-items-end g-4 mb-5">
      <div class="col-lg-7">
        <div class="eyebrow">Scope</div>
        <h2 class="section-title"><?= $e($service['includesTitle']) ?></h2>
      </div>
      <div class="col-lg-5">
        <p class="section-copy mb-0"><?= $e($service['includesCopy']) ?></p>
      </div>
    </div>
    <div class="row g-4">
      <?php foreach ($service['includes'] as $index => $item): ?>
        <div class="col-md-6 col-xl-4">
          <article class="mindset-card<?= $index === 1 ? ' featured' : '' ?>">
            <div class="mindset-topline">
              <span><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?></span>
              <i class="bi <?= $e($item['icon']) ?>"></i>
            </div>
            <h3><?= $e($item['title']) ?></h3>
            <p><?= $e($item['copy']) ?></p>
            <div class="mindset-meta"><?= $e($item['meta']) ?></div>
          </article>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="premium-section">
  <div class="container">
    <div class="row g-5 align-items-start">
      <div class="col-lg-5">
        <div class="eyebrow">Delivery</div>
        <h2 class="section-title"><?= $e($service['processTitle']) ?></h2>
        <p class="section-copy mt-4"><?= $e($service['processCopy']) ?></p>
        <a class="header-dark-cta mt-4" href="<?= $e($contactHref) ?>">Start with this service <i class="bi bi-arrow-right"></i></a>
      </div>
      <div class="col-lg-7">
        <div class="timeline">
          <?php foreach ($service['steps'] as $index => $step): ?>
            <div class="timeline-item">
              <div class="timeline-dot"><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?></div>
              <h3><?= $e($step['title']) ?></h3>
              <p><?= $e($step['copy']) ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="premium-section soft">
  <div class="container">
    <div class="row align-items-end g-4 mb-5">
      <div class="col-lg-7">
        <div class="eyebrow">Outcomes</div>
        <h2 class="section-title">What changes when this is in place.</h2>
      </div>
      <div class="col-lg-5">
        <p class="section-copy mb-0">The work is judged by the operating result, not by the volume of activity it creates.</p>
      </div>
    </div>
    <div class="mindset-band service-outcome-band">
      <?php foreach ($service['outcomes'] as $outcome): ?>
        <div>
          <strong><?= $e($outcome['title']) ?></strong>
          <span><?= $e($outcome['copy']) ?></span>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="row align-items-end g-4 mt-5 mb-4">
      <div class="col-lg-8">
        <div class="eyebrow">Fit</div>
        <h2 class="section-title"><?= $e($service['fitTitle']) ?></h2>
      </div>
    </div>
    <div class="row g-4">
      <?php foreach ($service['fit'] as $index => $fit): ?>
        <div class="col-md-4">
          <article class="fit-card<?= $index === 1 ? ' featured' : '' ?>">
            <div class="fit-card-top">
              <div class="card-icon"><i class="bi <?= $e($fit['icon']) ?>"></i></div>
              <span><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?></span>
            </div>
            <h3><?= $e($fit['title']) ?></h3>
            <p><?= $e($fit['copy']) ?></p>
          </article>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="premium-section">
  <div class="container">
    <div class="row align-items-end g-4 mb-5">
      <div class="col-lg-7">
        <div class="eyebrow">Connected work</div>
        <h2 class="section-title">Often paired with these capabilities.</h2>
      </div>
      <div class="col-lg-5">
        <p class="section-copy mb-0">Each service is useful on its own. The growth system is stronger when the handoffs between them are designed together.</p>
      </div>
    </div>
    <div class="row g-4">
      <?php foreach ($service['related'] as $relatedSlug): ?>
        <?php if (!isset($catalog[$relatedSlug])) continue; ?>
        <?php $related = $catalog[$relatedSlug]; ?>
        <div class="col-md-4">
          <a class="service-related-card" href="<?= $e($related['file']) ?>">
            <div class="service-related-top">
              <span><?= $e($related['kicker']) ?></span>
              <i class="bi <?= $e($related['icon']) ?>"></i>
            </div>
            <h3><?= $e($related['name']) ?></h3>
            <p><?= $e($related['intro']) ?></p>
            <span class="service-related-link">View service <i class="bi bi-arrow-up-right"></i></span>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="premium-section soft pt-0">
  <div class="container">
    <div class="service-cta">
      <div>
        <div class="eyebrow" style="color:#77a1ff">Next step</div>
        <h2>Talk through <?= $e($service['name']) ?> against your current constraint.</h2>
        <p>Share where growth is getting stuck. We will use that context to decide whether this capability is the right starting point, or whether another part of the stack should come first.</p>
      </div>
      <div class="service-cta-actions">
        <a class="header-dark-cta" href="<?= $e($contactHref) ?>">Start the conversation <i class="bi bi-arrow-right"></i></a>
        <a class="service-cta-secondary" href="solutions.php">Compare all solutions <i class="bi bi-arrow-up-right"></i></a>
      </div>
    </div>
  </div>
</section>

</main>
<?php include __DIR__ . '/footer.php'; ?>
