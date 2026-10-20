document.getElementById('year').textContent = new Date().getFullYear();

  const nav = document.querySelector('.navbar');
  window.addEventListener('scroll', () => {
    nav.classList.toggle('scrolled', window.scrollY > 40);
  });

  gsap.registerPlugin(ScrollTrigger);

  const heroTl = gsap.timeline({defaults:{ease:'power3.out'}});
  heroTl
    .from('.hero-badge', {y:24, opacity:0, duration:.7})
    .from('.hero-title', {y:45, opacity:0, duration:1}, '-=.42')
    .from('.hero-copy', {y:28, opacity:0, duration:.75}, '-=.55')
    .from('.hero-proof span', {y:15, opacity:0, stagger:.08, duration:.5}, '-=.3')
    .from('.hero-image', {x:70, opacity:0, scale:.96, duration:1.1}, '-=.9')
    .from('.floating-a, .floating-b', {y:30, opacity:0, stagger:.15, duration:.7}, '-=.6');

  gsap.to('.floating-a', {y:-16, duration:2.7, repeat:-1, yoyo:true, ease:'sine.inOut'});
  gsap.to('.floating-b', {y:13, duration:3.2, repeat:-1, yoyo:true, ease:'sine.inOut'});

  gsap.utils.toArray('.reveal').forEach(el => {
    gsap.from(el, {
      scrollTrigger:{trigger:el, start:'top 88%'},
      y:34, opacity:0, duration:.8, ease:'power3.out'
    });
  });

  gsap.utils.toArray('.reveal-card').forEach((el, i) => {
    gsap.from(el, {
      scrollTrigger:{trigger:el, start:'top 90%'},
      y:42, opacity:0, duration:.8, delay:(i % 3) * .07, ease:'power3.out'
    });
  });

  gsap.utils.toArray('.reveal-image').forEach(el => {
    gsap.from(el, {
      scrollTrigger:{trigger:el, start:'top 86%'},
      clipPath:'inset(12% 12% 12% 12% round 32px)',
      scale:1.07, opacity:.35, duration:1.15, ease:'power3.out'
    });
  });

  // Gentle hero parallax
  gsap.to('.hero-image-wrap', {
    y:50,
    scrollTrigger:{
      trigger:'.hero',
      start:'top top',
      end:'bottom top',
      scrub:1.2
    }
  });


  // Continuous testimonial marquee: seamless loop. Pauses while the user hovers over it.
  (() => {
    const carousel = document.getElementById('testimonialCarousel');
    if (!carousel) return;

    const viewport = carousel.querySelector('.testimonial-viewport');
    const track = carousel.querySelector('.testimonial-track');
    const originals = [...track.querySelectorAll('.testimonial-item')];
    if (!viewport || !track || !originals.length) return;

    // Duplicate one full set so the horizontal motion can wrap without a visible jump.
    originals.forEach(item => {
      const clone = item.cloneNode(true);
      clone.setAttribute('aria-hidden','true');
      track.appendChild(clone);
    });

    let offset = 0;
    let lastTime = performance.now();
    let setWidth = 0;
    let raf = null;
    const speed = 58; // pixels per second

    function measure(){
      const gap = parseFloat(getComputedStyle(track).gap) || 0;
      setWidth = originals.reduce((sum,item) => sum + item.getBoundingClientRect().width, 0) + gap * originals.length;
      if (setWidth > 0) offset %= setWidth;
    }

    let isPaused = false;
    carousel.addEventListener('mouseenter', () => { isPaused = true; });
    carousel.addEventListener('mouseleave', () => {
      isPaused = false;
      lastTime = performance.now();
    });

    function frame(now){
      const dt = Math.min((now - lastTime) / 1000, .05);
      lastTime = now;

      if (!document.hidden && !isPaused && setWidth > 0) {
        offset += speed * dt;
        if (offset >= setWidth) offset -= setWidth;
        track.style.transform = `translate3d(${-offset}px,0,0)`;
      }
      raf = requestAnimationFrame(frame);
    }

    // Re-measure after fonts/layout settle and whenever the viewport changes.
    requestAnimationFrame(() => {
      measure();
      lastTime = performance.now();
      raf = requestAnimationFrame(frame);
    });
    window.addEventListener('resize', measure);
    document.fonts?.ready?.then(measure);
  })();